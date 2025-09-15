@extends('layout.dash')
@section('body')
    <x-link-back href="{{ route('driving_lessons.index') }}" />
    <form class="max-w-sm mx-auto md:my-5 bg-white p-2 rounded-2xl" action="{{
        isset($drivingLesson->id) ? route('driving_lessons.update', $drivingLesson->id) : route('driving_lessons.store')
     }}" method="POST">
        @csrf
        @isset($drivingLesson)
            @method('PUT')
            <div class="text-xl mb-5">Editar aula de condução</div>
        @else
            <div class="text-xl mb-5">Criar aula de condução</div>
        @endisset
        <div class="mb-5">
            <x-select-instructor/>
        </div>
        <div class="mb-5">
            <x-select-student/>
        </div>
        <div class="mb-5">
            <x-select-vehicle/>
        </div>
        <div class="mb-5">
            <x-input-field label="Hora começo" type="time" name="starter" value="{{ isset($drivingLesson->starter) ? format_time($drivingLesson->starter) : old('starter') }}"/>
        </div>
        <div class="mb-5">
            <x-input-field label="Hora termino" type="time" name="finished" value="{{ isset($drivingLesson->finished) ? format_time($drivingLesson->finished) : old('finished') }}"/>
        </div>
        <x-submit-confirm/>
    </form>
@endsection

