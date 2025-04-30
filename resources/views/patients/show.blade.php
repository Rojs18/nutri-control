<x-layouts.app :title="__('Paciente')">
    <div class="container pb-4">
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('patients.index') }}" class="px-2 mr-10 py-2 ring-4 text-blue-600 font-medium rounded-full hover:bg-blue-100">Volver a lista de pacientes</a>
        </div>
        <div class="grid grid-cols-5 grid-rows-5 gap-0">
            <div class="row-span-4">
                <div class="flex gap-[20px] w-80">
                    <ul role="list" class="divide-y divide-gray-200 order-3 grow-[5] dark:divide-gray-700">
                        <li class="py-2 sm:py-0">
                            <div class="flex">
                                <div class="flex-1 min-w-0 ms-4">
                                    <h1 class="text-2xl dark:bg-gray-800 font-bold text-black-800">Detalles del Paciente</h1>
                                    <p class="px-2 py-4 dark:text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre
                                        <p class="text-sm text-gray-500 text-right text-xs truncate dark:text-gray-400">{{ $patient->first_name }}</p>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="px-2 py-3 dark:text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Apellido
                                        <p class="text-sm text-gray-500 text-right text-xs truncate dark:text-gray-400">{{ $patient->last_name }}</p>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="px-2 py-3 dark:text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Nacimiento
                                        <p class="text-sm text-gray-500 text-right text-xs truncate dark:text-gray-400">{{ $patient->birth_date }}</p>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="px-2 py-3 dark:text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Genero
                                        <p class="text-sm text-gray-500 text-right text-xs truncate dark:text-gray-400">{{ $patient->gender }}</p>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="px-2 py-3 dark:text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Historia Medica
                                        <p class="text-sm text-gray-500 text-right text-xs text-ellipsis overflow dark:text-gray-400">{{ $patient->medical_history }}</p>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-start-1 row-start-5">
                <a href="{{ route('patients.edit', $patient->id) }}" class="px-2 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-500">Editar</a>
            </div> 
            <div class="col-start-2 row-start-5">
                <a href="{{ route('appointments.create', $patient->id) }}" class=" px-2 py-2  bg-green-600 text-white font-medium rounded-md hover:bg-green-500">Crear Consulta</a>
            </div>
            <div class="col-span-4 row-span-6 col-start-2 row-start-1">
                <div class="w-full max-w-192 p-4 ml-34 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                   <div class="flex justify-between mb-4"></div>
                     <div class="flex">
                        <div style="width:98%;">
                            <x-chartjs-component :chart="$chart"/>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white shadow-xl/30 rounded-lg overflow-hidden overflow-visible">

        <h5 class="text-2xl pt-2 pb-4 dark:bg-gray-800 font-bold text-black-800">Historial de Consultas</h5>
            <table class="w-full text-sm text-left rtl:text-right text-blue-500 dark:text-grey-400">
                <thead class="text-xs text-blue-700 uppercase bg-blue-50 dark:bg-blue-700 dark:text-blue-400">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peso</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Altura</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imc</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">notes</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Opciones</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                @foreach($patient->appointments as $appointment)

                  <tr class="px-6 py-4 whitespace-nowrap">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $appointment->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $appointment->weight }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $appointment->height }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $appointment->imc }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $appointment->notes }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="inline-flex rounded-md shadow-xs" role="group">
                              <a href="{{ route('appointments.show', ['patient' => $patient, 'appointment' => $appointment]) }}" class="px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-blue-300 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">Ver
                              </a>
                              <form action="{{ route('appointments.destroy', ['patient' => $patient, 'appointment' => $appointment]) }}" method="POST" class="block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 text-sm font-medium text-red-600 bg-white border border-blue-300 rounded-e-lg hover:bg-red-100 hover:text-grey-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach      

            </tbody>
        </table>
    </div>
</x-layouts.app>