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
        Schema::create('tables', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('field_1');
            $table->string('field_2');
            $table->string('field_3');
            $table->string('field_4')->nullable();
            $table->string('field_5')->nullable();
            $table->string('field_6')->nullable();
            $table->string('field_7')->nullable();
            $table->string('field_8')->nullable();
            $table->string('field_9')->nullable();
            $table->string('field_10')->nullable();
            $table->string('field_11')->nullable();
            $table->string('field_12')->nullable();
            $table->string('field_13')->nullable();
            $table->string('field_14')->nullable();
            $table->string('field_15')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
