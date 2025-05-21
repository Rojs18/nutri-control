<x-layouts.app :title="__('Recipes')">

<div class="container mx-auto px-4 py-8">

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Mis Recetas</h1>
        <a href="{{ route('recipes.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Nueva Receta
        </a>
    </div>


    <div class="mb-6 bg-white p-4 rounded-lg shadow">
        <form class="flex flex-wrap gap-4">
            <div class="w-full md:w-auto">
                <label for="meal_type" class="block text-sm font-medium text-gray-700 mb-1">Tipo de Comida</label>
                <select id="meal_type" name="meal_type" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">

                </select>
            </div>
            <div class="w-full md:w-auto">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Buscar</label>
                <input type="text" id="search" name="search" placeholder="Nombre de receta..." class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div class="w-full md:w-auto flex items-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md">
                    Filtrar
                </button>
            </div>
        </form>
    </div>
    <div class="bg-white rounded-lg overflow-hidden">
            <table class="w-full text-sm text-left rtl:text-right text-blue-500 dark:text-grey-400">
              <thead class="text-xs text-blue-700 uppercase bg-blue-50 dark:bg-blue-700 dark:text-blue-400">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id.</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo de comida</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cant. Ingredientes</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($recipes as $recipe)
                    <tr class="w-64">
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">{{ $recipe->id }}</td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">{{ $recipe->name }}</td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">{{ $recipe->mealType->name }}</td>
                        <td class="px-16 py-2 whitespace-nowrap text-sm text-gray-500">{{ $recipe->recipeIngredients->count() }}</td>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                            No hay recetas registradas
                        </td>
                    </tr>
                @endforelse
              </tbody>
            </table>
    </div>

</x-layouts.app>
