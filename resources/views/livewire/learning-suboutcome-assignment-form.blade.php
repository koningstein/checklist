<div>
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-900 rounded-lg shadow-md p-6 mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
        @csrf

        <!-- Zoekveld voor Assignment -->
        <label class="block text-sm mb-3">
            <span class="text-gray-700">Zoek Assignment</span>
            <input type="text" wire:model.live="searchAssignment" class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" placeholder="Zoek op assignment naam..." />
        </label>

        <!-- Lijst van gevonden assignments -->
        @if ($searchAssignment)
            <ul class="bg-white shadow-md rounded-lg mb-4">
                @foreach ($assignments as $assignment)
                    <li class="px-4 py-2 cursor-pointer hover:bg-purple-200" wire:click="selectAssignment({{ $assignment->id }})">
                        {{ $assignment->name }}
                    </li>
                @endforeach
            </ul>
        @endif

        <!-- Geselecteerde assignment tonen -->
        @if ($selectedAssignment)
            <div class="bg-gray-200 p-2 mb-3 rounded">
                <strong>Geselecteerde Assignment: </strong> {{ $selectedAssignment->name }}
            </div>
        @endif

        <!-- Zoekveld voor Suboutcome -->
        <label class="block text-sm mb-3">
            <span class="text-gray-700">Zoek Suboutcome</span>
            <input type="text" wire:model.live="searchSuboutcome" class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" placeholder="Zoek op suboutcome naam..." />
        </label>

        <!-- Lijst van gevonden suboutcomes -->
        @if ($searchSuboutcome)
            <ul class="bg-white shadow-md rounded-lg mb-4">
                @foreach ($learningSuboutcomes as $suboutcome)
                    <li class="px-4 py-2 cursor-pointer hover:bg-purple-200" wire:click="selectSuboutcome({{ $suboutcome->id }})">
                        {{ $suboutcome->name }}
                    </li>
                @endforeach
            </ul>
        @endif

        <!-- Geselecteerde suboutcomes tonen -->
        @if (!empty($selectedSuboutcomes))
            <div class="bg-gray-200 p-2 mb-3 rounded">
                <strong>Geselecteerde Suboutcomes:</strong>
                <ul>
                    @foreach ($selectedSuboutcomes as $suboutcome)
                        <li class="flex justify-between items-center">
                            {{ $suboutcome->name }}
                            <button type="button" wire:click="removeSuboutcome({{ $suboutcome['id'] }})" class="text-red-500 text-sm">Verwijder</button>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Submit Button -->
        <button class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Toevoegen
        </button>
    </form>
</div>
