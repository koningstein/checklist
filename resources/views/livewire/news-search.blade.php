<div>
    <div class="p-4 flex-col space-y-4">
        <div class="max-w-full px-2 sm:px-6 lg:px-8 mb-3">
            <div class="flex space-x-2">
                <input type="text" wire:model.live="searchTitle" placeholder="Zoek op Titel..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
                <input type="text" wire:model.live="searchNews" placeholder="Zoek op Inhoud..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
            </div>
        </div>

        <x-table>
            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('title')" :direction="$sortField === 'title' ? $sortDirection : null" class="w-2/12">Titel</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('news')" :direction="$sortField === 'news' ? $sortDirection : null" class="w-4/12">Inhoud</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('created_at')" :direction="$sortField === 'created_at' ? $sortDirection : null" class="w-1/12">Datum</x-table.heading>
                <x-table.heading class="w-1/12">Details</x-table.heading>
                <x-table.heading class="w-1/12">Edit</x-table.heading>
                <x-table.heading class="w-1/12">Delete</x-table.heading>
            </x-slot>

            <x-slot name="body">
                @forelse($newsItems as $newsItem)
                    <x-table.row>
                        <x-table.cell class="w-2/12">{{ Str::limit($newsItem->title, 50) }}</x-table.cell>
                        <x-table.cell class="w-4/12">{{ Str::limit($newsItem->news, 50) }}</x-table.cell> <!-- Beperk de lengte van de inhoud -->
                        <x-table.cell class="w-1/12">{{ $newsItem->created_at->format('d-m-Y H:i') }}</x-table.cell>
                        <x-table.cell class="w-1/12">
                            <a href="{{ route('admin.news.show', ['news' => $newsItem->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                <i class="fas fa-info-circle mr-1"></i> Details
                            </a>
                        </x-table.cell>
                        <x-table.cell class="w-1/12">
                            <a href="{{ route('admin.news.edit', ['news' => $newsItem->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full mt-2">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                        </x-table.cell>
                        <x-table.cell class="w-1/12">
                            <a href="{{ route('admin.news.delete', ['news' => $newsItem->id]) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full mt-2">
                                <i class="fas fa-trash-alt mr-1"></i> Delete
                            </a>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="6">
                            <div class="flex justify-center items-center">
                                <span class="font-medium py-8 text-gray-500 text-xl">Geen nieuwsberichten gevonden...</span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot>
        </x-table>

        <div class="container max-w-full pb-10 flex justify-between items-center px-3">
            <div class="text-xs text-left">
                <p>
                    Showing {{ $newsItems->firstItem() }} to {{ $newsItems->lastItem() }} of {{ $newsItems->total() }} results
                </p>
            </div>
            <div class="text-xs text-right">
                {{ $newsItems->links() }}
            </div>
        </div>
    </div>
</div>
