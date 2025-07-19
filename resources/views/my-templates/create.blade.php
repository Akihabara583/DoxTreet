@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2>Создание нового шаблона</h2>

        <form id="templateForm" action="{{ route('profile.my-templates.store', app()->getLocale()) }}" method="POST">
            @csrf

            {{-- ИЗМЕНЕНИЕ ЗДЕСЬ: Вся логика перенесена внутрь x-data для надёжности --}}
            <div x-data="{
            categories: @json($categoriesByCountry),
            selectedCountry: '',
            fields: [],
            newFieldLabel: '',

            generateKey(label) {
                return label.toLowerCase()
                    .replace(/ /g, '_')
                    .replace(/[^\w-]+/g, '');
            },

            addField() {
                if (this.newFieldLabel.trim() === '') return;
                const key = this.generateKey(this.newFieldLabel);
                if (this.fields.some(f => f.key === key)) {
                    alert('Поле с таким системным именем уже существует!');
                    return;
                }
                this.fields.push({
                    label: this.newFieldLabel,
                    key: key
                });
                this.newFieldLabel = '';
            },

            removeField(index) {
                this.fields.splice(index, 1);
            },

            insertFieldIntoEditor(key) {
                if (!key) return;
                const placeholder = `@{{${key}}}`;
                tinymce.activeEditor.execCommand('mceInsertContent', false, placeholder);
                document.getElementById('insertField').value = '';
            }
        }">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="country_code" class="form-label">Страна</label>
                        <select name="country_code" id="country_code" class="form-select" x-model="selectedCountry" required>
                            <option value="">Выберите страну...</option>
                            @foreach($countries as $country)
                                <option value="{{ $country }}">{{ $country }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="category_id" class="form-label">Категория</label>
                        <select name="category_id" id="category_id" class="form-select" :disabled="!selectedCountry" required>
                            <option value="">Сначала выберите страну</option>
                            <template x-if="selectedCountry">
                                <template x-for="category in categories[selectedCountry]" :key="category.id">
                                    <option :value="category.id" x-text="category.name['{{ app()->getLocale() }}'] || category.name['en']"></option>
                                </template>
                            </template>
                        </select>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="templateName" class="form-label">Название шаблона</label>
                    <input type="text" id="templateName" name="name" class="form-control" required>
                </div>

                <div class="card mb-3">
                    <div class="card-header">Поля для ввода</div>
                    <div class="card-body">
                        <template x-for="(field, index) in fields" :key="index">
                            <div class="d-flex align-items-center mb-2">
                                <input type="text" :value="field.label" class="form-control" disabled>
                                <button type="button" @click="removeField(index)" class="btn btn-danger btn-sm ms-2">Удалить</button>
                            </div>
                        </template>
                        <div class="d-flex mt-2">
                            <input type="text" x-model="newFieldLabel" @keydown.enter.prevent="addField()" placeholder="Введите название нового поля (например, ФИО клиента)" class="form-control">
                            <button type="button" @click="addField()" class="btn btn-primary ms-2">Добавить</button>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="fields" :value="JSON.stringify(fields)">

                <div class="card">
                    <div class="card-header">Макет документа</div>
                    <div class="card-body">
                        <div class="mb-2">
                            <label for="insertField" class="form-label">Вставить поле в макет:</label>
                            <select id="insertField" @change="insertFieldIntoEditor($event.target.value)" class="form-select" style="width: auto; display: inline-block;">
                                <option value="">Выберите поле...</option>
                                <template x-for="field in fields" :key="field.key">
                                    <option :value="field.key" x-text="field.label"></option>
                                </template>
                            </select>
                        </div>
                        <textarea id="layoutEditor" name="layout"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-3">Сохранить шаблон</button>
            </div>
        </form>
    </div>

    {{-- Скрипты --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    {{-- Замени YOUR_API_KEY на свой ключ от TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/l718ds64re4lehaeqqhkzz3rp16ttmv4o24orxkme8qtmtf6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    {{-- ИЗМЕНЕНИЕ ЗДЕСЬ: Внешняя функция templateCreator() больше не нужна, поэтому мы её удаляем --}}
    <script>
        tinymce.init({
            selector: '#layoutEditor',
            plugins: 'lists link image table code help wordcount',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image table',
            height: 400,
        });
    </script>
@endsection
