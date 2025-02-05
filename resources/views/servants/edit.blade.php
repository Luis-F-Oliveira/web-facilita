<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ $data->name }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-white">
          {{ $data->enrollment }}
          {{ $data->contract }}
          {{ $data->name }}
          {{ $data->email }}
          {{ $data->active }}
      </div>
  </div>
</x-app-layout>