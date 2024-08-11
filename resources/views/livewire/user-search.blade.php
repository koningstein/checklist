<div>
    <input type="text" wire:model.live="search" placeholder="Zoek naar gebruiker..." class="w-full border rounded px-3 py-2">

    @if($users && !$selectedUser)
        <ul class="mt-2 border rounded bg-white w-full">
            @foreach($users as $user)
                <li wire:click="selectUser({{ $user->id }})" class="px-4 py-2 cursor-pointer hover:bg-gray-100">
                    {{ $user->name }} - {{ $user->email }}
                </li>
            @endforeach
        </ul>
    @endif

    @if($selectedUser)
        <div class="mt-2">
            Geselecteerde gebruiker: <strong>{{ $selectedUser->name }}</strong>
        </div>
    @endif
</div>

