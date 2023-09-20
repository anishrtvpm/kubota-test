<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee = Employee::where('is_admin', 1)->first();
        User::create([
            'employee_id'=>$employee->guid,
            'email' => $employee->email,
            'name' => $employee->ja_name,
            'password' => Hash::make('Kub@dmin01')
        ]);
    }
}
