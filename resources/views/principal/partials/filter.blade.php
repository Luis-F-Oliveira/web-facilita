<form class="mb-4 bg-gray-200 rounded-lg" method="GET" action="{{ route('dashboard.show') }}">
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <x-text-input type="text" name="portaria" placeholder="Portaria" class="w-full" value="{{ request('portaria') }}" />
      <x-text-input type="text" name="nome" placeholder="Nome" class="w-full" value="{{ request('nome') }}" />
      <x-text-input type="email" name="email" placeholder="E-mail" class="w-full" value="{{ request('email') }}" />
      <x-text-input type="date" name="data" class="w-full" value="{{ request('data') }}" />
  </div>
  <div class="w-full flex justify-end mt-4">
      <a href="{{ route('dashboard.show') }}">
        <x-secondary-button type="button">Limpar</x-button>
      </a>
      <x-primary-button class="ml-3" type="submit">Filtrar</x-button>
  </div>
</form>
