<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <a href="{{ route('brands.index') }}" class="text-gray-400 hover:text-yellow-600" title="Voltar">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center">
                    <i class="fas fa-tags text-yellow-600 mr-2"></i>
                    {{ __('Detalhes da Marca') }}
                </h2>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('brands.edit', $brand) }}" class="bg-gradient-to-r from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700 text-white font-semibold py-2 px-4 rounded-xl transition-all flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Editar
                </a>
                <a href="{{ route('brands.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-xl transition-all flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Voltar
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Informações da Marca -->
            <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl mb-8">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center text-white font-bold text-xl mr-4">
                            {{ strtoupper(substr($brand->name, 0, 2)) }}
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">{{ $brand->name }}</h3>
                            <p class="text-gray-600">Marca</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-gradient-to-r from-yellow-50 to-yellow-100 p-4 rounded-xl border border-yellow-200">
                            <div class="flex items-center">
                                <i class="fas fa-tag text-yellow-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-yellow-800">Nome da Marca</p>
                                    <p class="text-lg font-semibold text-yellow-900">{{ $brand->name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-purple-50 to-purple-100 p-4 rounded-xl border border-purple-200">
                            <div class="flex items-center">
                                <i class="fas fa-building text-purple-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-purple-800">Grupo Econômico</p>
                                    <p class="text-lg font-semibold text-purple-900">{{ $brand->economicGroup->name ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-4 rounded-xl border border-blue-200">
                            <div class="flex items-center">
                                <i class="fas fa-calendar text-blue-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-blue-800">Data de Criação</p>
                                    <p class="text-lg font-semibold text-blue-900">{{ $brand->created_at->format('d/m/Y') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-green-50 to-green-100 p-4 rounded-xl border border-green-200">
                            <div class="flex items-center">
                                <i class="fas fa-clock text-green-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-green-800">Última Atualização</p>
                                    <p class="text-lg font-semibold text-green-900">{{ $brand->updated_at->format('d/m/Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Unidades da Marca -->
            @if($brand->units->count() > 0)
                <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl mb-8">
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-gray-900 flex items-center">
                                <i class="fas fa-map-marker-alt text-green-600 mr-2"></i>
                                Unidades
                            </h3>
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                {{ $brand->units->count() }} unidade(s)
                            </span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            <i class="fas fa-store mr-2"></i>Nome Fantasia
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            <i class="fas fa-briefcase mr-2"></i>Razão Social
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            <i class="fas fa-id-card mr-2"></i>CNPJ
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            <i class="fas fa-users mr-2"></i>Funcionários
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            <i class="fas fa-calendar mr-2"></i>Criação
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($brand->units as $unit)
                                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-green-400 rounded-full flex items-center justify-center text-white font-semibold text-xs mr-3">
                                                        {{ strtoupper(substr($unit->fantasy_name, 0, 2)) }}
                                                    </div>
                                                    <a href="{{ route('units.show', $unit) }}" class="text-sm font-semibold text-blue-600 hover:text-blue-900 transition-colors">
                                                        {{ $unit->fantasy_name }}
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $unit->corporate_name }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    <i class="fas fa-id-card mr-1"></i>
                                                    {{ $unit->cnpj }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                    <i class="fas fa-users mr-1"></i>
                                                    {{ $unit->employees->count() }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    <i class="fas fa-calendar-alt text-gray-400 mr-1"></i>
                                                    {{ $unit->created_at->format('d/m/Y') }}
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
                            <i class="fas fa-chart-bar text-yellow-600 mr-2"></i>
                            Estatísticas
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gradient-to-r from-green-50 to-green-100 p-6 rounded-xl border border-green-200">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-full bg-green-500 text-white mr-4">
                                        <i class="fas fa-map-marker-alt text-lg"></i>
                                    </div>
                                    <div>
                                        <div class="text-3xl font-bold text-green-600">{{ $brand->units->count() }}</div>
                                        <div class="text-sm text-green-800">Total de Unidades</div>
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
                                            {{ $brand->units->sum(function($unit) { return $unit->employees->count(); }) }}
                                        </div>
                                        <div class="text-sm text-purple-800">Total de Funcionários</div>
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
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Nenhuma unidade encontrada</h3>
                        <p class="text-gray-600 mb-6">Esta marca ainda não possui unidades cadastradas.</p>
                        <a href="{{ route('units.create') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 shadow-lg hover:shadow-xl transition-all duration-300">
                            <i class="fas fa-plus mr-2"></i>
                            Criar Primeira Unidade
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout> 