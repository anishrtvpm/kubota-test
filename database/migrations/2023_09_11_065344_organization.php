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
        Schema::create('organization', function (Blueprint $table) {
            $table->char('company_cd', 4)->comment('会社コード');
            $table->char('section_cd', 12)->comment('所属コード');
            $table->char('branch_no', 2)->comment('枝番');
            $table->string('ja_name', 120)->comment('所属名(日)');
            $table->string('en_name', 60)->nullable(true)->comment('所属名(英)');
            $table->tinyInteger('group_id')->unsigned()->nullable(true)->comment('ユーザーグループ');
            $table->date('start_date')->nullable(true)->comment('有効開始日');
            $table->date('end_date')->nullable(true)->comment('有効終了日');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');
            $table->string('created_user', 20)->nullable(true)->comment('作成日時');
            $table->dateTime('modified_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
            $table->string('modified_user', 20)->nullable(true)->comment('更新者');

            //primary key設定
            $table->primary(['company_cd', 'section_cd', 'branch_no'], 'section');
            //index設定
            $table->index(['start_date', 'end_date']);
        });

        DB::statement("ALTER TABLE organization COMMENT '所属情報'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
