<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cotisations', function (Blueprint $table) {
            $table->id();
            $table->string('nom_contributeur');
            $table->decimal('montant', 10, 2);
            $table->date('date_cotisation');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cotisations');
    }
};
