<div x-data="{ open: @entangle('showModal') }">
    <div class="mb-5">
        <x-primary-button @click="open = true">
            Create New Card
        </x-primary-button>
    </div>

    <div x-show="open" class="fixed inset-0 bg-black/50 z-40" x-transition.opacity></div>

    <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center p-4" x-cloak>
        <div @click.outside="open = false" class="w-full max-w-2xl bg-white rounded-lg shadow-xl p-6">
            <h2 class="text-2xl font-bold mb-6">Create New Card</h2>

            <form wire:submit.prevent="save">
                <div class="mb-6">
                    <label class="block mb-2 font-semibold">Front Text</label>
                    <textarea 
                        wire:model="front"
                        placeholder="Enter front text"
                        class="w-full h-40 p-3 border rounded-md focus:ring focus:ring-indigo-300 resize-none"
                        autofocus
                    ></textarea>
                    @error('front')
                        <x-input-error class="mt-1" :messages="[$message]" />
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 font-semibold">Back Text</label>
                    <textarea 
                        wire:model="back"
                        placeholder="Enter back text"
                        class="w-full h-40 p-3 border rounded-md focus:ring focus:ring-indigo-300 resize-none"
                    ></textarea>
                    @error('back')
                        <x-input-error class="mt-1" :messages="[$message]" />
                    @enderror
                </div>

                <div class="flex justify-start space-x-4">
                    <x-primary-button type="submit">
                        Create
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-transition.duration.500ms x-init="setTimeout(() => show = false, 3000)" class="fixed top-4 right-4 bg-green-600 text-white px-4 py-2 rounded shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif
</div>