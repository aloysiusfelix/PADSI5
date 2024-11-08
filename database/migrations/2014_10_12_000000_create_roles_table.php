<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    public function up()
{
    Schema::create('roles', function (Blueprint $table) {
        $table->id('id_role'); // Primary key for roles table
        $table->string('name_role')->unique(); // Unique role name
        $table->timestamps(); // Add created_at and updated_at columns
    });
}


    public function down()
    {
        Schema::dropIfExists('roles'); // Rollback
    }
}
