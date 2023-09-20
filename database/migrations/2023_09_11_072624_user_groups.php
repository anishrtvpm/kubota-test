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
        Schema::create('user_groups', function (Blueprint $table) {
            $table->tinyIncrements('group_id')->unsigned()->comment('グループID');
            $table->string('group_ja_name', 100)->comment('グループ名(日)');
            $table->string('group_en_name', 100)->comment('グループ名(英)');
            $table->string('group_ja_summary', 255)->nullable()->comment('グループ概要(日)');
            $table->string('group_en_summary', 255)->nullable()->comment('グループ概要(英)');
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');
            $table->string('created_user', 20)->nullable(true)->comment('作成日時');
            $table->dateTime('modified_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
            $table->string('modified_user', 20)->nullable(true)->comment('更新者');

            //primary key設定

            //index設定
            $table->index(['is_deleted']);
        });

        DB::statement("ALTER TABLE user_groups COMMENT 'ユーザーグループ'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
