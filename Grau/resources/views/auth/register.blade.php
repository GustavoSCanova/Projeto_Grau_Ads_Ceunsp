<x-guest-layout>
    
    <form method="POST" action="{{ route('register') }}">

        @csrf

        <!-- Nome -->
        <div>
            <label for="name">Nome</label>
            <input id="name" name="name" type="text" required autofocus class="mt-1 block w-full" value="{{ old('name') }}">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div class="mt-4">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" required class="mt-1 block w-full" value="{{ old('email') }}">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Tipo de Usuário -->
    <div>
    <label for="tipo">Tipo de Usuário</label>
    <select name="tipo" id="tipo" required class="mt-1 block w-full">
        <option value="" disabled selected>Selecione</option>
        <option value="aluno">Aluno</option>
        <option value="professor">Professor</option>
    </select>
</div>

        <!-- Senha -->
        <div class="mt-4">
            <label for="password">Senha</label>
            <input id="password" name="password" type="password" required class="mt-1 block w-full">
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Confirmação de Senha -->
        <div class="mt-4">
            <label for="password_confirmation">Confirme a Senha</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required class="mt-1 block w-full">
        </div>

        <!-- Botão -->
        <div class="mt-6" align="right">
     <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-3">
    Registrar
</button>

</div>
    </form>
</x-guest-layout>
