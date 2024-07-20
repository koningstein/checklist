<div>
    <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">

        <div class="p-4">
            <div class="max-w-full px-2 sm:px-6 lg:px-8">
                <input type="text" wire:model.live="search" placeholder="Zoek Crebos..." class="form-control mb-3 w-full px-3 py-2 border rounded-md" />
            </div>
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                    <th class="px-4 py-3 sortable">Naam</th>
                    <th class="px-4 py-3">Crebonr</th>
                    <th class="px-4 py-3">Details</th>
                    <th class="px-4 py-3">Edit</th>
                    <th class="px-4 py-3">Delete</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y">
                @foreach($crebos as $crebo)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 text-sm">{{ $crebo->name }}</td>
                        <td class="px-4 py-3 text-sm">{{ $crebo->crebonr }}</td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{ route('admin.crebos.show', ['crebo' => $crebo->id]) }}" class="text-blue-500 hover:text-blue-700">
                                <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Details
                            </a>
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ route('admin.crebos.edit', ['crebo' => $crebo->id]) }}" class="text-yellow-500 hover:text-yellow-700">
                                <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 12h8m-8 5h16"></path>
                                </svg>
                                Edit
                            </a>
                        </td>
                        <td class="px-4 py-3">
                            @can('delete crebo')
                                <a href="{{ route('admin.crebos.delete', ['crebo' => $crebo->id]) }}" class="text-red-500 hover:text-red-700">
                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Delete
                                </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="container max-w-4xl mx-auto pb-10 flex justify-between items-center px-3">
            <div class="text-xs">
                {{ $crebos->links() }}
            </div>
        </div>
    </div>
</div>
