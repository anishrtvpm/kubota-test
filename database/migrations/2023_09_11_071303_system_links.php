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
        Schema::create('system_links', function (Blueprint $table) {
            $table->increments('system_id')->unsigned()->comment('システムID');
            $table->integer('category_id')->unsigned()->comment('カテゴリID');
            $table->tinyInteger('sort')->unsigned()->comment('並び順');
            $table->string('ja_system_name', 100)->comment('システム名(日)');
            $table->string('en_system_name', 100)->nullable(true)->comment('システム名(英)');
            $table->string('ja_url', 8000)->nullable(true)->comment('URL(日)');
            $table->string('en_url', 8000)->nullable(true)->comment('URL(英)');
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');
            $table->string('created_user', 20)->nullable(true)->comment('作成日時');
            $table->dateTime('modified_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
            $table->string('modified_user', 20)->nullable(true)->comment('更新者');

            //primary key設定

            //index設定
            $table->index(['is_deleted']);
        });

        DB::statement("ALTER TABLE system_links COMMENT 'システムリンク'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
