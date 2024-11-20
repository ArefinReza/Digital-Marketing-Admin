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
        Schema::table('team_members', function (Blueprint $table) {
            $table->string("email")->nullable()->after('role');
            $table->string("facebookLink");
            $table->string("linkedinLink");
            $table->string("phonenumber");
            $table->string("whatsapp");
            $table->string("education");
            $table->string("skills");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->dropColumn('portfolio');
        });
    }
};
