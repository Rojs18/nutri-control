<x-layouts.app :title="__('Plan Nutricional')">
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Planes Alimenticios</h1>
        <a href="{{ route('nutritional-plans.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-2 rounded-lg flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Nuevo Plan
        </a>
    </div>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paciente</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Plan Nutricional</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

            <table>
                <tr>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> </td>
                </tr>

            </table>


                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                        No hay planes alimenticios registrados
                    </td>
                </tr>

            </tbody>
        </table>

        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">

        </div>
    </div>

</div>
</x-layouts.app>
