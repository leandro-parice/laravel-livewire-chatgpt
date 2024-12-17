<div class="relative">
    <h2 class="mb-2">Digite sua mensagem</h2>
    <input 
        type="text" 
        wire:model="message" 
        wire:keydown.enter="saveMessage"
        class="w-full bg-gray-800 text-gray-300 border border-gray-700 rounded-md p-3 pr-12 focus:outline-none focus:ring-2 focus:ring-blue-500"
        wire:loading.attr="disabled"
    >

    <!-- Loader -->
    <div wire:loading class="absolute right-4 top-3">
        <div class="w-5 h-5 border-2 border-gray-400 border-t-transparent animate-spin rounded-full"></div>
    </div>
</div>