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
        Schema::create('detail_groups', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->string('title');
            $table->string('description');
            $table->timestamp('created_at')
                ->useCurrent()->useCurrentOnUpdate();
            $table->string('owner_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_groups');
    }
};
