<form class="p-2 rounded-2xl" method="POST" action="{{ route('lessons.store') }}" id="form-action">
    @csrf
    @method('POST')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-3">
        <div>
            {{-- <x-input-field label="Digita o tópico" name="topic" value="{{ $lesson->topic ?? old('topic') }}" /> --}}
            <x-input-search-enrolement/>
        </div>
        <div>
            <x-select-article/>
        </div>
    </div>
    <x-submit-confirm />
</form>
