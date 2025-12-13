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
        // Ajouter la colonne 'status' à la table incomes
        Schema::table('incomes', function (Blueprint $table) {
            $table->string('status')->default('pending')->after('amount');
        });

        // Ajouter la colonne 'status' à la table expenses
        Schema::table('expenses', function (Blueprint $table) {
            $table->string('status')->default('pending')->after('amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Supprimer la colonne 'status' si on rollback
        Schema::table('incomes', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('expenses', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
