<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::table('albums', function (Blueprint $table) {
            $table->dropForeign(['band_id']);

            $table->foreign('band_id')->references('id')->on('bands')->onDelete('cascade');
         });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
