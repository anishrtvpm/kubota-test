<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('employee')->insert([
            'guid'=>'KUB01',
            'company_cd'=>'C1',
            'section_cd'=>'SEC1',
            'branch_no'=>'1',
            'ja_name'=>'superadmin',
            'email'=>'admin@kubota.com',
            'disp_section'=>'test',
            'office_name'=>'kubota',
            'start_date'=>'2011-04-11',
            'language'=>'ja',
            'is_admin'=>1,
        ]);
        DB::table('employee')->insert([
            'guid'=>'KUB02',
            'company_cd'=>'C1',
            'section_cd'=>'SEC1',
            'branch_no'=>'1',
            'ja_name'=>'user',
            'email'=>'user@kubota.com',
            'disp_section'=>'test',
            'office_name'=>'kubota',
            'start_date'=>'2012-04-11',
            'language'=>'ja',
            'is_admin'=>0,
        ]);
        DB::table('employee')->insert([
            'guid'=>'KUB03',
            'company_cd'=>'C2',
            'section_cd'=>'SEC2',
            'branch_no'=>'2',
            'ja_name'=>'user2',
            'email'=>'user2@kubota.com',
            'disp_section'=>'test',
            'office_name'=>'kubota',
            'start_date'=>'2012-10-11',
            'language'=>'ja',
            'is_admin'=>0,
        ]);
    }
}
