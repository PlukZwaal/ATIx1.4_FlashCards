<div class="bg-white p-6 rounded text-center">
    @if ($finished)
        <h2 class="text-2xl font-bold mb-4">Finished!</h2>
        <p class="text-green-600 font-semibold">Correct: {{ $correct }}</p>
        <p class="text-red-600 font-semibold mb-4">Incorrect: {{ $wrong }}</p>
        <a href="{{ route('dashboard') }}" class="text-blue-500 underline">Back to dashboard</a>
    @elseif ($card)
        <div class="mb-6">
            <h3 class="text-lg font-medium">
                {{ $flipped ? $card->back : $card->front }}
            </h3>
        </div>

        <div class="flex justify-center gap-4">
            @if (!$flipped) 
                <button wire:click="flip" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded">
                    Flip
                </button>
            @else
                <button wire:click="answer(true)" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                    Correct
                </button>
                <button wire:click="answer(false)" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                    Incorrect
                </button>
            @endif
        </div>

        <div class="mt-4 text-sm text-gray-500">
            Card {{ $index + 1 }} of {{ $deck->cards->count() }}
        </div>
    @endif
</div>
