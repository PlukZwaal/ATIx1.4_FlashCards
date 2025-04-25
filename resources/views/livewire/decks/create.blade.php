<div x-data>
    <!-- Open Modal Button -->
    <x-primary-button @click="$wire.openModal()">
        Create New Deck
    </x-primary-button>

    <!-- Modal Backdrop -->
    <div 
        x-show="$wire.showModal"
        class="fixed inset-0 bg-black/50 z-40"
        x-transition.opacity
    ></div>

    <!-- Modal -->
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
            <h2 class="text-xl font-bold mb-4">Create New Deck</h2>

            <form wire:submit.prevent="save">
                <div class="mb-4">
                    <label class="block mb-2 font-medium">Title</label>
                    <x-text-input 
                        wire:model="title"
                        type="text"
                        placeholder="Bijv. Mijn Studie Deck"
                        class="w-full"
                        autofocus
                    />
                    @error('title')
                        <x-input-error class="mt-1" :messages="[$message]" />
                    @enderror
                </div>

                <div class="flex justify-end space-x-3">
                    <x-primary-button type="submit">
                        Create
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
