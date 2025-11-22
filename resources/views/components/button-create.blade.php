<div class="w-full md:w-auto">
    <button type="button" id="btn-create"
        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg md:rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
        aria-controls="accordion-collapse-body-1">Adicionar</button>
</div>

<script>
    document.getElementById('btn-create').addEventListener('click', () => {
        const form = document.getElementById('form-action');
        const panel = document.querySelector('[data-accordion-target="#accordion-collapse-body-1"] span')
        form.action = "{{ $href }}";
        panel.innerHTML = "Adicionar"
    })
</script>
