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
        Schema::create('weddings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('bride');
            $table->string('groom');
            $table->date('date');
            $table->time('time_from');
            $table->time('time_to');
            $table->string('venue');
            $table->integer('number_of_guests');
            $table->string('contact_person_name');
            $table->string('contact_person_mobile');
            $table->string('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weddings');
    }
};
