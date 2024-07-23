<div>
    <div class="p-4 flex-col space-y-4">
        <div class="max-w-full px-2 sm:px-6 lg:px-8 mb-3">
            <div class="flex space-x-2">
                <input type="text" wire:model.live="searchSchoolClassName" placeholder="Zoek op SchoolClass Naam..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
                <input type="text" wire:model.live="searchSchoolYearName" placeholder="Zoek op SchoolYear Naam..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
            </div>
        </div>
        <x-table>
            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('school_classes.name')" :direction="$sortField === 'school_classes.name' ? $sortDirection : null" class="w-1/3">SchoolClass Naam</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('school_years.name')" :direction="$sortField === 'school_years.name' ? $sortDirection : null" class="w-1/3">SchoolYear Naam</x-table.heading>
                <x-table.heading class="w-1/9">Details</x-table.heading>
                <x-table.heading class="w-1/9">Edit</x-table.heading>
                <x-table.heading class="w-1/9">Delete</x-table.heading>
            </x-slot>

            <x-slot name="body">
                @forelse($classYears as $classYear)
                    <x-table.row>
                        <x-table.cell class="w-5/12">{{ $classYear->school_class_name }}</x-table.cell>
                        <x-table.cell class="w-4/12">{{ $classYear->school_year_name }}</x-table.cell>
                        <x-table.cell class="w-1/12">
                            @can('show classyear')
                                <a href="{{ route('admin.classyears.show', ['classyear' => $classYear->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                    <i class="fas fa-info-circle mr-1"></i> Details
                                </a>
                            @endcan
                        </x-table.cell>
                        <x-table.cell class="w-1/12">
                            @can('edit classyear')
                                <a href="{{ route('admin.classyears.edit', ['classyear' => $classYear->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                            @endcan
                        </x-table.cell>
                        <x-table.cell class="w-1/12">
                            @can('delete classyear')
                                <a href="{{ route('admin.classyears.delete', ['classyear' => $classYear->id]) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                    <i class="fas fa-trash-alt mr-1"></i> Delete
                                </a>
                            @endcan
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="5">
                            <div class="flex justify-center items-center">
                                <span class="font-medium py-8 text-gray-500 text-xl">Geen classyears gevonden...</span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot>
        </x-table>
        <div class="container max-w-full pb-10 flex justify-between items-center px-3">
            <div class="text-xs text-left">
                <p>
                    Showing {{ $classYears->firstItem() }} to {{ $classYears->lastItem() }} of {{ $classYears->total() }} results
                </p>
            </div>
            <div class="text-xs text-right">
                {{ $classYears->links() }}
            </div>
        </div>
    </div>
</div>
