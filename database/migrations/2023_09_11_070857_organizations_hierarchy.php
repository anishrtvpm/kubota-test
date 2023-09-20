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
        Schema::create('organizations_hierarchy', function (Blueprint $table) {
            $table->char('company_cd', 4)->comment('会社コード');
            $table->char('section_cd', 12)->comment('所属コード');
            $table->char('branch_no', 2)->comment('枝番');
            $table->tinyInteger('depth')->unsigned()->comment('階層');
            $table->char('parent_cd', 12)->comment('親組織コード');
            $table->char('parent_branch_no', 2)->comment('親組織枝番');
            $table->string('section_name', 120)->comment('所属名');
            $table->dateTime('created_at')->useCurrent()->comment('作成日時');
            $table->string('created_user', 20)->nullable(true)->comment('作成日時');
            $table->dateTime('modified_at')->useCurrent()->useCurrentOnUpdate()->comment('更新日時');
            $table->string('modified_user', 20)->nullable(true)->comment('更新者');

            //primary key設定
            $table->primary(['company_cd', 'section_cd', 'branch_no'], 'section');
            //index設定
            $table->index(['section_name']);
        });

        DB::statement("ALTER TABLE organizations_hierarchy COMMENT '組織階層情報'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
