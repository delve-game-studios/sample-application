<?php

namespace App\Migrations;

class Users extends Migration
{
    public function up()
    {
        $this->getSchema()->create('users', function ($table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->boolean('validated')->default(false);
            $table->boolean('enabled')->default(true);
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        $this->getSchema()->drop('users');
    }
}
