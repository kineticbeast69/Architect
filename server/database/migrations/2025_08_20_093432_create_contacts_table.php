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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string("name", 100)->nullable(true);
            $table->string("email")->unique()->nullable(true);
            $table->string("phone_number")->nullable(true)->default("xxxxxxxxx");
            $table->string("subject", 200)->nullable(true);
            $table->text("message")->nullable(true);
            $table->dateTime("submitted_at")->useCurrent();
            $table->enum("status", ["new", "in-progress", "resolved"])->default("new");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
