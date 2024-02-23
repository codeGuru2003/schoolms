<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CurrencyType;
use App\Models\Gender;
use App\Models\MaritalStatus;
use App\Models\PaymentStatus;
use App\Models\Position;
use App\Models\Role;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Subject::create([
        //     'name' => 'General Mathematics',
        //     'description' => 'General Mathematics',
        //     'created_by' => 'system',
        // ]);

        // Subject::create([
        //     'name' => 'English',
        //     'description' => 'English',
        //     'created_by' => 'system',
        // ]);

        // Subject::create([
        //     'name' => 'Literature',
        //     'description' => 'Literature',
        //     'created_by' => 'system',
        // ]);

        // Subject::create([
        //     'name' => 'RME',
        //     'description' => 'Religious and Moral Education',
        //     'created_by' => 'system',
        // ]);

        // Subject::create([
        //     'name' => 'Vocabulary',
        //     'description' => 'Vocabulary',
        //     'created_by' => 'system',
        // ]);

        // Subject::create([
        //     'name' => 'General Science',
        //     'description' => 'General Science',
        //     'created_by' => 'system',
        // ]);

        // Subject::create([
        //     'name' => 'Geography',
        //     'description' => 'Geography',
        //     'created_by' => 'system',
        // ]);

        // Subject::create([
        //     'name' => 'History',
        //     'description' => 'History',
        //     'created_by' => 'system',
        // ]);

        // Subject::create([
        //     'name' => 'Civics',
        //     'description' => 'Civics',
        //     'created_by' => 'system',
        // ]);

        // Subject::create([
        //     'name' => 'Fine Arts',
        //     'description' => 'Fine Arts',
        //     'created_by' => 'system',
        // ]);

        // Subject::create([
        //     'name' => 'Physical Education',
        //     'description' => 'Physical Education',
        //     'created_by' => 'system',
        // ]);

        // Subject::create([
        //     'name' => 'Computer',
        //     'description' => 'Computer',
        //     'created_by' => 'system',
        // ]);

        // Subject::create([
        //     'name' => 'French',
        //     'description' => 'French',
        //     'created_by' => 'system',
        // ]);

        // Role::create([
        //     'name' => 'SuperAdmin',
        //     'created_by' => 'system',
        // ]);
        // Role::create([
        //     'name' => 'Admin',
        //     'created_by' => 'system',
        // ]);
        // Role::create([
        //     'name' => 'Registrar',
        //     'created_by' => 'system',
        // ]);
        // Role::create([
        //     'name' => 'Finance',
        //     'created_by' => 'system',
        // ]);
        // Role::create([
        //     'name' => 'Teacher',
        //     'created_by' => 'system',
        // ]);
        // Role::create([
        //     'name' => 'Student',
        //     'created_by' => 'system',
        // ]);

        // User::create([
        //     'name' => 'Joel Pantoe Jr',
        //     'email' => 'joelpantoejr@gmail.com',
        //     'role_id' => 1,
        //     'password' => Hash::make('P@55w0rd'),
        //     'image' => 'images\XynUq1fJTA6jD5KVYO5NQPgRdNPoJQBr5M0RePvK.jpg',
        // ]);

        // Gender::create([
        //     'name' => 'Male',
        //     'created_by' => 'SYSTEM',
        // ]);

        // Gender::create([
        //     'name' => 'Female',
        //     'created_by' => 'SYSTEM',
        // ]);

        // MaritalStatus::create([
        //     'name' => 'Divorced',
        //     'created_by' => 'SYSTEM',
        // ]);

        // MaritalStatus::create([
        //     'name' => 'Single',
        //     'created_by' => 'SYSTEM',
        // ]);

        // MaritalStatus::create([
        //     'name' => 'Married',
        //     'created_by' => 'SYSTEM',
        // ]);

        // MaritalStatus::create([
        //     'name' => 'Widow',
        //     'created_by' => 'SYSTEM',
        // ]);

        // MaritalStatus::create([
        //     'name' => 'Widower',
        //     'created_by' => 'SYSTEM',
        // ]);

        // Position::create([
        //     'name' => 'Principal',
        //     'created_by' => 'SYSTEM',
        // ]);

        // Position::create([
        //     'name' => 'Vice Principal',
        //     'created_by' => 'SYSTEM',
        // ]);

        // Position::create([
        //     'name' => 'Dean of Students',
        //     'created_by' => 'SYSTEM',
        // ]);

        // Position::create([
        //     'name' => 'Class Sponsor',
        //     'created_by' => 'SYSTEM',
        // ]);

        // Position::create([
        //     'name' => 'Teacher',
        //     'created_by' => 'SYSTEM',
        // ]);

        // Position::create([
        //     'name' => 'N/A',
        //     'created_by' => 'SYSTEM',
        // ]);

        // PaymentStatus::create([
        //     'name' => 'Pending',
        //     'created_by' => 'system'
        // ]);

        // PaymentStatus::create([
        //     'name' => 'Partially paid',
        //     'created_by' => 'system'
        // ]);

        // PaymentStatus::create([
        //     'name' => 'Paid in full',
        //     'created_by' => 'system'
        // ]);

        // CurrencyType::create([
        //     'name' => 'United States Dollars',
        //     'code' => 'USD',
        //     'created_by' => 'system'
        // ]);

        // CurrencyType::create([
        //     'name' => 'Liberian  Dollars',
        //     'code' => 'LRD',
        //     'created_by' => 'system'
        // ]);
    }
}
