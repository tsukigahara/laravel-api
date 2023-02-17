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
        Schema::table('movies', function (Blueprint $table) {
            $table->foreignId('genre_id')->constrained('genres');
        });

        Schema::table('tags_movies', function (Blueprint $table) {
            $table->foreignId('tag_id')->constrained('tags');
            $table->foreignId('movie_id')->constrained('movies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropForeign(['genre_id']);
        });

        Schema::table('tags_movies', function (Blueprint $table) {
            $table->dropForeign(['tag_id']);
            $table->dropForeign(['movie_id']);
        });
    }
};
