<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;

class Planes extends Component
{
    public function subscribe($planId)
    {
        $user = Auth::user();
        $plan = Plan::findOrFail($planId);

        if ($user->subscription) {
            $user->subscription->update([
                'plan_id' => $plan->id,
                'starts_at' => now(),
                'ends_at' => now()->addMonth(),
                'status' => 'active',
            ]);
        } else {
            $user->subscription()->create([
                'plan_id' => $plan->id,
                'status' => 'active',
                'starts_at' => now(),
                'ends_at' => now()->addMonth(),
            ]);
        }

        session()->flash('message', "Te has suscrito al plan {$plan->name}");
    }

    public function render()
    {
        return view('livewire.planes', [
            'planes' => Plan::all(),
        ]);
    }
}
