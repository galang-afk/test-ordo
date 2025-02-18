<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();  // Auto-incrementing id field (Primary key)
            $table->string('name');  // Author's name
            $table->text('bio');  // Author's biography
            $table->date('birth_date');  // Author's birth date
            $table->timestamps();  // Timestamps (created_at and updated_at)
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('authors');  // Drop the authors table if it exists
    }
    
};
