@extends('layouts.app')

@section('title', 'Пользователь: ' . $user->name . ' - ' . config('app.name'))

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const planSelect = document.getElementById('plan');
            const durationDiv = document.getElementById('duration-div');

            function toggleDuration() {
                if (planSelect.value === 'base') {
                    durationDiv.style.display = 'none';
                } else {
                    durationDiv.style.display = 'block';
                }
            }

            planSelect.addEventListener('change', toggleDuration);
            toggleDuration(); // Вызываем при загрузке страницы
        });
    </script>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('admin.partials._sidebar')
            </div>
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1><i class="bi bi-person-badge"></i> {{ $user->name }}</h1>
                    <a href="{{ route('admin.users.index', app()->getLocale()) }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> К списку пользователей
                    </a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="row">
                    {{-- Блок основной информации --}}
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">Основная информация</div>
                            <div class="card-body">
                                <p><strong>ID:</strong> {{ $user->id }}</p>
                                <p><strong>Имя:</strong> {{ $user->name }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <p><strong>Дата регистрации:</strong> {{ $user->created_at->format('d.m.Y H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- ✅ ИЗМЕНЕННЫЙ БЛОК УПРАВЛЕНИЯ ПОДПИСКОЙ --}}
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">Управление подпиской</div>
                            <div class="card-body">
                                <p><strong>Текущий план:</strong>
                                    <span class="badge bg-primary text-uppercase">{{ $user->subscription_plan ?? 'base' }}</span>
                                </p>
                                @if($user->subscription_expires_at)
                                    <p><strong>Действует до:</strong> {{ $user->subscription_expires_at->format('d.m.Y H:i') }}</p>
                                @endif
                                <hr>

                                <form action="{{ route('admin.users.subscription.update', ['locale' => app()->getLocale(), 'user' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="mb-3">
                                        <label for="plan" class="form-label">Выдать подписку</label>
                                        <select name="plan" id="plan" class="form-select">
                                            {{-- Добавили опцию для базового плана --}}
                                            <option value="base" @if(($user->subscription_plan ?? 'base') == 'base') selected @endif>База (бесплатно)</option>
                                            <option value="standard" @if($user->subscription_plan == 'standard') selected @endif>Стандарт</option>
                                            <option value="pro" @if($user->subscription_plan == 'pro') selected @endif>Про</option>
                                        </select>
                                    </div>
                                    {{-- Обернули поле в div для управления видимостью --}}
                                    <div class="mb-3" id="duration-div">
                                        <label for="duration" class="form-label">Срок (в днях)</label>
                                        <input type="number" name="duration" id="duration" class="form-control" value="30" min="1">
                                    </div>
                                    <button type="submit" class="btn btn-success">
                                        <i class="bi bi-check-circle"></i> Применить
                                    </button>
                                </form>
                                <hr>
                                <button class="btn btn-danger" disabled>Удалить пользователя</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Блок активности (без изменений) --}}
                <div class="card">
                    <div class="card-header">Активность пользователя</div>
                    <div class="card-body">
                        <h5 class="card-title">Последние сгенерированные документы (макс. 10)</h5>
                        @if($user->generatedDocuments->count() > 0)
                            <ul>
                                @foreach($user->generatedDocuments as $doc)
                                    <li>
                                        {{ $doc->template->title ?? $doc->userTemplate->title ?? 'Название шаблона не найдено' }}
                                        <small class="text-muted">({{ $doc->created_at->format('d.m.Y') }})</small>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">Пользователь еще не генерировал документы.</p>
                        @endif

                        <hr>

                        <h5 class="card-title">Последние подписанные документы (макс. 10)</h5>
                        @if($user->signedDocuments->count() > 0)
                            <ul>
                                @foreach($user->signedDocuments as $doc)
                                    <li>
                                        {{ $doc->original_filename }}
                                        <small class="text-muted">({{ $doc->created_at->format('d.m.Y') }})</small>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">Пользователь еще не подписывал документы.</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
