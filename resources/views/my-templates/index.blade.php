@extends('layouts.app')

@section('title', __('messages.my_templates_title') . ' - ' . config('app.name'))

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>{{ __('messages.my_templates_header') }}</h1>
            <a href="{{ route('profile.my-templates.create', app()->getLocale()) }}" class="btn btn-primary">
                {{ __('messages.create_new_template_button') }}
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                @if($userTemplates->isEmpty())
                    <p class="text-center">{{ __('messages.no_templates_yet_text') }} <a href="{{ route('profile.my-templates.create', app()->getLocale()) }}">{{ __('messages.create_first_template_link') }}</a>.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                            <tr>
                                <th>{{ __('messages.table_header_name') }}</th>
                                <th>{{ __('messages.table_header_category') }}</th>
                                <th>{{ __('messages.table_header_country') }}</th>
                                <th class="text-end">{{ __('messages.table_header_actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userTemplates as $template)
                                <tr>
                                    <td>{{ $template->name }}</td>
                                    <td>{{ $template->category->getTranslation('name', app()->getLocale()) ?? '-' }}</td>
                                    <td>{{ $template->country_code }}</td>
                                    <td class="text-end">
                                        <div class="btn-group">
                                            <a href="{{ route('profile.my-templates.show', ['locale' => app()->getLocale(), 'userTemplate' => $template->id]) }}" class="btn btn-sm btn-outline-primary">
                                                {{ __('messages.use_button') }}
                                            </a>
                                            <a href="{{ route('profile.my-templates.edit', ['locale' => app()->getLocale(), 'userTemplate' => $template->id]) }}" class="btn btn-sm btn-outline-secondary">
                                                {{ __('messages.edit_button') }}
                                            </a>
                                            <form action="{{ route('profile.my-templates.destroy', ['locale' => app()->getLocale(), 'userTemplate' => $template->id]) }}" method="POST" onsubmit="return confirm('{{ __('messages.delete_confirm_message') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    {{ __('messages.delete_button') }}
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $userTemplates->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
