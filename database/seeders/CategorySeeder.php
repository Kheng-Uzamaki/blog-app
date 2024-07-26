<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Frontend',
            ],
            [
                'name' => 'Backend',
            ],
            [
                'name' => 'Database',
            ],
            [
                'name' => 'DevOps',
            ]
        ];
        foreach( $data as $record ) {
            Category::create($record);
        }
    }
}
