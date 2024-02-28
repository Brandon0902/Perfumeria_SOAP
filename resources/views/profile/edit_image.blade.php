@php
use App\View\Components\Button;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Profile Image') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <!-- Formulario para editar la imagen -->
                <form method="POST" action="{{ route('profile.update_image') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <!-- Campo para cargar nueva imagen -->
                    <div class="sm:col-span-3 mt-4">
                        <label for="image" class="block text-sm font-medium leading-6 text-white">Imagen</label>
                        <input type="file" name="profile_image" id="image" class="block w-full py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
    

                    <!-- Botón de enviar -->
                    <div class="mt-4">
                        <x-primary-button>{{ __('Update Profile Image') }}</x-primary-button>
                    </div>
                </form>

                <!-- Botón para eliminar la imagen de perfil -->
                <div class="mt-6">
                    <form action="{{ route('profile.delete_image') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your profile image?')">
                        @csrf
                        @method('DELETE')

                        <x-danger-button>{{ __('Delete Profile Image') }}</x-danger-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
