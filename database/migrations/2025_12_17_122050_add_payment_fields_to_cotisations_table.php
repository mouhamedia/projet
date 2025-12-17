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
        Schema::table('cotisations', function (Blueprint $table) {
            $table->string('payment_provider')->nullable()->after('montant'); // 'wave' ou 'orange'
            $table->string('transaction_id')->nullable()->after('payment_provider');
            $table->string('status')->default('pending')->after('transaction_id'); // pending, success, failed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cotisations', function (Blueprint $table) {
            $table->dropColumn(['payment_provider', 'transaction_id', 'status']);
        });
    }
};
