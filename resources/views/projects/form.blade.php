<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ $action }}" method="POST">
                        @csrf
                        @isset ($method)
                            @method($method)
                        @endif
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Nombre') }}</label>
                            <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('name', $project->name) }}">
                            @error('name')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="source_fund" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Fuente de fondos') }}</label>
                            <input type="text" name="source_fund" id="source_fund" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('source_fund', $project->source_fund) }}">
                            @error('source_fund')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="planned_amount" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Monto planificado') }}</label>
                            <input type="number" name="planned_amount" id="planned_amount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('planned_amount', $project->planned_amount) }}">
                            @error('planned_amount')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="sponsored_amount" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Monto patrocinado') }}</label>
                            <input type="number" name="sponsored_amount" id="sponsored_amount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('sponsored_amount', $project->sponsored_amount) }}">
                            @error('sponsored_amount')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="own_amount" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Monto fondos propios') }}</label>
                            <input type="number" name="own_amount" id="own_amount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('own_amount', $project->own_amount) }}">
                            @error('own_amount')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('projects.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">{{ __('Cancelar') }}</a>
                            <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-dark font-bold py-2 px-4 rounded ml-2">{{ $buttonText }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>