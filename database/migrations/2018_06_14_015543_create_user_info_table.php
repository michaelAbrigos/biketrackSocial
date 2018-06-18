<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoTable extends Migration
{
 /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'user_info';

    /**
     * Run the migrations.
     * @table user_info
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('first_name', 45)->nullable();
            $table->string('last_name', 45)->nullable();
            $table->string('birthday', 45)->nullable();
            $table->string('gender', 45)->nullable();
            $table->string('contact_number', 45)->nullable();
            $table->string('home_address', 255)->nullable();
            $table->string('avatar_url', 45)->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();


            $table->foreign('user_id')
                ->references('id')->on('users')
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
