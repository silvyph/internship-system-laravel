<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('internships_new', function (Blueprint $table) {
            if (!Schema::hasColumn('internships_new', 'mapel1')) {
                $table->string('mapel1')->nullable();
            }

            if (!Schema::hasColumn('internships_new', 'mapel2')) {
                $table->string('mapel2')->nullable();
            }

            if (!Schema::hasColumn('internships_new', 'skill_teknis')) {
                $table->string('skill_teknis')->nullable();
            }

            if (!Schema::hasColumn('internships_new', 'sertifikasi')) {
                $table->string('sertifikasi')->nullable();
            }

            if (!Schema::hasColumn('internships_new', 'proyek')) {
                $table->string('proyek')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('internships_new', function (Blueprint $table) {
            if (Schema::hasColumn('internships_new', 'proyek')) {
                $table->dropColumn('proyek');
            }

            if (Schema::hasColumn('internships_new', 'sertifikasi')) {
                $table->dropColumn('sertifikasi');
            }

            if (Schema::hasColumn('internships_new', 'skill_teknis')) {
                $table->dropColumn('skill_teknis');
            }

            if (Schema::hasColumn('internships_new', 'mapel2')) {
                $table->dropColumn('mapel2');
            }

            if (Schema::hasColumn('internships_new', 'mapel1')) {
                $table->dropColumn('mapel1');
            }
        });
    }
};