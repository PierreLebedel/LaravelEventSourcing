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

        $userAttributes = User::factory()->makeOne([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ])->getAttributes();

        User::makeAggregate()
            ->create($userAttributes)
            ->persist();

        User::makeAggregate()
            ->create(array_merge($userAttributes, [
                'name'  => 'Test User2',
                'email' => 'test2@example.com',
            ]))
            ->persist();
    }
}
