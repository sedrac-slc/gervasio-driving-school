@extends('layout.dash')
@section('body')
    <x-link-back href="{{ route('articles.index') }}" />
    <form class="max-w-sm mx-auto md:my-20" action="{{
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
            <x-input-field label=" Digita o preço" type="number" name="price" value="{{ $article->price ?? old('price') }}"/>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Confirmo
        </button>
    </form>
@endsection
