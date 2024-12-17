@extends('master')

@section('content')
    <div class="min-h-screen bg-gray-900 text-gray-200 flex flex-col justify-start">
        <!-- Título do Chat -->
        <div class="py-4 bg-gray-800 text-center shadow-md">
            <h1 class="text-2xl font-bold">🤖 Chat com GPT</h1>
        </div>

        <div class="flex">
            <div class="w-4/5 p-4">
                <div class="mb-4">
                    <livewire:chat-input />
                </div>
                <livewire:chat-history />
            </div>
            <div class="w-1/5 p-4">
                <div class="mb-10">
                    <livewire:assistent-config />
                </div>
                <livewire:clear-session />
            </div>
        </div>
    </div>
@endsection