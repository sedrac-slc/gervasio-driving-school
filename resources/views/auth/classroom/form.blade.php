<form class="bg-white p-2 rounded-2xl"
    action="{{ route('classrooms.store') }}"
    method="POST" id="form-action">
    @csrf
    @method('POST')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-3">
        <div>
            <x-select-category />
        </div>
        <div>
            <x-select-category-period />
        </div>
        <div>
            <x-input-field label="Hora começo" type="time" name="starter"
                value="{{ $classroom->starter ?? old('starter') }}" />
        </div>
        <div>
            <x-input-field label="Hora termino" type="time" name="finished"
                value="{{ $classroom->finished ?? old('finished') }}" />
        </div>
    </div>
    <x-submit-confirm />
</form>
