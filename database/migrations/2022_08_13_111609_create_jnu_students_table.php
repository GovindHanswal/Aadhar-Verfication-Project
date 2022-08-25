<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJnuStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jnu_students', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            // $table->string('username')->unique();
            $table->string('aadhaar_no')->unique()->nullable();
            $table->string('user_id')->unique()->nullable();
            $table->integer('role');
            $table->string('email')->unique();
            $table->string('mobile_no');
            // $table->string('password');
            $table->string('dob');
            $table->string('college_id');
            $table->string('father_name');
            $table->string('course');
            $table->string('gender');
            $table->string('profile_image');
            $table->string('10_marksheet');
            $table->string('12_marksheet');
            $table->string('status');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jnu_students');
    }
}
