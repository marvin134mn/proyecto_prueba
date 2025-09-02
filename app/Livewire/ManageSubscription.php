<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use App\Models\Plan;

class ManageSubscription extends Component
{
    public $subscription;

    public function mount()
    {
        $this->subscription = Auth::user()->subscription;
    }

    public function changePlan($planId)
    {
        if ($this->subscription) {
            $this->subscription->update(['plan_id' => $planId]);
        } else {
            Subscription::create([
                'user_id' => Auth::id(),
                'plan_id' => $planId,
                'starts_at' => now(),
                'ends_at' => now()->addMonth(),
                'status' => 'active',
            ]);
        }

        $this->subscription = Auth::user()->fresh()->subscription;
        session()->flash('message', 'Plan cambiado con éxito.');
    }

    public function render()
    {
        return view('livewire.manage-subscription', [
            'plans' => Plan::all()
        ]);
    }
}
