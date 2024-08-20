<div>
    <div class="p-4 flex-col space-y-4">
        <div class="max-w-full px-2 sm:px-6 lg:px-8 mb-3">
            <div class="flex space-x-2">
                <input type="text" wire:model.live="searchName" placeholder="Zoek op Guardian Naam..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
                <input type="text" wire:model.live="searchStudentName" placeholder="Zoek op Student Naam..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
            </div>
        </div>
        <x-table>
            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('users.name')" :direction="$sortField === 'users.name' ? $sortDirection : null" class="w-3/12">Guardian Naam</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('student_name')" :direction="$sortField === 'student_name' ? $sortDirection : null" class="w-3/12">Student Naam</x-table.heading>
                <x-table.heading class="w-1/12">Details</x-table.heading>
                <x-table.heading class="w-1/12">Bewerken</x-table.heading>
                <x-table.heading class="w-1/12">Verwijderen</x-table.heading>
            </x-slot>

            <x-slot name="body">
                @forelse($guardians as $guardian)
                    <x-table.row>
                        <x-table.cell class="w-3/12">{{ $guardian->guardian_name }}</x-table.cell>
                        <x-table.cell class="w-3/12">{{ Str::limit($guardian->student_name, 50) }}</x-table.cell>
                        <x-table.cell class="w-1/12">
                            <a href="{{ route('admin.guardians.show', ['guardian' => $guardian->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                <i class="fas fa-info-circle mr-1"></i> Details
                            </a>
                        </x-table.cell>
                        <x-table.cell class="w-1/12">
                            <a href="{{ route('admin.guardians.edit', ['guardian' => $guardian->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                        </x-table.cell>
                        <x-table.cell class="w-1/12">
                            <form action="{{ route('admin.guardians.destroy', ['guardian' => $guardian->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                    <i class="fas fa-trash-alt mr-1"></i> Delete
                                </button>
                            </form>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="5">
                            <div class="flex justify-center items-center">
                                <span class="font-medium py-8 text-gray-500 text-xl">Geen Guardians gevonden...</span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot>
        </x-table>
        <div class="container max-w-full pb-10 flex justify-between items-center px-3">
            <div class="text-xs text-left">
                <p>
                    Showing {{ $guardians->firstItem() }} to {{ $guardians->lastItem() }} of {{ $guardians->total() }} results
                </p>
            </div>
            <div class="text-xs text-right">
                {{ $guardians->links() }}
            </div>
        </div>
    </div>
</div>

