<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSecretTokenSocialAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('social_accounts', function (Blueprint $table) {
            $table->dropColumn('secret_token');
            $table->text('secret_token_enc')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('social_accounts', function (Blueprint $table) {
            $table->dropColumn('secret_token_enc');
            $table->string('secret_token')->unique();
        });
    }
}
