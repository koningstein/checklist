<div>
    <div class="p-4 flex-col space-y-4">
        <div class="max-w-full px-2 sm:px-6 lg:px-8 mb-3">
            <div class="flex space-x-2">
                <input type="text" wire:model.live="searchNumber" placeholder="Zoek op Nummer..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
                <input type="text" wire:model.live="searchName" placeholder="Zoek op Naam..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
                <input type="text" wire:model.live="searchModuleName" placeholder="Zoek op Module Naam..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
                <input type="text" wire:model.live="searchDuedate" placeholder="Zoek op Einddatum..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
            </div>
        </div>
        <x-table>
            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('assignments.number')" :direction="$sortField === 'assignments.number' ? $sortDirection : null" class="w-2/12">Nummer</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('assignments.name')" :direction="$sortField === 'assignments.name' ? $sortDirection : null" class="w-3/12">Naam</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('module_name')" :direction="$sortField === 'module_name' ? $sortDirection : null" class="w-2/12">Module Naam</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('assignments.duedate')" :direction="$sortField === 'assignments.duedate' ? $sortDirection : null" class="w-2/12">Einddatum</x-table.heading>
                <x-table.heading class="w-1/12">Details</x-table.heading>
                <x-table.heading class="w-1/12">Edit</x-table.heading>
                <x-table.heading class="w-1/12">Delete</x-table.heading>
            </x-slot>

            <x-slot name="body">
                @forelse($assignments as $assignment)
                    <x-table.row>
                        <x-table.cell class="w-2/12">{{ $assignment->number }}</x-table.cell>
                        <x-table.cell class="w-3/12">{{ Str::limit($assignment->name, 40) }}</x-table.cell>
                        <x-table.cell class="w-2/12">{{ Str::limit($assignment->module_name, 40) }}</x-table.cell>
                        <x-table.cell class="w-2/12">{{ $assignment->duedate }}</x-table.cell>
                        <x-table.cell class="w-1/12">
                            @can('show assignment')
                                <a href="{{ route('admin.assignments.show', ['assignment' => $assignment->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                    <i class="fas fa-info-circle mr-1"></i> Details
                                </a>
                            @endcan
                        </x-table.cell>
                        <x-table.cell class="w-1/12">
                            @can('edit assignment')
                                <a href="{{ route('admin.assignments.edit', ['assignment' => $assignment->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                            @endcan
                        </x-table.cell>
                        <x-table.cell class="w-1/12">
                            @can('delete assignment')
                                <a href="{{ route('admin.assignments.delete', ['assignment' => $assignment->id]) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                    <i class="fas fa-trash-alt mr-1"></i> Delete
                                </a>
                            @endcan
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="6">
                            <div class="flex justify-center items-center">
                                <span class="font-medium py-8 text-gray-500 text-xl">Geen opdrachten gevonden...</span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot>
        </x-table>
        <div class="container max-w-full pb-10 flex justify-between items-center px-3">
            <div class="text-xs text-left">
                <p>
                    Showing {{ $assignments->firstItem() }} to {{ $assignments->lastItem() }} of {{ $assignments->total() }} results
                </p>
            </div>
            <div class="text-xs text-right">
                {{ $assignments->links() }}
            </div>
        </div>
    </div>
</div>
