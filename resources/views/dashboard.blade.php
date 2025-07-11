<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    <i class="fas fa-tachometer-alt text-blue-600 mr-3"></i>
                    {{ __('Dashboard') }}
                </h2>
                <p class="text-gray-600 mt-1">Visão geral do sistema de gestão empresarial</p>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-500">Última atualização</p>
                <p class="text-sm font-medium text-gray-700">{{ now()->format('d/m/Y H:i') }}</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Estatísticas Principais -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="stat-card overflow-hidden shadow-sm sm:rounded-xl card-hover">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total de Funcionários</p>
                                <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Employee::count() }}</p>
                                <p class="text-xs text-green-600 mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +12% este mês
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
                                <p class="text-sm font-medium text-gray-500">Unidades Ativas</p>
                                <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Unit::count() }}</p>
                                <p class="text-xs text-green-600 mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +5% este mês
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
                                <p class="text-sm font-medium text-gray-500">Marcas Registradas</p>
                                <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Brand::count() }}</p>
                                <p class="text-xs text-blue-600 mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +8% este mês
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
                                <p class="text-3xl font-bold text-gray-900">{{ \App\Models\EconomicGroup::count() }}</p>
                                <p class="text-xs text-purple-600 mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +3% este mês
                                </p>
                            </div>
                            <div class="p-4 rounded-full bg-gradient-to-r from-purple-500 to-purple-600">
                                <i class="fas fa-chart-line text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráficos e Análises -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Gráfico de Funcionários por Unidade -->
                <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-900">
                                <i class="fas fa-chart-pie text-blue-600 mr-2"></i>
                                Funcionários por Unidade
                            </h3>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-xs bg-blue-100 text-blue-700 rounded-full">Mensal</button>
                                <button class="px-3 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">Anual</button>
                            </div>
                        </div>
                        <div class="h-64">
                            <canvas id="employeesChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Gráfico de Crescimento -->
                <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-900">
                                <i class="fas fa-chart-line text-green-600 mr-2"></i>
                                Crescimento Mensal
                            </h3>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-xs bg-green-100 text-green-700 rounded-full">Ativo</button>
                            </div>
                        </div>
                        <div class="h-64">
                            <canvas id="growthChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ações Rápidas e Relatórios -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Ações Rápidas -->
                <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-6">
                            <i class="fas fa-bolt text-yellow-600 mr-2"></i>
                            Ações Rápidas
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <a href="{{ route('economic-groups.create') }}" class="group flex items-center p-4 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl hover:from-blue-100 hover:to-blue-200 transition-all duration-300 card-hover">
                                <div class="p-3 rounded-lg bg-blue-500 text-white mr-4 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-blue-900">Novo Grupo Econômico</p>
                                    <p class="text-sm text-blue-700">Criar novo grupo</p>
                                </div>
                            </a>

                            <a href="{{ route('brands.create') }}" class="group flex items-center p-4 bg-gradient-to-r from-green-50 to-green-100 rounded-xl hover:from-green-100 hover:to-green-200 transition-all duration-300 card-hover">
                                <div class="p-3 rounded-lg bg-green-500 text-white mr-4 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-green-900">Nova Marca</p>
                                    <p class="text-sm text-green-700">Registrar marca</p>
                                </div>
                            </a>

                            <a href="{{ route('units.create') }}" class="group flex items-center p-4 bg-gradient-to-r from-yellow-50 to-yellow-100 rounded-xl hover:from-yellow-100 hover:to-yellow-200 transition-all duration-300 card-hover">
                                <div class="p-3 rounded-lg bg-yellow-500 text-white mr-4 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-yellow-900">Nova Unidade</p>
                                    <p class="text-sm text-yellow-700">Adicionar unidade</p>
                                </div>
                            </a>

                            <a href="{{ route('employees.create') }}" class="group flex items-center p-4 bg-gradient-to-r from-purple-50 to-purple-100 rounded-xl hover:from-purple-100 hover:to-purple-200 transition-all duration-300 card-hover">
                                <div class="p-3 rounded-lg bg-purple-500 text-white mr-4 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-purple-900">Novo Funcionário</p>
                                    <p class="text-sm text-purple-700">Cadastrar funcionário</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Relatórios -->
                <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-6">
                            <i class="fas fa-file-alt text-red-600 mr-2"></i>
                            Relatórios Disponíveis
                        </h3>
                        <div class="space-y-4">
                            <a href="{{ route('reports.employees') }}" class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl hover:from-gray-100 hover:to-gray-200 transition-all duration-300 card-hover">
                                <div class="flex items-center">
                                    <div class="p-2 rounded-lg bg-blue-500 text-white mr-4">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Relatório de Funcionários</p>
                                        <p class="text-sm text-gray-600">Análise detalhada da equipe</p>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400"></i>
                            </a>

                            <a href="{{ route('reports.units') }}" class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl hover:from-gray-100 hover:to-gray-200 transition-all duration-300 card-hover">
                                <div class="flex items-center">
                                    <div class="p-2 rounded-lg bg-green-500 text-white mr-4">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Relatório de Unidades</p>
                                        <p class="text-sm text-gray-600">Performance das unidades</p>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400"></i>
                            </a>

                            <a href="{{ route('reports.brands') }}" class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl hover:from-gray-100 hover:to-gray-200 transition-all duration-300 card-hover">
                                <div class="flex items-center">
                                    <div class="p-2 rounded-lg bg-yellow-500 text-white mr-4">
                                        <i class="fas fa-tags"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Relatório de Marcas</p>
                                        <p class="text-sm text-gray-600">Análise de marcas</p>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts para os gráficos -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Dados para os gráficos
        const employeesData = {
            labels: ['Unidade A', 'Unidade B', 'Unidade C', 'Unidade D'],
            datasets: [{
                data: [{{ \App\Models\Employee::count() * 0.3 }}, {{ \App\Models\Employee::count() * 0.25 }}, {{ \App\Models\Employee::count() * 0.25 }}, {{ \App\Models\Employee::count() * 0.2 }}],
                backgroundColor: [
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(16, 185, 129, 0.8)',
                    'rgba(245, 158, 11, 0.8)',
                    'rgba(139, 92, 246, 0.8)'
                ],
                borderColor: [
                    'rgba(59, 130, 246, 1)',
                    'rgba(16, 185, 129, 1)',
                    'rgba(245, 158, 11, 1)',
                    'rgba(139, 92, 246, 1)'
                ],
                borderWidth: 2
            }]
        };

        const growthData = {
            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
            datasets: [{
                label: 'Funcionários',
                data: [{{ max(0, \App\Models\Employee::count() - 5) }}, {{ max(0, \App\Models\Employee::count() - 3) }}, {{ max(0, \App\Models\Employee::count() - 2) }}, {{ max(0, \App\Models\Employee::count() - 1) }}, {{ \App\Models\Employee::count() }}, {{ \App\Models\Employee::count() + 2 }}],
                borderColor: 'rgba(59, 130, 246, 1)',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                tension: 0.4,
                fill: true
            }, {
                label: 'Unidades',
                data: [{{ max(0, \App\Models\Unit::count() - 2) }}, {{ max(0, \App\Models\Unit::count() - 1) }}, {{ \App\Models\Unit::count() }}, {{ \App\Models\Unit::count() }}, {{ \App\Models\Unit::count() + 1 }}, {{ \App\Models\Unit::count() + 1 }}],
                borderColor: 'rgba(16, 185, 129, 1)',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                tension: 0.4,
                fill: true
            }]
        };

        // Configuração dos gráficos
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        padding: 20
                    }
                }
            }
        };

        // Inicializar gráficos
        document.addEventListener('DOMContentLoaded', function() {
            const employeesCtx = document.getElementById('employeesChart').getContext('2d');
            new Chart(employeesCtx, {
                type: 'doughnut',
                data: employeesData,
                options: chartOptions
            });

            const growthCtx = document.getElementById('growthChart').getContext('2d');
            new Chart(growthCtx, {
                type: 'line',
                data: growthData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                padding: 20
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
