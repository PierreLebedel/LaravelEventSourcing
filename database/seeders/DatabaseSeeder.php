<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::makeAggregate()
            ->create(
                User::factory()->make([
                    'firstname' => 'User',
                    'lastname'  => 'Test',
                    'email'     => 'test@example.com',
                ])->getAttributes()
            )
            ->persist();

        User::makeAggregate()
            ->create(
                User::factory()->make([
                    'firstname' => 'User2',
                    'lastname'  => 'Test2',
                    'email'     => 'test2@example.com',
                ])->getAttributes()
            )
            ->persist();
    }
}
