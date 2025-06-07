@extends('layout.dash')
@section('body')
    <x-link-back href="{{ route('classrooms.index') }}" />
    <form class="max-w-sm mx-auto md:my-5" action="{{
        isset($classroom->id) ? route('classrooms.update', $classroom->id) : route('classrooms.store')
     }}" method="POST">
        @csrf
        @isset($classroom)
            @method('PUT')
            <div class="text-xl mb-5">Editar turma</div>
        @else
            <div class="text-xl mb-5">Criar turma</div>
        @endisset
        <div class="mb-5">
            <x-select-category/>
        </div>
        <div class="mb-5">
            <x-select-category-period/>
        </div>
        <div class="mb-5">
            <x-input-field label="Hora começo" type="time" name="starter" value="{{ $classroom->starter ?? old('starter') }}"/>
        </div>
        <div class="mb-5">
            <x-input-field label="Hora termino" type="time" name="finished" value="{{ $classroom->finished ?? old('finished') }}"/>
        </div>
        <x-submit-confirm/>
    </form>
@endsection

