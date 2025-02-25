<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ $data->name }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-white">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <form action="{{ route("servants.update", $data->id) }}" method="post" class="mt-6 space-y-6 ">
                    @csrf
                    @method('PUT')
                
                    <div>
                        <x-input-label for="enrollment">Matrícula</x-input-label>
                        <x-text-input id="enrollment" type="number" name="enrollment" class="w-full" value="{{ $data->enrollment }}" />
                        <x-input-error class="mt-2" :messages="$errors->get('enrollment')" />
                    </div>
                
                    <div>
                        <x-input-label for="contract">Contrato</x-input-label>
                        <x-text-input id="contract" type="number" name="contract" class="w-full" value="{{ $data->contract }}" />
                        <x-input-error class="mt-2" :messages="$errors->get('contract')" />
                    </div>
                
                    <div>
                        <x-input-label for="name">Nome Completo</x-input-label>
                        <x-text-input id="name" type="text" name="name" class="w-full" value="{{ $data->name }}" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                
                    <div>
                        <x-input-label for="email">E-Mail</x-input-label>
                        <x-text-input id="email" type="text" name="email" class="w-full" value="{{ $data->email }}" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>
                
                    <div class="block">
                        <input type="hidden" name="active" value="0">
                        <label for="active" class="inline-flex items-center">
                            <input 
                                id="active" 
                                type="checkbox" 
                                class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" 
                                name="active"
                                value="{{ $data->active }}"
                                checked
                            >
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Notificações</span>
                        </label>
                    </div>
                
                    <x-primary-button>
                    Salvar
                    </x-primary-button>
                </form>
            </div>
        </div>
      </div>
  </div>
</x-app-layout>