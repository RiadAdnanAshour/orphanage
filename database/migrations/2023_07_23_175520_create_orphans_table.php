ش<?php

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
        Schema::create('orphans', function (Blueprint $table) {
            $table->id();
//            $table->string('id', 15)->primary();
            $table->string('personanName');
            $table->string('dad');
            $table->string('grandfather');
            $table->string('family');
            $table->string('mother');
//            $table->bigInteger('city_id')->unsigned()->foreignId('city_id')->references('id')->on('cities');
//            $table->bigInteger('governorate_id')->unsigned()->foreignId('governorate_id')->references('id')->on('governorates');
//            $table->bigInteger('district_id')->unsigned()->foreignId('district_id')->references('id')->on('districts');
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
            $table->foreignId('governorate_id')->constrained('governorates')->cascadeOnDelete();
            $table->foreignId('district_id')->constrained('districts')->cascadeOnDelete();
            $table->date('birthdate');
            $table->string('telephone', 10);
            $table->string('mobile', 10);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orphans');
    }
};
