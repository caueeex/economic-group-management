<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <a href="{{ route('units.index') }}" class="text-gray-400 hover:text-green-600" title="Voltar">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center">
                    <i class="fas fa-map-marker-alt text-green-600 mr-2"></i>
                    {{ __('Detalhes da Unidade') }}
                </h2>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('units.edit', $unit) }}" class="bg-gradient-to-r from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700 text-white font-semibold py-2 px-4 rounded-xl transition-all flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Editar
                </a>
                <a href="{{ route('units.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-xl transition-all flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Voltar
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Informações da Unidade -->
            <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl mb-8">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-blue-500 rounded-full flex items-center justify-center text-white font-bold text-xl mr-4">
                            {{ strtoupper(substr($unit->fantasy_name, 0, 2)) }}
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">{{ $unit->fantasy_name }}</h3>
                            <p class="text-gray-600">Unidade</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-gradient-to-r from-green-50 to-green-100 p-4 rounded-xl border border-green-200">
                            <div class="flex items-center">
                                <i class="fas fa-store text-green-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-green-800">Nome Fantasia</p>
                                    <p class="text-lg font-semibold text-green-900">{{ $unit->fantasy_name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-4 rounded-xl border border-blue-200">
                            <div class="flex items-center">
                                <i class="fas fa-briefcase text-blue-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-blue-800">Razão Social</p>
                                    <p class="text-lg font-semibold text-blue-900">{{ $unit->corporate_name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-purple-50 to-purple-100 p-4 rounded-xl border border-purple-200">
                            <div class="flex items-center">
                                <i class="fas fa-id-card text-purple-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-purple-800">CNPJ</p>
                                    <p class="text-lg font-semibold text-purple-900">{{ $unit->cnpj }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-yellow-50 to-yellow-100 p-4 rounded-xl border border-yellow-200">
                            <div class="flex items-center">
                                <i class="fas fa-tags text-yellow-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-yellow-800">Marca</p>
                                    <p class="text-lg font-semibold text-yellow-900">{{ $unit->brand->name ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-indigo-50 to-indigo-100 p-4 rounded-xl border border-indigo-200">
                            <div class="flex items-center">
                                <i class="fas fa-building text-indigo-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-indigo-800">Grupo Econômico</p>
                                    <p class="text-lg font-semibold text-indigo-900">{{ $unit->brand->economicGroup->name ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-red-50 to-red-100 p-4 rounded-xl border border-red-200">
                            <div class="flex items-center">
                                <i class="fas fa-calendar text-red-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-red-800">Data de Criação</p>
                                    <p class="text-lg font-semibold text-red-900">{{ $unit->created_at->format('d/m/Y') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-orange-50 to-orange-100 p-4 rounded-xl border border-orange-200">
                            <div class="flex items-center">
                                <i class="fas fa-clock text-orange-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-orange-800">Última Atualização</p>
                                    <p class="text-lg font-semibold text-orange-900">{{ $unit->updated_at->format('d/m/Y') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-teal-50 to-teal-100 p-4 rounded-xl border border-teal-200">
                            <div class="flex items-center">
                                <i class="fas fa-users text-teal-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-teal-800">Total de Funcionários</p>
                                    <p class="text-lg font-semibold text-teal-900">{{ $unit->employees->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Funcionários da Unidade -->
            @if($unit->employees->count() > 0)
                <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl mb-8">
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-gray-900 flex items-center">
                                <i class="fas fa-users text-blue-600 mr-2"></i>
                                Funcionários
                            </h3>
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                {{ $unit->employees->count() }} funcionário(s)
                            </span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            <i class="fas fa-user mr-2"></i>Nome
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            <i class="fas fa-envelope mr-2"></i>E-mail
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            <i class="fas fa-id-card mr-2"></i>CPF
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            <i class="fas fa-calendar mr-2"></i>Cadastro
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($unit->employees as $employee)
                                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-blue-400 rounded-full flex items-center justify-center text-white font-semibold text-xs mr-3">
                                                        {{ strtoupper(substr($employee->name, 0, 2)) }}
                                                    </div>
                                                    <a href="{{ route('employees.show', $employee) }}" class="text-sm font-semibold text-blue-600 hover:text-blue-900 transition-colors">
                                                        {{ $employee->name }}
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    <i class="fas fa-envelope text-gray-400 mr-1"></i>
                                                    {{ $employee->email }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                    <i class="fas fa-id-card mr-1"></i>
                                                    {{ $employee->cpf }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    <i class="fas fa-calendar-alt text-gray-400 mr-1"></i>
                                                    {{ $employee->created_at->format('d/m/Y') }}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Estatísticas -->
                <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl">
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <i class="fas fa-chart-bar text-green-600 mr-2"></i>
                            Estatísticas
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                            <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-6 rounded-xl border border-blue-200">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-full bg-blue-500 text-white mr-4">
                                        <i class="fas fa-users text-lg"></i>
                                    </div>
                                    <div>
                                        <div class="text-3xl font-bold text-blue-600">{{ $unit->employees->count() }}</div>
                                        <div class="text-sm text-blue-800">Total de Funcionários</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl">
                    <div class="p-12 text-center">
                        <div class="w-24 h-24 bg-gradient-to-r from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-users text-4xl text-gray-400"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Nenhum funcionário encontrado</h3>
                        <p class="text-gray-600 mb-6">Esta unidade ainda não possui funcionários cadastrados.</p>
                        <a href="{{ route('employees.create') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 shadow-lg hover:shadow-xl transition-all duration-300">
                            <i class="fas fa-plus mr-2"></i>
                            Cadastrar Primeiro Funcionário
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout> 