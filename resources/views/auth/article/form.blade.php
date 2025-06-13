@extends('layout.dash')
@section('body')
    <x-link-back href="{{ route('articles.index') }}" />
    <form class="max-w-sm mx-auto md:my-20 bg-white p-2 rounded-2xl" action="{{
        isset($article->id) ? route('articles.update', $article->id) : route('articles.store')
     }}" method="POST">
        @csrf
        @isset($article)
            @method('PUT')
            <div class="text-xl mb-5">Editar artigo</div>
        @else
            <div class="text-xl mb-5">Criar artigo</div>
        @endisset
        <div class="mb-5">
            <x-input-field label="Digita o nome" name="name" value="{{ $article->name ?? old('name') }}"/>
        </div>
        <div class="mb-5">
            <x-input-field label="Digita o preço" type="number" name="price" value="{{ $article->price ?? old('price') }}"/>
        </div>
        <x-submit-confirm/>
    </form>
@endsection
