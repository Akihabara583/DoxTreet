<?php

namespace App\Providers;

use App\Models\GeneratedDocument;
use App\Models\SignedDocument;
use App\Models\UserTemplate;
use App\Policies\GeneratedDocumentPolicy;
use App\Policies\SignedDocumentPolicy;
use App\Policies\UserTemplatePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        GeneratedDocument::class => GeneratedDocumentPolicy::class,
        UserTemplate::class => UserTemplatePolicy::class,
        SignedDocument::class => SignedDocumentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
