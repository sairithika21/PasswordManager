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
        Schema::create('passwords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('website_id');
            $table->unsignedBigInteger('email_id');
            $table->string('username');
            $table->string('password');
            $table->boolean('financial')->default(false);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->unsignedBigInteger('phone_id')->nullable();
            $table->string('security_question_1')->nullable();
            $table->string('security_answer_1')->nullable();
            $table->string('security_question_2')->nullable();
            $table->string('security_answer_2')->nullable();
            $table->string('security_question_3')->nullable();
            $table->string('security_answer_3')->nullable();
            $table->integer('change_password_days')->nullable();
            $table->string('signup_with')->nullable();
            $table->string('additional_information')->nullable();
            $table->string('authenticator_app_name')->nullable();
            $table->string('recovery_codes')->nullable();
            $table->string('backup_email')->nullable();
            $table->string('receovery_information')->nullable();
            $table->string('additional_hints')->nullable();
            $table->foreign('website_id')->references('id')->on('websites');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('email_id')->references('id')->on('user_emails');
            $table->foreign('phone_id')->references('id')->on('user_mobile_numbers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passwords');
    }
};
