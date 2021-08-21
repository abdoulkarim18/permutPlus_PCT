<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ieps', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->unsignedBigInteger('dren_id');
            $table->foreign('dren_id')->references('id')
                    ->on('drens')
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
        Schema::dropIfExists('ieps');
        Schema::table('ieps', function(Blueprint $table) {
            $table->dropForeign('dren_id_foreign');
        });
    }
}
