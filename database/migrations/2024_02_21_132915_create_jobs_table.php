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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('job_region');
            $table->string('company');
            $table->string('job_type');
            $table->integer('vacancy');
            $table->string('experience');
            $table->decimal('salary', 10, 2);
            $table->string('gender');
            $table->date('application_deadline');
            $table->text('jobdescription');
            $table->text('responsibilities');
            $table->text('education_experience');
            $table->text('otherbenifits');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
