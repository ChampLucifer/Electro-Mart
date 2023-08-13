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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('website_name');
            $table->string('website_url');
            $table->string('page_title');
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();

            $table->string('address');
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->string('email');
            $table->string('email2')->nullable();

            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();














            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
