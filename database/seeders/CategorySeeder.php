<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Elektronik',
                'icon' => 'category/Elektronik.png',
                'childs' => ['Microwave', 'TV']
            ],
            [
                'name' => 'Fashion Pria',
                'icon' => 'category/Fashion-Pria.png',
                'childs' => ['Kemeja', 'Jas']
            ],
            [
                'name' => 'Fashion Wanita',
                'icon' => 'category/Fashion-Wanita.png',
                'childs' => ['Dress', 'Jas']
            ],
            [
                'name' => 'Handphone',
                'icon' => 'category/Handphone.png',
                'childs' => ['Handphone', 'Anti Gores']
            ],
            [
                'name' => 'Komputer dan Laptop',
                'icon' => 'category/Komputer-Laptop.png',
                'childs' => ['Keyboard', 'Laptop']
            ],
            [
                'name' => 'Makanan dan Minuman',
                'icon' => 'category/Makanan-Minuman.png',
                'childs' => ['Makanan', 'Minuman']
            ],
        ];

        foreach ($categories as $categoryPayload) {
            $category = Category::create([
                'slug' => \Str::slug($categoryPayload['name']),
                'name' => $categoryPayload['name'],
                'icon' => $categoryPayload['icon'],
            ]);

            foreach ($categoryPayload['childs'] as $child) {
                $category->childs()->create([
                    'slug' => \Str::slug($child),
                    'name' => $child,
                ]);
            }
        }
    }
}
