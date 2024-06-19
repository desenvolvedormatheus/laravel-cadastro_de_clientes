<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-6 text-3xl font-bold text-center">Editar Venda</h1>

                    @if (session('success'))
                        <div class="mb-4 text-sm font-medium text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('update', $venda->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="cliente_nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome do cliente</label>
                            <input type="text" id="cliente_nome" name="cliente_nome" value="{{ $venda->cliente_nome }}" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                            @error('cliente_nome')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="plano_saude" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Plano de saúde</label>
                            <select id="plano_saude" name="plano_saude" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                                <option value="">Selecione o plano de saúde</option>
                                @foreach($planos as $plano)
                                    <option value="{{ $plano->id }}" @if($venda->plano_saude == $plano->id) selected @endif>{{ $plano->nome }}</option>
                                @endforeach
                            </select>
                            @error('plano_saude')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="tipo_plano" class="block text-sm font-medium text-gray-700 dark:text-gray-300">PJ ou PF</label>
                            <select id="tipo_plano" name="tipo_plano" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                                <option value="">Selecione o tipo de plano</option>
                                @foreach($tipoPlanos as $tipoPlano)
                                    <option value="{{ $tipoPlano->id }}" @if($venda->tipo_plano == $tipoPlano->id) selected @endif>{{ $tipoPlano->nome }}</option>
                                @endforeach
                            </select>
                            @error('tipo_plano')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="data_contratacao" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data de contratação</label>
                            <input type="date" id="data_contratacao" name="data_contratacao" value="{{ $venda->data_contratacao }}" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                            @error('data_contratacao')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="valor_venda" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Valor da venda</label>
                            <input type="number" step="0.01" id="valor_venda" name="valor_venda" value="{{ $venda->valor_venda }}" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                            @error('valor_venda')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Salvar Edição</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
