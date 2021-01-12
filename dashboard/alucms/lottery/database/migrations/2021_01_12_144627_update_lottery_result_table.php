<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLotteryResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lottery_results', function (Blueprint $table) {
            //
            $table->string('rs_1_0')->comment('Giải nhất')->after('result_value');
            $table->string('rs_2_0')->comment('Giải nhì 1')->after('result_value');
            $table->string('rs_2_1')->comment('Giải nhì 2')->after('result_value');
            $table->string('rs_3_0')->comment('Giải ba 1')->after('result_value');
            $table->string('rs_3_1')->comment('Giải ba 2')->after('result_value');
            $table->string('rs_3_2')->comment('Giải ba 3')->after('result_value');
            $table->string('rs_3_3')->comment('Giải ba 4')->after('result_value');
            $table->string('rs_3_4')->comment('Giải ba 5')->after('result_value');
            $table->string('rs_3_5')->comment('Giải ba 6')->after('result_value');
            $table->string('rs_4_0')->comment('Giải tư 1')->after('result_value');
            $table->string('rs_4_1')->comment('Giải tư 2')->after('result_value');
            $table->string('rs_4_2')->comment('Giải tư 3')->after('result_value');
            $table->string('rs_4_3')->comment('Giải tư 4')->after('result_value');
            $table->string('rs_5_0')->comment('Giải năm 1')->after('result_value');
            $table->string('rs_5_1')->comment('Giải năm 2')->after('result_value');
            $table->string('rs_5_2')->comment('Giải năm 3')->after('result_value');
            $table->string('rs_5_3')->comment('Giải năm 4')->after('result_value');
            $table->string('rs_5_4')->comment('Giải năm 5')->after('result_value');
            $table->string('rs_5_5')->comment('Giải năm 6')->after('result_value');
            $table->string('rs_6_0')->comment('Giải sáu 1')->after('result_value');
            $table->string('rs_6_1')->comment('Giải sáu 2')->after('result_value');
            $table->string('rs_6_2')->comment('Giải sáu 3')->after('result_value');
            $table->string('rs_7_0')->comment('Giải bảy 1')->after('result_value');
            $table->string('rs_7_1')->comment('Giải bảy 2')->after('result_value');
            $table->string('rs_7_2')->comment('Giải bảy 3')->after('result_value');
            $table->string('rs_7_3')->comment('Giải bảy 4')->after('result_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lottery_results', function (Blueprint $table) {
            //
        });
    }
}
