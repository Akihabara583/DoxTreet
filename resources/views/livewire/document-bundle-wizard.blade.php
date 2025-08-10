<div>
    {{-- Шапка с прогресс-баром --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h4 class="card-title">{{ $bundle->title }}</h4>
            <div class="card-subtitle mb-2 text-muted">{!! $bundle->description !!}</div>
            <div class="progress" style="height: 25px;">
                <div class="progress-bar" role="progressbar"
                     style="width: {{ ($currentStep / ($totalSteps > 0 ? $totalSteps : 1)) * 100 }}%;"
                     aria-valuenow="{{ $currentStep }}" aria-valuemin="1" aria-valuemax="{{ $totalSteps }}">
                    {{ __('messages.wizard_step', ['current' => $currentStep, 'total' => $totalSteps]) }}
                </div>
            </div>
        </div>
    </div>

    {{-- Контейнер для форм --}}
    <div class="card shadow-sm">
        <div class="card-body p-4">
            @if (session()->has('step-error'))
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <div>
                        {{ session('step-error') }}
                    </div>
                </div>
            @endif
            <form wire:submit.prevent="submit">
                @foreach ($templates as $index => $template)
                    @php $step = $index + 1; @endphp
                    <div wire:key="step-{{ $step }}" {{ $currentStep == $step ? '' : 'style=display:none;' }}>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">{{ __('messages.wizard_step', ['current' => $step, 'total' => $totalSteps]) }}: {{ $template['title'] }}</h5>
                            @if ($template['pivot']['is_optional'])
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="skip-{{ $step }}"
                                           wire:model.live="skippedSteps" value="{{ $step }}">
                                    <label class="form-check-label" for="skip-{{ $step }}">{{ __('messages.skip_document') }}</label>
                                </div>
                            @endif
                        </div>
                        <hr>

                        @if(!empty($template['description']))
                            <p class="text-muted mb-4 fst-italic">{{ $template['description'] }}</p>
                        @endif

                        <div {{ in_array($step, $skippedSteps) ? 'style=display:none;' : '' }}>
                            @if (!empty($template['fields']))
                                <div class="row">
                                    @foreach ($template['fields'] as $field)
                                        <div class="col-md-6 mb-3">
                                            <label for="field-{{ $field['name'] }}-{{$step}}" class="form-label">
                                                {{ $field['labels'][app()->getLocale()] ?? $field['name'] }}
                                                @if(!empty($field['required'])) <span class="text-danger">*</span> @endif
                                            </label>

                                            @if (($field['type'] ?? 'text') === 'textarea')
                                                <textarea id="field-{{ $field['name'] }}-{{$step}}" class="form-control @error('formData.'.$field['name']) is-invalid @enderror"
                                                          wire:model.live="formData.{{ $field['name'] }}"></textarea> {{-- ✅ ИЗМЕНЕНИЕ --}}
                                            @else
                                                <input type="{{ $field['type'] ?? 'text' }}" id="field-{{ $field['name'] }}-{{$step}}" class="form-control @error('formData.'.$field['name']) is-invalid @enderror"
                                                       wire:model.live="formData.{{ $field['name'] }}"> {{-- ✅ ИЗМЕНЕНИЕ --}}
                                            @endif

                                            @error('formData.'.$field['name'])
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted">Для этого документа не требуется ввод дополнительных данных.</p>
                            @endif
                        </div>

                        @if (in_array($step, $skippedSteps))
                            <div class="alert alert-warning text-center">
                                <i class="bi bi-skip-forward-fill"></i> {{ __('messages.document_skipped_notice') }}
                            </div>
                        @endif
                    </div>
                @endforeach

                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn btn-secondary" wire:click="previousStep" {{ $currentStep == 1 ? 'disabled' : '' }}>
                        <i class="bi bi-arrow-left"></i> {{ __('messages.wizard_back') }}
                    </button>

                    @if ($currentStep < $totalSteps)
                        <button type="button" class="btn btn-primary" wire:click="nextStep">
                            {{ __('messages.wizard_next') }} <i class="bi bi-arrow-right"></i>
                        </button>
                    @else
                        <button type="submit" class="btn btn-success" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="submit"><i class="bi bi-file-earmark-zip-fill"></i> {{ __('messages.wizard_generate') }}</span>
                            <span wire:loading wire:target="submit"><i class="bi bi-hourglass-split"></i> {{ __('messages.wizard_generating') }}</span>
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
