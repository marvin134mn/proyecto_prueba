<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Tarjeta de información del plan -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-2">Mi Plan</h3>

                    @if(auth()->user()->subscription)
                    <p>Plan actual: 
                    <strong>{{ auth()->user()->subscription->plan->name }}</strong>
                    </p>
                    <p>Estado: {{ ucfirst(auth()->user()->subscription->status) }}</p>
                    <p>Válido hasta: 
                   {{ optional(auth()->user()->subscription->ends_at)->format('d/m/Y') }}
                    </p>
                    @endif
                </div>
            </div>

             <!-- Aquí insertas el componente de planes -->
            <div class="mb-6">
                <livewire:planes />
            </div>

            <!-- Aquí sigue tu dashboard normal -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("¡Bienvenido al sistema!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
