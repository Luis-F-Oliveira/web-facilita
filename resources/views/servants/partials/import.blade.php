<section class="mb-4">
  <header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
      Importar
    </h2>
    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
      Importar arquivo excel para banco de dados.
    </p>
  </header>

  <form action="{{ route("servants.import") }}" enctype="multipart/form-data" method="post" class="mt-6 space-y-6">
    @csrf

    <div>
      <x-input-label for="file">Arquivo Excel</x-input-label>
      <x-text-input id="file" type="file" name="file" class="w-full" accept=".xlsx" />
      <x-input-error class="mt-2" :messages="$errors->get('file')" />
    </div>

    <x-primary-button>
      Salvar
    </x-primary-button>
  </form>
</section>