@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Основное содержимое</h6>
                <!-- Навигация по табам (языкам) -->
                <ul class="nav nav-tabs card-header-tabs" id="lang-tabs" role="tablist">
                    @foreach(config('app.available_locales') as $locale)
                        <li class="nav-item">
                            <a class="nav-link @if($loop->first) active @endif" id="{{$locale}}-tab" data-bs-toggle="tab" href="#tab-{{$locale}}" role="tab" aria-controls="tab-{{$locale}}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ strtoupper($locale) }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="card-body">
                <!-- Содержимое табов -->
                <div class="tab-content" id="lang-tabs-content">
                    @foreach(config('app.available_locales') as $locale)
                        <div class="tab-pane fade @if($loop->first) show active @endif" id="tab-{{$locale}}" role="tabpanel" aria-labelledby="{{$locale}}-tab">

                            <div class="mb-3">
                                <label for="title_{{$locale}}" class="form-label">Заголовок статьи ({{ strtoupper($locale) }})</label>
                                <input type="text"
                                       class="form-control"
                                       id="title_{{$locale}}"
                                       name="title[{{$locale}}]"
                                       value="{{ old('title.'.$locale, isset($post) ? $post->getTranslation('title', $locale) : '') }}">
                            </div>

                            <div class="mb-3">
                                <label for="body_{{$locale}}" class="form-label">Текст статьи ({{ strtoupper($locale) }})</label>
                                <textarea class="form-control"
                                          id="body_{{$locale}}"
                                          name="body[{{$locale}}]"
                                          rows="15">{{ old('body.'.$locale, isset($post) ? $post->getTranslation('body', $locale) : '') }}</textarea>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Настройки SEO и публикации</h6>
            </div>
            <div class="card-body">

                <div class="mb-3">
                    <label for="category_filter" class="form-label">1. Выберите категорию</label>
                    <select class="form-select" id="category_filter">
                        <option value="">-- Сначала выберите категорию --</option>
                        @foreach($categories as $countryCode => $categoryGroup)
                            <optgroup label="{{ $countryCode }}">
                                @foreach($categoryGroup as $category)
                                    <option value="{{ $category->id }}"
                                            @if(isset($post) && $post->template && $post->template->category_id == $category->id) selected @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="template_id" class="form-label">2. Привязать к шаблону</label>
                    <select class="form-select" id="template_id" name="template_id">
                        <option value="">-- Не выбрано --</option>
                    </select>
                </div>
                <hr>

                {{-- SEO Поля также с табами --}}
                <h6 class="font-weight-bold">SEO</h6>
                <ul class="nav nav-pills mb-3" id="seo-lang-tabs" role="tablist">
                    @foreach(config('app.available_locales') as $locale)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if($loop->first) active @endif" id="seo-{{$locale}}-tab" data-bs-toggle="pill" data-bs-target="#seo-tab-{{$locale}}" type="button" role="tab">{{ strtoupper($locale) }}</button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="seo-lang-tabs-content">
                    @foreach(config('app.available_locales') as $locale)
                        <div class="tab-pane fade @if($loop->first) show active @endif" id="seo-tab-{{$locale}}" role="tabpanel">
                            <div class="mb-3">
                                <label for="meta_title_{{$locale}}" class="form-label">SEO Заголовок ({{ strtoupper($locale) }})</label>
                                <input type="text" class="form-control" id="meta_title_{{$locale}}" name="meta_title[{{$locale}}]" value="{{ old('meta_title.'.$locale, isset($post) ? $post->getTranslation('meta_title', $locale) : '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="meta_description_{{$locale}}" class="form-label">SEO Описание ({{ strtoupper($locale) }})</label>
                                <textarea class="form-control" id="meta_description_{{$locale}}" name="meta_description[{{$locale}}]" rows="3">{{ old('meta_description.'.$locale, isset($post) ? $post->getTranslation('meta_description', $locale) : '') }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" role="switch" id="is_published" name="is_published" value="1" @checked(old('is_published', $post->is_published ?? false))>
                    <label class="form-check-label" for="is_published">Опубликовать</label>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function loadTemplates(categoryId, selectedTemplateId = null) {
                var templateSelect = $('#template_id');
                if (!categoryId) {
                    templateSelect.html('<option value="">-- Не выбрано --</option>');
                    return;
                }
                $.ajax({
                    url: '{{ route("admin.posts.get_templates_by_category", ["locale" => app()->getLocale()]) }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        category_id: categoryId
                    },
                    beforeSend: function() { templateSelect.html('<option value="">Загрузка...</option>'); },
                    success: function(data) {
                        templateSelect.html('<option value="">-- Не выбрано --</option>');
                        if (data.length > 0) {
                            $.each(data, function(index, template) {
                                templateSelect.append('<option value="' + template.id + '">' + template.title + '</option>');
                            });
                            if (selectedTemplateId) {
                                templateSelect.val(selectedTemplateId);
                            }
                        } else {
                            templateSelect.html('<option value="" disabled>Нет шаблонов для этой категории</option>');
                        }
                    },
                    error: function() { templateSelect.html('<option value="" disabled>Ошибка загрузки</option>'); }
                });
            }

            $('#category_filter').on('change', function() {
                loadTemplates($(this).val());
            });

            var initialCategoryId = $('#category_filter').val();
            if (initialCategoryId) {
                var selectedTemplateId = '{{ old('template_id', $post->template_id ?? '') }}';
                loadTemplates(initialCategoryId, selectedTemplateId);
            }
        });
    </script>
@endpush
