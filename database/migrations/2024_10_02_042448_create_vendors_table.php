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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('store_name');
            $table->string('store_address');
            $table->string('store_email')->unique();
            $table->string('store_contact');
            $table->string('category');
            $table->tinyInteger('price_bracket'); // Scale of 1-3
            $table->enum('service_area', ['Island wide', 'District', 'Province']);
            $table->text('bio')->nullable();
            $table->text('description')->nullable();
            $table->json('images')->nullable(); // Store images as JSON
            $table->string('bank_account_number');
            $table->string('bank_name');
            $table->string('branch');
            $table->string('account_name');
            $table->json('open_hours')->nullable(); // Store open hours as JSON
            $table->text('terms_conditions')->nullable();
            $table->string('website_url')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
