<?php

namespace Database\Seeders;

use App\Models\Title;
use Illuminate\Database\Seeder;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Title::create([
            'title' => 'Learnings',
            'link_gambar' => '/assets/img/favicon/favicon.ico',
        ]);
    }
}
