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
        Schema::create('link_template_categories', function (Blueprint $table) {
            $table->increments('category_id')->comment('カテゴリID');
            $table->string('top_category_ja_name')->comment('大カテゴリ名(日)');
            $table->string('top_category_en_name')->comment('大カテゴリ名(英)');
            $table->string('sub_category_ja_name')->comment('大カテゴリ名(日)');
            $table->string('sub_category_en_name')->comment('大カテゴリ名(英)');
            $table->tinyInteger('sort')->unsigned()->comment('並び順');
            $table->boolean('is_visible')->comment('表示フラグ');
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');
            $table->string('created_user', 20)->nullable(true)->comment('作成日時');
            $table->dateTime('modified_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
            $table->string('modified_user', 20)->nullable(true)->comment('更新者');

            //index設定
            $table->index(['is_deleted', 'is_visible', 'sort'], 'search');
        });

        DB::statement("ALTER TABLE link_template_categories COMMENT 'リンク・テンプレートカテゴリ'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
