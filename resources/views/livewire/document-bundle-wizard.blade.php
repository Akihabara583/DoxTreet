<div>
    {{--
        This Livewire component's blade file has been completely restyled
        to match the new modern design of the application.
        All Livewire logic, directives, and functionality remain unchanged.
    --}}
    <style>
        /* Modern styles for the wizard, scoped within this component */
        .wizard-container {
            background-color: var(--bg-primary, #fff);
            border: 1px solid var(--border, #e5e1f5);
            border-radius: 24px;
            padding: 2rem;
            box-shadow: var(--shadow-lg, 0 10px 15px -3px rgba(0,0,0,0.1));
        }

        .wizard-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .wizard-bundle-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-primary, #1e1b31);
        }

        .wizard-bundle-description {
            color: var(--text-secondary, #4c495d);
            font-size: 1rem;
            margin-top: 0.5rem;
        }

        .wizard-progress-bar {
            background-color: var(--bg-secondary, #faf7ff);
            border-radius: 12px;
            padding: 0.25rem;
            overflow: hidden;
            height: auto;
        }

        .wizard-progress-bar .progress-bar {
            background: var(--gradient-brand, linear-gradient(135deg, #8b5cf6 0%, #06b6d4 100%));
            color: white;
            font-weight: 600;
            padding: 0.5rem 0;
            border-radius: 10px;
        }

        .wizard-step-card {
            border: 1px solid var(--border, #e5e1f5);
            border-radius: 20px;
            padding: 2rem;
            background-color: var(--bg-primary, #fff);
        }

        .wizard-step-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary, #1e1b31);
        }

        .modern-form-label {
            font-weight: 600;
            color: var(--text-secondary, #4c495d);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .modern-form-control {
            display: block;
            width: 100%;
            background-color: var(--bg-secondary, #faf7ff) !important;
            border: 1px solid var(--border, #e5e1f5) !important;
            border-radius: 12px !important;
            padding: 0.75rem 1rem !important;
            color: var(--text-primary, #1e1b31) !important;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .modern-form-control:focus {
            outline: none !important;
            border-color: var(--primary, #8b5cf6) !important;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.2) !important;
            background-color: var(--bg-primary, #fff) !important;
        }

        .modern-form-control.is-invalid {
            border-color: var(--danger, #ef4444) !important;
        }

        .btn-modern {
            border-radius: 16px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary-modern {
            background: var(--gradient-brand, linear-gradient(135deg, #8b5cf6 0%, #06b6d4 100%));
            color: white;
        }
        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg, 0 10px 15px -3px rgba(0,0,0,0.1));
            color: white;
        }

        .btn-secondary-modern {
            background-color: var(--bg-secondary, #faf7ff);
            color: var(--text-secondary, #4c495d);
            border: 1px solid var(--border, #e5e1f5);
        }
        .btn-secondary-modern:hover {
            background-color: var(--border, #e5e1f5);
            color: var(--text-primary, #1e1b31);
        }
        .btn-secondary-modern:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .btn-success-modern {
            background: linear-gradient(135deg, #10b981, #06b6d4);
            color: white;
        }
        .btn-success-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg, 0 10px 15px -3px rgba(0,0,0,0.1));
            color: white;
        }

    </style>

    <div class="wizard-container">
        {{-- Header with Progress Bar --}}
        <div class="wizard-header">
            <h2 class="wizard-bundle-title">{{ $bundle->title }}</h2>
            <div class="wizard-bundle-description">{!! $bundle->description !!}</div>
            <div class="progress wizard-progress-bar mt-4">
                <div class="progress-bar" role="progressbar"
                     style="width: {{ ($currentStep / ($totalSteps > 0 ? $totalSteps : 1)) * 100 }}%;"
                     aria-valuenow="{{ $currentStep }}" aria-valuemin="1" aria-valuemax="{{ $totalSteps }}">
                    {{ __('messages.wizard_step', ['current' => $currentStep, 'total' => $totalSteps]) }}
                </div>
            </div>
        </div>

        {{-- Form Container --}}
        <div class="wizard-step-card">
            @if (session()->has('step-error'))
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <div>{{ session('step-error') }}</div>
                </div>
            @endif

            <form wire:submit.prevent="submit">
                @foreach ($templates as $index => $template)
                    @php $step = $index + 1; @endphp
                    <div wire:key="step-{{ $step }}" {{ $currentStep == $step ? '' : 'style=display:none;' }}>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="wizard-step-title">{{ $template['title'] }}</h5>
                            @if ($template['pivot']['is_optional'])
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="skip-{{ $step }}"
                                           wire:model.live="skippedSteps" value="{{ $step }}">
                                    <label class="form-check-label" for="skip-{{ $step }}">{{ __('messages.skip_document') }}</label>
                                </div>
                            @endif
                        </div>
                        <hr class="mb-4" style="border-color: var(--border);">

                        @if(!empty($template['description']))
                            <p class="text-muted mb-4 fst-italic">{{ $template['description'] }}</p>
                        @endif

                        <div {{ in_array($step, $skippedSteps) ? 'style=display:none;' : '' }}>
                            @if (!empty($template['fields']))
                                <div class="row">
                                    @foreach ($template['fields'] as $field)
                                        <div class="col-md-6 mb-4">
                                            <label for="field-{{ $field['name'] }}-{{$step}}" class="form-label modern-form-label">
                                                {{ $field['labels'][app()->getLocale()] ?? $field['name'] }}
                                                @if(!empty($field['required'])) <span style="color: var(--danger);">*</span> @endif
                                            </label>

                                            @if (($field['type'] ?? 'text') === 'textarea')
                                                <textarea id="field-{{ $field['name'] }}-{{$step}}" class="form-control modern-form-control @error('formData.'.$field['name']) is-invalid @enderror"
                                                          wire:model.live="formData.{{ $field['name'] }}"></textarea>
                                            @else
                                                <input type="{{ $field['type'] ?? 'text' }}" id="field-{{ $field['name'] }}-{{$step}}" class="form-control modern-form-control @error('formData.'.$field['name']) is-invalid @enderror"
                                                       wire:model.live="formData.{{ $field['name'] }}">
                                            @endif

                                            @error('formData.'.$field['name'])
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted">{{ __('messages.no_data_required') }}</p>
                            @endif
                        </div>

                        @if (in_array($step, $skippedSteps))
                            <div class="alert alert-warning text-center" style="background-color: var(--bg-secondary); border-color: var(--border);">
                                <i class="bi bi-skip-forward-fill"></i> {{ __('messages.document_skipped_notice') }}
                            </div>
                        @endif
                    </div>
                @endforeach

                <div class="d-flex justify-content-between mt-5">
                    <button type="button" class="btn btn-modern btn-secondary-modern" wire:click="previousStep" {{ $currentStep == 1 ? 'disabled' : '' }}>
                        <i class="bi bi-arrow-left"></i> {{ __('messages.wizard_back') }}
                    </button>

                    @if ($currentStep < $totalSteps)
                        <button type="button" class="btn btn-modern btn-primary-modern" wire:click="nextStep">
                            {{ __('messages.wizard_next') }} <i class="bi bi-arrow-right"></i>
                        </button>
                    @else
                        <button type="submit" class="btn btn-modern btn-success-modern" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="submit"><i class="bi bi-file-earmark-zip-fill"></i> {{ __('messages.wizard_generate') }}</span>
                            <span wire:loading wire:target="submit"><i class="bi bi-hourglass-split"></i> {{ __('messages.wizard_generating') }}</span>
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Убедимся, что скрипт запускается каждый раз, когда Livewire обновляет DOM
            function initializeFormSaver(formId) {
                const form = document.getElementById(formId);
                if (!form) return;

                // Проверяем, не был ли обработчик уже назначен
                if (form.dataset.saverInitialized) return;
                form.dataset.saverInitialized = 'true';

                const isUserLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
                const storageKey = 'bundle_form_data_{{ $bundle->id }}';

                function loadFormData() {
                    const savedData = sessionStorage.getItem(storageKey);
                    if (savedData) {
                        const data = JSON.parse(savedData);
                        for (const key in data) {
                            const field = form.querySelector(`[name="${key}"]`);
                            if (field && !field.value) {
                                field.value = data[key];
                            }
                        }
                    }
                }

                function saveFormData() {
                    const formData = new FormData(form);
                    const data = Object.fromEntries(formData.entries());
                    delete data._token;
                    sessionStorage.setItem(storageKey, JSON.stringify(data));
                }

                loadFormData();
                form.addEventListener('input', saveFormData);

                form.addEventListener('submit', function() {
                    if (isUserLoggedIn) {
                        setTimeout(() => sessionStorage.removeItem(storageKey), 500);
                    }
                });
            }

            // Инициализируем для формы при первой загрузке
            initializeFormSaver('bundle-wizard-form');

            // Инициализируем повторно после каждого обновления Livewire
            Livewire.on('component.init', () => {
                initializeFormSaver('bundle-wizard-form');
            });
        });
    </script>
@endpush
