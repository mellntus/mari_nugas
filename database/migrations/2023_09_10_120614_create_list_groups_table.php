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
        Schema::create('list_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grooup_id');
            $table->foreign('group_id')
                ->references('uid')
                ->on('detail_groups')
                ->onDelete('cascade');
            $table->unsignedBigInteger('participant_id');
            $table->foreign('participant_id')
                ->references('uid')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_groups');
    }
};
