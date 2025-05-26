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

            <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($plans as $plan)
                <tr class="w-64">
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">{{ $plan->id }}</td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">{{ $plan->patient->first_name}} {{$plan->patient->last_name}}</td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">{{ $plan->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <div class="inline-flex rounded-md shadow-xs" role="group">
                            <a href="#" class="bg-blue-500 hover:bg-blue-600 px-2 py-2  inline-flex items-center text-sm font-medium text-blue-700 bg-white border-1 border-blue-600 rounded-xl hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                                </svg>Generar PDF
                            </a>
                            <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500"></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                       Planes Alimenticios creados
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">

        </div>
    </div>

</div>
</x-layouts.app>
