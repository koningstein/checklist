<div>
    <div class="p-4 flex-col space-y-4">
        <div class="max-w-full px-2 sm:px-6 lg:px-8 mb-3">
            <div class="flex space-x-2">
                <input type="text" wire:model.live="searchComment" placeholder="Zoek op Comment..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
                <input type="text" wire:model.live="searchNewsTitle" placeholder="Zoek op News Titel..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
            </div>
        </div>
        <x-table>
            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('comment')" :direction="$sortField === 'comment' ? $sortDirection : null" class="w-3/12">Comment</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('news.title')" :direction="$sortField === 'news.title' ? $sortDirection : null" class="w-3/12">News Titel</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('created_at')" :direction="$sortField === 'created_at' ? $sortDirection : null" class="w-2/12">Gemaakt op</x-table.heading>
                <x-table.heading class="w-1/12">Details</x-table.heading>
                <x-table.heading class="w-1/12">Edit</x-table.heading>
                <x-table.heading class="w-1/12">Delete</x-table.heading>
            </x-slot>

            <x-slot name="body">
                @forelse($comments as $comment)
                    <x-table.row>
                        <x-table.cell class="w-3/12">{{ Str::limit($comment->comment, 50) }}</x-table.cell>
                        <x-table.cell class="w-3/12">{{ Str::limit($comment->news->title, 50) }}</x-table.cell>
                        <x-table.cell class="w-2/12">{{ $comment->created_at->format('d-m-Y H:i') }}</x-table.cell>
                        <x-table.cell class="w-1/12">
                            <a href="{{ route('admin.comments.show', ['comment' => $comment->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                <i class="fas fa-info-circle mr-1"></i> Details
                            </a>
                        </x-table.cell>
                        <x-table.cell class="w-1/12">
                            <a href="{{ route('admin.comments.edit', ['comment' => $comment->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                        </x-table.cell>
                        <x-table.cell class="w-1/12">
                            <a href="{{ route('admin.comments.delete', ['comment' => $comment->id]) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                <i class="fas fa-trash-alt mr-1"></i> Delete
                            </a>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="6">
                            <div class="flex justify-center items-center">
                                <span class="font-medium py-8 text-gray-500 text-xl">Geen comments gevonden...</span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot>
        </x-table>
        <div class="container max-w-full pb-10 flex justify-between items-center px-3">
            <div class="text-xs text-left">
                <p>
                    Showing {{ $comments->firstItem() }} to {{ $comments->lastItem() }} of {{ $comments->total() }} results
                </p>
            </div>
            <div class="text-xs text-right">
                {{ $comments->links() }}
            </div>
        </div>
    </div>
</div>

