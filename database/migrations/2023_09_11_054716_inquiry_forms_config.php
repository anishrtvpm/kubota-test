<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\default_ca_bundle;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inquiry_forms_config', function (Blueprint $table) {
            $table->increments('item_id')->comment('項目ID');
            $table->integer('form_id')->unsigned()->comment('フォームID');
            $table->integer('sort')->unsigned()->comment('並び順');
            $table->string('item_name', 100)->comment('項目名');
            $table->string('item_type', 20)->comment('項目のタイプ');
            $table->string('select_item', 1000)->nullable(true)->comment('選択項目');
            $table->integer('max_length')->unsigned()->comment('最大長');
            $table->boolean('is_required')->default(false)->comment('必須フラグ');
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');
            $table->string('created_user', 20)->nullable(true)->comment('作成日時');
            $table->dateTime('modified_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
            $table->string('modified_user', 20)->nullable(true)->comment('更新者');

            //primary key設定
            //index設定
            $table->index(['form_id']);
            $table->index(['is_deleted']);
        });

        DB::statement("ALTER TABLE inquiry_forms_config COMMENT '問い合わせフォーム設定'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
