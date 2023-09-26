<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndSalesCorpsUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ind_sales_corps_users')->insert([
            'user_id'=>'1',
            'guid'=>'IND01',
            'company_id'=>'1',
            'ja_user_name'=>'独立ユーザー1',
            'en_user_name'=>'Independent User 1',
            'section'=>'sales',
            'email'=>'user1@indcomp.com',
            'phone'=>'987654321',
            'language'=>'en',
            'start_date'=>'2011-04-11',
            'end_date'=>'2011-04-11',
            'memo'=>'ja',
            'is_deleted'=>0
        ]);
        DB::table('ind_sales_corps_users')->insert([
            'user_id'=>'2',
            'guid'=>'IND02',
            'company_id'=>'2',
            'ja_user_name'=>'独立ユーザー2',
            'en_user_name'=>'Independent User 2',
            'section'=>'sales',
            'email'=>'user2@indcomp.com',
            'phone'=>'987654321',
            'language'=>'en',
            'start_date'=>'2011-04-11',
            'end_date'=>'2011-04-11',
            'memo'=>'ja',
            'is_deleted'=>0
        ]);
    }
}
