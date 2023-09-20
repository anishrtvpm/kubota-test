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
        Schema::create('kubota_corps', function (Blueprint $table) {
            $table->char('company_cd', 4)->comment('会社コード');
            //$table->char('company_cd')->comment('会社コード');
            $table->string('ja_name', 160)->comment('会社名(日)');
            $table->string('en_name', 80)->comment('会社名(英)');
            $table->string('short_name', 80)->nullable(true)->comment('略称');
            $table->char('country_cd', 10)->comment('国コード');
            $table->char('language', 2)->comment('言語コード');
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');
            $table->string('created_user', 20)->nullable(true)->comment('作成日時');
            $table->dateTime('modified_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
            $table->string('modified_user', 20)->nullable(true)->comment('更新者');

            //primary key設定
            $table->primary(['company_cd']);
        });

        DB::statement("ALTER TABLE kubota_corps COMMENT 'クボタ会社マスタ'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
