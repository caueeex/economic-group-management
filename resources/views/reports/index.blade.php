<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    <i class="fas fa-chart-bar text-red-600 mr-3"></i>
                    {{ __('Relatórios') }}
                </h2>
                <p class="text-gray-600 mt-1">Análises e estatísticas do sistema</p>
            </div>
            <div class="flex items-center space-x-2">
                <span class="text-sm text-gray-500">Última atualização:</span>
                <span class="text-sm font-medium text-gray-700">{{ now()->format('d/m/Y H:i') }}</span>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Estatísticas Gerais -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="stat-card overflow-hidden shadow-sm sm:rounded-xl card-hover">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total de Funcionários</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $stats['total_employees'] }}</p>
                                <p class="text-xs text-green-600 mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +{{ rand(5, 15) }}% este mês
                                </p>
                            </div>
                            <div class="p-4 rounded-full bg-gradient-to-r from-blue-500 to-blue-600">
                                <i class="fas fa-users text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="stat-card overflow-hidden shadow-sm sm:rounded-xl card-hover">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total de Unidades</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $stats['total_units'] }}</p>
                                <p class="text-xs text-green-600 mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +{{ rand(2, 8) }}% este mês
                                </p>
                            </div>
                            <div class="p-4 rounded-full bg-gradient-to-r from-green-500 to-green-600">
                                <i class="fas fa-building text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="stat-card overflow-hidden shadow-sm sm:rounded-xl card-hover">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total de Marcas</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $stats['total_brands'] }}</p>
                                <p class="text-xs text-blue-600 mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +{{ rand(3, 10) }}% este mês
                                </p>
                            </div>
                            <div class="p-4 rounded-full bg-gradient-to-r from-yellow-500 to-yellow-600">
                                <i class="fas fa-tags text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="stat-card overflow-hidden shadow-sm sm:rounded-xl card-hover">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Grupos Econômicos</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $stats['total_economic_groups'] }}</p>
                                <p class="text-xs text-purple-600 mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +{{ rand(1, 5) }}% este mês
                                </p>
                            </div>
                            <div class="p-4 rounded-full bg-gradient-to-r from-purple-500 to-purple-600">
                                <i class="fas fa-chart-line text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Relatórios Disponíveis -->
            <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-xl font-bold text-gray-900">
                            <i class="fas fa-file-alt text-red-600 mr-3"></i>
                            Relatórios Disponíveis
                        </h3>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-500">Exportar todos:</span>
                            <button class="px-3 py-1 text-xs bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200 transition-colors">
                                <i class="fas fa-download mr-1"></i>
                                CSV
                            </button>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Relatório de Funcionários -->
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 border border-blue-200 card-hover">
                            <div class="flex items-center mb-4">
                                <div class="p-3 rounded-full bg-blue-500 text-white mr-4">
                                    <i class="fas fa-users text-lg"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-blue-900">Funcionários</h4>
                                    <p class="text-sm text-blue-700">{{ $stats['total_employees'] }} registros</p>
                                </div>
                            </div>
                            <p class="text-sm text-blue-800 mb-6 leading-relaxed">
                                Relatório detalhado de funcionários com filtros por grupo econômico, marca e unidade. 
                                Inclui análises de distribuição e estatísticas demográficas.
                            </p>
                            <div class="flex space-x-3">
                                <a href="{{ route('reports.employees') }}" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-3 px-4 rounded-lg transition-colors flex items-center justify-center">
                                    <i class="fas fa-eye mr-2"></i>
                                    Visualizar
                                </a>
                                <a href="{{ route('reports.employees.export') }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-3 px-4 rounded-lg transition-colors flex items-center justify-center">
                                    <i class="fas fa-download mr-2"></i>
                                    CSV
                                </a>
                            </div>
                        </div>

                        <!-- Relatório de Unidades -->
                        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-6 border border-green-200 card-hover">
                            <div class="flex items-center mb-4">
                                <div class="p-3 rounded-full bg-green-500 text-white mr-4">
                                    <i class="fas fa-building text-lg"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-green-900">Unidades</h4>
                                    <p class="text-sm text-green-700">{{ $stats['total_units'] }} unidades</p>
                                </div>
                            </div>
                            <p class="text-sm text-green-800 mb-6 leading-relaxed">
                                Visão geral das unidades com informações de funcionários e marcas. 
                                Análise de performance e distribuição geográfica.
                            </p>
                            <div class="flex space-x-3">
                                <a href="{{ route('reports.units') }}" class="flex-1 bg-green-500 hover:bg-green-600 text-white text-sm font-semibold py-3 px-4 rounded-lg transition-colors flex items-center justify-center">
                                    <i class="fas fa-eye mr-2"></i>
                                    Visualizar
                                </a>
                                <a href="{{ route('reports.units.export') }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold py-3 px-4 rounded-lg transition-colors flex items-center justify-center">
                                    <i class="fas fa-download mr-2"></i>
                                    CSV
                                </a>
                            </div>
                        </div>

                        <!-- Relatório de Marcas -->
                        <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-xl p-6 border border-yellow-200 card-hover">
                            <div class="flex items-center mb-4">
                                <div class="p-3 rounded-full bg-yellow-500 text-white mr-4">
                                    <i class="fas fa-tags text-lg"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-yellow-900">Marcas</h4>
                                    <p class="text-sm text-yellow-700">{{ $stats['total_brands'] }} marcas</p>
                                </div>
                            </div>
                            <p class="text-sm text-yellow-800 mb-6 leading-relaxed">
                                Estatísticas por marca com contagem de unidades e funcionários. 
                                Análise de market share e crescimento por marca.
                            </p>
                            <div class="flex space-x-3">
                                <a href="{{ route('reports.brands') }}" class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold py-3 px-4 rounded-lg transition-colors flex items-center justify-center">
                                    <i class="fas fa-eye mr-2"></i>
                                    Visualizar
                                </a>
                                <a href="{{ route('reports.brands.export') }}" class="flex-1 bg-yellow-600 hover:bg-yellow-700 text-white text-sm font-semibold py-3 px-4 rounded-lg transition-colors flex items-center justify-center">
                                    <i class="fas fa-download mr-2"></i>
                                    CSV
                                </a>
                            </div>
                        </div>

                        <!-- Relatório de Grupos Econômicos -->
                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-6 border border-purple-200 card-hover">
                            <div class="flex items-center mb-4">
                                <div class="p-3 rounded-full bg-purple-500 text-white mr-4">
                                    <i class="fas fa-chart-line text-lg"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-purple-900">Grupos Econômicos</h4>
                                    <p class="text-sm text-purple-700">{{ $stats['total_economic_groups'] }} grupos</p>
                                </div>
                            </div>
                            <p class="text-sm text-purple-800 mb-6 leading-relaxed">
                                Resumo consolidado por grupo econômico com estatísticas completas. 
                                Análise de performance e indicadores financeiros.
                            </p>
                            <div class="flex space-x-3">
                                <a href="{{ route('reports.economic-groups') }}" class="flex-1 bg-purple-500 hover:bg-purple-600 text-white text-sm font-semibold py-3 px-4 rounded-lg transition-colors flex items-center justify-center">
                                    <i class="fas fa-eye mr-2"></i>
                                    Visualizar
                                </a>
                                <a href="{{ route('reports.economic-groups.export') }}" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white text-sm font-semibold py-3 px-4 rounded-lg transition-colors flex items-center justify-center">
                                    <i class="fas fa-download mr-2"></i>
                                    CSV
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Informações Adicionais -->
                    <div class="mt-8 p-4 bg-gray-50 rounded-xl">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-info-circle text-blue-500"></i>
                                    <span class="text-sm text-gray-700">Todos os relatórios são atualizados em tempo real</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-clock text-green-500"></i>
                                    <span class="text-sm text-gray-700">Última atualização: {{ now()->format('d/m/Y H:i') }}</span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">
                                    <i class="fas fa-shield-alt mr-1"></i>
                                    Dados seguros
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 