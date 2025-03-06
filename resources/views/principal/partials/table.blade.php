<table class="w-full divide-y divide-gray-200 dark:divide-neutral-700">
  <thead>
    <tr>
      <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">Portaria</th>
      <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">Nome</th>
      <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">E-Mail</th>
      <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">Data</th>
      <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">URL</th>
    </tr>
  </thead>
  <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
    @foreach ($data as $item)
    <tr>
      <td class="px-6 py-4 text-sm font-medium">{{ $item->order }}</td>
      <td class="px-6 py-4 text-sm font-medium">{{ $item->servant->name }}</td>
      <td class="px-6 py-4 text-sm font-medium">{{ $item->servant->email }}</td>
      <td class="px-6 py-4 text-sm font-medium">{{ $item->created_at }}</td>
      <td class="px-6 py-4 text-sm font-medium">
        <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-arrow-out-up-right">
            <path d="M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6" />
            <path d="m21 3-9 9" />
            <path d="M15 3h6v6" />
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