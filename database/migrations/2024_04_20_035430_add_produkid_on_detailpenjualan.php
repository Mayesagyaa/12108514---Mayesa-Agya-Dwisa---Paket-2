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
        Schema::table('detailpenjualan', function(Blueprint $table){
        $table->unsignedBigInteger ('produk_id');

        $table->foreign('produk_id')->references('id')->on('produk')->onDelete('cascade');

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
