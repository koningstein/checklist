<div>
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-900 rounded-lg shadow-md p-6 mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
        @csrf

        <!-- Zoekveld voor Assignment -->
        @if (!$selectedAssignment)
            <label class="block text-sm">
                <span class="text-gray-700 font-semibold">Zoek Assignment</span>
                <input type="text" wire:model.live="searchAssignment" class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Zoek op assignment naam..." />
            </label>

            @if ($searchAssignment)
                <ul class="bg-white rounded-md shadow-lg max-h-40 overflow-auto border border-gray-300 p-4 mt-2">
                    @foreach ($assignments as $assignment)
                        <li class="mb-2">
                            <button type="button" wire:click="selectAssignment({{ $assignment->id }})" class="w-full text-left text-gray-800 hover:bg-indigo-100 p-2 rounded-lg transition duration-150 ease-in-out">
                                <span class="font-semibold">{{ $assignment->name }}</span>
                                <span class="block text-gray-500 text-xs">Module: {{ $assignment->module_name }}</span>
                            </button>
                        </li>
                    @endforeach
                </ul>
            @endif
        @else
            <!-- Geselecteerde Assignment -->
            <div class="p-3 bg-green-100 text-gray-800 rounded-md mb-2 shadow-md">
                <p class="font-semibold text-lg text-gray-700">Geselecteerde opdracht:</p>
                <p class="text-gray-600">{{ $selectedAssignment->name }}</p>
                <button type="button" wire:click="selectAssignment(null)" class="text-red-500 mt-2">Verwijder selectie</button>
            </div>
        @endif

        <!-- Alleen suboutcomes tonen als een assignment is geselecteerd -->
        @if ($selectedAssignment)
            <!-- Zoekveld voor Suboutcome -->
            <label class="block text-sm mt-4">
                <span class="text-gray-700 font-semibold">Zoek Suboutcome</span>
                <input type="text" wire:model.live="searchSuboutcome" class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Zoek op suboutcome naam..." />
            </label>

            <!-- Lijst met Suboutcomes met paginatie -->
            <div class="mt-4">
                <table class="min-w-full bg-white rounded-lg shadow-lg">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Naam</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actie</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($learningSuboutcomes as $suboutcome)
                        <tr class="hover:bg-gray-100 transition duration-150 ease-in-out">
                            <td class="px-6 py-4 whitespace-nowrap text-gray-800">{{ $suboutcome->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <button type="button" wire:click="selectSuboutcome({{ $suboutcome->id }})" class="text-green-500 hover:text-green-700">Toevoegen</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Paginatie -->
                <div class="mt-4">
                    {{ $learningSuboutcomes->links() }}
                </div>
            </div>

            <!-- Geselecteerde Suboutcomes -->
            <div class="mt-4">
                @if (!empty($selectedSuboutcomes))
                    <h3 class="text-lg font-medium">Geselecteerde Suboutcomes:</h3>
                    <ul class="mt-2 space-y-2 bg-green-100 text-gray-800 >
                        @foreach ($selectedSuboutcomes as $suboutcome)
                            <li class="flex items-center justify-between bg-gray-100 p-2 rounded-md">
                                <span>{{ $suboutcome->name }}</span>
                                <button type="button" wire:click="removeSuboutcome({{ $suboutcome->id }})" class="text-red-500 hover:text-red-700">Verwijderen</button>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endif

        <!-- Submit Button -->
        <button class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-indigo-600 border border-transparent rounded-lg active:bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:shadow-outline-indigo">
            Toevoegen
        </button>
    </form>
</div>
