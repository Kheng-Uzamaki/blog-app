<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
            [
                'name' => 'Web Design',
            ],
            [
                'name' => 'Html',
            ],
            [
                'name' => 'Javascript',
            ],
            [
                'name' => 'Css',
            ],
            [
                'name' => 'PHP',
            ],
            [
                'name' => 'Python',
            ],
            [
                'name' => 'MongoDB',
            ],
            [
                'name' => 'MySql',
            ],
            [
                'name' => 'NodeJs',
            ],
            [
                'name' => 'ReactJs',
            ],
        ];
        foreach( $data as $record ) {
            Tag::create($record);
        }
    }
}
