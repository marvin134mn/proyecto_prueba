<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Plan;

class SubscriptionPlans extends Component
{
    public $plans;

    public function mount()
    {
        $this->plans = Plan::all();
    }

    public function render()
    {
        return view('livewire.subscription-plans');
    }
}
