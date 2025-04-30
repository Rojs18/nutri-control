<x-layouts.app :title="__('Patients')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-sm border border-neutral-200 dark:border-neutral-700">
            
            <h1 class="text-2xl font-bold text-black-500 px-2 py-1 mb-6">Listado de Pacientes</h1>
            
            <div class="mb-4 px-1">
            <a href="{{ route('patients.create') }}" class="bg-blue-600 hover:bg-blue-600 text-white px-2 py-2 rounded-md mb-4">
                Agregar Nuevo Paciente
            </a>
        </div>

        <div class="bg-white rounded-lg overflow-hidden">
            <table class="w-full text-sm text-left rtl:text-right text-blue-500 dark:text-grey-400">
              <thead class="text-xs text-blue-700 uppercase bg-blue-50 dark:bg-blue-700 dark:text-blue-400">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Apellido</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de nacimiento</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Genero</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Historial Medico</th><th class="px-20 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acción</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($patients as $patient)
                  <tr class="w-64">
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">{{ $patient->id }}</td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">{{ $patient->first_name }}</td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">{{ $patient->last_name }}</td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">{{ $patient->birth_date }}</td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">{{ $patient->gender }}</td>
                        <td class="px-6 py-2 text-ellipsis text-sm text-gray-500 ">{{ $patient->medical_history }}</td>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="inline-flex rounded-md shadow-xs" role="group">
                                <a href="{{ route('patients.show', $patient) }}" class="bg-blue-500 hover:bg-blue-600 px-2 py-2  inline-flex items-center text-sm font-medium text-blue-700 bg-white border-2 border-blue-600 rounded-l-xl hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                    <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                                    </svg>Ver mas
                                </a>
                                <form action="{{ route('patients.destroy', $patient) }}" method="POST" class="block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-400 hover:bg-blue-200 px-2 py-2 inline-flex items-center text-sm font-medium text-black-700 bg-white border-2 border-solid border-red-600 rounded-r-xl hover:bg-red-100 hover:text-black-700 focus:z-10 focus:ring-2 focus:ring-red-700 focus:text-black-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                        <svg class="w-[20px] h-[20px] me-1 text-black-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>  
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        @if (session('status'))
            <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-8 text-gray-500 bg-white rounded-lg shadow-xl inset-shadow-xs dark:text-gray-400 dark:bg-gray-800 fixed top-5 right-5" role="alert">
                <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-sm font-normal"> {{ session('status') }} </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                    </button>
            </div>
        @endif
    </div>
</x-layouts.app>