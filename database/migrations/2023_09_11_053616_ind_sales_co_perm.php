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
        Schema::create('ind_sales_co_perm', function (Blueprint $table) {
            $table->increments('item_id')->comment('項目ID');
            $table->integer('company_id')->unsigned()->comment('会社ID');
            $table->integer('system_category')->unsigned()->comment('システムカテゴリID');
            $table->tinyInteger('sort')->unsigned()->comment('並び順');
            $table->integer('system_id')->unsigned()->comment('システムID');
            $table->boolean('is_visible')->comment('表示フラグ');
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');
            $table->string('created_user', 20)->nullable(true)->comment('作成日時');
            $table->dateTime('modified_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
            $table->string('modified_user', 20)->nullable(true)->comment('更新者');

            //primary key設定

            //index設定
            $table->index(['company_id', 'is_visible', 'is_deleted'], 'search');
        });

        DB::statement("ALTER TABLE ind_sales_co_perm COMMENT '独立系会社権限'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
