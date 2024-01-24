<?php

namespace Database\Seeders;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create default admin user
        $user = new User();
        $user->name = 'Admin';
        $user->username = 'a';
        $user->phone = '01234567890';
        $user->email = 'a@example.com';
        $user->password = bcrypt('a');
        $user->is_admin = 1;
        $user->save();

        // create default customer user
        $user = new User();
        $user->name = 'Admin';
        $user->username = 'admin@8901';
        $user->phone = '01234567891';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('admin$2238');
        $user->is_admin = 0;
        $user->save();

        // create subscription for customer
        $subscription = new Subscription();
        $subscription->user_id = 2;
        $subscription->package_id = 1;
        $subscription->starting_date = date('Y-m-d', strtotime('-5 days'));
        $subscription->ending_date = date('Y-m-d', strtotime($subscription->starting_date . '+30 days'));
        $subscription->save();
    }
}
