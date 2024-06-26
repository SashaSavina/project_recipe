<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('photo', function (Blueprint $table) {
            $table->id();
            $table->text('path');
            $table->string('alt')->nullable();;
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('photo');
    }
};
