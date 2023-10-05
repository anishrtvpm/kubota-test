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
        Schema::create('link_template_data', function (Blueprint $table) {
            $table->increments('item_id')->comment('アイテムID');
            $table->integer('category_id')->unsigned()->comment('カテゴリID');
            $table->tinyInteger('sort')->unsigned()->comment('並び順');
            $table->string('title', 200)->comment('タイトル');
            $table->string('url', 8000)->nullable(true)->comment('URL');
            $table->text('message')->nullable(true)->comment('説明文');
            $table->string('file_path', 255)->nullable(true)->comment('添付ファイルパス');
            $table->string('file_name', 255)->nullable(true)->comment('ファイル名');
            $table->char('language', 2)->nullable(true)->comment('言語');
            $table->string('display_group', 100)->comment('表示グループ');
            $table->date('start_date')->comment('掲載開始日');
            $table->date('end_date')->comment('掲載終了日');
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');
            $table->string('created_user', 20)->nullable(true)->comment('作成日時');
            $table->dateTime('modified_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
            $table->string('modified_user', 20)->nullable(true)->comment('更新者');

            //primary key設定

            //index設定
            $table->index(['kind', 'category_id']);
            $table->index(['start_date', 'end_date'], 'date');
            $table->index(['is_deleted', 'display_group']);
        });

        DB::statement("ALTER TABLE link_template_data COMMENT 'リンク・テンプレートデータ'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
