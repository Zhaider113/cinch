<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('google_id')->default("");
            $table->string('apple_id')->default("");
            $table->string('first_name')->default("");
            $table->string('last_name')->default("");
            $table->string('email')->unique()->default("");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_image')->default("profile_images/default.jpg");
            $table->string('country_code')->default("");
            $table->string('phone')->default("");
            $table->string('latitude')->default("");
            $table->string('longitude')->default("");            
            $table->string('license_front_image')->default("");
            $table->string('license_back_image')->default("");
            $table->string('wallet_balance')->default("");
            $table->string('connect_account_id')->default("");
            $table->string('dob')->default("");
            $table->string('home_address')->default("");
            $table->string('gender')->default("");
            $table->string('nationality')->default("");
            $table->string('state')->default("");
            $table->string('city')->default("");
            $table->string('postal_code')->default("");
            $table->string('bank_account_name')->default("");
            $table->string('bank_name')->default("");
            $table->string('bank_account_number')->default("");
            $table->string('bic')->default("");
            $table->string('national_id_ssn')->default("");
            $table->string('device_type')->default("");
            $table->text('onesignal_id')->nullable();
            $table->string('password')->nullable();
            $table->enum('type', USER_TYPES)->default(1); 
            $table->tinyInteger('is_verified')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
