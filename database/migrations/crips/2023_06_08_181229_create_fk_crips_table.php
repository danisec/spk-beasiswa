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
        Schema::table('crips', function (Blueprint $table) {
            $table->foreign('kriteria_id', 'fk_kriteria_id')
                ->references('id')
                ->on('kriteria')
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
        Schema::table('crips', function (Blueprint $table) {
            $table->dropForeign('fk_kriteria_id');
        });
    }
};
