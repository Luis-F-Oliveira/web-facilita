<form class="mb-4 bg-gray-200 rounded-lg" method="GET" action="{{ route('servants.filter') }}">
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    <x-text-input type="number" name="enrollment" placeholder="Matrícula" class="w-full" value="{{ request('enrollment') }}" />
    <x-text-input type="number" name="contract" placeholder="Contrato" class="w-full" value="{{ request('contract') }}" />
    <x-text-input type="text" name="name" placeholder="Name" class="w-full" value="{{ request('name') }}" />
    <x-text-input type="email" name="email" placeholder="E-mail" class="w-full" value="{{ request('email') }}" />
    <div class="block">
      <label for="active" class="inline-flex items-center">
        <input type="hidden" name="active" value="0">
        <input id="active" type="checkbox" value="1" 
          class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" 
          name="active" checked>
        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Notificações</span>
      </label>
    </div>  
  </div>
  <div class="w-full flex justify-end mt-4">
    <a href="{{ route('servants') }}">
      <x-danger-button type="button">Limpar</x-button>
    </a>
    <x-primary-button class="ml-3" type="submit">Filtrar</x-button>
  </div>
</form>