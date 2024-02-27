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
        Schema::table('users', function (Blueprint $table) {
            $table->string('cv')->nullable()->after('password');
            $table->string('job_title')->nullable()->after('cv');
            $table->text('bio')->nullable()->after('job_title');
            $table->string('twitter')->nullable()->after('bio');
            $table->string('facebook')->nullable()->after('twitter');
            $table->string('linkedin')->nullable()->after('facebook');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['cv', 'job_title', 'bio', 'twitter', 'facebook', 'linkedin']);
        });
    }
};
