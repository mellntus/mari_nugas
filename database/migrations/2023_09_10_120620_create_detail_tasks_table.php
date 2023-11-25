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
        Schema::create('detail_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')
                ->references('uid')
                ->on('detail_groups')
                ->onDelete('cascade');
            $table->text('description');
            $table->timestamp('due_data')
                ->nullable();
            $table->timestamp('created_at')
                ->useCurrent()->useCurrentOnUpdate();
            $table->binary('task_sample')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_tasks');
    }
};
