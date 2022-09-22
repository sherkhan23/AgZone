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
        Schema::create('aids_utilization_norms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('aid_components_id')->unsigned()->nullable();
            $table->foreign('aid_components_id')
                ->references('id')
                ->on('aid_components')
                ->onDelete('cascade');

            $table->bigInteger('culture_id')->unsigned()->nullable();
            $table->foreign('culture_id')
                ->references('id')
                ->on('cultures')
                ->onDelete('cascade');

            $table->bigInteger('hazard_id')->unsigned()->nullable();
            $table->foreign('hazard_id')
                ->references('id')
                ->on('hazard_objects')
                ->onDelete('cascade');

            $table->float('utilizationRate');

            $table->bigInteger('unit_of_measure_id')->unsigned()->nullable();
            $table->foreign('unit_of_measure_id')
                ->references('id')
                ->on('unit_of_measures')
                ->onDelete('cascade');

            $table->bigInteger('aids_id')->unsigned()->nullable();
            $table->foreign('aids_id')
                ->references('aids_id')
                ->on('aids')
                ->onDelete('cascade');

            $table->float('maxUtilizationRate');
            $table->float('minUtilizationRate');
            $table->text('utilizationRateComment');
            $table->integer('maxApplicationNorm');
            $table->text('applicationRules');
            $table->text('finalApplicationTerms');
            $table->integer('mechanicalWorksPostponing');
            $table->integer('manualWorksPostponing');
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
        Schema::dropIfExists('aids_utilization_norms');
    }
};
