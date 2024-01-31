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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('body', 255);
			$table->foreignId('user_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
	 * rollback
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
