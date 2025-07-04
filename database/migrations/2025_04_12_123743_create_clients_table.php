<?php

use App\Models\BloodType;
use App\Models\City;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->date('birth_date');
            $table->foreignIdFor(BloodType::class)->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->date('last_donation');
            $table->foreignIdFor(City::class)->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->string('phone')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('api_token', 60)->unique()->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
