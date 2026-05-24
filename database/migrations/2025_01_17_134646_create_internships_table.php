<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// CLASS NAME EKSPLISIT (biasanya tidak diperlukan untuk anonymous class)
return new class extends Migration
{
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->date('letter_date');
            $table->string('institution_name');
            $table->string('major');
            $table->integer('participant_count');
            $table->foreignId('division_id')->nullable()->constrained('divisions')->nullOnDelete();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('request_letter')->default(false);
            $table->boolean('acceptance_letter')->default(false);
            $table->boolean('kesbangpol_letter')->default(false);
            $table->string('documentation')->nullable();
            $table->string('contact_person');
            $table->boolean('accepted')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('internships');
    }
};