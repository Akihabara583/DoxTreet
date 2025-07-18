@extends('layouts.app')

@section('title', __('messages.home') . ' - ' . config('app.name'))
@section('description', __('messages.seo_default_description'))

@push('styles')
    <style>
        .template-card { transition: all 0.3s ease-in-out !important; }
        .browser-card { cursor: pointer; transition: all 0.2s ease-in-out; border: 1px solid #eee; }
        .browser-card:hover { transform: translateY(-4px); box-shadow: 0 4px 20px rgba(0,0,0,0.08); border-color: var(--bs-primary); }
        #searchInput:focus { box-shadow: none; border-color: #86b7fe; }
        [x-cloak] { display: none !important; }
        .fade-in { animation: fadeIn 0.4s ease; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(15px); } to { opacity: 1; transform: translateY(0); } }
    </style>
@endpush

@push('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
@endpush

@section('content')
    {{-- Hero-блок --}}
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <svg class="d-block mx-lg-auto img-fluid" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" role="img"><title>Иллюстрация</title><path fill="#0D6EFD" d="M48.1,-63.3C61.4,-51.1,70.5,-33.8,74.1,-15.7C77.7,2.4,75.8,21.3,66.8,36.5C57.8,51.7,41.7,63.2,25.1,70.8C8.5,78.4,-8.6,82,-24.5,77.5C-40.4,73,-55.1,60.4,-65.3,45.2C-75.5,30,-81.2,12.2,-79.6,-5C-78,-22.2,-69.1,-38.8,-56.3,-50.7C-43.5,-62.7,-26.8,-70,-9.5,-69.3C7.8,-68.6,15.6,-60.1,25.5,-55.2" transform="translate(100 100) scale(0.9)" style="opacity: 0.1;"></path><path fill="#0D6EFD" d="M42.6,-52.8C54.8,-42.1,64.1,-27.7,66.1,-12.6C68.1,2.6,62.8,18.4,54,31.2C45.2,44,32.9,53.8,18.9,59.3C4.9,64.8,-10.9,66,-25.1,60.7C-39.3,55.5,-51.9,43.8,-59.8,29.8C-67.7,15.8,-70.9,-0.5,-66.9,-15.1C-62.9,-29.7,-51.7,-42.6,-38.9,-51.2C-26.1,-59.8,-11.7,-64.1,3,-65.4C17.7,-66.7,35.4,-65.8,42.6,-52.8" transform="translate(120 90) scale(1.1)" style="opacity: 0.15;"></path><g transform="translate(50 50)" style="fill: #0d6efd;"><path d="M72.2,84.3H17.8c-2.3,0-4.1-1.8-4.1-4.1V19.8c0-2.3,1.8-4.1,4.1-4.1h35.9c1.1,0,2.1,0.4,2.9,1.2l18.4,18.4 c0.8,0.8,1.2,1.8,1.2,2.9v42.1C76.3,82.5,74.5,84.3,72.2,84.3z" style="fill: #fff; stroke: #0d6efd; stroke-width: 2;"></path><path d="M52.5,17.9v19.1c0,1.2,1,2.2,2.2,2.2h19.1" style="fill: none; stroke: #0d6efd; stroke-width: 2;"></path><line x1="24.8" y1="50.7" x2="65.3" y2="50.7" style="fill: none; stroke: #dee2e6; stroke-width: 2;"></line><line x1="24.8" y1="60.5" x2="65.3" y2="60.5" style="fill: none; stroke: #dee2e6; stroke-width: 2;"></line><line x1="24.8" y1="70.3" x2="50" y2="70.3" style="fill: none; stroke: #dee2e6; stroke-width: 2;"></line></g><g transform="translate(90 70)"><path d="M72.2,84.3H17.8c-2.3,0-4.1-1.8-4.1-4.1V19.8c0-2.3,1.8-4.1,4.1-4.1h35.9c1.1,0,2.1,0.4,2.9,1.2l18.4,18.4 c0.8,0.8,1.2,1.8,1.2,2.9v42.1C76.3,82.5,74.5,84.3,72.2,84.3z" style="fill: #fff; stroke: #343a40; stroke-width: 2;"></path><path d="M52.5,17.9v19.1c0,1.2,1,2.2,2.2,2.2h19.1" style="fill: none; stroke: #343a40; stroke-width: 2;"></path><line x1="24.8" y1="50.7" x2="65.3" y2="50.7" style="fill: none; stroke: #e9ecef; stroke-width: 2;"></line><line x1="24.8" y1="60.5" x2="65.3" y2="60.5" style="fill: none; stroke: #e9ecef; stroke-width: 2;"></line><line x1="24.8" y1="70.3" x2="50" y2="70.3" style="fill: none; stroke: #e9ecef; stroke-width: 2;"></line></g></svg>
            </div>
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold lh-1 mb-3">{{ __('messages.hero_title') }}</h1>
                <p class="lead">{{ __('messages.hero_subtitle') }}</p>
                <form action="{{ route('home', app()->getLocale()) }}" method="GET" class="mt-4">
                    <div class="input-group input-group-lg">
                        <input id="searchInput" type="search" name="q" class="form-control" placeholder="{{ __('messages.search_placeholder') }}" value="{{ $searchQuery ?? '' }}">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(!$searchQuery)
        @if($popularTemplates?->isNotEmpty())
            <div class="container px-4 py-5" id="popular">
                <h2 class="pb-2 border-bottom text-center">{{ __('messages.popular_templates') }}</h2>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 py-5">
                    @foreach($popularTemplates as $template)
                        <div class="col"><a href="{{ route('documents.show', ['locale' => app()->getLocale(), 'countryCode' => $template->country_code, 'templateSlug' => $template->slug]) }}" class="card template-card h-100 text-decoration-none text-dark shadow-sm"><div class="card-body text-center"><div class="fs-1 text-primary mb-3"><i class="bi bi-file-earmark-text"></i></div><h6 class="card-title">{{ $template->title }}</h6></div></a></div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="bg-light" id="templates-browser" x-cloak
             x-data="templateBrowser({
                data: {{ Js::from($dataByCountry) }},
                countries: {{ Js::from($countries) }},
                locale: '{{ app()->getLocale() }}',
                routes: { show: '{{ route('documents.show', ['locale' => '__LCL__', 'countryCode' => '__CC__', 'templateSlug' => '__SLG__']) }}' }
             })">

            <div class="container px-4 py-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bold" x-show="!selectedCountry">{{ __('messages.template_catalog') }}</h2>
                    <div x-show="selectedCountry" class="fade-in">
                        <h2 class="fw-bold display-6">
                            <span x-text="selectedCountry?.name.toUpperCase()"></span>
                            <template x-if="selectedCategory">
                                <span><span class="mx-2 text-muted">&raquo;</span><span x-text="selectedCategory.name"></span></span>
                            </template>
                        </h2>
                        <button @click="selectedCategory ? resetCategory() : resetCountry()" class="btn btn-sm btn-outline-secondary mt-2"><i class="bi bi-arrow-left"></i> {{ __('messages.back') }}</button>
                    </div>
                </div>

                <div x-show="!selectedCountry" class="row row-cols-1 row-cols-md-3 g-4 py-3 fade-in"><template x-for="country in countries" :key="country.code"><div class="col"><div @click="selectCountry(country)" class="card browser-card h-100"><div class="card-body text-center d-flex flex-column justify-content-center align-items-center p-4"><span class="fs-1 mb-3" x-text="country.code === 'UA' ? '🇺🇦' : (country.code === 'PL' ? '🇵🇱' : '🇩🇪')"></span><h4 class="card-title fw-bold" x-text="country.name"></h4></div></div></div></template></div>
                <div x-show="selectedCountry && !selectedCategory" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 py-3 fade-in"><template x-for="category in categoriesForSelectedCountry" :key="category.id"><div class="col d-flex"><div @click="selectCategory(category)" class="card browser-card w-100"><div class="card-body d-flex align-items-center p-3"><h6 class="card-title mb-0" x-text="category.name"></h6></div></div></div></template></div>
                <div x-show="selectedCategory" class="row row-cols-1 row-cols-md-2 g-4 py-3 fade-in"><template x-for="template in templatesForSelectedCategory" :key="template.id"><div class="col"><a :href="templateUrl(template)" class="card browser-card h-100 text-decoration-none text-dark"><div class="card-body"><h6 class="card-title text-primary" x-text="template.title"></h6><p class="card-text small text-muted" x-text="template.description"></p></div></a></div></template></div>
            </div>
        </div>
    @else
        <div class="container px-4 py-5">
            <div class="pb-2 mb-4 border-bottom">
                <h2>{{ __('messages.search_results_for', ['query' => $searchQuery]) }}</h2>
            </div>

            @if($searchResults && $searchResults->count() > 0)
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach($searchResults as $template)
                        <div class="col"><div class="card template-card h-100"><div class="card-body">
                                    @if(isset($countryNames[$template->country_code]))
                                        <p class="card-subtitle mb-2 text-muted fw-bold">{{ $countryNames[$template->country_code][$locale] ?? $countryNames[$template->country_code]['en'] }}</p>
                                    @endif
                                    <h5 class="card-title"><a href="{{ route('documents.show', ['locale' => app()->getLocale(), 'countryCode' => $template->country_code, 'templateSlug' => $template->slug]) }}" class="text-decoration-none">{{ $template->title }}</a></h5>
                                    <p class="card-text">{{ $template->description }}</p>
                                </div></div></div>
                    @endforeach
                </div>
            @else
                <p class="lead">{{ __('messages.no_results_found') }}</p>
            @endif

            <div class="text-center mt-5">
                <a href="{{ route('home', app()->getLocale()) }}" class="btn btn-primary">{{ __('messages.clear_search_and_return') }}</a>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('templateBrowser', (config) => ({
                data: config.data,
                countries: config.countries,
                routes: config.routes,
                locale: config.locale,
                selectedCountry: null,
                selectedCategory: null,

                get categoriesForSelectedCountry() {
                    if (!this.selectedCountry) return [];
                    return this.data[this.selectedCountry.code] || [];
                },
                get templatesForSelectedCategory() {
                    if (!this.selectedCategory) return [];
                    return this.selectedCategory.templates || [];
                },
                templateUrl(template) {
                    return this.routes.show
                        .replace('__LCL__', this.locale)
                        .replace('__CC__', template.country_code)
                        .replace('__SLG__', template.slug);
                },
                selectCountry(country) { this.selectedCountry = country; },
                selectCategory(category) { this.selectedCategory = category; },
                resetCountry() { this.selectedCountry = null; this.selectedCategory = null; },
                resetCategory() { this.selectedCategory = null; }
            }));
        });
    </script>
@endpush
