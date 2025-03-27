<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $firstWords = array(
            "Мокрый",
            "Большой",
            "Двенадцатитрубный",
            "Милый",
            "Увесистый",
        );

        $secondWords = array(
            "башмак",
            "шар",
            "бидон",
            "канделябр",
            "пюпитр",
        );

        $thirdWords = array(
            "оверсайз",
            "XS",
            "из стекловаты",
            "ручной работы",
            "б/у",
        );

        for ($i = 0; $i < 5; $i++) {
            $name = $firstWords[rand(0,4)] . " " . $secondWords[rand(0,4)] . " " . $thirdWords[rand(0,4)];
            $product = Product::create([
                'name' => $name,
                'price' => rand(1,100) * 10,
            ]);
        }

    }
}
