@extends('layout.dash')
@section('body')
    <x-link-back href="{{ route('vehicles.index') }}" />
    <form class="max-w-sm mx-auto md:my-10 bg-white p-2 rounded-2xl" action="{{
        isset($vehicle->id) ? route('vehicles.update', $vehicle->id) : route('vehicles.store')
     }}" method="POST">
        @csrf
        @isset($vehicle)
            @method('PUT')
            <div class="text-xl mb-5">Editar veículo</div>
        @else
            <div class="text-xl mb-5">Criar veículo</div>
        @endisset
        <div class="mb-5">
            <x-select-category/>
        </div>
        <div class="mb-5">
            <x-input-field label="Digita a matricula" name="license_plate" value="{{ $vehicle->license_plate ?? old('license_plate') }}"/>
        </div>
        <x-submit-confirm/>
    </form>
@endsection
