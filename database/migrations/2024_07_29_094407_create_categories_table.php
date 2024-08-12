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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image_path')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('cascade')->nullable();
<<<<<<< HEAD
            $table->softDeletes(); // This will add the `deleted_at` column
=======
            $table->softDeletes();
>>>>>>> 2f7126ac542bb623c95ed33d667a71bc1f099ab1
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::table('categories', function (Blueprint $table) {
            $table->dropSoftDeletes(); // This will remove the `deleted_at` column
        });
    }
};
