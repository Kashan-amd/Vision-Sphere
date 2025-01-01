<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('loyalty_points')->default(0);
        });
    
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('points_earned')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('loyalty_points');
        });
    
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('points_earned');
        });
    }
    
};
