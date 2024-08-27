<div>
    <div class="p-4 flex-col space-y-4">
        <!-- Assignment Section -->
        @if (!$selectedAssignment)
            <div class="mb-4">
                <input type="text" wire:model.live="searchAssignment" placeholder="Zoek op Opdracht Naam..." class="form-control w-full px-3 py-2 border rounded-md bg-gray-200" />
                @if($assignments->isNotEmpty())
                    <ul class="bg-white border mt-2 rounded-lg shadow-lg">
                        @foreach($assignments as $assignment)
                            <li class="p-2 hover:bg-gray-200 cursor-pointer" wire:click="selectAssignment({{ $assignment->id }})">
                                {{ $assignment->name }}
                            </li>
                        @endforeach
                    </ul>
                    {{ $assignments->links() }}
                @endif
            </div>
        @else
            <!-- Show Selected Assignment with Remove Button -->
            <div class="p-4 bg-green-100 border rounded-lg mb-4 flex justify-between items-center">
                <strong>Geselecteerde Opdracht:</strong> {{ $selectedAssignment->name }}
                <button wire:click="deselectAssignment" class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg">
                    Verwijder
                </button>
            </div>
        @endif

        <!-- Suboutcome Level Section -->
        <div class="flex space-x-2">
            <input type="text" wire:model.live="searchSuboutcome" placeholder="Zoek op Suboutcome Naam..." class="form-control w-1/2 px-3 py-2 border rounded-md bg-gray-200" />
            <input type="text" wire:model.live="searchLevel" placeholder="Zoek op Niveau Naam..." class="form-control w-1/2 px-3 py-2 border rounded-md bg-gray-200" />
        </div>

        @if($learningSuboutcomeLevels->isNotEmpty())
            <ul class="bg-white border mt-2 rounded-lg shadow-lg">
                @foreach($learningSuboutcomeLevels as $level)
                    <li class="p-2 hover:bg-gray-200 cursor-pointer" wire:click="selectSuboutcomeLevel({{ $level->id }})">
                        {{ $level->learningSuboutcome->name }} - Niveau: {{ $level->learningLevel->name }}
                    </li>
                @endforeach
            </ul>
            {{ $learningSuboutcomeLevels->links() }}
        @endif

        <!-- Show Selected Suboutcome Levels -->
        @if (!empty($selectedSuboutcomeLevels))
            <div class="p-4 bg-green-100 border rounded-lg mb-4">
                <strong>Geselecteerde Suboutcome(s) en Niveau(s):</strong>
                <ul>
                    @foreach ($selectedSuboutcomeLevels as $level)
                        <li class="flex justify-between items-center mt-2">
                            {{ $level->learningSuboutcome->name }} - Niveau: {{ $level->learningLevel->name }}
                            <button wire:click="removeSuboutcomeLevel({{ $level->id }})" class="px-2 py-1 text-xs text-white bg-red-600 hover:bg-red-700 rounded-lg">
                                Verwijder
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Submit Button -->
        <button wire:click="submit" class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Toevoegen
        </button>

        <!-- Success Message -->
        @if (session()->has('message'))
            <div class="bg-green-200 text-green-900 rounded-lg shadow-md p-6 mt-4">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>
