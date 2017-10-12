<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1012 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('shops', 'image_cover')) {
            Schema::table('shops', function (Blueprint $table) {
                $table->string('image_cover')->nullable();
            });
        }

        if (!Schema::hasColumn('shops', 'description')) {
            Schema::table('shops', function (Blueprint $table) {
                $table->string('description')->nullable();
            });
        }

        if (!Schema::hasColumn('shops', 'address')) {
            Schema::table('shops', function (Blueprint $table) {
                $table->string('address')->nullable();
            });
        }

        if (!Schema::hasColumn('shops', 'coordinate')) {
            Schema::table('shops', function (Blueprint $table) {
                $table->string('coordinate')->nullable();
            });
        }

        Schema::table('product_categories', function (Blueprint $table) {
            $table->integer('admin_id')->unsigned()->nullable()->change();
        });

        if (!Schema::hasColumn('product_categories', 'shop_id')) {
            Schema::table('product_categories', function (Blueprint $table) {
                $table->integer('shop_id')->unsigned()->nullable();
                $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade')->onUpdate('cascade');
            });
        }

        if (!Schema::hasColumn('product_categories', 'user_id')) {
            Schema::table('product_categories', function (Blueprint $table) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            });
        }

        if (!Schema::hasColumn('products', 'user_id')) {
            Schema::table('products', function (Blueprint $table) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            });
        }

        if (!Schema::hasColumn('sales', 'shop_id')) {
            Schema::table('sales', function (Blueprint $table) {
                $table->integer('shop_id')->unsigned()->nullable();
                $table->foreign('shop_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
