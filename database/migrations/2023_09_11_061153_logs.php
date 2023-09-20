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
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ログID');
            $table->string('user_id', 10)->comment('ユーザーID');
            $table->integer('event_id')->unsigned()->comment('イベントID');
            $table->string('message', 1000)->comment('メッセージ');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');

            //primary key設定

            //index設定
            $table->index(['created_at']);
        });

        DB::statement("ALTER TABLE logs COMMENT 'ログ'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
