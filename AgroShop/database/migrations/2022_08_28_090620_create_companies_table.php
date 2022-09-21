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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->text('LegalName')->nullable();
            $table->boolean('validated')->nullable();
            $table->boolean('blocked')->nullable();
            $table->bigInteger('LegalEntityForms_id')->unsigned()->nullable();
            $table->foreign('LegalEntityForms_id')
                ->references('id')
                ->on('LegalEntityForms')
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
        Schema::dropIfExists('companies');
    }
};
