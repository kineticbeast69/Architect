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
            $table->string("blog_id", 15)->unique()->nullable(); // optional custom ID
            $table->foreignId("author_id")->constrained("users")->onDelete("cascade");
            $table->string("title")->nullable();
            $table->string("slug")->unique()->nullable(); // slug is usually short
            $table->longText("description")->nullable();
            $table->boolean("updated_blog")->default(false);
            $table->enum("status", ["public", "private"])->default("private");
            $table->string("image")->nullable();
            $table->dateTime("published_at")->nullable(); // fixed
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
