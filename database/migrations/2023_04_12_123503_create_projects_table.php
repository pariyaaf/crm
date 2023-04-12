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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('client_id')->unsigned();
           # $table->index('client_id');
          #  $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->bigInteger('owner_id')->unsigned();
          #  $table->index('owner_id');
          #  $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');


            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
