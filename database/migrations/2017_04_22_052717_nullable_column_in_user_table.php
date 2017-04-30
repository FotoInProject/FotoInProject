<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NullableColumnInUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->string('province')->nullable()->change();
        $table->string('city')->nullable()->change();
        $table->string('districts')->nullable()->change();
        $table->string('address')->nullable()->change();
        $table->string('phone')->nullable()->change();
        $table->date('birthdate')->nullable()->change();
        $table->string('gender')->nullable()->change();
        $table->string('avatar')->nullable()->change();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->string('province')->change();
        $table->string('city')->change();
        $table->string('districts')->change();
        $table->string('address')->change();
        $table->string('phone')->change();
        $table->date('birthdate')->change();
        $table->string('gender')->change();
        $table->string('avatar')->change();
      });

    }
}
