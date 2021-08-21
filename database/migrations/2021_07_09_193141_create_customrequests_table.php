<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customrequests', function (Blueprint $table) {
            $table->id();
            $table->string('odren');
            $table->string('oiep');
            $table->string('oschool');
            $table->string('sdren');
            $table->string('siep');
            $table->string('sschool');
            $table->string('phone');
            $table->string('email');
            $table->integer('isAccepted')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
                    ->on('users')
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
        Schema::dropIfExists('customrequests');
        Schema::table('customrequests', function(Blueprint $table) {
            $table->dropForeign('user_id_foreign');
        });
    }
}
