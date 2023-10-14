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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('user_type')->default(3);//1-admin 2-teacher 3-student 4-parnet	
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('last_name');
            $table->string('address');
            $table->integer('is_delete')->default(0);
            $table->integer('parent_id')->nullable();
            
            $table->string('job');
            $table->integer('status')->default(0); // 0:active && 1:Non
            $table->string('admission_number', 50)->nullable();
            $table->integer('roll_number')->nullable() ;
            $table->integer('class_id')->nullable() ;
            $table->string('gender', 50)->nullable() ;
            $table->date('date_of_birth')->nullable() ;
            $table->string('caste', 50)->nullable() ;
            $table->string('religion', 50)->nullable() ;
            $table->string('mobile_number', 15)->nullable();
            $table->date('admission_date')->nullable() ;
            $table->string('profile_picture', 100)->nullable() ;
            $table->string('weight', 10)->nullable() ;
            $table->string('height', 10)->nullable() ;
            $table->string('blood_group', 10)->nullable() ;
            $table->text('experience')->nullable();
            $table->text('Qualification')->nullable();
            $table->text('martial_status')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
