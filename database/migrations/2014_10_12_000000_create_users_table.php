<?php

use Illuminate\Support\Facades\Hash;
use App\Models\User;
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
            $table->id();
            $table->string('name');
            $table->string('national_identification_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->tinyInteger('role')->default(3);
            $table->string('username')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'name' => 'Othmane Boumediane',
            'username' => 'admin',
            'email' => 'boumediane.othmane@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 1
        ]);


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
