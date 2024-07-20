<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_developers', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name');
            $table->string('employee_profile');
            $table->string('employee_project_completed');
            $table->string('employee_technology');
            $table->string('employee_experience');
            $table->string('employee_experience_time');
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
        Schema::dropIfExists('employee_developers');
    }
};
