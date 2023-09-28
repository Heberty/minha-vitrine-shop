<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFildsFacebookPixel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('link')->nullable();
            $table->string('image_link')->nullable();
            $table->string('availability')->default('in stock');
            $table->string('condition')->default('new');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('link');
            $table->dropColumn('image_link');
            $table->dropColumn('availability');
            $table->dropColumn('condition');
        });
    }
}
