<div>
    <div class="p-4 flex-col space-y-4">
        <div class="max-w-full px-2 sm:px-6 lg:px-8 mb-3">
            <div class="flex space-x-2">
                <input type="text" wire:model.live="search" placeholder="Zoek op naam..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
            </div>
        </div>
        <form wire:submit.prevent="linkStudentsToClasses">
            <x-table>
                <x-slot name="head">
                    <x-table.heading sortable wire:click="sortBy('users.name')" :direction="$sortField === 'users.name' ? $sortDirection : null" class="w-3/12">Student Naam</x-table.heading>
                    <x-table.heading class="w-3/12">Email</x-table.heading>
                    <x-table.heading class="w-4/12">Koppel aan Klas</x-table.heading>
                </x-slot>

                <x-slot name="body">
                    @forelse($unlinkedStudents as $student)
                        <x-table.row>
                            <x-table.cell class="w-3/12">{{ $student->user->name }}</x-table.cell>
                            <x-table.cell class="w-3/12">{{ $student->user->email }}</x-table.cell>
                            <x-table.cell class="w-4/12">
                                <select wire:model="selectedClass.{{ $student->id }}" class="form-control w-full px-3 py-2 border rounded-md bg-gray-200">
                                    <option value="">Selecteer een klas</option>
                                    @foreach($currentYearClasses as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="3">
                                <div class="flex justify-center items-center">
                                    <span class="font-medium py-8 text-gray-500 text-xl">Geen niet-gekoppelde studenten gevonden...</span>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-slot>
            </x-table>

            <div class="flex justify-end items-center mt-4">
                <div class="mr-2">
                    <input type="checkbox" wire:model="assignClassAssignments" id="assignClassAssignments">
                    <label for="assignClassAssignments" class="text-sm">Voeg class assignments toe aan alle geselecteerde studenten</label>
                </div>
            </div>

            <div class="flex justify-end mt-2">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Koppel Geselecteerde Studenten</button>
            </div>
        </form>

        <div class="container max-w-full pb-10 flex justify-between items-center px-3">
            <div class="text-xs text-left">
                <p>
                    Showing {{ $unlinkedStudents->firstItem() }} to {{ $unlinkedStudents->lastItem() }} of {{ $unlinkedStudents->total() }} results
                </p>
            </div>
            <div class="text-xs text-right">
                {{ $unlinkedStudents->links() }}
            </div>
        </div>
    </div>
</div>
