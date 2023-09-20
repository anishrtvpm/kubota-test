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
        Schema::create('system_links_categories', function (Blueprint $table) {
            $table->increments('category_id')->unsigned()->comment('カテゴリID');
            $table->string('ja_category_name', 100)->comment('カテゴリ名(日)');
            $table->string('en_category_name', 100)->nullable(true)->comment('カテゴリ名(英)');
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');
            $table->string('created_user', 20)->nullable(true)->comment('作成日時');
            $table->dateTime('modified_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
            $table->string('modified_user', 20)->nullable(true)->comment('更新者');

            //primary key設定

            //index設定
            $table->index(['is_deleted']);
        });

        DB::statement("ALTER TABLE system_links_categories COMMENT 'システムリンクカテゴリ'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
