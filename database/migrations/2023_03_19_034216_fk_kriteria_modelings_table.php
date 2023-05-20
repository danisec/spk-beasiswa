<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modelings', function (Blueprint $table) {
            $table->foreignId('id_kriteria', 'fk_kriteria')
                ->references('id_kriteria')
                ->on('kriterias')
                ->restrictOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal_id', function (Blueprint $table) {
            $table->dropForeign('fk_kriteria');
        });
    }
};
