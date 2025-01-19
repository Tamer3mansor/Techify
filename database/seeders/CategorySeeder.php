<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['DataBase', 'BackEnd', 'FrontEnd', 'API', 'SOLID', 'OOP'];
        foreach ($categories as $cat) {
            category::create([
                'name' => $cat,
            ]);
        }
    }
}
