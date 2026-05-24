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
        Schema::create('internships_new', function (Blueprint $table) {
            $table->id();
            $table->date('letter_date');
            $table->string('institution_name');
            $table->string('major');
            $table->foreignId('division_id')->nullable()->constrained('divisions')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('request_letter')->nullable();
            $table->string('acceptance_letter')->nullable();
            $table->string('kesbangpol_letter')->nullable();
            $table->string('documentation')->nullable();
            $table->string('name');
            $table->string('email');
            $table->text('address');
            $table->date('date_of_birth');
            $table->string('phone');
            $table->string('status')->default('Mendaftar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internships_new');
    }
};