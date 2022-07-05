<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->nullable();
            $table->string('login_id')->nullable();
            $table->string('emp_code')->nullable();
            $table->bigInteger('emp_id')->nullable();
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->enum('gender', ['Male', 'female','others'])->nullable();
            $table->string('profile_img')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->bigInteger('user_type');
            $table->bigInteger('designation_id');
            $table->bigInteger('branch_id')->nullable();
            $table->string('pb_code')->nullable();
            $table->bigInteger('land_line')->nullable();
            $table->string('ip')->nullable();
            $table->DateTime('date_of_joining')->nullable();
            $table->DateTime('date_of_resign')->nullable();
            $table->DateTime('date_of_transfer')->nullable();
            $table->enum('is_resign', ['Yes', 'No'])->nullable();
            $table->string('andriod_push_id')->nullable();
            $table->string('apple_push_id')->nullable();
            $table->DateTime('last_login_time')->nullable();
            $table->enum('is_new_user', ['Yes', 'No'])->nullable();
            $table->DateTime('last_change_password_date')->nullable();
            $table->string('token')->nullable();
            $table->bigInteger('is_live')->nullable();
            $table->smallInteger('tmp_key')->nullable();
            $table->string('device_id')->nullable();
            $table->string('paralled_to')->nullable();
            $table->enum('email_verfication_status', ['verified', 'Not-Verified'])->nullable();
            $table->string('activation_code')->nullable();
            $table->smallInteger('status')->nullable();
            $table->text('comments')->nullable();
            $table->string('finger_print_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
