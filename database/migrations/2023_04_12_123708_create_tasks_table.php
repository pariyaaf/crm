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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('creator_id')->unsigned();;
           # $table->index('creator_id')->unsign();
       #     $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('task_for_id')->unsigned();;
           # $table->index('task_for_id');
         #   $table->foreign('task_for_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
