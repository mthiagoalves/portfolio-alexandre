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
        Schema::create('homepage_content', function (Blueprint $table) {
            $table->id();
            $table->text('occupation', 150);
            $table->longText('first_text');
            $table->longText('second_text');
            $table->longText('text_footer');
            $table->string('email', 100);
            $table->string('phone', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_content');
    }
};
