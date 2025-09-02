<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up(): void
{
Schema::create('active_sessions', function (Blueprint $table) {
$table->id();
$table->foreignId('user_id')->constrained()->onDelete('cascade');
$table->string('session_id')->unique();
$table->string('ip', 45)->nullable();
$table->string('user_agent', 512)->nullable();
$table->timestamp('last_activity');
$table->timestamps();
$table->index(['user_id','last_activity']);
});
}


public function down(): void
{
Schema::dropIfExists('active_sessions');
}
};