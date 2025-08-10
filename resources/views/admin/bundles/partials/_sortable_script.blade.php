<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selector = document.getElementById('template-selector');
        const container = document.getElementById('templates-container');
        const form = container.closest('form');
        const countrySelect = document.getElementById('country_code');

        function filterTemplates() {
            const selectedCountry = countrySelect.value;
            let hasVisibleOptions = false;

            for (const optgroup of selector.querySelectorAll('optgroup')) {
                if (optgroup.label === selectedCountry) {
                    optgroup.style.display = '';
                    if(optgroup.querySelector('option')) {
                        hasVisibleOptions = true;
                    }
                } else {
                    optgroup.style.display = 'none';
                }
            }
            selector.value = '';
            selector.disabled = !selectedCountry || !hasVisibleOptions;
        }

        countrySelect.addEventListener('change', function() {
            // При смене страны очищаем контейнер, чтобы избежать добавления шаблонов из разных стран
            // container.innerHTML = '';
            filterTemplates();
        });

        filterTemplates();

        const sortable = new Sortable(container, {
            animation: 150,
            handle: '.handle'
        });

        selector.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            if (!selectedOption.value) return;

            const templateId = selectedOption.value;
            const templateTitle = selectedOption.text;

            if (form.querySelector(`input[name="templates[]"][value="${templateId}"]`)) {
                alert('Этот шаблон уже добавлен в пакет.');
                this.value = '';
                return;
            }

            const item = document.createElement('div');
            item.className = 'd-flex align-items-center border rounded p-2 mb-2 bg-light';
            item.innerHTML = `
            <i class="bi bi-grip-vertical handle" style="cursor: grab; margin-right: 10px;"></i>
            <div class="flex-grow-1">${templateTitle}</div>
            <div class="form-check form-switch ms-3">
                <input class="form-check-input" type="checkbox" role="switch" name="is_optional[${templateId}]" value="1" id="optional-${templateId}">
                <label class="form-check-label" for="optional-${templateId}">Необязательный</label>
            </div>
            <input type="hidden" name="templates[]" value="${templateId}">
            <button type="button" class="btn btn-sm btn-danger ms-3" onclick="this.parentElement.remove()">
                <i class="bi bi-trash"></i>
            </button>
        `;
            container.appendChild(item);
            this.value = '';
        });
    });
</script>
