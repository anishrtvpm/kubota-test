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
        Schema::create('announcements', function (Blueprint $table) {
            $table->increments('id')->comment('アナウンスのID');
            $table->tinyInteger('group_id')->unsigned()->comment('グループID');
            $table->string('ja_message', 120)->comment('日本語メッセージ');
            $table->string('en_message', 120)->comment('英語メッセージ');
            $table->date('start_date')->nullable(true)->comment('掲載開始日');
            $table->date('end_date')->nullable(true)->comment('掲載終了日');
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');
            $table->string('created_user', 20)->nullable(true)->comment('作成日時');
            $table->dateTime('modified_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
            $table->string('modified_user', 20)->nullable(true)->comment('更新者');

            //primary key設定
            //index設定
            $table->index(['group_id', 'is_deleted']);
            $table->index(['start_date', 'end_date']);
        });

        DB::statement("ALTER TABLE announcements COMMENT 'アナウンス'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
