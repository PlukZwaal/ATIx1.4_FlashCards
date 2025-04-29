<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
    @foreach($decks as $deck)
        <div class="relative bg-white rounded-lg p-4 shadow hover:shadow-lg transition group">
            @if ($deck->cards_count > 0)
                <a href="{{ route('decks.game', $deck) }}" class="block h-full">
                    <h2 class="text-xl font-semibold">{{ $deck->title }}</h2>
                    <p class="text-gray-500">{{ $deck->cards_count }} cards</p>
                </a>
            @else
                <div class="block h-full opacity-50 cursor-not-allowed">
                    <h2 class="text-xl font-semibold">{{ $deck->title }}</h2>
                    <p class="text-gray-500">{{ $deck->cards_count }} cards</p>
                </div>
            @endif

            <a href="{{ route('decks.show', $deck) }}"
               class="absolute bottom-2 right-2 text-gray-500 hover:text-gray-700 text-xl transition"
               title="Edit">
                &#x22EF;
            </a>
        </div>
    @endforeach
</div>
