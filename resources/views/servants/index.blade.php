<x-app-layout>
  <x-slot name="header">
      <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Servidores
        </h2>
        <a href="{{ route('servants.create') }}">
          <x-primary-button type="button">
            Adicionar
          </x-button>
        </a>
      </div>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-white">
        @include('servants.partials.filter')
        @include('servants.partials.table')
      </div>
  </div>
</x-app-layout>