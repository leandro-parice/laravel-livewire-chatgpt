<div>
    <h2 class="mb-2">Comportamento inicial</h2>
    <textarea 
        wire:model="message" 
        placeholder="Digite algo e pressione Enter"
        class="w-full min-h-40 bg-gray-800 text-gray-300 border border-gray-700 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
    ></textarea>
    <button
        wire:click="saveMessage"
        class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-6 rounded-md transition duration-300 ease-in-out"
    >
    Salvar configurações
    </button>
</div>