<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <a href="{{ route('employees.index') }}" class="text-gray-400 hover:text-blue-600" title="Voltar">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-users text-blue-600 mr-2"></i>
                {{ __('Editar Funcionário') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-effect overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-8 text-gray-900">
                    <form method="POST" action="{{ route('employees.update', $employee) }}" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-user mr-1 text-blue-600"></i> Nome Completo
                            </label>
                            <input id="name" class="block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" type="text" name="name" value="{{ old('name', $employee->name) }}" required autofocus />
                            @error('name')
                                <span class="text-red-600 text-xs mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-envelope mr-1 text-blue-600"></i> E-mail
                            </label>
                            <input id="email" class="block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" type="email" name="email" value="{{ old('email', $employee->email) }}" required />
                            @error('email')
                                <span class="text-red-600 text-xs mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="cpf" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-id-card mr-1 text-blue-600"></i> CPF
                            </label>
                            <input id="cpf" class="block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" type="text" name="cpf" value="{{ old('cpf', $employee->cpf) }}" required placeholder="000.000.000-00" />
                            @error('cpf')
                                <span class="text-red-600 text-xs mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="unit_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-map-marker-alt mr-1 text-green-600"></i> Unidade
                            </label>
                            <select id="unit_id" name="unit_id" class="block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                                <option value="">Selecione uma unidade...</option>
                                @foreach($units as $unit)
                                    <option value="{{ $unit->id }}" {{ old('unit_id', $employee->unit_id) == $unit->id ? 'selected' : '' }}>
                                        {{ $unit->fantasy_name }} ({{ $unit->brand->name }} - {{ $unit->brand->economicGroup->name }})
                                    </option>
                                @endforeach
                            </select>
                            @error('unit_id')
                                <span class="text-red-600 text-xs mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-8">
                            <a href="{{ route('employees.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-6 rounded-xl mr-2 transition-all">
                                <i class="fas fa-times mr-1"></i> Cancelar
                            </a>
                            <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-2 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all flex items-center">
                                <i class="fas fa-save mr-2"></i>
                                Atualizar Funcionário
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 