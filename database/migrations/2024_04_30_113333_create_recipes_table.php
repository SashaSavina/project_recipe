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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->LONGTEXT('ingredients');
            $table->LONGTEXT('cooking_steps');
            $table->timestamp('cooking_time')->default('2024-05-01 10:00:00');
            $table->bigInteger('subcategories_id')->unsigned();
            $table->foreign('subcategories_id')->references('id')->on('subcategories');
            $table->bigInteger('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            $table->integer('likes_counter')->default(0);
            $table->bigInteger('photo_id')->nullable()->unsigned();
            $table->foreign('photo_id')->references('id')->on('photo');
            $table->boolean('activity')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
