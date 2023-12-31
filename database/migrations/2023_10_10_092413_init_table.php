<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('companies_id');
            $table->string('title');
            $table->string('contract');
            $table->text('more');
            $table->string('location');
            $table->string('salary');
            $table->timestamps();

            $table->foreign('companies_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('jobs_id');
            $table->text('message');
            $table->unsignedTinyInteger('is_accepted')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('jobs_id')->references('id')->on('jobs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('applications');
    }
};
