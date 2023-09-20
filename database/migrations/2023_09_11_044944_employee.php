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
        Schema::create('employee', function (Blueprint $table) {
            $table->char('guid', 10)->comment('GUID');
            $table->char('company_cd', 4)->comment('会社コード');
            $table->char('section_cd', 12)->comment('所属コード');
            $table->char('branch_no', 2)->comment('枝番');
            $table->string('ja_name', 160)->comment('氏名(日)');
            $table->string('en_dame', 80)->nullable(true)->comment('氏名(英)');
            $table->string('email', 255)->comment('メールアドレス');
            $table->string('disp_section', 500)->comment('アドレス帳組織');
            $table->char('office_cd', 2)->nullable(true)->comment('事業所コード');
            $table->string('office_name', 80)->comment('事業所名');
            $table->boolean('primary_flg')->nullable(true)->comment('主所属区分');
            $table->date('start_date')->comment('有効開始日');
            $table->date('end_date')->nullable(true)->comment('有効終了日');
            $table->char('language', 2)->comment('言語');
            $table->tinyInteger('has_special_privileges')->unsigned()->nullable(true)->comment('特別権限');
            $table->boolean('is_admin')->nullable(true)->comment('管理者フラグ');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');
            $table->string('created_user', 20)->nullable(true)->comment('作成日時');
            $table->dateTime('modified_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
            $table->string('modified_user', 20)->nullable(true)->comment('更新者');

            //primary key設定
            $table->primary(['guid', 'company_cd', 'section_cd', 'branch_no']);
            //index設定
            $table->index(['email']);
            $table->index(['start_date', 'end_date']);
        });

        DB::statement("ALTER TABLE employee COMMENT '従業員所属情報'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
