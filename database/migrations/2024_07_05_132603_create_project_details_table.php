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
        Schema::create('project_details', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->string('project_technology');
            $table->string('project_description');
            $table->string('project_duration');
            $table->date('project_start_date');
            $table->date('project_end_date');
            $table->string('project_modules');
            $table->string('project_cost');
            $table->string('total_payment');
            $table->string('project_status');
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
        Schema::dropIfExists('project_details');
    }
};
