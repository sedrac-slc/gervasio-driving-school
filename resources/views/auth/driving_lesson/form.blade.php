<form class="bg-white p-2 rounded-2xl" action="{{ route('driving_lessons.store') }}" method="POST" id="form-action">
    @csrf
    @method('POST')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-3">
        <div>
            <x-select-lesson-topic-driver />
        </div>
        <div>
            <x-input-search-enrolement/>
        </div>
        <div>
            <x-select-instructor />
        </div>
        <div>
            <x-select-vehicle />
        </div>
        <div>
            <x-input-field label="Hora começo" type="time" name="starter"
                value="{{ isset($drivingLesson->starter) ? format_time($drivingLesson->starter) : old('starter') }}" />
        </div>
        <div>
            <x-input-field label="Hora termino" type="time" name="finished"
                value="{{ isset($drivingLesson->finished) ? format_time($drivingLesson->finished) : old('finished') }}" />
        </div>
    </div>
    <x-submit-confirm />
</form>
