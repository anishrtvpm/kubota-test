<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\IndSalesCorpsUsers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::all();
        if ($employees) {
            foreach ($employees as $employee) {
                if ($employee->is_admin) {
                    $password = 'Kub@dmin01';
                } else {
                    $password = '123456';
                }
                User::create([
                    'employee_id' => $employee->guid,
                    'email' => $employee->email,
                    'name' => $employee->en_name,
                    'password' => Hash::make($password),
                    'user_type' => 1
                ]);

            }
        }

        $indUsers = IndSalesCorpsUsers::all();
        if ($indUsers) {
            foreach ($indUsers as $indUser) {
                User::create([
                    'employee_id' => $indUser->guid,
                    'email' => $indUser->email,
                    'name' => $indUser->en_user_name,
                    'password' => Hash::make('123456'),
                    'user_type' => 2
                ]);
            }
        }
    }
}