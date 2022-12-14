<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_process', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Post::class);   // `post_id`
            $table->foreignIdFor(\App\Models\Process::class);    // `process_id`
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_process');
    }
};
