<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Informasi Profil') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Perbarui informasi profil akun dan alamat email Anda.") }}
        </p>
    </header>

    <!-- PENTING: Tambahkan enctype agar bisa upload foto -->
    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch') <!-- Breeze menggunakan PATCH -->

        <!-- Input Foto Profil -->
        <div>
            <x-input-label for="photo" :value="__('Foto Profil')" />

            <!-- Tampilkan foto saat ini jika ada -->
            @if(Auth::user()->photo)
            <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="w-20 h-20 rounded-full object-cover mb-3 border border-gray-300">
            @endif

            <input id="photo" name="photo" type="file" class="mt-1 block w-full border border-gray-300 rounded-md p-2 dark:bg-gray-800 dark:border-gray-700" accept="image/*" />
            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
        </div>

        <!-- Input Nama -->
        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Input Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">
                {{ __('Tersimpan.') }}
            </p>
            @endif
        </div>
    </form>
</section>