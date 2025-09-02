<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up(): void
{
Schema::create('plans', function (Blueprint $table) {
$table->id();
$table->string('code')->unique(); // BASIC, PREMIUM, FAMILY
$table->string('name');
$table->decimal('price_usd', 8, 2)->default(0.00);
$table->smallInteger('duration_days')->default(30);
$table->smallInteger('max_sessions')->default(1);
$table->unsignedTinyInteger('max_distinct_users')->default(1); // para FAMILY permite 5
$table->unsignedTinyInteger('discount_percent_on_courses')->default(0);
$table->boolean('active')->default(true);
$table->timestamps();
});
}


public function down(): void
{
Schema::dropIfExists('plans');
}
};