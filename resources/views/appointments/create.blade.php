<x-layouts.app :title="__('Crear Consulta')">
	 <div class="container mx-auto px-4 py-4">
    	<div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Crear Nueva Consulta</h1>
            	<a href="{{ route('patients.show', $patient) }}" 
               class="px-2 py-2 mr-8 bg-blue-600 text-white font-medium rounded-full hover:bg-blue-700">
                Volver</a>
    	</div>
    	<div class="bg-white rounded-lg shadow-xl p-6">

            <form action="{{ route('appointments.store', $patient) }}" method="POST">
            @csrf

            <input type="hidden" name="patient_id" value="{{ $patient->id }}">

            <div class="mt-4 relative inline-block text-left">
                <label for="weight" class="block text-dark-700 font-medium mb-2">Peso (kg)</label>
                <input type="number" class="w-80 px-3 py-2 border border-grey-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 " id="weight" name="weight" required>
            </div>

            <div class="mt-4">
                <label for="height" class="block text-dark-700 font-medium mb-2">Altura (cm)</label>

                <input type="number" class="w-80 px-3 py-2 border border-grey-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 " id="height" name="height" required>
            </div>

            <div class="form-group">
                <label for="notes" class="block text--500 font-medium mb-2">Notas</label>
                <textarea class="form-control w-150 px-2 py-2 border border-grey-300 focus:ring-blue-500 rounded-md" id="notes" name="notes" rows="3"></textarea>
            </div>

            <button type="submit" class="px-4 mt-2 mb-2 py-2 bg-blue-600 text-white font-medium rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">Crear Consulta
            </button>
        </form>
    </div>
</div>
</x-layouts.app>