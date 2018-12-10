<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtinfo2ToSiteErrorReprotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_error_report', function (Blueprint $table) {
            $table->string('ext_info_2', 800)->after('ext_info')->default('')->comment('扩展字段，根据不同需要使用');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_error_report', function (Blueprint $table) {
            $table->dropColumn('ext_info_2');
        });
    }
}
