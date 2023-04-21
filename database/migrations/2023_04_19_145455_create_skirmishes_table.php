<?php

use App\Models\Game;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skirmishes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Game::class);
            $table->string('uuid');
            $table->string('environment_class');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skirmishes');
    }
};
