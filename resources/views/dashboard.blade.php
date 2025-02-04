<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dados Coletados
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2 text-left">Portaria</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Nome</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">E-mail</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Data</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">URL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-sm">{{ $item->order }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-sm">{{ $item->servant->name }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-sm">{{ $item->servant->email }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-sm">{{ $item->created_at }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-sm">
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
        </div>
    </div>
</x-app-layout>