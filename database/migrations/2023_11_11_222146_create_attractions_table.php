<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attractions', function (Blueprint $table) {
            $table->id();
			
			$table->string('name', 50);
			$table->tinyinteger('age_limit');
			$table->time('start_time');
			$table->time('end_time');
			$table->tinyinteger('capacity');
			$table->string('picture', 255)->nullable();
			$table->string('etc', 30)->nullable();
			
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
        Schema::dropIfExists('attractions');
    }
};
