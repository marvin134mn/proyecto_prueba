<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class ActiveSession extends Model
{
protected $fillable = ['user_id','session_id','ip','user_agent','last_activity'];


protected $dates = ['last_activity'];


public function user()
{
return $this->belongsTo(User::class);
}
}