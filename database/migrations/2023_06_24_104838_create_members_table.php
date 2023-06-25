<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->uniqid();
            $table->string('address');
            $table->string('phone_number');
            $table->string('email');
            $table->string('date_birth');
            $table->enum('gender', ['Perempuan', 'Laki-laki']);
            $table->enum('marital_status', ['Lajang', 'Menikah', 'Janda', 'Duda']);
            $table->string('work');
            $table->string('date_joined');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('members');
    }
}
