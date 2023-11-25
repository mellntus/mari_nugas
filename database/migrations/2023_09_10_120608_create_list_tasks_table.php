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
        Schema::create('list_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id');
            $table->foreign("task_id")
                ->references('uid')
                ->on('detail_tasks')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('uid')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('group_id')
                ->references('uid')
                ->on('detail_groups')
                ->onDelete('cascade');
            $table->binary('file_submitted')
                ->nullable();
            $table->timestamp('submitted_at')
                ->nullable();
            $table->timestamp('created_at')
                ->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_tasks');
    }
};
