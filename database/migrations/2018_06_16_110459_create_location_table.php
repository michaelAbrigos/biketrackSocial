<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration
{
 /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'locations';

    /**
     * Run the migrations.
     * @table locations
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
            $table->unsignedInteger('device_id');
            $table->timestamps();

            $table->foreign('device_id')
                ->references('id')->on('devices')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
