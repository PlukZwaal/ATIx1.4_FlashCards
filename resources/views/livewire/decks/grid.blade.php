<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
    @foreach($decks as $deck)
        <a href="/dashboard" class="block bg-white rounded-lg shadow p-4 border hover:shadow-md transition hover:bg-gray-50">
            <h3 class="text-lg font-semibold text-gray-800">{{ $deck->title }}</h3>
            <p class="text-sm text-gray-500 mt-1">ID: {{ $deck->id }}</p>
        </a>
    @endforeach
</div>
