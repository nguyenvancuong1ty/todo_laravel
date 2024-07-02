<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\SexEnum;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
           $table->enum('sex', array_column(SexEnum::cases(), 'value'))->nullable(); 
           $table->string('address');
           $table->string('country');
           $table->string('district');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn('sex');
             $table->dropColumn('address');
             $table->dropColumn('country');
             $table->dropColumn('district');
        });
    }
};
