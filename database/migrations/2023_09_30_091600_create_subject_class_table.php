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
        Schema::create('subject_class', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('class_id');
            $table->integer('subject_id');
            $table->integer('created_by');
            $table->integer('is_delete')->default(0);  //0 not delete  1 is delete
            $table->integer('status')->default(0);  
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_class');
    }
};
