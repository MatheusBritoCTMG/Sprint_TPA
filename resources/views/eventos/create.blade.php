@extends('layouts.app')

@section('title', 'Criar Evento — FalaQ')

@section('content')
{{-- TICKET #007: contêiner centralizado estilizado com Tailwind --}}
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-1">📅 Criar novo Evento</h2>
    <p class="text-sm text-gray-500 mb-6">Preencha os dados abaixo para cadastrar um evento no AskLive.</p>

    <form action="{{ route('eventos.store') }}" method="POST" novalidate>
        @csrf

        {{-- Campo: Título --}}
        <div class="mb-5">
            <label for="titulo" class="block text-sm font-medium text-gray-700 mb-1">Título do Evento</label>
            <input type="text" name="titulo" id="titulo"
                   value="{{ old('titulo') }}"
                   placeholder="Ex: Palestra sobre Laravel"
                   class="w-full px-3 py-2 border rounded-md text-gray-800 placeholder-gray-400
                          focus:outline-none focus:ring-2 focus:ring-blue-500
                          @error('titulo') border-red-500 @else border-gray-300 @enderror">
            {{-- TICKET #008: mensagem de erro em vermelho abaixo do campo --}}
            @error('titulo')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Campo: Descrição --}}
        <div class="mb-5">
            <label for="descricao" class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
            <textarea name="descricao" id="descricao" rows="4"
                      placeholder="Conte um pouco sobre o evento..."
                      class="w-full px-3 py-2 border rounded-md text-gray-800 placeholder-gray-400
                             focus:outline-none focus:ring-2 focus:ring-blue-500
                             @error('descricao') border-red-500 @else border-gray-300 @enderror">{{ old('descricao') }}</textarea>
            @error('descricao')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Campo: Data (opcional) --}}
        <div class="mb-6">
            <label for="data_evento" class="block text-sm font-medium text-gray-700 mb-1">Data <span class="text-gray-400">(opcional)</span></label>
            <input type="date" name="data_evento" id="data_evento"
                   value="{{ old('data_evento') }}"
                   class="w-full px-3 py-2 border rounded-md text-gray-800
                          focus:outline-none focus:ring-2 focus:ring-blue-500
                          @error('data_evento') border-red-500 @else border-gray-300 @enderror">
            @error('data_evento')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Botão estilizado com Tailwind (fundo, texto, arredondado e hover) --}}
        <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">
            Criar Evento
        </button>
    </form>
</div>
@endsection
