<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Avatar Utilisateur
        </h2>
    </header>

    <img class="w-16 h-16 rounded-full" src="{{ "/storage/$user->avatar" }}" alt="avatar" />

    <form action="{{ route('profile.avatar.ai') }}" class="mt-4" method="POST">
        @csrf
        @method('post')

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            mettre à jour l'avatar grâce à l'IA
        </p>
        <x-primary-button>Générer un avatar</x-primary-button>

    </form>




    @if (session('message'))
        <div class="text-blue-500">
            {{ session('message') }}
        </div>
    @endif


    <form method="post" action="{{ route('profile.avatar') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                ou upload un avatar
            </p>
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" autofocus
                autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
