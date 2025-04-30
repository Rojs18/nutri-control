<x-layouts.app :title="__('Graficos Pacientes')">

    <h1>Monthly User Registrations</h1>
    <div style="width:75%;">
        <x-chartjs-component :chart="$chart" />
    </div>
</x-layouts.app>
