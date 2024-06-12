<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto">
                        <h1 class="mb-6 text-3xl font-bold text-center">Lista de Vendas</h1>
                        <div class="overflow-hidden bg-white rounded-lg shadow-md">
                            <table class="min-w-full bg-white">
                                <thead class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                                    <tr>
                                        <th class="px-6 py-3 text-left"> Nome do cliente</th>
                                        <th class="px-6 py-3 text-left"> Plano de saúde</th>
                                        <th class="px-6 py-3 text-left"> Data de contratação</th>
                                        <th class="px-6 py-3 text-left"> Valor da venda</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm font-light text-gray-600">
                                    @foreach ($vendas as $venda)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="px-6 py-3 text-left"> {{ $venda->cliente_nome }}</td>
                                            <td class="px-6 py-3 text-left"> {{ $venda->plano_saude }}</td>
                                            <td class="px-6 py-3 text-left"> {{ $venda->data_contratacao }}</td>
                                            <td class="px-6 py-3 text-left"> {{ $venda->valor_venda }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if (!$count > 0)
                                <h1 class="mb-6 text-3xl font-bold text-center text-blue-950">Nenhuma venda cadastrada por enquanto</h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
