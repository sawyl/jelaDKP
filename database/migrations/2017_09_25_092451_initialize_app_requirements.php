<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitializeAppRequirements extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //Create users table.
		Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
			$table->timestamps();
            $table->rememberToken();
        });
		//Create password resets.
		 Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
		Schema::dropIfExists('password_resets');
    }
}
