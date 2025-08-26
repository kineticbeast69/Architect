<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable(true);
            $table->text("slug")->unique()->nullable(true);
            $table->longText("description")->nullable(true);
            $table->enum("status", ["public", "private"])->default("private");
            $table->foreignId("author_id")->constrained("users")->onDelete("cascade");
            $table->string("image")->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
