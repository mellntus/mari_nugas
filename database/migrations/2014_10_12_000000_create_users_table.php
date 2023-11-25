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
            $table->string('uid')->unique();
            $table->unsignedBigInteger('roles_id');
            $table->foreign('roles_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
            $table->string('username', 100);
            $table->string('password', 100);
            $table->string('email')->unique();
            $table->timestamp('created_at')
                ->useCurrent()
                ->useCurrentOnUpdate();
            $table->string('address');
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
