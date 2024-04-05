<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('form_data', function (Blueprint $table) {
            $table->id();
            $table->string('textbox', 100); // Assuming a VARCHAR with a max length of 100
            $table->string('radiobutton');  // Assuming the radio button choice is stored as a string
            $table->json('checkbox');       // Assuming multiple checkboxes, stored as JSON
            $table->string('image')->nullable(); // The path to the image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_data');
    }
};
