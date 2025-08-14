@if($showCookieConsentBanner ?? false)
    {{--
        The styles for the cookie banner have been completely rewritten
        to use the new design system's CSS variables.
        The Blade logic and JavaScript functionality remain unchanged.
    --}}
    <style>
        .cookie-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(var(--text-primary-rgb, 30, 27, 49), 0.6);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            z-index: 1050;
            animation: fadeIn 0.3s ease;
        }
        .cookie-banner {
            position: fixed;
            bottom: 2rem;
            left: 2rem;
            right: 2rem;
            max-width: 800px;
            margin: 0 auto;
            background-color: var(--bg-primary, #fff);
            color: var(--text-secondary, #4c495d);
            padding: 2rem;
            z-index: 1051;
            border-radius: 24px;
            border: 1px solid var(--border, #e5e1f5);
            box-shadow: var(--shadow-xl, 0 20px 25px -5px rgba(0,0,0,0.1));
            animation: slideInUp 0.5s ease;
        }
        .cookie-banner h4 {
            color: var(--text-primary, #1e1b31);
            font-weight: 700;
        }
        .cookie-banner a {

            text-decoration: none;
        }
        .btn-modern {
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }
        .btn-primary-modern {
            background: var(--gradient-brand, linear-gradient(135deg, #8b5cf6 0%, #06b6d4 100%));
            color: white;
        }
        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg, 0 10px 15px -3px rgba(0,0,0,0.1));
            color: white;
        }
        /* FIX: Made the decline button more visible */
        .btn-outline-modern {
            background: var(--bg-secondary, #faf7ff);
            border: 1px solid var(--border, #e5e1f5);
            color: var(--text-secondary, #4c495d);
        }
        .btn-outline-modern:hover {
            background-color: var(--border, #e5e1f5);
            color: var(--text-primary, #1e1b31);
        }

        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes slideInUp { from { transform: translateY(100px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }

        @media (max-width: 768px) {
            .cookie-banner {
                left: 1rem;
                right: 1rem;
                bottom: 1rem;
                padding: 1.5rem;
            }
        }
    </style>

    @if($showCookieConsentOverlay ?? false)
        <div class="cookie-overlay" id="cookie-consent-overlay"></div>
    @endif

    <div class="cookie-banner" id="cookie-consent-banner">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-3 mb-lg-0">
                    <h4 class="mb-2">{{ __('messages.cookie_title') }}</h4>
                    <p class="mb-0 small">
                        {{ __('messages.cookie_text') }}
                        <a href="{{ route('privacy', app()->getLocale()) }}">{{ __('messages.privacy_policy') }}</a>.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('cookie.decline') }}" class="btn btn-modern btn-outline-modern px-4" id="cookie-decline-btn">{{ __('messages.decline') }}</a>
                        <a href="{{ route('cookie.accept') }}" class="btn btn-modern btn-primary-modern px-4" id="cookie-accept-btn">{{ __('messages.accept') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function() {
            const banner = document.getElementById('cookie-consent-banner');
            const overlay = document.getElementById('cookie-consent-overlay');
            if (!banner) return;

            const acceptBtn = document.getElementById('cookie-accept-btn');
            const declineBtn = document.getElementById('cookie-decline-btn');

            function hideBannerOnClick(event) {
                // We prevent default to stop navigation if it's a real link
                event.preventDefault();
                const targetUrl = event.currentTarget.href;

                banner.style.display = 'none';
                if (overlay) {
                    overlay.style.display = 'none';
                }
                // After hiding, we proceed with the original link action
                window.location.href = targetUrl;
            }

            if (acceptBtn) {
                acceptBtn.addEventListener('click', hideBannerOnClick);
            }
            if (declineBtn) {
                declineBtn.addEventListener('click', hideBannerOnClick);
            }
        })();
    </script>
@endif
