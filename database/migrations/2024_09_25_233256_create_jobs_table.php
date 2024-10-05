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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_company')->references('id')->on('companies');
            $table->foreignId('id_recruiter')->references('id')->on('users');
            $table->string('title');
            $table->string('city');
            $table->string('state');
            $table->text('description');
            $table->decimal('salary', total: 10, places: 2);
            $table->timestamp('publish_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
