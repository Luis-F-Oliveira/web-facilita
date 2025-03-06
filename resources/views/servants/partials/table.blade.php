<table class="w-full divide-y divide-gray-200 dark:divide-neutral-700">
  <thead>
    <tr>
      <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">Matrícula</th>
      <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">Contrato</th>
      <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">Nome</th>
      <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">E-mail</th>
      <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">Notificações</th>
      <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">Editar</th>
    </tr>
  </thead>
  <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
    @foreach ($data as $item)
    <tr>
      <td class="px-6 py-4 text-sm font-medium">{{ $item->enrollment }}</td>
      <td class="px-6 py-4 text-sm font-medium">{{ $item->contract }}</td>
      <td class="px-6 py-4 text-sm font-medium">{{ $item->name }}</td>
      <td class="px-6 py-4 text-sm font-medium">{{ $item->email }}</td>
      <td class="px-6 py-4 text-sm font-medium">
        @if ($item->active)
          <span>Ativo</span>
        @else
          <span>Inativo</span>
        @endif
      </td>
      <td class="px-6 py-4 text-end text-sm font-medium">
        <a href="{{ route('servants.edit', $item->id) }}">
          <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
            Editar
          </button>
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="mt-4">
  {!! $data->links() !!}
</div>
