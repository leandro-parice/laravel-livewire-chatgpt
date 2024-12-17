<?php

namespace App\Http\Controllers;

use App\Services\OpenAIService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function ask(Request $request)
    {
        // $validated = $request->validate([
        //     'message' => 'required|string',
        // ]);

        $validated = [];
        $validated['message'] = 'Que dia da semana caira minha viagem? Quantos dias faltam para a minha viagem? O que você recomenda que eu leve na minha bagagem?';

        $response = $this->openAIService->askChatGPT($validated['message']);
        return response()->json(['response' => $response]);
    }
}
