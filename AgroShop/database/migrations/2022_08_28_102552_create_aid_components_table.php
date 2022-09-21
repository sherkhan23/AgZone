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
        Schema::create('aid_components', function (Blueprint $table) {
            $table->id();
            $table->string('componentName');

            $table->bigInteger('unit_of_measures_id')->unsigned()->nullable();
            $table->foreign('unit_of_measures_id')
                ->references('id')
                ->on('unit_of_measures')
                ->onDelete('cascade');

            $table->bigInteger('preparative_forms_id')->unsigned()->nullable();
            $table->foreign('preparative_forms_id')
                ->references('id')
                ->on('preparative_forms')
                ->onDelete('cascade');

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
        Schema::dropIfExists('aid_components');
    }
};
