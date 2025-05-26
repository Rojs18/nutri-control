<x-layouts.app :title="__('Planificador de Comidas')">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-6xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Planificador de Comidas</h1>
                    <a href="{{ route('nutritional-plans.index') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-xl flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Volver
                    </a>
            </div>
            <p class="text-gray-600 mt-2 mb-4 text-center">Selecciona las recetas para cada día de la semana</p>
            <form action="{{ route('nutritional-plans.store') }}" method="POST">
                @csrf
                <div class="mt-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nombre del Plan</label>
                    <input type="text" id="name" name="name" value="" required
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Paciente</label>
                    <select name="patient_id" class="meal-select w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Seleccionar...</option>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}">{{$patient->first_name}} {{$patient->last_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                    @foreach(['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'] as $day)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="bg-blue-600 hover:bg-blue-700 text-white p-3 text-center">
                                <h3 class="font-semibold">{{ $day }}</h3>
                            </div>

                            <div class="p-4">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Desayuno</label>
                                    <select name="options[{{ $day }}][Desayuno]" class="meal-select w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="">Seleccionar...</option>
                                    @foreach($desayunos as $desayuno)
                                            <option value="{{ $desayuno->id }}">{{$desayuno->name}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Almuerzo</label>
                                    <select name="options[{{ $day }}][Almuerzo]" class="meal-select w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="">Seleccionar...</option>
                                        @foreach($almuerzos as $almuerzo)
                                            <option value="{{ $almuerzo->id }}">{{$almuerzo->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Cena</label>
                                    <select name="options[{{ $day }}][Cena]" class="meal-select w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="">Seleccionar...</option>
                                        @foreach($cenas as $cena)
                                            <option value="{{ $cena->id }}">{{$cena->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-8 flex justify-between">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg flex items-center">
                        Guardar
                    </button>
                </div>
        </div>
        </form>
    </div>
    </div>
</x-layouts.app>
