<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
           <!-- Nom -->
    <div>
        <x-input-label for="nom" :value="__('Nom')" />
        <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('nom')" class="mt-2" />
    </div>

    <!-- Prénom -->
    <div class="mt-4">
        <x-input-label for="prenom" :value="__('Prénom')" />
        <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
    </div>

    <!-- Nom d'utilisateur -->
    <div class="mt-4">
        <x-input-label for="username" :value="__('Nom d\'utilisateur')" />
        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('username')" class="mt-2" />
    </div>
 <div class="mt-4">
        <x-input-label for="role" :value="__('Rôle')" />
        <x-text-input id="role" class="block mt-1 w-full" type="text" name="role" :value="old('role')" required />
        <x-input-error :messages="$errors->get('role')" class="mt-2" />
    </div>
    <!-- Email -->
    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Mot de passe -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Mot de passe')" />

        <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirmation du mot de passe -->
    <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                        type="password"
                        name="password_confirmation" required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <!-- Rôle -->
   

    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
            {{ __('Déjà inscrit?') }}
        </a>

        <x-primary-button class="ml-4">
            {{ __('S\'inscrire') }}
        </x-primary-button>
    </div>
</form>

</x-guest-layout>
