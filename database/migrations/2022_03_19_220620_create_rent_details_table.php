<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('rent_details', function (Blueprint $table) {
            $table->unsignedBigInteger('rent_id');

            $table->foreign('rent_id')->references('id')->on('rents');
        });

        Schema::table('rent_details', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id');

            $table->foreign('book_id')->references('id')->on('books');
        });

        Schema::table('rent_details', function (Blueprint $table) {
            $table->unique(['rent_id', 'book_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rent_details', function (Blueprint $table) {
            $table->dropForeign('rent_details_rent_id_foreign');
        });

        Schema::table('rent_details', function (Blueprint $table) {
            $table->dropForeign('rent_details_book_id_foreign');
        });

        Schema::dropIfExists('rent_details');
    }
}
