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
        Schema::table('penilaian', function (Blueprint $table) {
            $table->foreign('alternatif_id', 'fk_alternatif_id')
                ->references('id')
                ->on('alternatif')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });

        Schema::table('penilaian', function (Blueprint $table) {
            $table->foreign('ipk_id', 'fk_ipk_id')
                ->references('id')
                ->on('crips')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });

        Schema::table('penilaian', function (Blueprint $table) {
            $table->foreign('penghasilan_id', 'fk_penghasilan_id')
                ->references('id')
                ->on('crips')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });

        Schema::table('penilaian', function (Blueprint $table) {
            $table->foreign('saudara_id', 'fk_saudara_id')
                ->references('id')
                ->on('crips')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });

        Schema::table('penilaian', function (Blueprint $table) {
            $table->foreign('semester_id', 'fk_semester_id')
                ->references('id')
                ->on('crips')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });

        Schema::table('penilaian', function (Blueprint $table) {
            $table->foreign('tanggungan_id', 'fk_tanggungan_id')
                ->references('id')
                ->on('crips')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('penilaian', function (Blueprint $table) {
            $table->dropForeign('fk_alternatif_id');
        });

        Schema::table('penilaian', function (Blueprint $table) {
            $table->dropForeign('fk_crips_id');
        });
    }
};
