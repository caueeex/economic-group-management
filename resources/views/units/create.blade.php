<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nova Unidade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('units.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="fantasy_name" :value="__('Nome Fantasia')" />
                            <x-text-input id="fantasy_name" class="block mt-1 w-full" type="text" name="fantasy_name" :value="old('fantasy_name')" required autofocus />
                            <x-input-error :messages="$errors->get('fantasy_name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="corporate_name" :value="__('Razão Social')" />
                            <x-text-input id="corporate_name" class="block mt-1 w-full" type="text" name="corporate_name" :value="old('corporate_name')" required />
                            <x-input-error :messages="$errors->get('corporate_name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="cnpj" :value="__('CNPJ')" />
                            <x-text-input id="cnpj" class="block mt-1 w-full" type="text" name="cnpj" :value="old('cnpj')" required placeholder="00.000.000/0000-00" />
                            <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="brand_id" :value="__('Marca')" />
                            <select id="brand_id" name="brand_id" class="block mt-1 w-full" required>
                                <option value="">Selecione...</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }} ({{ $brand->economicGroup->name }})
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('brand_id')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('units.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                                Cancelar
                            </a>
                            <x-primary-button class="ml-3">
                                {{ __('Criar Unidade') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 