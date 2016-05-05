<?php namespace JC\Flogic\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateProcuresTable extends Migration
{

    public function up()
    {
        Schema::create('jc_flogic_procures', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jc_flogic_procures');
    }

}
