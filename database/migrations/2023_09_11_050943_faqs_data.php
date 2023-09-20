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
        Schema::create('faqs_data', function (Blueprint $table) {
            $table->increments('faq_id')->comment('FAQ ID');
            $table->integer('category_id')->unsigned()->comment('カテゴリID');
            $table->integer('sort')->unsigned()->comment('並び順');
            $table->string('title', 100)->comment('タイトル');
            $table->binary('q_message')->comment('質問(Q)内容');
            $table->binary('a_message')->comment('回答(A)内容');
            $table->text('search_qa_message')->comment('検索用(QA)内容');
            $table->string('image_path1', 255)->nullable(true)->comment('添付画像パス1');
            $table->string('image_path2', 255)->nullable(true)->comment('添付画像パス2');
            $table->string('image_path3', 255)->nullable(true)->comment('添付画像パス3');
            $table->string('reference_url', 8000)->nullable(true)->comment('参考URL');
            $table->date('question_date')->comment('質問日');
            $table->date('answer_date')->comment('回答日');
            $table->string('responder', 100)->nullable(true)->comment('回答者');
            $table->tinyInteger('status')->unsigned()->nullable(true)->comment('状態');
            $table->char('language', 2)->nullable(true)->comment('言語コード');
            $table->string('display_group', 100)->nullable(true)->comment('表示グループ');
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');
            $table->string('created_user', 20)->nullable(true)->comment('作成日時');
            $table->dateTime('modified_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
            $table->string('modified_user', 20)->nullable(true)->comment('更新者');

            //primary key設定

            //index設定
            $table->index(['category_id']);
            $table->index(['sort']);
            // $table->index(['search_qa_message']);
            $table->index(['language']);
            $table->index(['display_group']);
            $table->index(['is_deleted']);
        });

        DB::statement("ALTER TABLE faqs_data COMMENT 'FAQデータ'");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
