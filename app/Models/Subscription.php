<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


class Subscription extends Model
{
protected $fillable = ['user_id','plan_id','starts_at','ends_at','status','provider','provider_subscription_id'];

protected $dates = ['starts_at','ends_at'];

protected $casts = [
    'current_period_start' => 'datetime',
    'current_period_end'   => 'datetime',
];


public function user()
{
return $this->belongsTo(User::class);
}


public function plan()
{
return $this->belongsTo(Plan::class);
}


public function isActive(): bool
{
return $this->status === 'active' && $this->starts_at <= now() && $this->ends_at >= now();
}


public static function createForUser(\App\Models\User $user, Plan $plan, ?string $provider = null, ?string $provider_subscription_id = null): self
{
$starts = now();
$ends = $starts->copy()->addDays($plan->duration_days);


return static::create([
'user_id' => $user->id,
'plan_id' => $plan->id,
'starts_at' => $starts,
'ends_at' => $ends,
'status' => 'active',
'provider' => $provider,
'provider_subscription_id' => $provider_subscription_id,
]);
}
}