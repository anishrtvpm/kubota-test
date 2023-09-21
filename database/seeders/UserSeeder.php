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
                    'name' => $employee->ja_name,
                    'password' => Hash::make($password)
                ]);

            }
        }

    }
}