<x-app-layout>
    <style>
        .pagination{
            margin-top:1rem;
        }
    </style>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto">
                        <form method="GET" action="{{ route('analitico') }}">
                            <div class="flex items-start justify-between">
                                <h1 class="mb-6 text-3xl font-bold text-center">Relatório de Vendas</h1>
                                <div>
                                    <select id="ano" name="ano" class="py-2 border rounded-md text-blue-950">
                                        <option value="">Todos os anos</option>
                                        @foreach(range(date('Y'), 2020, -1) as $ano)
                                            <option value="{{ $ano }}" {{ request('ano') == $ano ? 'selected' : '' }}>
                                                {{ $ano }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <select id="mes" name="mes" class="py-2 border rounded-md text-blue-950">
                                        <option value="">Todos os meses</option>
                                        @foreach(range(1, 12) as $m)
                                            <option value="{{ $m }}" {{ request('mes') == $m ? 'selected' : '' }}>
                                                {{ ucfirst(\Carbon\Carbon::parse('2024-' . $m . '-01')->translatedFormat('F')) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <select id="plano" name="plano" class="py-2 border rounded-md text-blue-950">
                                        <option value="">Todos os planos</option>
                                        @foreach($planos as $plano)
                                            <option value="{{ $plano->id }}" {{ request('plano') == $plano->id ? 'selected' : '' }}>
                                                {{ $plano->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <select id="tipo_plano" name="tipo_plano" class="py-2 border rounded-md text-blue-950">
                                        <option value="">Todos os tipos</option>
                                        @foreach($tipoPlanos as $tipoPlano)
                                            <option value="{{ $tipoPlano->id }}" {{ request('tipo_plano') == $tipoPlano->id ? 'selected' : '' }}>
                                                {{ $tipoPlano->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Filtrar</button>
                                </div>
                            </div>
                        </form>
                        <div class="mt-4 overflow-hidden bg-white rounded-lg shadow-md">
                            <table class="min-w-full bg-white">
                                <thead class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                                    <tr>
                                        <th class="px-6 py-3 text-left">Nome do cliente</th>
                                        <th class="px-6 py-3 text-left">Plano de saúde</th>
                                        <th class="px-6 py-3 text-left">Tipo de plano</th>
                                        <th class="px-6 py-3 text-left">Data de contratação</th>
                                        <th class="px-6 py-3 text-left">Valor da venda</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm font-light text-gray-950">
                                    @foreach ($vendas as $venda)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="px-6 py-3 text-left capitalize">{{ $venda->cliente_nome }}</td>
                                            <td class="px-6 py-3 text-left capitalize">{{ $planos->firstWhere('id', $venda->plano_saude)->nome }}</td>
                                            <td class="px-6 py-3 text-left capitalize">{{ $tipoPlanos->firstWhere('id', $venda->tipo_plano)->nome }}</td>
                                            <td class="px-6 py-3 text-left">{{ $venda->data_contratacao }}</td>
                                            <td class="px-6 py-3 text-left">R$ {{ number_format($venda->valor_venda, 2, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 text-right">
                            <h2 class="text-lg font-semibold">Total das Vendas:</h2>
                            <p class="text-xl font-bold text-green-600">R$ {{ number_format($totalVendas, 2, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination">
                {{ $vendas->links() }}
            </div>
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="container mx-auto">
                            <div class="flex items-start justify-between">
                                <h1 class="mb-6 text-3xl font-bold text-center">Vendas Por mês</h1>
                            </div>
                            <div class="mt-4 overflow-hidden bg-white rounded-lg shadow-md">
                                <canvas id="graficoVendasPorMes" width="800" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Obter os dados dos meses e das vendas do PHP
        var meses = {!! json_encode($totalVendasPorMes->pluck('mes')) !!};
        var vendasPorMes = {!! json_encode($totalVendasPorMes->pluck('total_vendas')) !!};

        meses = meses.map(function(mesNum) {
            var mesDate = new Date('2024-' + mesNum + '-01');
            return mesDate.toLocaleString('pt-BR', { month: 'long' });
        });

        // Configurar o gráfico
        var ctx = document.getElementById('graficoVendasPorMes').getContext('2d');
        var graficoVendas = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: meses,
                datasets: [{
                    label: 'Valor',
                    data: vendasPorMes,
                    backgroundColor: 'rgba(31, 41, 55, 0.9)', // Cor de fundo das barras
                    borderColor: 'rgba(31, 41, 55)', // Cor da borda das barras
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>
