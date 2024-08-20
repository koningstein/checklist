<div>


    <div class="p-4 flex-col space-y-4">
        <div class="max-w-full px-2 sm:px-6 lg:px-8 mb-3">
            <div class="flex space-x-2">
                <input type="text" wire:model.live="searchName" placeholder="Zoek op Naam..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
                <input type="text" wire:model.live="searchEmail" placeholder="Zoek op E-mail..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
                <input type="text" wire:model.live="searchMessage" placeholder="Zoek op Bericht..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
            </div>
        </div>
        <x-table>
            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('contact_messages.name')" :direction="$sortField === 'contact_messages.name' ? $sortDirection : null" class="w-2/12">Naam</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('contact_messages.email')" :direction="$sortField === 'contact_messages.email' ? $sortDirection : null" class="w-3/12">E-mail</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('contact_messages.message')" :direction="$sortField === 'contact_messages.message' ? $sortDirection : null" class="w-3/12">Bericht</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('contact_messages.status')" :direction="$sortField === 'contact_messages.status' ? $sortDirection : null" class="w-1/12">Status</x-table.heading>
                <x-table.heading class="w-1/12">Details</x-table.heading>
                <x-table.heading class="w-1/12">Edit</x-table.heading>
                <x-table.heading class="w-1/12">Delete</x-table.heading>
            </x-slot>

            <x-slot name="body">
                @forelse($messages as $message)
                    @php
                        $rowColor = match($message->status) {
                            'ongelezen' => 'bg-red-100',
                            'beantwoord' => 'bg-green-100',
                            'niet van toepassing' => 'bg-blue-100',
                            'mee bezig' => 'bg-orange-100',
                            default => '',
                        };
                    @endphp

                    <x-table.row class="{{ $rowColor }}">
                        <x-table.cell class="w-2/12">{{ $message->name }}</x-table.cell>
                        <x-table.cell class="w-3/12">{{ $message->email }}</x-table.cell>
                        <x-table.cell class="w-3/12">{{ Str::limit($message->message, 50) }}</x-table.cell>
                        <x-table.cell class="w-1/12">{{ ucfirst($message->status) }}</x-table.cell>
                        <x-table.cell class="w-1/12">
                            <a href="{{ route('admin.contactmessages.show', ['contactmessage' => $message->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                <i class="fas fa-info-circle mr-1"></i> Details
                            </a>
                        </x-table.cell>
                        <x-table.cell class="w-1/12">
                            <a href="{{ route('admin.contactmessages.edit', ['contactmessage' => $message->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                        </x-table.cell>
                        <x-table.cell class="w-1/12">
                            <a href="{{ route('admin.contactmessages.delete', ['contactmessage' => $message->id]) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs w-full">
                                <i class="fas fa-trash-alt mr-1"></i> Delete
                            </a>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="7">
                            <div class="flex justify-center items-center">
                                <span class="font-medium py-8 text-gray-500 text-xl">Geen berichten gevonden...</span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot>
        </x-table>
        <div class="container max-w-full pb-10 flex justify-between items-center px-3">
            <div class="text-xs text-left">
                <p>
                    Showing {{ $messages->firstItem() }} to {{ $messages->lastItem() }} of {{ $messages->total() }} results
                </p>
            </div>
            <div class="text-xs text-right">
                {{ $messages->links() }}
            </div>
        </div>
    </div>
</div>
