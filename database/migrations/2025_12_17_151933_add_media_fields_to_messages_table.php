<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécuter la migration (Ajout des colonnes).
     */
    public function up(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            // On vérifie si la colonne n'existe pas déjà avant de l'ajouter
            if (!Schema::hasColumn('messages', 'image')) {
                $table->string('image')->nullable()->after('content');
            }
            
            if (!Schema::hasColumn('messages', 'video_url')) {
                $table->string('video_url')->nullable()->after('image');
            }
        });
    }

    /**
     * Annuler la migration (Suppression des colonnes).
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn(['image', 'video_url']);
        });
    }
};