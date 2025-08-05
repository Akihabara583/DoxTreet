{{-- Этот баннер будет показан, только если $showCookieConsentBanner равно true --}}
@if($showCookieConsentBanner ?? false)

    <style>
        #cookie-consent-overlay-fixed {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            height: 100% !important;
            background-color: rgba(10, 10, 10, 0.75) !important;
            backdrop-filter: blur(10px) !important;
            -webkit-backdrop-filter: blur(10px) !important;
            z-index: 99998 !important;
            animation: fadeInFixed 0.3s ease !important;
        }
        #cookie-consent-banner-fixed {
            position: fixed !important;
            bottom: 0 !important;
            left: 0 !important;
            width: 100% !important;
            background-color: #212529 !important;
            color: #f8f9fa !important;
            padding: 2.5rem !important;
            z-index: 99999 !important;
            box-shadow: 0 -10px 30px rgba(0,0,0,0.3) !important;
            animation: slideInUpFixed 0.5s ease !important;
        }
        #cookie-consent-banner-fixed h4,
        #cookie-consent-banner-fixed p {
            color: #ffffff !important;
        }
        #cookie-consent-banner-fixed a {
            color: #ffffff !important;
            text-decoration: underline !important;
        }
        #cookie-consent-banner-fixed .text-white-50 {
            color: rgba(255, 255, 255, 0.6) !important;
        }
        #cookie-consent-banner-fixed .btn-primary {
            color: #fff !important;
        }
        #cookie-consent-banner-fixed .btn-outline-light:hover {
            color: #000 !important;
            background-color: #f8f9fa !important;
        }
        @keyframes fadeInFixed { from { opacity: 0; } to { opacity: 1; } }
        @keyframes slideInUpFixed { from { transform: translateY(100%); } to { transform: translateY(0); } }
    </style>

    {{-- ✅ НОВАЯ ЛОГИКА: Показываем оверлей, только если это не юридическая страница --}}
    @if($showCookieConsentOverlay ?? false)
        <div id="cookie-consent-overlay-fixed"></div>
    @endif

    <div id="cookie-consent-banner-fixed">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-3 mb-lg-0">
                    <h4 class="mb-2">{{ __('messages.cookie_title') }}</h4>
                    <p class="mb-0 text-white-50">
                        {{ __('messages.cookie_text') }}
                        <a href="{{ route('privacy', app()->getLocale()) }}">{{ __('messages.privacy_policy') }}</a>.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('cookie.accept') }}" class="btn btn-primary btn-lg px-4 me-md-2" id="cookie-accept-btn">{{ __('messages.accept') }}</a>
                        <a href="{{ route('cookie.decline') }}" class="btn btn-outline-light btn-lg px-4" id="cookie-decline-btn">{{ __('messages.decline') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function() {
            const banner = document.getElementById('cookie-consent-banner-fixed');
            const overlay = document.getElementById('cookie-consent-overlay-fixed');

            // Мы не можем проверить !banner, так как он всегда в DOM,
            // но можем проверить overlay, который добавляется условно.
            if (!banner) {
                return;
            }

            const acceptBtn = document.getElementById('cookie-accept-btn');
            const declineBtn = document.getElementById('cookie-decline-btn');

            function hideBannerOnClick() {
                banner.style.display = 'none';
                // Проверяем, существует ли оверлей, прежде чем скрыть его
                if (overlay) {
                    overlay.style.display = 'none';
                }
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
