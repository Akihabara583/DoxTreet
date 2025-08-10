@extends('layouts.app')

@section('title', 'Управление пакетами документов')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('admin.partials._sidebar')
            </div>
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1><i class="bi bi-collection-fill"></i> Пакеты документов</h1>
                    <a href="{{ route('admin.bundles.create', ['locale' => app()->getLocale()]) }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Создать пакет
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название (EN)</th>
                                <th>Страна</th>
                                <th>Шаблонов</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($bundles as $bundle)
                                <tr>
                                    <td>{{ $bundle->id }}</td>
                                    <td>{{ $bundle->getTranslation('title', 'en') }}</td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $bundle->country_code }}</span>
                                    </td>
                                    <td>{{ $bundle->templates_count }}</td>
                                    <td>
                                        {{-- ✅ ИЗМЕНЕНИЕ: Передаем ID пакета --}}
                                        <a href="{{ route('admin.bundles.edit', ['locale' => app()->getLocale(), 'bundle' => $bundle->id]) }}" class="btn btn-sm btn-warning" title="Редактировать">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        {{-- ✅ ИЗМЕНЕНИЕ: Передаем ID пакета --}}
                                        <form action="{{ route('admin.bundles.destroy', ['locale' => app()->getLocale(), 'bundle' => $bundle->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Вы уверены?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Удалить">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Пока нет ни одного пакета.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-3">
                    {{ $bundles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
