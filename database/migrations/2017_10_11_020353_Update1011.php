<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1011 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('products', 'deleted_at')) {
            Schema::table('products', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        if (!Schema::hasColumn('products', 'shop_id')) {
            Schema::table('products', function (Blueprint $table) {
                $table->integer('shop_id')->unsigned()->nullable();
                $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade')->onUpdate('cascade');
            });
        }

        if (!Schema::hasColumn('sales', 'shop_id')) {
            Schema::table('sales', function (Blueprint $table) {
                $table->integer('shop_id')->unsigned()->nullable();
                $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade')->onUpdate('cascade');
            });
        }

        if (!Schema::hasColumn('votes', 'shop_id')) {
            Schema::table('votes', function (Blueprint $table) {
                $table->integer('shop_id')->unsigned()->nullable();
                $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade')->onUpdate('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
