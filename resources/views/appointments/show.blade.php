<x-layouts.app :title="__('Paciente')">

	<div class="container mx-auto px-4 py-2">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-blue-600 px-6 py-4">
            <h2 class="text-xl font-semibold text-white">
                Consulta Nutricional - {{ $appointment->created_at->format('d M Y') }}
            </h2>
            <p class="text-blue-100 mt-1">
                Paciente: {{ $patient->first_name }}
            </p>
        </div>

        <div class="p-6">

            <div class="mb-8">
                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">
                    <i class="fas fa-ruler-combined text-blue-500 mr-2"></i> MEDIDAS
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-500">Peso</p>
                        <p class="text-2xl font-bold">{{ $appointment->weight }} kg</p>
                    </div>
                    
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-500">Altura</p>
                        <p class="text-2xl font-bold">{{ $appointment->height }} cm</p>
                    </div>
                    
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-500">IMC</p>
                        <p class="text-2xl font-bold text-{{ $appointment->imc_color }}-500">{{ $appointment->imc }}</p>
                        <p class="text-sm text-{{ $appointment->imc_color }}-500">{{ $appointment->imc_classification }}</p>
                    </div>
                </div>
            </div>
            
            <div class="mb-4">
                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-2">
                    <i class="fas fa-notes-medical text-blue-500 mr-2"></i> Observaciones
                </h3>
                <div class="bg-gray-50 p-4 text-justify rounded-lg whitespace-pre-line">
                    {{ $appointment->notes ?? 'No hay observaciones registradas' }}
                </div>
            </div>
        </div>
        
        <div class="bg-gray-50 px-6 py-4 flex justify-between items-center border-t">
            <a href="{{ route('patients.show', $patient) }}" 
               class="text-blue-600 hover:text-blue-800 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Volver al paciente
            </a>
            
            <div>
                <a href="{{ route('appointments.edit', ['patient' => $patient, 'appointment' => $appointment]) }}" 
                   class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    <i class="fas fa-edit mr-1"></i> Editar
                </a>
            </div>
        </div>
    </div>
</div>

</x-layouts.app>