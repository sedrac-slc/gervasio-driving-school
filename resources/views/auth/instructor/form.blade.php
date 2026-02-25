<form class="bg-white p-2 rounded-2xl" action="{{ route('instructors.store') }}" id="form-action" method="POST">
    @csrf
    @method('POST')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-3">
        <div>
            <x-input-field label="Digita o nome" name="name" value="{{ $instructor->user->name ?? old('name') }}" />
        </div>
        <div>
            <x-input-field label="Digita o email" type="email" name="email"
                value="{{ $instructor->user->email ?? old('email') }}" />
        </div>
        <div class="hidden-input-password">
            <x-input-field label="Digita a senha" type="password" name="password" value="{{ old('password') }}" :required="false" />
        </div>
        <div class="hidden-input-password">
            <x-input-field label="Confirma a senha" type="password" name="confirm" value="{{ old('confirm') }}" :required="false" />
        </div>
    </div>
    <x-submit-confirm />
</form>
