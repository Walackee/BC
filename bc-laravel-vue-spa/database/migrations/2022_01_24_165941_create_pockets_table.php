<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePocketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pockets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('january')->nullable();
            $table->integer('february')->nullable();
            $table->integer('march')->nullable();
            $table->integer('april')->nullable();
            $table->integer('may')->nullable();
            $table->integer('june')->nullable();
            $table->integer('july')->nullable();
            $table->integer('august')->nullable();
            $table->integer('september')->nullable();
            $table->integer('october')->nullable();
            $table->integer('november')->nullable();
            $table->integer('december')->nullable();
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
        Schema::dropIfExists('pockets');
    }
}
