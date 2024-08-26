<div>
    <div class="p-4 flex-col space-y-4">
        <div class="max-w-full px-2 sm:px-6 lg:px-8 mb-3">
            <div class="flex space-x-2">
                <input type="text" wire:model.live="searchSuboutcomeName" placeholder="Zoek op Suboutcome Naam..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
                <input type="text" wire:model.live="searchLevelName" placeholder="Zoek op Level Naam..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
                <input type="text" wire:model.live="searchAssignmentName" placeholder="Zoek op Opdracht Naam..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
            </div>
        </div>
        <x-table>
            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('learning_suboutcome_level_id')" :direction="$sortField === 'learning_suboutcome_level_id' ? $sortDirection : null" class="w-3/12">Suboutcome Naam</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('learning_level_id')" :direction="$sortField === 'learning_level_id' ? $sortDirection : null" class="w-3/12">Level Naam</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('assignment_id')" :direction="$sortField === 'assignment_id' ? $sortDirection : null" class="w-3/12">Opdracht Naam</x-table.heading>
                <x-table.heading class="w-1/12">Details</x-table.heading>
                <x-table.heading class="w-1/12">Edit</x-table.heading>
                <x-table.heading class="w-1/12">Delete</x-table.heading>
            </x-slot>

            <x-slot name="body">
                @forelse($lSuboutcomeLevelAssignments as $lSuboutcomeLevelAssignment)
                    <x-table.row>
                        <x-table.cell class="w-3/12">
                            {{ $lSuboutcomeLevelAssignment->learningSuboutcomeLevel->learningSuboutcome->name }}
                        </x-table.cell>
                        <x-table.cell class="w-3/12">
                            {{ $lSuboutcomeLevelAssignment->learningSuboutcomeLevel->learningLevel->name }}
                        </x-table.cell>
                        <x-table.cell class="w-3/12">
                            {{ Str::limit($lSuboutcomeLevelAssignment->assignment->name, 50) }}
                        </x-table.cell>
                        <x-table.cell class="w-1/12">
                            @can('show learningsuboutcomelevelassignment')
                                <a href="{{ route('admin.lsuboutcomelevelassignments.show', ['lsuboutcomelevelassignment' => $lSuboutcomeLevelAssignment->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                    <i class="fas fa-info-circle mr-1"></i> Details
                                </a>
                            @endcan
                        </x-table.cell>
                        <x-table.cell class="w-1/12">
                            @can('edit learningsuboutcomelevelassignment')
                                <a href="{{ route('admin.lsuboutcomelevelassignments.edit', ['lsuboutcomelevelassignment' => $lSuboutcomeLevelAssignment->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                            @endcan
                        </x-table.cell>
                        <x-table.cell class="w-1/12">
                            @can('delete learningsuboutcomelevelassignment')
                                <a href="{{ route('admin.lsuboutcomelevelassignments.delete', ['lsuboutcomelevelassignment' => $lSuboutcomeLevelAssignment->id]) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                    <i class="fas fa-trash-alt mr-1"></i> Delete
                                </a>
                            @endcan
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="6">
                            <div class="flex justify-center items-center">
                                <span class="font-medium py-8 text-gray-500 text-xl">Geen suboutcome level assignments gevonden...</span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot>
        </x-table>
        <div class="container max-w-full pb-10 flex justify-between items-center px-3">
            <div class="text-xs text-left">
                <p>
                    Showing {{ $lSuboutcomeLevelAssignments->firstItem() }} to {{ $lSuboutcomeLevelAssignments->lastItem() }} of {{ $lSuboutcomeLevelAssignments->total() }} results
                </p>
            </div>
            <div class="text-xs text-right">
                {{ $lSuboutcomeLevelAssignments->links() }}
            </div>
        </div>
    </div>
</div>
