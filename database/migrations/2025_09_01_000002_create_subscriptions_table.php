<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up(): void
{
Schema::create('subscriptions', function (Blueprint $table) {
$table->id();
$table->foreignId('user_id')->constrained()->onDelete('cascade');
$table->foreignId('plan_id')->constrained('plans')->onDelete('restrict');
$table->timestamp('starts_at');
$table->timestamp('ends_at')->nullable();
$table->enum('status', ['active','expired','canceled'])->default('active');
$table->string('provider')->nullable(); // paypal
$table->string('provider_subscription_id')->nullable();
$table->timestamps();
$table->index(['user_id','status']);
});
}


public function down(): void
{
Schema::dropIfExists('subscriptions');
}
};