<section>
  <header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
      Adicionar
    </h2>
    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
      Adicionar servidor manualmente.
    </p>
  </header>

  <form action="{{ route("servants.store") }}" method="post" class="mt-6 space-y-6">
    @csrf

    <div>
      <x-input-label for="enrollment">Matrícula</x-input-label>
      <x-text-input id="enrollment" type="number" name="enrollment" class="w-full" />
      <x-input-error class="mt-2" :messages="$errors->get('enrollment')" />
    </div>

    <div>
      <x-input-label for="contract">Contrato</x-input-label>
      <x-text-input id="contract" type="number" name="contract" class="w-full" />
      <x-input-error class="mt-2" :messages="$errors->get('contract')" />
    </div>

    <div>
      <x-input-label for="name">Nome Completo</x-input-label>
      <x-text-input id="name" type="text" name="name" class="w-full" />
      <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
      <x-input-label for="email">E-Mail</x-input-label>
      <x-text-input id="email" type="text" name="email" class="w-full" />
      <x-input-error class="mt-2" :messages="$errors->get('email')" />
    </div>

    <div class="block">
      <label for="active" class="inline-flex items-center">
        <input 
          id="active" 
          type="checkbox" 
          class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" 
          name="active"
          value="1"
          checked
        >
        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Notificações</span>
      </label>
    </div>

    <x-primary-button>
      Salvar
    </x-primary-button>
  </form>
</section>