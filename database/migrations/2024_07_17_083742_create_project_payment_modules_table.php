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
        Schema::create('project_payment_modules', function (Blueprint $table) {
            $table->id();
            $table->string('project_id');
            $table->string('module_no');
            $table->string('module_description');
            $table->string('project_cost');
            $table->string('module_amount');
            $table->date('module_date');
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
        Schema::dropIfExists('project_payment_modules');
    }
};
