<div>
    <div class="p-4">
        <div class="max-w-full px-2 sm:px-6 lg:px-8 mb-3">
            <div class="flex space-x-2">
                <input type="text" wire:model.live="searchPeriod" placeholder="Zoek op Periode..." class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200" />
            </div>
        </div>
        <table class="w-full whitespace-no-wrap">
            <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-white uppercase bg-green-700">
                <th class="px-4 py-3 w-2/3">Naam</th>
                <th class="px-4 py-3 w-1/9">Details</th>
                <th class="px-4 py-3 w-1/9">Edit</th>
                <th class="px-4 py-3 w-1/9">Delete</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y">
            @foreach($periods as $period)
                <tr class="text-gray-700">
                    <td class="px-4 py-3 text-sm w-2/3">{{ $period->period }}</td>
                    <td class="px-4 py-3 text-sm w-1/9">
                        <a href="{{ route('admin.periods.show', ['period' => $period->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs">
                            <i class="fas fa-info-circle mr-1"></i> Details
                        </a>
                    </td>
                    <td class="px-4 py-3 text-sm w-1/9">
                        <a href="{{ route('admin.periods.edit', ['period' => $period->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                    </td>
                    <td class="px-4 py-3 text-sm w-1/9">
                        @can('delete period')
                            <a href="{{ route('admin.periods.delete', ['period' => $period->id]) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs">
                                <i class="fas fa-trash-alt mr-1"></i> Delete
                            </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="container max-w-4xl mx-auto pb-10 flex justify-between items-center px-3">
            <div class="text-xs">
                {{ $periods->links() }}
            </div>
        </div>
    </div>
</div>
