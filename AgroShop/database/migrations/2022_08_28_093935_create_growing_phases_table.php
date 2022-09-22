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
        Schema::create('growing_phases', function (Blueprint $table) {
            $table->id();
            $table->string('growingPhasesName');
            $table->bigInteger('culture_id')->unsigned()->nullable();
            $table->foreign('culture_id')
                ->references('id')
                ->on('cultures')
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
        Schema::dropIfExists('growing_phases');
    }
};
