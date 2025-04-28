<div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($cards as $card)
            <div class="bg-white rounded-lg shadow p-6 flex flex-col space-y-4">
                <div>
                    <h2 class="text-lg font-semibold mb-2">Front</h2>
                    <p class="text-gray-700">{{ $card->front }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold mb-2">Back</h2>
                    <p class="text-gray-700">{{ $card->back }}</p>
                </div>
            </div>
        @empty
            <p class="text-gray-500">No cards found in this deck.</p>
        @endforelse
    </div>
</div>