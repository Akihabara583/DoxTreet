<footer class="bg-dark text-white mt-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-6">
                <h5>{{ config('app.name', 'PDF Generator') }}</h5>
                <p class="text-white-50">{{ __('messages.seo_default_description') }}</p>
            </div>
            <div class="col-md-3">
                <h5>{{ __('messages.categories') }}</h5>
                <ul class="list-unstyled">
                    @foreach(\App\Models\Category::all()->take(5) as $category)
                        <li><a href="{{ route('home', app()->getLocale()) }}#category-{{ $category->id }}" class="text-white-50">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3">
                <h5>{{ __('messages.navigation') }}</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home', app()->getLocale()) }}" class="text-white-50">{{ __('messages.home') }}</a></li>
                    @guest
                        <li><a href="{{ route('login', app()->getLocale()) }}" class="text-white-50">{{ __('messages.login') }}</a></li>
                        <li><a href="{{ route('register', app()->getLocale()) }}" class="text-white-50">{{ __('messages.register') }}</a></li>
                    @endguest
                </ul>
            </div>
        </div>
        <div class="text-center text-white-50 pt-3 border-top border-secondary">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.</p>
        </div>
    </div>
</footer>
