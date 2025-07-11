<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <a href="{{ route('brands.index') }}" class="text-gray-400 hover:text-yellow-600" title="Voltar">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-tags text-yellow-600 mr-2"></i>
                {{ __('Editar Marca') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-8 text-gray-900">
                    <form method="POST" action="{{ route('brands.update', $brand) }}" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-tag mr-1 text-yellow-600"></i> Nome da Marca
                            </label>
                            <input id="name" class="block w-full rounded-lg border-gray-300 focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50" type="text" name="name" value="{{ old('name', $brand->name) }}" required autofocus />
                            @error('name')
                                <span class="text-red-600 text-xs mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="economic_group_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-building mr-1 text-purple-600"></i> Grupo Econômico
                            </label>
                            <select id="economic_group_id" name="economic_group_id" class="block w-full rounded-lg border-gray-300 focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50" required>
                                <option value="">Selecione um grupo econômico...</option>
                                @foreach($economicGroups as $group)
                                    <option value="{{ $group->id }}" {{ old('economic_group_id', $brand->economic_group_id) == $group->id ? 'selected' : '' }}>
                                        {{ $group->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('economic_group_id')
                                <span class="text-red-600 text-xs mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-8">
                            <a href="{{ route('brands.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-6 rounded-xl mr-2 transition-all">
                                <i class="fas fa-times mr-1"></i> Cancelar
                            </a>
                            <button type="submit" class="bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white font-semibold py-2 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all flex items-center">
                                <i class="fas fa-save mr-2"></i>
                                Atualizar Marca
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 