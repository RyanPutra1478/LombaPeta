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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // The Organizer
            $table->string('title');
            $table->text('description');
            $table->string('category')->nullable();
            $table->string('level')->nullable();
            $table->string('location')->nullable();
            $table->dateTime('deadline');
            $table->string('contact_info')->nullable();
            $table->integer('registration_fee')->default(0);
            $table->string('payment_qr_code')->nullable();
            $table->text('payment_bank_info')->nullable();
            $table->integer('credibility_score')->default(0);
            $table->string('poster')->nullable();
            $table->integer('views')->default(0);
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
