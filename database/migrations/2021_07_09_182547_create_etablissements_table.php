<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtablissementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->unsignedBigInteger('iep_id');
            $table->foreign('iep_id')
                  ->references('id')
                  ->on('ieps')
                  ->cascadeOnDelete();
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
        Schema::dropIfExists('etablissements');
        Schema::table('etablissements', function(Blueprint $table) {
            $table->dropForeign('iep_id_foreign');
        });
    }
}
