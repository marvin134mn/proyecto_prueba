<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Plan;


class PlanSeeder extends Seeder
{
    public function run(): void
    {
    Plan::updateOrCreate(
    ['code' => 'BASIC'],
    [
    'name' => 'Básico',
    'price_usd' => 0.00,
    'duration_days' => 30,
    'max_sessions' => 1,
    'max_distinct_users' => 1,
    'discount_percent_on_courses' => 0,
    'active' => true,
    ]
);


Plan::updateOrCreate(
    ['code' => 'PREMIUM'],
    [
    'name' => 'Premium',
    'price_usd' => 15.00,
    'duration_days' => 30,
    'max_sessions' => 3,
    'max_distinct_users' => 3,
    'discount_percent_on_courses' => 20,
    'active' => true,
    ]
);


Plan::updateOrCreate(
    ['code' => 'FAMILY'],
    [
    'name' => 'Familiar',
    'price_usd' => 25.00,
    'duration_days' => 30,
    'max_sessions' => 5,
    'max_distinct_users' => 5,
    'discount_percent_on_courses' => 0,
    'active' => true,
    ]
    );
    }
}