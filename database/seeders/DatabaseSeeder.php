<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\TableFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        \App\Models\Table::factory(300)->create();
        
        \App\Models\Type::factory(25)->create();
        
        \App\Models\Category::factory(15)->create();

        \App\Models\Subcategory::factory(15)->create();
        
        \App\Models\Product::factory(500)->create();

    }
}
