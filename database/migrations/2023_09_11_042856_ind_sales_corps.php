<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('ind_sales_corps', function (Blueprint $table) {
            $table->increments('company_id')->comment('会社ID');
            $table->string('company_name', 160)->comment('会社名');
            $table->string('short_name', 80)->nullable(true)->comment('略称');
            $table->string('head_name', 100)->nullable(true)->comment('代表者名');
            $table->string('address', 255)->nullable(true)->comment('所在地');
            $table->string('phone', 30)->nullable(true)->comment('電話番号');
            $table->string('url', 8000)->nullable(true)->comment('URL');
            $table->date('start_date')->nullable(true)->comment('有効開始日');
            $table->date('end_date')->nullable(true)->comment('有効終了日');
            $table->string('memo')->nullable(true)->comment('備考');
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');
            $table->string('created_user', 20)->nullable(true)->comment('作成日時');
            $table->dateTime('modified_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
            $table->string('modified_user', 20)->nullable(true)->comment('更新者');

            //primary key設定
            //index設定
            $table->index(['start_date', 'end_date', 'is_deleted'], 'search');
        });

        DB::statement("ALTER TABLE ind_sales_corps COMMENT '独立系販社マスタ'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
