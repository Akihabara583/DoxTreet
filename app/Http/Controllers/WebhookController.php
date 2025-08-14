<?php

// Файл: app/Http/Controllers/WebhookController.php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class WebhookController extends Controller
{
    /**
     * Обрабатывает входящие вебхуки от Gumroad.
     */
    public function handleGumroad(Request $request, SubscriptionService $subscriptionService)
    {
        try {
            if ($request->input('test')) {
                Log::info('Gumroad test ping received successfully.');
                return response()->json(['status' => 'ok', 'message' => 'Test ping successful']);
            }

            if (!$request->has('product_id') || !$request->has('email')) {
                Log::warning('Gumroad Webhook: Invalid payload received.', $request->all());
                return response()->json(['status' => 'error', 'message' => 'Invalid payload'], 400);
            }

            $productId = $request->input('product_id');
            $email = $request->input('email');
            $subscriberId = $request->input('subscriber_id');

            $user = User::where('email', $email)->first();
            if (!$user) {
                Log::warning("Gumroad Webhook: User not found with email: {$email}");
                return response()->json(['status' => 'ok', 'message' => 'User not found, but acknowledged.']);
            }

            // ✅ ИСПРАВЛЕНИЕ: Используем config() вместо env()
            $standardPlanId = config('services.gumroad.standard_plan_id');
            $proPlanId = config('services.gumroad.pro_plan_id');
            $limitResetId = config('services.gumroad.limit_reset_id');

            if ($productId === $standardPlanId) {
                $user->gumroad_subscriber_id = $subscriberId;
                $subscriptionService->assignPlan($user, 'standard', 30);
                Log::info("Subscription 'standard' assigned to user {$email}.");

            } elseif ($productId === $proPlanId) {
                $user->gumroad_subscriber_id = $subscriberId;
                $subscriptionService->assignPlan($user, 'pro', 30);
                Log::info("Subscription 'pro' assigned to user {$email}.");

            } elseif ($productId === $limitResetId) {
                if ($user->subscription_plan === 'base' || $user->subscription_plan === null) {
                    $user->resetDailyLimits();
                    Log::info("Daily limits have been reset for user {$email}.");
                } else {
                    Log::warning("User {$email} on '{$user->subscription_plan}' plan tried to buy a limit reset, purchase ignored.");
                }

            } else {
                Log::warning("Gumroad Webhook: Unknown product ID '{$productId}' for user {$email}.");
            }

            return response()->json(['status' => 'ok']);

        } catch (Throwable $e) {
            Log::error('Error processing Gumroad webhook: ' . $e->getMessage(), [
                'exception' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return response()->json(['status' => 'error', 'message' => 'Internal Server Error'], 500);
        }
    }
}
