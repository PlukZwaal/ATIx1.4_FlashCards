<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $deck->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex space-x-3 mb-5">
                <livewire:cards.create :deck-id="$deck->id" />
                <livewire:decks.update :deckId="$deck->id" />
                <livewire:decks.delete :deckId="$deck->id" />
            </div>

            <livewire:cards.grid :deck-id="$deck->id" />

        </div>
    </div>
</x-app-layout>
