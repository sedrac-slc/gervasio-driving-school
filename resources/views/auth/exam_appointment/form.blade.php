<form class="bg-white p-2 rounded-2xl" action="{{ route('exam_appointments.store') }}" method="POST" id="form-action">
    @csrf
    @method('POST')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-3">
        <div class="md:col-span-2">
            <x-input-search-enrolement />
        </div>
        <div>
            <x-input-field label="Data realização" type="date" name="date" value="" />
        </div>
        <div>
            <x-input-field label="Hora" type="time" name="hour" value="" />
        </div>
        <div>
            <x-select label="Concluído"  name="completed" :items="['true' => 'Sim', 'false' => 'Não']" value="" />
        </div>
        <div>
            <x-select label="Aprovado" name="approved" :items="['true' => 'Sim', 'false' => 'Não']" value="" />
        </div>
    </div>
    <x-submit-confirm />
</form>
