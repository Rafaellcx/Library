<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('status', ['opened', 'closed'])->default('opened');
            $table->date('devolution_date');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('rents', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id');

            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rents', function (Blueprint $table) {
            $table->dropForeign('rents_client_id_foreign');
        });

        Schema::dropIfExists('rents');
    }
}
