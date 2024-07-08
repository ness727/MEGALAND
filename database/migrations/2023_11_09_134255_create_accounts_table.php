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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
			
			$table->string('name', 30);
			$table->string('pwd', 20);
			$table->tinyinteger('age');
			$table->string('phone', 11);
			$table->integer('visit_cnt')->unsigned();
			$table->tinyinteger('grade_id');
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
        Schema::dropIfExists('accounts');
    }
};
