<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExampleRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('example_registers', function (Blueprint $table) {
            $table->id();
            $table->string('registrationID');
            $table->string('name', 100);
            $table->string('slug');
            $table->string('phone', 20)->unique();
            $table->string('email', 100)->unique();
            $table->string('university');
            $table->integer('ennovator_source')->nullable();
            $table->integer('typeof_degree')->nullable();
            $table->string('degree_level', 50)->nullable();
            $table->string('academic_year', 50)->nullable();
            $table->string('gender', 50)->nullable();
            $table->string('instagram_status', 20)->nullable();
            $table->string('linkedin_status', 20)->nullable();
            $table->string('facebook_status', 20)->nullable();
            $table->string('address');
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
        Schema::dropIfExists('example_registers');
    }
}
