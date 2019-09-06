<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


            DB::table('users')->insert([
                'first_name' => 'System',
                'middle_name' => 'Administrator',
                'last_name' => 'Support',
                'phone' => 989898,
                'address' => 'Makumbusho',
                'email' => 'admin@admin.com',
                'email_verified_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'password' => \Illuminate\Support\Facades\Hash::make('admin'),
                'remember_token' => '',
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
                ]);
        }

}
