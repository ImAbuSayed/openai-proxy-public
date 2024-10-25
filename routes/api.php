<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenAIProxyController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/openai-proxy/chat', [OpenAIProxyController::class, 'proxyChat']);
Route::post('/openai-proxy/speech', [OpenAIProxyController::class, 'proxySpeech']);
Route::post('/openai-proxy/transcription', [OpenAIProxyController::class, 'proxyTranscription']);
