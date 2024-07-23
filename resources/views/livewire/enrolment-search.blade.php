<div>
    <div class="p-4 flex-col space-y-4">
        <div class="max-w-full px-2 sm:px-6 lg:px-8 mb-3">
            <div class="flex space-x-2">
                <input type="text" wire:model.live="searchStudentName" placeholder="Zoek op Student Naam..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
                <input type="text" wire:model.live="searchCreboName" placeholder="Zoek op Crebo Naam..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
                <input type="text" wire:model.live="searchCohortName" placeholder="Zoek op Cohort Naam..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
                <input type="text" wire:model.live="searchDate" placeholder="Zoek op Datum..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
                <input type="text" wire:model.live="searchEnrolmentStatusName" placeholder="Zoek op Status Naam..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
            </div>
        </div>
        <x-table>
            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('users.name')" :direction="$sortField === 'users.name' ? $sortDirection : null" class="w-2/12">Student Naam</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('crebos.name')" :direction="$sortField === 'crebos.name' ? $sortDirection : null" class="w-2/12">Crebo Naam</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('cohorts.name')" :direction="$sortField === 'cohorts.name' ? $sortDirection : null" class="w-2/12">Cohort Naam</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('enrolments.date')" :direction="$sortField === 'enrolments.date' ? $sortDirection : null" class="w-2/12">Datum</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('enrolment_statuses.name')" :direction="$sortField === 'enrolment_statuses.name' ? $sortDirection : null" class="w-1/12">Status Naam</x-table.heading>
                <x-table.heading class="w-1/12">Details</x-table.heading>
                <x-table.heading class="w-1/12">Edit</x-table.heading>
                <x-table.heading class="w-1/12">Delete</x-table.heading>
            </x-slot>

            <x-slot name="body">
                @forelse($enrolments as $enrolment)
                    <x-table.row>
                        <x-table.cell class="w-2/12">{{ $enrolment->student_name }}</x-table.cell>
                        <x-table.cell class="w-2/12">{{ $enrolment->crebo_name }}</x-table.cell>
                        <x-table.cell class="w-2/12">{{ $enrolment->cohort_name }}</x-table.cell>
                        <x-table.cell class="w-2/12">{{ $enrolment->date }}</x-table.cell>
                        <x-table.cell class="w-1/12">{{ $enrolment->enrolment_status_name }}</x-table.cell>
                        <x-table.cell class="w-1/12">
                            @can('show enrolment')
                                <a href="{{ route('admin.enrolments.show', ['enrolment' => $enrolment->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                    <i class="fas fa-info-circle mr-1"></i> Details
                                </a>
                            @endcan
                        </x-table.cell>
                        <x-table.cell class="w-1/12">
                            @can('edit enrolment')
                                <a href="{{ route('admin.enrolments.edit', ['enrolment' => $enrolment->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                            @endcan
                        </x-table.cell>
                        <x-table.cell class="w-1/12">
                            @can('delete enrolment')
                                <a href="{{ route('admin.enrolments.delete', ['enrolment' => $enrolment->id]) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                    <i class="fas fa-trash-alt mr-1"></i> Delete
                                </a>
                            @endcan
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="8">
                            <div class="flex justify-center items-center">
                                <span class="font-medium py-8 text-gray-500 text-xl">Geen inschrijvingen gevonden...</span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot>
        </x-table>
        <div class="container max-w-full pb-10 flex justify-between items-center px-3">
            <div class="text-xs text-left">
                <p>
                    Showing {{ $enrolments->firstItem() }} to {{ $enrolments->lastItem() }} of {{ $enrolments->total() }} results
                </p>
            </div>
            <div class="text-xs text-right">
                {{ $enrolments->links() }}
            </div>
        </div>
    </div>
</div>
