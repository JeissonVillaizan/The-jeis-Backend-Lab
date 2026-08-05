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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            //string field to store the type of the notification (project, certification, contact message, etc.)
            $table->string('type');
            //string field to store the title of the notification
            $table->string('title');
            //text field to store the message of the notification
            $table->text('message');
            //boolean field to indicate if the notification is visible or not, default is true
            $table->boolean('visibility_status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
