<div>
    <div class="p-4 flex-col space-y-4">
        <div class="max-w-full px-2 sm:px-6 lg:px-8 mb-3">
            <div class="flex space-x-2">
                <input type="text" wire:model.live="searchStudentName" placeholder="Zoek op Student Naam..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
                <input type="text" wire:model.live="searchSchoolClassName" placeholder="Zoek op SchoolClass Naam..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
                <input type="text" wire:model.live="searchAssignmentName" placeholder="Zoek op Assignment Naam..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
                <input type="text" wire:model.live="searchAssignmentStatusName" placeholder="Zoek op Status Naam..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
                <input type="text" wire:model.live="searchDuedate" placeholder="Zoek op Einddatum..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
            </div>
        </div>
        <x-table>
            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('users.name')" :direction="$sortField === 'users.name' ? $sortDirection : null" class="w-2/12">Student Naam</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('school_classes.name')" :direction="$sortField === 'school_classes.name' ? $sortDirection : null" class="w-2/12">SchoolClass Naam</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('assignment_name')" :direction="$sortField === 'assignment_name' ? $sortDirection : null" class="w-2/12">Assignment Naam</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('assignment_statuses.name')" :direction="$sortField === 'assignment_statuses.name' ? $sortDirection : null" class="w-2/12">Status Naam</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('student_assignments.duedate')" :direction="$sortField === 'student_assignments.duedate' ? $sortDirection : null" class="w-1/12">Einddatum</x-table.heading>
                <x-table.heading class="w-1/12">Details</x-table.heading>
                <x-table.heading class="w-1/12">Edit</x-table.heading>
                <x-table.heading class="w-1/12">Delete</x-table.heading>
            </x-slot>

            <x-slot name="body">
                @forelse($studentAssignments as $studentAssignment)
                    <x-table.row>
                        <x-table.cell class="w-2/12">{{ $studentAssignment->student_name }}</x-table.cell>
                        <x-table.cell class="w-2/12">{{ $studentAssignment->school_class_name }}</x-table.cell>
                        <x-table.cell class="w-2/12">
                            @if($studentAssignment->classAssignment)
                                {{ $studentAssignment->classAssignment->assignment->name }}
                            @elseif($studentAssignment->individualAssignment)
                                {{ $studentAssignment->individualAssignment->name }}
                            @else
                                N/A
                            @endif
                        </x-table.cell>
                        <x-table.cell class="w-2/12">{{ $studentAssignment->assignment_status_name }}</x-table.cell>
                        <x-table.cell class="w-1/12">{{ $studentAssignment->duedate }}</x-table.cell>
                        <x-table.cell class="w-1/12">
                            @can('show studentassignment')
                                <a href="{{ route('admin.studentassignments.show', ['studentassignment' => $studentAssignment->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                    <i class="fas fa-info-circle mr-1"></i> Details
                                </a>
                            @endcan
                        </x-table.cell>
                        <x-table.cell class="w-1/12">
                            @can('edit studentassignment')
                                <a href="{{ route('admin.studentassignments.edit', ['studentassignment' => $studentAssignment->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                            @endcan
                        </x-table.cell>
                        <x-table.cell class="w-1/12">
                            @can('delete studentassignment')
                                <a href="{{ route('admin.studentassignments.delete', ['studentassignment' => $studentAssignment->id]) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                    <i class="fas fa-trash-alt mr-1"></i> Delete
                                </a>
                            @endcan
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="8">
                            <div class="flex justify-center items-center">
                                <span class="font-medium py-8 text-gray-500 text-xl">Geen studentopdrachten gevonden...</span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot>
        </x-table>
        <div class="container max-w-full pb-10 flex justify-between items-center px-3">
            <div class="text-xs text-left">
                <p>
                    Showing {{ $studentAssignments->firstItem() }} to {{ $studentAssignments->lastItem() }} of {{ $studentAssignments->total() }} results
                </p>
            </div>
            <div class="text-xs text-right">
                {{ $studentAssignments->links() }}
            </div>
        </div>
    </div>
</div>
