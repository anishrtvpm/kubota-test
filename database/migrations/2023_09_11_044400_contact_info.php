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
        Schema::create('contact_info', function (Blueprint $table) {
            $table->increments('item_id')->comment('項目ID');
            $table->tinyInteger('group_id')->unsigned()->comment('ユーザーグループID');
            //$table->integer('group_id')->unsigned()->comment('ユーザーグループID');
            $table->string('ja_message', 1000)->comment('日本語メッセージ');
            $table->string('en_message', 1000)->comment('英語メッセージ');
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');
            $table->string('created_user', 20)->nullable(true)->comment('作成日時');
            $table->dateTime('modified_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
            $table->string('modified_user', 20)->nullable(true)->comment('更新者');

            //primary key設定

            //index設定
            $table->index(['group_id', 'is_deleted']);
        });

        DB::statement("ALTER TABLE contact_info COMMENT 'お問い合わせ先情報'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
