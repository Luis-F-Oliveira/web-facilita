<table class="w-full border-collapse border border-gray-500 dark:text-white">
  <thead>
    <tr>
      <th class="border border-gray-500 px-4 py-2 text-left">Matrícula</th>
      <th class="border border-gray-500 px-4 py-2 text-left">Contrato</th>
      <th class="border border-gray-500 px-4 py-2 text-left">Nome</th>
      <th class="border border-gray-500 px-4 py-2 text-left">E-mail</th>
      <th class="border border-gray-500 px-4 py-2 text-left">Notificações</th>
      <th class="border border-gray-500 px-4 py-2 text-left">Editar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $item)
      <tr>
        <td class="border border-gray-500 px-4 py-2 text-sm">{{ $item->enrollment }}</td>
        <td class="border border-gray-500 px-4 py-2 text-sm">{{ $item->contract }}</td>
        <td class="border border-gray-500 px-4 py-2 text-sm">{{ $item->name }}</td>
        <td class="border border-gray-500 px-4 py-2 text-sm">{{ $item->email }}</td>
        <td class="border border-gray-500 px-4 py-2 text-sm">
          @if ($item->active)
            <span>Ativo</span>
          @else
            <span>Inativo</span>
          @endif
        </td>
        <td class="border border-gray-500 px-4 py-2 text-sm">
          <a href="{{ route('servants.edit', $item->id) }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" class="lucide lucide-pencil">
              <path
                d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
              <path d="m15 5 4 4" />
            </svg>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<div class="mt-4">
  {!! $data->links() !!}
</div>
