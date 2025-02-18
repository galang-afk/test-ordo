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
        Schema::create('books', function (Blueprint $table) {
            $table->id();  // Auto-incrementing id field (Primary key)
            $table->string('title');  // Book's title
            $table->text('description');  // Book's description
            $table->date('publish_date');  // Date of publication
            $table->foreignId('author_id')->constrained('authors')->onDelete('cascade');  // Foreign key to authors table
            $table->timestamps();  // Timestamps (created_at and updated_at)
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('books');  // Drop the books table if it exists
    }
    
};
