<form class="bg-white p-2 rounded-2xl" action="{{ route('categories.store') }}" id="form-action"
    method="POST">
    @csrf
    @method('POST')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-3">
        <div>
            <x-input-field label="Digita o nome" name="name" value="{{ $category->name ?? old('name') }}" />
        </div>
        <div>
            <x-input-field label="Digita o preço" type="number" name="price"
                value="{{ $category->price ?? old('price') }}" />
        </div>
        <div>
            <x-input-field label="Quantidade prestação" type="number" name="installment"
                value="{{ $category->installment ?? old('installment') }}" />
        </div>
        <div>
            <x-input-field label="Preço da prestação" type="number" name="completed_installment"
                value="{{ $category->completed_installment ?? old('completed_installment') }}" />
        </div>
    </div>
    <x-submit-confirm />
</form>
