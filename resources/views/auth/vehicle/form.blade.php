<form class="bg-white p-2 rounded-2xl" action="{{ route('vehicles.store') }}" id="form-action"
    method="POST">
    @csrf
    @method('POST')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-3">
        <div>
            <x-select-category />
        </div>
        <div>
            <x-input-field label="Digita a matricula" name="license_plate"
                value="{{ $vehicle->license_plate ?? old('license_plate') }}" />
        </div>
    </div>
    <x-submit-confirm />
</form>
