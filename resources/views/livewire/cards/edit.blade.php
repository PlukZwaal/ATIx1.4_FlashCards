<div x-data="{ open: false }">
    <x-secondary-button x-on:click="open = true">Bewerk</x-secondary-button>

    <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center p-4" x-cloak>
        <div @click.outside="open = false" class="w-full max-w-2xl bg-white rounded-lg shadow-xl p-6">
            <h2 class="text-2xl font-bold mb-6">Kaart Bewerken</h2>

            <form wire:submit.prevent="update">
                <div class="mb-6">
                    <label class="block mb-2 font-semibold">Voorzijde</label>
                    <textarea wire:model.defer="front" class="w-full border rounded p-2" rows="4"></textarea>
                    @error('front') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 font-semibold">Achterzijde</label>
                    <textarea wire:model.defer="back" class="w-full border rounded p-2" rows="4"></textarea>
                    @error('back') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end space-x-2">
                    <x-primary-button type="submit">Opslaan</x-primary-button>
                    <x-secondary-button type="button" x-on:click="open = false">Annuleren</x-secondary-button>
                </div>
            </form>
        </div>
    </div>
</div>
