<div>
    <h2 class="text-xl font-bold mb-4">Elige un Plan</h2>
    <div class="grid grid-cols-3 gap-4">
        @foreach($plans as $plan)
            <div class="p-4 border rounded shadow">
                <h3 class="font-bold">{{ $plan->name }}</h3>
                <p>Sesiones: {{ $plan->max_sessions }}</p>
                <button wire:click="$emit('selectPlan', {{ $plan->id }})"
                    class="bg-blue-500 text-white px-4 py-2 rounded mt-2">
                    Seleccionar
                </button>
            </div>
        @endforeach
    </div>
</div>
