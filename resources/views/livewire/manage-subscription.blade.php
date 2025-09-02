<div>
    <h2 class="text-xl font-bold mb-4">Tu Suscripción</h2>

    @if($subscription)
        <p>Plan actual: <strong>{{ $subscription->plan->name }}</strong></p>
        <p>Expira: {{ $subscription->ends_at }}</p>
    @else
        <p>No tienes un plan activo.</p>
    @endif

    <h3 class="mt-4 font-bold">Cambiar de Plan</h3>
    <div class="grid grid-cols-3 gap-4 mt-2">
        @foreach($plans as $plan)
            <div class="p-4 border rounded shadow">
                <h3 class="font-bold">{{ $plan->name }}</h3>
                <button wire:click="changePlan({{ $plan->id }})"
                    class="bg-green-500 text-white px-4 py-2 rounded mt-2">
                    Seleccionar
                </button>
            </div>
        @endforeach
    </div>

    @if (session()->has('message'))
        <div class="mt-3 text-green-600">
            {{ session('message') }}
        </div>
    @endif
</div>
