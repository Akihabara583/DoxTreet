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
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Основное содержимое</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок статьи</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Текст статьи</label>
                    <textarea class="form-control" id="body" name="body" rows="15" required>{{ old('body', $post->body ?? '') }}</textarea>
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
                {{-- === НОВЫЙ БЛОК: ВЫПАДАЮЩИЙ СПИСОК === --}}
                <div class="mb-3">
                    <label for="template_id" class="form-label">Привязать к шаблону (необязательно)</label>
                    <select class="form-select" id="template_id" name="template_id">
                        <option value="">-- Не выбрано --</option>
                        @foreach ($templates as $template)
                            <option value="{{ $template->id }}" @selected(old('template_id', $post->template_id ?? '') == $template->id)>
                                {{ $template->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <hr>
                {{-- ====================================== --}}
                <div class="mb-3">
                    <label for="meta_title" class="form-label">SEO Заголовок (Title)</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}">
                </div>
                <div class="mb-3">
                    <label for="meta_description" class="form-label">SEO Описание (Description)</label>
                    <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ old('meta_description', $post->meta_description ?? '') }}</textarea>
                </div>
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
