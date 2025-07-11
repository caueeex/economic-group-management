<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <a href="{{ route('units.index') }}" class="text-gray-400 hover:text-green-600" title="Voltar">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-map-marker-alt text-green-600 mr-2"></i>
                {{ __('Editar Unidade') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-8 text-gray-900">
                    <form method="POST" action="{{ route('units.update', $unit) }}" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="fantasy_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-store mr-1 text-green-600"></i> Nome Fantasia
                            </label>
                            <input id="fantasy_name" class="block w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" type="text" name="fantasy_name" value="{{ old('fantasy_name', $unit->fantasy_name) }}" required autofocus />
                            @error('fantasy_name')
                                <span class="text-red-600 text-xs mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="corporate_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-briefcase mr-1 text-blue-600"></i> Razão Social
                            </label>
                            <input id="corporate_name" class="block w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" type="text" name="corporate_name" value="{{ old('corporate_name', $unit->corporate_name) }}" required />
                            @error('corporate_name')
                                <span class="text-red-600 text-xs mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="cnpj" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-id-card mr-1 text-blue-600"></i> CNPJ
                            </label>
                            <input id="cnpj" class="block w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" type="text" name="cnpj" value="{{ old('cnpj', $unit->cnpj) }}" required placeholder="00.000.000/0000-00" />
                            @error('cnpj')
                                <span class="text-red-600 text-xs mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="brand_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-tags mr-1 text-yellow-600"></i> Marca
                            </label>
                            <select id="brand_id" name="brand_id" class="block w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" required>
                                <option value="">Selecione uma marca...</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id', $unit->brand_id) == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }} ({{ $brand->economicGroup->name }})
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <span class="text-red-600 text-xs mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-8">
                            <a href="{{ route('units.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-6 rounded-xl mr-2 transition-all">
                                <i class="fas fa-times mr-1"></i> Cancelar
                            </a>
                            <button type="submit" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-2 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all flex items-center">
                                <i class="fas fa-save mr-2"></i>
                                Atualizar Unidade
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 