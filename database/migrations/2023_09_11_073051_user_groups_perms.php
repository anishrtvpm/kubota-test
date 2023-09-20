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
        Schema::create('user_groups_perms', function (Blueprint $table) {
            $table->increments('item_id', 8)->unsigned()->comment('項目ID');
            $table->tinyInteger('group_id')->unsigned()->comment('グループID');
            $table->integer('system_category')->unsigned()->comment('システムカテゴリID');
            $table->tinyInteger('sort')->unsigned()->comment('並び順');
            $table->integer('system_id')->unsigned()->comment('システムリンクID');
            $table->boolean('is_visible')->default(false)->comment('表示フラグ');
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');
            $table->string('created_user', 20)->nullable(true)->comment('作成日時');
            $table->dateTime('modified_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
            $table->string('modified_user', 20)->nullable(true)->comment('更新者');

            //primary key設定

            //index設定
            $table->index(['group_id']);
            $table->index(['system_id']);
            $table->index(['is_deleted']);
        });

        DB::statement("ALTER TABLE user_groups_perms COMMENT 'ユーザーグループ権限'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
