<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes do Documento') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-2">Documento #{{ $documento->id }}</h2>
                    <p><strong>URL:</strong> {{ $documento->url }}</p>
                    <p><strong>Descrição:</strong> {{ $documento->descricao }}</p>
                    <p><strong>Horas In:</strong> {{ $documento->horas_in }}</p>
                    <p><strong>Horas Out:</strong> {{ $documento->horas_out }}</p>
                    <p><strong>Status:</strong> {{ $documento->status }}</p>
                    <p><strong>Comentário:</strong> {{ $documento->comentario }}</p>
                    <p><strong>Categoria:</strong> {{ $documento->categoria->nome ?? '-' }}</p>
                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('coordenador.documentos.edit', $documento->id) }}" class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">Editar</a>
                        <a href="{{ route('coordenador.documentos.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>