<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title_site');
            $table->string('description_site');
            $table->string('keywords_site');
            $table->date('date_end')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->string('favicon')->nullable()->default(null);
            $table->string('email');
            $table->string('analytics')->nullable()->default(null);
            $table->string('tagmanager')->nullable()->default(null);
            $table->string('whatsapp');
            $table->string('title_whatsapp');
            $table->string('whatsapp_02')->nullable()->default(null);
            $table->string('title_whatsapp_02')->nullable()->default(null);
            $table->string('whatsapp_03')->nullable()->default(null);
            $table->string('title_whatsapp_03')->nullable()->default(null);
            $table->string('whatsapp_04')->nullable()->default(null);
            $table->string('title_whatsapp_04')->nullable()->default(null);
            $table->string('whatsapp_05')->nullable()->default(null);
            $table->string('title_whatsapp_05')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('adress')->nullable()->default(null);
            $table->string('whatsapp_message');
            $table->string('facebook')->nullable()->default(null);
            $table->string('link_01')->nullable()->default(null);
            $table->string('link_02')->nullable()->default(null);
            $table->string('link_03')->nullable()->default(null);
            $table->string('link_04')->nullable()->default(null);
            $table->string('link_05')->nullable()->default(null);
            $table->string('title_link_01')->nullable()->default(null);
            $table->string('title_link_02')->nullable()->default(null);
            $table->string('title_link_03')->nullable()->default(null);
            $table->string('title_link_04')->nullable()->default(null);
            $table->string('title_link_05')->nullable()->default(null);
            $table->string('instagram');
            $table->string('predominant_color');
            $table->string('secondary_color');
            $table->string('button_color');
            $table->text('text_legal');
            $table->boolean('active_trial');
            $table->boolean('active_linkme');
            $table->boolean('active_vitrine');
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
        Schema::dropIfExists('settings');
    }
}
