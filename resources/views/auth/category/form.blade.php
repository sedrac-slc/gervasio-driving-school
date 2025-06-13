@extends('layout.dash')
@section('body')
    <x-link-back href="{{ route('categories.index') }}" />
    <form class="max-w-sm mx-auto md:my-10 bg-white p-2 rounded-2xl" action="{{
        isset($category->id) ? route('categories.update', $category->id) : route('categories.store')
     }}" method="POST">
        @csrf
        @isset($category)
            @method('PUT')
            <div class="text-xl mb-5">Editar categoria</div>
        @else
            <div class="text-xl mb-5">Criar categoria</div>
        @endisset
        <div class="mb-5">
            <x-input-field label="Digita o nome" name="name" value="{{ $category->name ?? old('name') }}"/>
        </div>
        <div class="mb-5">
            <x-input-field label="Digita o preço" type="number" name="price" value="{{ $category->price ?? old('price') }}"/>
        </div>
        <div class="mb-5">
            <x-input-field label="Quantidade prestação" type="number" name="installment" value="{{ $category->installment ?? old('installment') }}"/>
        </div>
        <div class="mb-5">
            <x-input-field label="Preço da prestação" type="number" name="completed_installment" value="{{ $category->completed_installment ?? old('completed_installment') }}"/>
        </div>
        <x-submit-confirm/>
    </form>
@endsection
