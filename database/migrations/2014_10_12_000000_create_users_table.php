<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile', 10);
            $table->string('birthday_day', 2);
            $table->string('birthday_month', 2);
            $table->string('birthday_year', 4);
            $table->string('special_spacify')->nullable();
            $table->string('special_day', 2)->nullable();
            $table->string('special_month', 2)->nullable();
            $table->string('special_year', 4)->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->text('google_address');
            $table->string('country');
            $table->string('delivery_type')->nullable();
            $table->string('name_location')->nullable();
            $table->string('villages')->nullable();
            $table->string('number_home');
            $table->string('street');
            $table->string('district');
            $table->string('area');
            $table->string('province');
            $table->string('post_code');
            $table->text('more_details')->nullable();
            $table->string('member_card')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
