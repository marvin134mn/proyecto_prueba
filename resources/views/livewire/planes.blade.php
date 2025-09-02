<div class="p-6 bg-white shadow sm:rounded-lg">
    <h2 class="text-xl font-semibold mb-4">Elige tu plan</h2>

    @if(session()->has('message'))
        <div class="p-2 mb-3 text-green-700 bg-green-100 rounded">
            {{ session('message') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($planes as $plan)
            <div class="p-4 border rounded-lg @if(optional(optional(auth()->user()->subscription)->plan)->id === $plan->id) border-blue-500 @endif">
                <h3 class="text-lg font-bold">{{ $plan->name }}</h3>
                <p>Máx. sesiones: {{ $plan->max_sessions }}</p>

                @if(optional(optional(auth()->user()->subscription)->plan)->id === $plan->id)
                    <p class="mt-2 text-green-600 font-semibold">Tu plan actual</p>
                @else
                    <button wire:click="subscribe({{ $plan->id }})"
                        class="mt-2 px-3 py-1 bg-blue-600 text-white rounded">
                        Seleccionar
                    </button>
                @endif
            </div>
        @endforeach
    </div>
</div>
