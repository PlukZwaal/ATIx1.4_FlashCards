<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
    @foreach($decks as $deck)
        <a href="{{ route('decks.show', $deck) }}" class="block">
            <div class="bg-white rounded-lg p-4 shadow hover:shadow-lg transition">
                <h2 class="text-xl font-semibold">{{ $deck->title }}</h2>
                <p class="text-gray-500">{{ $deck->cards_count }} cards</p> 
            </div>
        </a>
    @endforeach
</div>
