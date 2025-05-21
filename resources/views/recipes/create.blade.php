<x-layouts.app :title="__('Crear Recetas')">
	<div class="container mx-auto px-2 py-2">
		<div class="max-w-4xl mx-auto">
			<div class="flex justify-between items-center mb-8">
	            <h1 class="text-3xl font-bold text-gray-800">Crear Nueva Receta</h1>
	            <a href="{{ route('recipes.index') }}"
	               class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-xl flex items-center">
	                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Volver
            	</a>
	    	</div>
		</div>

        <form action="{{ route('recipes.store') }}" method="POST" class="bg-white rounded-lg shadow-md p-6" >
            @csrf
        	<div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b">Información de la Receta</h2>
                <div class="mt-2">
				  <label for="mealTypes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona el tipo de comida</label>
				  <select id="mealTypes" name="meal_type_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
				  	@foreach ($mealTypes as $mealType)
				  			<option value="{{ $mealType->id }}">{{$mealType->name}}</option>
				  	@endforeach
				  </select>
				</div>

                <div class="mt-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nombre de la Receta</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Preparacion</label>
                    <textarea id="description" name="instructions" rows="3" required
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('instructions') border-red-500 @enderror">{{ old('instructions') }}</textarea>
                    @error('instructions')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
				    <h2 class="text-sm font-medium text-gray-800 mb-4 pb-2 border-b">Ingredientes</h2>

				    <div id="ingredients-container">

				        <div class="ingredient-group mb-4 p-4 border rounded-lg bg-gray-50">
				            <div class="flex flex-col md:flex-row gap-4">

				                <div class="flex-1">
				                    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
				                    <input type="text" name="ingredients[0][name]" required
				                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
				                </div>


				                <div class="w-32">
				                    <label class="block text-sm font-medium text-gray-700 mb-1">Unidad</label>
                                    <select name="ingredients[0][unit_id]" required
				                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
				                        <option value="">Seleccionar</option>
										    @foreach($units as $unit)
										        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
										    @endforeach
                                    </select>
				                </div>
				                <div class="flex items-end">
				                    <button type="button" class="remove-ingredient text-red-600 hover:text-red-800 opacity-0 pointer-events-none">
				                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
				                        </svg>
				                    </button>
				                </div>
				            </div>
				        </div>
				    </div>
				    <button type="button" id="add-ingredient" class="mt-2 flex items-center justify-center w-9 h-9 bg-green-600 hover:bg-green-600 text-white rounded-full">
				        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
				        </svg>
				    </button>
				</div>
	            <button type="submit" class="px-6 py-2 mt-4 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">Guardar Receta</button>
      		</div>
        </form>
    </div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('ingredients-container');
        const addButton = document.getElementById('add-ingredient');
        let ingredientCount = 1;

        addButton.addEventListener('click', function() {
            const newGroup = document.createElement('div');
            newGroup.className = 'ingredient-group mb-4 p-4 border rounded-lg bg-gray-50';
            newGroup.innerHTML = `
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ingrediente</label>
                        <input type="text" name="ingredients[${ingredientCount}][name]" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div class="w-32">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Unidad</label>
                        <select name="ingredients[${ingredientCount}][unit_id]" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Seleccionar</option>
                            @foreach($units as $unit)
						        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
						    @endforeach
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="button" class="remove-ingredient text-red-600 hover:text-red-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            `;

            container.appendChild(newGroup);
            ingredientCount++;


            document.querySelectorAll('.remove-ingredient').forEach(btn => {
                btn.classList.remove('opacity-0', 'pointer-events-none');
            });


            newGroup.querySelector('.remove-ingredient').addEventListener('click', function() {
                container.removeChild(newGroup);


                if (document.querySelectorAll('.ingredient-group').length === 1) {
                    document.querySelector('.remove-ingredient').classList.add('opacity-0', 'pointer-events-none');
                }
            });
        });

        const firstRemoveBtn = document.querySelector('.remove-ingredient');
        if (firstRemoveBtn && document.querySelectorAll('.ingredient-group').length === 1) {
            firstRemoveBtn.classList.add('opacity-0', 'pointer-events-none');
        }
    });
</script>
</x-layouts.app>

