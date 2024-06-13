<x-app-layout>
    <style>
        .pagination{
            margin-top:1rem;
        }
    </style>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('create') }}"
                    class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                    Cadastrar Venda
                </a>
            </div>
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto">
                        <form method="GET" action="{{ route('dashboard') }}">
                            <div class="flex items-start justify-between">
                                <h1 class="mb-6 text-3xl font-bold text-center">Vendas</h1>
                                <div>
                                    <input type="text" name="busca" placeholder="Nome" class="px-4 py-2 border rounded-md text-blue-950">
                                    <button type="submit" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Buscar</button>
                                    <a href="{{ route('dashboard') }}" class="rounded-md px-3.5 py-2.5 text-sm font-semibold text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Limpar busca</a>
                                </div>
                            </div>
                        </form>
                        <div class="overflow-hidden bg-white rounded-lg shadow-md">
                            <table class="min-w-full bg-white">
                                <thead class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                                    <tr>
                                        <th class="px-6 py-3 text-left"> Nome do cliente</th>
                                        <th class="px-6 py-3 text-left"> Plano de saúde</th>
                                        <th class="px-6 py-3 text-left"> Tipo de plano</th>
                                        <th class="px-6 py-3 text-left"> Data de contratação</th>
                                        <th class="px-6 py-3 text-left"> Valor da venda</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm font-light text-gray-600">
                                    @foreach ($vendas as $venda)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="px-6 py-3 text-left capitalize">{{ $venda->cliente_nome }}</td>
                                            <td class="px-6 py-3 text-left capitalize">{{ $planos->firstWhere('id', $venda->plano_saude)->nome }}</td>
                                            <td class="px-6 py-3 text-left capitalize"> {{ $tipoPlanos->firstWhere('id', $venda->tipo_plano)->nome }}</td>
                                            <td class="px-6 py-3 text-left">{{ $venda->data_contratacao }}</td>
                                            <td class="px-6 py-3 text-left">R$ {{ number_format($venda->valor_venda, 2, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination">
                {{ $vendas->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
