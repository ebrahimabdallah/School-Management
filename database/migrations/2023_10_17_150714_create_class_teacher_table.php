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
        Schema::create('class_teacher', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('teacher_id'); 
            $table->integer('class_id'); 
            $table->integer('status')->default(0); //0-active 1-non
             $table->integer('is_delete')->default(0); //0 no  1 -delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_teacher');
    }
};
