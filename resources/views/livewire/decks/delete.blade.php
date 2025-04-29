<div x-data>
    <div class="mb-5">
        <x-primary-button @click="$wire.openModal()">
            Delete Deck
        </x-primary-button>
    </div>

    <div 
        x-show="$wire.showModal"
        class="fixed inset-0 bg-black/50 z-40"
        x-transition.opacity
    ></div>

    <div 
        x-show="$wire.showModal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
        x-cloak
    >
        <div 
            @click.outside="$wire.showModal = false"
            class="w-full max-w-md bg-white rounded-lg shadow-xl p-6"
            x-transition
        >
            <h2 class="text-xl font-bold mb-4">Are you sure you want to delete this deck?</h2>

            <p class="mb-4 text-red-500">This action will delete the deck and all its cards.</p>

            <form wire:submit.prevent="deleteDeck">
                <div class="flex justify-start space-x-3">
                    <x-primary-button type="submit">
                        Yes, Delete
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    @if (session('success'))
    <div 
        x-data="{ show: true }"
        x-show="show"
        x-transition.duration.500ms
        x-init="setTimeout(() => show = false, 3000)"
        class="fixed top-4 right-4 bg-green-600 text-white px-4 py-2 rounded shadow-lg z-50"
    >
        {{ session('success') }}
    </div>
    @endif
</div>
