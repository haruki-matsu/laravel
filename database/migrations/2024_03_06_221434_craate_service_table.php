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
        if (!Schema::hasTable('service')) {
            Schema::create('service', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('line_up',40);
                $table->text('service_name',225)->unique();
                $table->decimal('price')->nullable();
                $table->text('img_pass',225);
                $table->timestamps();
            });
        }
 
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
