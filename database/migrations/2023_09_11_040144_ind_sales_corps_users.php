<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Laravel\SerializableClosure\UnsignedSerializableClosure;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ind_sales_corps_users', function (Blueprint $table) {
            $table->increments('user_id')->comment('ユーザーID'); // user_id	ユーザーID
            $table->string('guid', 64)->comment('GUID'); // GUID
            $table->integer('company_id')->unsigned()->comment('company_id'); // company_id
            $table->string('ja_user_name', 100)->comment('ユーザー名(日)');
            $table->string('en_user_name', 100)->nullable(true)->comment('ユーザー名(英)');
            $table->string('section', 200)->nullable(true)->comment('部署名');
            $table->string('email', 255)->comment('メールアドレス');
            $table->string('phone', 30)->nullable(true)->comment('電話番号');
            $table->char('language', 2)->nullable(true)->comment('使用言語コード');
            $table->date('start_date')->nullable(true)->comment('有効開始日');
            $table->date('end_date')->nullable(true)->comment('有効終了日');
            $table->text('memo')->nullable(true)->comment('備考');
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');
            $table->string('created_user', 20)->nullable(true)->comment('作成日時');
            $table->dateTime('modified_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
            $table->string('modified_user', 20)->nullable(true)->comment('更新者');

            //primary key設定

            //index設定
            $table->index(['company_id', 'start_date', 'end_date', 'is_deleted'], 'search');
        });

        DB::statement("ALTER TABLE ind_sales_corps_users COMMENT '独立系販社ユーザーマスタ'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ind_sales_corps_users');
    }
};
