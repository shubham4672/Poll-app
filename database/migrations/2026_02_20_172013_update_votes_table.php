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
        Schema::table('votes', function (Blueprint $table) {
            if(!Schema::hasColumn('users', 'user_id')) {
                $table->foreignId('user_id')
                ->after('vote_count')
                ->references('id')->on('users');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('votes', function (Blueprint $table) {
            if(Schema::hasColumn('users', 'user_id')) {
                $table->dropColumn('user_id');
            }
        });
    }
};
