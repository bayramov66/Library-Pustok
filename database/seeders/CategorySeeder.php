<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
   public function run(){
    Category::create(['name' => 'Kateqoriya 1']);
    Category::create(['name' => 'Kateqoriya 2']);
   }
}
