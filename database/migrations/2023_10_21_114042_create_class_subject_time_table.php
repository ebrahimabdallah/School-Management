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
        Schema::create('class_subject_time', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('start_time');
            $table->text('end_time');
            $table->text('room_number');
            $table->integer('subject_id');
            $table->integer('class_id');
            $table->integer('week_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_subject_time');
    }
};
