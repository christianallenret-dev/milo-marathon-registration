<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Prompts\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table){
            $table->id();
            $table->string('full_name');
            $table->integer('age');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('phone');
            $table->string('email')->unique();
            $table->text('address');
            $table->enum('marathon_category', ['3K', '5K', '10K', '21K']);
            $table->date('registration_date');

            # Added two custom fields
            $table->string('emergency_contact');
            $table->enum('tshirt_size', ['XS', 'S', 'M', 'L', 'XL', 'XXL']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
