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
        Schema::create('group_users', function (Blueprint $table) {
            $table->id();
            $table->string('status', 25); // aprouved , pending  i don't know why ==> to see later 
            $table->string('role', 25); // admin or simple user 
            $table->string('token',1024)->nullable();
            $table->timestamp('token_expire_date')->nullable();
            $table->timestamp('token_used')->nullable();
            $table->foreignId('user_id')->constraind('users');
            $table->foreignId('group_id')->constraind('groups');
            $table->foreignId('created_by')->constraind('users');
            $table->timestamp('created_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_users');
    }
};
