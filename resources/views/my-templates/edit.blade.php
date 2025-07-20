@extends('layouts.app')

@section('title', __('messages.editing_template_title') . ' - ' . config('app.name'))

@section('content')
    <div class="container py-4"
         x-data='{
             categoriesByCountry: {{ json_encode($categoriesByCountry) }},
             countries: {{ json_encode($countries) }},
             selectedCountry: "{{ old('country_code', $userTemplate->country_code) }}",
             fields: {!! old('fields', json_encode($userTemplate->fields)) !!},
             newFieldLabel: "",

             generateKey(label) {
                 const translitMap = { "а": "a", "б": "b", "в": "v", "г": "g", "д": "d", "е": "e", "ё": "yo", "ж": "zh", "з": "z", "и": "i", "й": "y", "к": "k", "л": "l", "м": "m", "н": "n", "о": "o", "п": "p", "р": "r", "с": "s", "т": "t", "у": "u", "ф": "f", "х": "kh", "ц": "ts", "ч": "ch", "ш": "sh", "щ": "shch", "ъ": "", "ы": "y", "ь": "", "э": "e", "ю": "yu", "я": "ya", "і": "i", "ї": "yi", "є": "ie" };
                 let text = label.toLowerCase();
                 let newText = "";
                 for (let i = 0; i < text.length; i++) {
                     newText += translitMap[text[i]] || text[i];
                 }
                 return newText.replace(/ /g, "_").replace(/[^\w-]+/g, "");
             },

             addField() {
                 if (!this.newFieldLabel.trim()) return;
                 const key = this.generateKey(this.newFieldLabel);
                 if (this.fields.some(f => f.key === key)) {
                     alert("{{ __('messages.field_with_this_key_exists') }}");
                     return;
                 }
                 this.fields.push({ label: this.newFieldLabel, key: key });
                 this.newFieldLabel = "";
             },

             removeField(index) {
                 this.fields.splice(index, 1);
             },

             insertFieldIntoEditor(value) {
                 if (!value) return;
                 const editor = tinymce.get("layoutEditor");
                 if (editor) {
                  editor.execCommand("mceInsertContent", false, `__${value}__`);
                }
                this.$event.target.value = "";
             }
         }'>
        <h2>{{ __('messages.edit_template_title', ['name' => $userTemplate->name]) }}</h2>

        <div class="alert alert-info mt-4">
            <h4 class="alert-heading">{{ __('messages.how_to_create_template_title') }}</h4>
            <ol class="mb-0">
                <li>{!! __('messages.how_to_step_1') !!}</li>
                <li>{!! __('messages.how_to_step_2') !!}</li>
            </ol>
        </div>

        <form method="POST" action="{{ route('profile.my-templates.update', ['locale' => app()->getLocale(), 'userTemplate' => $userTemplate->id]) }}">
            @csrf
            @method('PATCH')

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="country_code" class="form-label">{{ __('messages.country') }}</label>
                    <select name="country_code" id="country_code" class="form-select" x-model="selectedCountry" required>
                        <option value="">{{ __('messages.select_country') }}</option>
                        <template x-for="country in countries" :key="country">
                            <option :value="country" x-text="country"></option>
                        </template>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="category_id" class="form-label">{{ __('messages.category') }}</label>
                    <select name="category_id" id="category_id" class="form-select" :disabled="!selectedCountry" required x-init="$nextTick(() => { $el.value = '{{ old('category_id', $userTemplate->category_id) }}' })">
                        <option value="">{{ __('messages.select_country_first') }}</option>
                        <template x-if="selectedCountry && categoriesByCountry[selectedCountry]">
                            <template x-for="category in categoriesByCountry[selectedCountry]" :key="category.id">
                                <option :value="category.id" x-text="category.name['{{ app()->getLocale() }}'] || category.name['en']"></option>
                            </template>
                        </template>
                    </select>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="templateName" class="form-label">{{ __('messages.template_name') }}</label>
                <input type="text" id="templateName" name="name" class="form-control" value="{{ old('name', $userTemplate->name) }}" required>
            </div>

            <div class="card mb-3">
                <div class="card-header">{{ __('messages.input_fields') }}</div>
                <div class="card-body">
                    <template x-for="(field, index) in fields" :key="index">
                        <div class="d-flex align-items-center mb-2">
                            <input type="text" :value="field.label" class="form-control" disabled>
                            <button type="button" @click="removeField(index)" class="btn btn-danger btn-sm ms-2">{{ __('messages.delete_button') }}</button>
                        </div>
                    </template>
                    <div class="d-flex mt-2">
                        <input type="text" x-model="newFieldLabel" @keydown.enter.prevent="addField()" placeholder="{{ __('messages.add_new_field_placeholder') }}" class="form-control">
                        <button type="button" @click="addField()" class="btn btn-primary ms-2">{{ __('messages.add_button') }}</button>
                    </div>
                </div>
            </div>

            <input type="hidden" name="fields" x-bind:value="JSON.stringify(fields)">

            <div class="card">
                <div class="card-header">{{ __('messages.document_layout') }}</div>
                <div class="card-body">
                    <div class="mb-2">
                        <label for="insertField" class="form-label">{{ __('messages.insert_field_label') }}</label>
                        <select id="insertField" @change="insertFieldIntoEditor($event.target.value)" class="form-select" style="width: auto; display: inline-block;">
                            <option value="">{{ __('messages.select_field') }}</option>
                            <template x-for="field in fields" :key="field.key">
                                <option :value="field.key" x-text="field.label"></option>
                            </template>
                        </select>
                    </div>
                    <textarea id="layoutEditor" name="layout" class="form-control" rows="10">{{ old('layout', $userTemplate->layout) }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-success mt-3">{{ __('messages.save_changes_button') }}</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tiny.cloud/1/l718ds64re4lehaeqqhkzz3rp16ttmv4o24orxkme8qtmtf6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            tinymce.init({
                selector: '#layoutEditor',
                plugins: 'lists link image table code help wordcount',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image table',
                height: 400,
                placeholder: '{{ __('messages.add_new_field_placeholder') }}'
            });
        });
    </script>
@endpush
