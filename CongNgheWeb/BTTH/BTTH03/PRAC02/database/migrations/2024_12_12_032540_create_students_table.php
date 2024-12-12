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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("class_id");
            $table->foreign("class_id")->references("id")->on("classes")->onDelete('cascade');
            $table->string("first_name");
            $table->string("last_name");
            $table->timestamp("date_of_birth");
            $table->string("parent_phone");
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
