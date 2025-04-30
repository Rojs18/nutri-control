<x-layouts.app :title="__('Editar Paciente')">
    <div class="container">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Editar Paciente</h1>
                <a href="{{ route('patients.show', $patient) }}" 
                   class="px-2 py-2 mr-8 ring-4 text-blue-600 font-medium rounded-full hover:bg-blue-100">
                Volver</a>
        </div>
        <div class="bg-white rounded-lg shadow-xl p-1 inset-shadow-sm">
            
            <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="first_name" class="mt-2 block text-dark-700 font-medium mb-1">Nombre</label>
                    <input type="text" class="w-80 px-3 py-2 border border-grey-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-5003" id="first_name" name="first_name" value="{{ $patient->first_name }}" required>
                </div>
                <div class="form-group">
                    <label for="last_name" class="mt-2 block text-dark-700 font-medium mb-1">Apellido</label>
                    <input type="text" class="w-80 px-3 py-2 border border-grey-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-5003 mb-1" id="last_name" name="last_name" value="{{ $patient->last_name }}" required>
                </div>
                <div class="form-group">
                    <label for="birth_date">Fecha de Nacimiento</label>
                    <input type="date" class="block text-dark-700 font-medium mb-2 pt-1" id="birth_date" name="birth_date" value="{{ $patient->birth_date }}" required>
                </div>
                <div class="form-group">
                    <label for="gender" class="form-control text-dark-700">Género</label>
                    <select class="form-control font-small mb-2" id="gender" name="gender" required>
                        <option value="Male" class="bg-blue-500" {{ $patient->gender == 'Male' ? 'selected' : '' }}>Masculino</option>
                        <option value="Female" class="bg-pink-500" {{ $patient->gender == 'Female' ? 'selected' : '' }}>Femenino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="medical_history" class="block text-dark-500 font-medium mb-2">Historia Médica</label>
                    <textarea class="form-control w-80 px-2 py-2 border border-grey-300 focus:ring-blue-500 rounded-md" id="medical_history" name="medical_history">{{ $patient->medical_history }}</textarea>
                </div>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">Actualizar Paciente</button>
            </form>
        </div>
    </div>
</x-layouts.app>