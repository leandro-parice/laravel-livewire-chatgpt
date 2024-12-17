<div class="space-y-4">
    <h3 class="text-lg font-semibold text-gray-300 mb-4">Histórico</h3>
    @forelse ($history as $message)
        <div class="flex {{ $message['role'] === 'user' ? 'justify-end' : 'justify-start' }}">
            <div class="min-w-[60%] max-w-lg p-3 rounded-lg shadow-md
                {{ $message['role'] === 'user' ? 'bg-blue-600 text-white' : 'bg-gray-700 text-gray-300' }}">
                <div class="text-sm font-semibold">
                    {{ $message['role'] === 'user' ? 'Você' : 'ChatGPT' }}
                </div>
                <p class="text-sm">{{ $message['content'] }}</p>
                <div class="text-xs text-gray-400 mt-1">
                    {{ $message['timestamp'] }}
                </div>
            </div>
        </div>
    @empty
        <p class="text-sm">Sem histórico no momento...</p>
    @endforelse
</div>