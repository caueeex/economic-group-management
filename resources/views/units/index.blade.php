<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    <i class="fas fa-map-marker-alt text-green-600 mr-3"></i>
                    {{ __('Unidades') }}
                </h2>
                <p class="text-gray-600 mt-1">Gerencie todas as unidades cadastradas</p>
            </div>
            <a href="{{ route('units.create') }}" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Nova Unidade
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Estatísticas rápidas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl">
                    <div class="p-6 flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600">
                            <i class="fas fa-map-marker-alt text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Total de Unidades</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $units->total() }}</p>
                        </div>
                    </div>
                </div>
                <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl">
                    <div class="p-6 flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                            <i class="fas fa-tags text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Total de Marcas</p>
                            <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Brand::count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl">
                    <div class="p-6 flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Total de Funcionários</p>
                            <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Employee::count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-6">
                    @if(session('success'))
                        <div class="bg-gradient-to-r from-green-50 to-green-100 border border-green-200 text-green-800 px-4 py-3 rounded-xl mb-6 flex items-center">
                            <i class="fas fa-check-circle mr-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-gradient-to-r from-red-50 to-red-100 border border-red-200 text-red-800 px-4 py-3 rounded-xl mb-6 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($units->count() > 0)
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
                                            <i class="fas fa-tags mr-2"></i>Marca
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            <i class="fas fa-users mr-2"></i>Funcionários
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            <i class="fas fa-calendar mr-2"></i>Criação
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            <i class="fas fa-cogs mr-2"></i>Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($units as $unit)
                                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-green-400 rounded-full flex items-center justify-center text-white font-semibold text-sm mr-3">
                                                        {{ strtoupper(substr($unit->fantasy_name, 0, 2)) }}
                                                    </div>
                                                    <div class="text-sm font-semibold text-gray-900">
                                                        {{ $unit->fantasy_name }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                    <i class="fas fa-briefcase mr-1"></i>
                                                    {{ $unit->corporate_name }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    <i class="fas fa-id-card mr-1"></i>
                                                    {{ $unit->cnpj }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    <i class="fas fa-tag mr-1"></i>
                                                    {{ $unit->brand->name ?? '-' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    <i class="fas fa-users mr-1"></i>
                                                    {{ $unit->employees_count ?? 0 }} funcionário(s)
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    <i class="fas fa-calendar-alt text-gray-400 mr-1"></i>
                                                    {{ $unit->created_at->format('d/m/Y') }}
                                                </div>
                                                <div class="text-xs text-gray-500">
                                                    {{ $unit->created_at->format('H:i') }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('units.show', $unit) }}" class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 transition-colors">
                                                        <i class="fas fa-eye mr-1"></i>
                                                        Ver
                                                    </a>
                                                    <a href="{{ route('units.edit', $unit) }}" class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 transition-colors">
                                                        <i class="fas fa-edit mr-1"></i>
                                                        Editar
                                                    </a>
                                                    <form action="{{ route('units.destroy', $unit) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir esta unidade?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 transition-colors">
                                                            <i class="fas fa-trash mr-1"></i>
                                                            Excluir
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-6">
                            {{ $units->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="w-24 h-24 bg-gradient-to-r from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-map-marker-alt text-4xl text-gray-400"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Nenhuma unidade encontrada</h3>
                            <p class="text-gray-600 mb-6">Comece criando a primeira unidade do sistema.</p>
                            <a href="{{ route('units.create') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 shadow-lg hover:shadow-xl transition-all duration-300">
                                <i class="fas fa-plus mr-2"></i>
                                Criar Primeira Unidade
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 