<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Plan extends Model
{
protected $fillable = [
'code','name','price_usd','duration_days','max_sessions','max_distinct_users','discount_percent_on_courses','active'
];


protected $casts = [
'price_usd' => 'decimal:2',
'active' => 'boolean'
];


public function subscriptions()
{
return $this->hasMany(Subscription::class);
}
}