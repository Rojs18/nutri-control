<x-layouts.app :title="__('Crear Paciente')">
<div class="container mx-auto px-4 py-4">
    <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Crear Nuevo Paciente</h1>
            <a href="{{ route('patients.index') }}" 
               class="px-2 py-2 bg-blue-600 text-white font-medium rounded-full hover:bg-blue-700">
                Volver</a>
    </div>

        <div class="bg-white rounded-lg shadow-xl p-1 inset-shadow-xs">
            <form action="{{ route('patients.store') }}" method="POST">
            @csrf
        
        
            <div class="mb-4">
                <label for="first_name" class="block text-dark-700 font-medium mb-2">Nombre</label>
                <input type="text" class="w-80 px-3 py-2 border border-grey-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="first_name" name="first_name" required>
            </div>
            <div class="mt-4">
                <label for="last_name" class="block text-dark-700 font-medium mb-2">Apellido</label>
                <input type="text" class="w-80 px-3 py-2 border border-grey-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 " id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="birth_date" class="block text-dark-700 font-medium mb-2 pt-5">Fecha de Nacimiento</label>
                <input type="date" class="form-control text-dark-500 font-small pb-1" id="birth_date" name="birth_date" required>
            </div>
            <div class="form-group">
                <label for="gender" class="form-control text-dark-700">Género</label>
                <select class="form-control font-small mb-2" id="gender" name="gender" required>
                    <option value="Male">Masculino</option>
                    <option value="Female">Femenino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="medical_history" class="block text-dark-500 font-medium mb-2">Historia Médica</label>
                <textarea class="form-control w-80 px-2 py-2 border border-grey-300 focus:ring-blue-500 rounded-md" id="medical_history" name="medical_history"></textarea>
            </div>

            <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">Registrar Paciente</button>
        </form>
      </div>
   </div>
</x-layouts.app>
