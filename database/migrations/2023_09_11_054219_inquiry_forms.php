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
        Schema::create('inquiry_forms', function (Blueprint $table) {
            $table->increments('form_id')->comment('フォームID');
            $table->tinyInteger('status')->unsigned()->comment('状態');
            $table->char('language', 2)->comment('言語');
            $table->string('subject', 200)->comment('メール件名');
            $table->string('to_addr', 500)->comment('メール送信先');
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');
            $table->string('created_user', 20)->nullable(true)->comment('作成日時');
            $table->dateTime('modified_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
            $table->string('modified_user', 20)->nullable(true)->comment('更新者');

            //primary key設定

            //index設定
            $table->index(['status']);
            $table->index(['is_deleted']);
        });

        DB::statement("ALTER TABLE inquiry_forms COMMENT 'お問い合わせフォーム'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
