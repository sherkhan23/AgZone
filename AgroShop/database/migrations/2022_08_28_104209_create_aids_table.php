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
        Schema::create('aids', function (Blueprint $table) {
            $table->id('aids_id');
            $table->string('aidName');

            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');


            $table->bigInteger('preparative_forms_id')->unsigned()->nullable();
            $table->foreign('preparative_forms_id')
                ->references('id')
                ->on('preparative_forms')
                ->onDelete('cascade');

            $table->bigInteger('aid_components_id')->unsigned()->nullable();
            $table->foreign('aid_components_id')
                ->references('id')
                ->on('aid_components')
                ->onDelete('cascade');


            $table->text('packs')->nullable();

            $table->bigInteger('producer_id')->unsigned()->nullable();
            $table->foreign('producer_id')
                ->references('id')
                ->on('producers')
                ->onDelete('cascade');

            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');

            $table->date('registrationEndDate');
            $table->integer('aidPrice');

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
        Schema::dropIfExists('aids');
    }
};
