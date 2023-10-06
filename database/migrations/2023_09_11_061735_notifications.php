<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id')->comment('お知らせID');
            $table->integer('system_id')->unsigned()->nullable(true)->comment('システムID');
            $table->integer('sort')->unsigned()->nullable(true)->comment('並び順');
            $table->string("ja_title")->comment('タイトル(日)');
            $table->longText('ja_message')->nullable(true)->comment('メッセージ(日)');
            $table->string("ja_file1")->comment('添付ファイル1(日)');
            $table->string("ja_file2")->comment('添付ファイル2(日)');
            $table->string("en_title")->comment('タイトル(英)');
            $table->longText('en_message')->nullable(true)->comment('メッセージ(英)');
            $table->string("en_file1")->comment('添付ファイル1(英)');
            $table->string("en_file2")->comment('添付ファイル2(英)');
            $table->string('display_group', 100)->comment('表示グループ');
            $table->date('start_date')->nullable(true)->comment('掲載開始日');
            $table->date('end_date')->nullable(true)->comment('掲載終了日');
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');
            $table->string('created_user', 20)->nullable(true)->comment('作成日時');
            $table->dateTime('modified_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
            $table->string('modified_user', 20)->nullable(true)->comment('更新者');

            //primary key設定

            //index設定
            $table->index(['system_id', 'sort']);
            $table->index(['start_date', 'end_date']);
            $table->index(['display_group', 'is_deleted']);
        });

        DB::statement("ALTER TABLE notifications COMMENT 'お知らせ'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
