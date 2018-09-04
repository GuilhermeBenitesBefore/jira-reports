<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BindCardWithTipoCard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->unsignedInteger('tipo_card_id');

            $table->foreign('tipo_card_id')->references('id')->on('tipo_card');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::enableForeignKeyConstraints();

        Schema::table('cards', function (Blueprint $table) {

            $table->dropForeign('cards_tipo_card_id_foreign');

            $table->dropColumn('tipo_card_id');
        });

        Schema::disableForeignKeyConstraints();

    }
}
