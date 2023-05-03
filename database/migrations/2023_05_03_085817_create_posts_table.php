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
        Schema::create('posts', function (Blueprint $table) {
            $table->id()->from(1000);
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('titre')->unique();
            $table->string('slug')->unique();
            $table->text('excerpt')
                ->comment('résumé du poste');
            $table->longText('description');
            $table->boolean('est_publie')->default(false);
            $table->integer('min_a_lire')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
