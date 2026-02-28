<form class="bg-white p-2 rounded-2xl" action="{{ route('teoric_lessons.store') }}" method="POST" id="form-action">
    @csrf
    @method('POST')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-3">
        <div>
            <x-select-lesson-topic-teoric />
        </div>
        <div>
            <x-input-search-enrolement/>
        </div>
    </div>
    <x-submit-confirm />
</form>
