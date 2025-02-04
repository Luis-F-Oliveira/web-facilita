<form class="mb-4 bg-gray-200 rounded-lg" method="GET" action="{{ route('dashboard.show') }}">
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <x-text-input type="text" name="portaria" placeholder="Portaria" class="w-full" />
      <x-text-input type="text" name="nome" placeholder="Nome" class="w-full" />
      <x-text-input type="email" name="email" placeholder="E-mail" class="w-full" />
      <x-text-input type="date" name="data" class="w-full" />
  </div>
  <div class="w-full flex justify-end mt-4">
      <a href="/dashboard">
        <x-secondary-button type="button">Limpar</x-button>
      </a>
      <x-primary-button class="ml-3" type="submit">Filtrar</x-button>
  </div>
</form>