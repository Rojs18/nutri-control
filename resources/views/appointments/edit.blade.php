<x-layouts.app :title="__('Editar consulta')">
    <div class="container">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Editar Consulta</h1>
            <a href="{{ route('patients.show', $patient->id) }}" 
               class="px-2 py-2 bg-blue-600 text-white font-medium rounded-full hover:bg-blue-700">
                Volver</a>
        </div>
        <form action="{{ route('appointments.update', [$patient, $appointment]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="weight" class="mt-2 block text-dark-700 font-medium mb-1">Peso</label>
                <input type="number" step="0.1" class="w-80 px-3 py-2 border border-grey-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-5003" id="weight" name="weight" value="{{ $appointment->weight }}" required>
            </div>
            <div class="form-group">
                <label for="height" class="mt-2 block text-dark-700 font-medium mb-1">Altura</label>
                <input type="number" step="0.1" class="w-80 px-3 py-2 border border-grey-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-5003 mb-1" id="height" name="height" value="{{ $appointment->height }}" required>
            </div>

            <div class="form-group">
                <label for="notes" class="block text-dark-500 font-medium mb-2">Notas</label>
                <textarea class="form-control w-80 px-2 py-2 border border-grey-300 focus:ring-blue-500 rounded-md" id="notes" name="notes">{{ $appointment->notes }}</textarea>
            </div>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">Actualizar consulta</button>
        </form>
    </div>
</x-layouts.app>