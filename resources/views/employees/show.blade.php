<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <a href="{{ route('employees.index') }}" class="text-gray-400 hover:text-blue-600" title="Voltar">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center">
                    <i class="fas fa-users text-blue-600 mr-2"></i>
                    {{ __('Detalhes do Funcionário') }}
                </h2>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('employees.edit', $employee) }}" class="bg-gradient-to-r from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700 text-white font-semibold py-2 px-4 rounded-xl transition-all flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Editar
                </a>
                <a href="{{ route('employees.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-xl transition-all flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Voltar
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Informações do Funcionário -->
            <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl mb-8">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-xl mr-4">
                            {{ strtoupper(substr($employee->name, 0, 2)) }}
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">{{ $employee->name }}</h3>
                            <p class="text-gray-600">Funcionário</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-4 rounded-xl border border-blue-200">
                            <div class="flex items-center">
                                <i class="fas fa-user text-blue-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-blue-800">Nome</p>
                                    <p class="text-lg font-semibold text-blue-900">{{ $employee->name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-green-50 to-green-100 p-4 rounded-xl border border-green-200">
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-green-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-green-800">E-mail</p>
                                    <p class="text-lg font-semibold text-green-900">{{ $employee->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-purple-50 to-purple-100 p-4 rounded-xl border border-purple-200">
                            <div class="flex items-center">
                                <i class="fas fa-id-card text-purple-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-purple-800">CPF</p>
                                    <p class="text-lg font-semibold text-purple-900">{{ $employee->cpf }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-red-50 to-red-100 p-4 rounded-xl border border-red-200">
                            <div class="flex items-center">
                                <i class="fas fa-calendar text-red-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-red-800">Data de Cadastro</p>
                                    <p class="text-lg font-semibold text-red-900">{{ $employee->created_at->format('d/m/Y') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-orange-50 to-orange-100 p-4 rounded-xl border border-orange-200">
                            <div class="flex items-center">
                                <i class="fas fa-clock text-orange-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-orange-800">Última Atualização</p>
                                    <p class="text-lg font-semibold text-orange-900">{{ $employee->updated_at->format('d/m/Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informações da Unidade -->
            @if($employee->unit)
                <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl mb-8">
                    <div class="p-8">
                        <div class="flex items-center mb-6">
                            <h3 class="text-xl font-bold text-gray-900 flex items-center">
                                <i class="fas fa-map-marker-alt text-green-600 mr-2"></i>
                                Informações da Unidade
                            </h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-gradient-to-r from-green-50 to-green-100 p-4 rounded-xl border border-green-200">
                                <div class="flex items-center">
                                    <i class="fas fa-store text-green-600 mr-3"></i>
                                    <div>
                                        <p class="text-sm font-medium text-green-800">Unidade</p>
                                        <a href="{{ route('units.show', $employee->unit) }}" class="text-lg font-semibold text-green-900 hover:text-green-700 transition-colors">
                                            {{ $employee->unit->fantasy_name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-4 rounded-xl border border-blue-200">
                                <div class="flex items-center">
                                    <i class="fas fa-briefcase text-blue-600 mr-3"></i>
                                    <div>
                                        <p class="text-sm font-medium text-blue-800">Razão Social</p>
                                        <p class="text-lg font-semibold text-blue-900">{{ $employee->unit->corporate_name }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gradient-to-r from-purple-50 to-purple-100 p-4 rounded-xl border border-purple-200">
                                <div class="flex items-center">
                                    <i class="fas fa-id-card text-purple-600 mr-3"></i>
                                    <div>
                                        <p class="text-sm font-medium text-purple-800">CNPJ da Unidade</p>
                                        <p class="text-lg font-semibold text-purple-900">{{ $employee->unit->cnpj }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gradient-to-r from-yellow-50 to-yellow-100 p-4 rounded-xl border border-yellow-200">
                                <div class="flex items-center">
                                    <i class="fas fa-tags text-yellow-600 mr-3"></i>
                                    <div>
                                        <p class="text-sm font-medium text-yellow-800">Marca</p>
                                        <a href="{{ route('brands.show', $employee->unit->brand) }}" class="text-lg font-semibold text-yellow-900 hover:text-yellow-700 transition-colors">
                                            {{ $employee->unit->brand->name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gradient-to-r from-indigo-50 to-indigo-100 p-4 rounded-xl border border-indigo-200">
                                <div class="flex items-center">
                                    <i class="fas fa-building text-indigo-600 mr-3"></i>
                                    <div>
                                        <p class="text-sm font-medium text-indigo-800">Grupo Econômico</p>
                                        <a href="{{ route('economic-groups.show', $employee->unit->brand->economicGroup) }}" class="text-lg font-semibold text-indigo-900 hover:text-indigo-700 transition-colors">
                                            {{ $employee->unit->brand->economicGroup->name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gradient-to-r from-teal-50 to-teal-100 p-4 rounded-xl border border-teal-200">
                                <div class="flex items-center">
                                    <i class="fas fa-id-card text-teal-600 mr-3"></i>
                                    <div>
                                        <p class="text-sm font-medium text-teal-800">CNPJ do Grupo</p>
                                        <p class="text-lg font-semibold text-teal-900">{{ $employee->unit->brand->economicGroup->cnpj }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Estatísticas -->
                <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl">
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <i class="fas fa-chart-bar text-blue-600 mr-2"></i>
                            Estatísticas da Unidade
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-6 rounded-xl border border-blue-200">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-full bg-blue-500 text-white mr-4">
                                        <i class="fas fa-users text-lg"></i>
                                    </div>
                                    <div>
                                        <div class="text-3xl font-bold text-blue-600">{{ $employee->unit->employees->count() }}</div>
                                        <div class="text-sm text-blue-800">Total de Funcionários na Unidade</div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gradient-to-r from-green-50 to-green-100 p-6 rounded-xl border border-green-200">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-full bg-green-500 text-white mr-4">
                                        <i class="fas fa-map-marker-alt text-lg"></i>
                                    </div>
                                    <div>
                                        <div class="text-3xl font-bold text-green-600">{{ $employee->unit->brand->units->count() }}</div>
                                        <div class="text-sm text-green-800">Total de Unidades da Marca</div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gradient-to-r from-purple-50 to-purple-100 p-6 rounded-xl border border-purple-200">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-full bg-purple-500 text-white mr-4">
                                        <i class="fas fa-users text-lg"></i>
                                    </div>
                                    <div>
                                        <div class="text-3xl font-bold text-purple-600">
                                            {{ $employee->unit->brand->units->sum(function($unit) { return $unit->employees->count(); }) }}
                                        </div>
                                        <div class="text-sm text-purple-800">Total de Funcionários da Marca</div>
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
                            <i class="fas fa-map-marker-alt text-4xl text-gray-400"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Funcionário sem unidade</h3>
                        <p class="text-gray-600 mb-6">Este funcionário não está vinculado a nenhuma unidade.</p>
                        <a href="{{ route('employees.edit', $employee) }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 shadow-lg hover:shadow-xl transition-all duration-300">
                            <i class="fas fa-link mr-2"></i>
                            Vincular a uma Unidade
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout> 