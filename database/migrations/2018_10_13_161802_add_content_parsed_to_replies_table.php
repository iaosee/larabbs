<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContentParsedToRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('replies', function (Blueprint $table) {
            $table->text('content_parsed')->nullable()->after('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('replies', function (Blueprint $table) {
            $table->dropColumn('content_parsed');
        });
    }
}
