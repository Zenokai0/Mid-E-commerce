<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('product')->insert([
            [
                'id' => 1,
                'name' => "TEN11 Umbrella",
                'price' => 8.95,
                'category' => 'Umbrella',
                'image' => 'https://zandokh.com/image/catalog/products/2025-08/2522506755/Umbraller%20Post2%20(3).jpg',
                'description' => 'Light Blue',
                'created_at' => '2025-08-18 09:14:30',
                'updated_at' => '2025-08-18 09:14:36',
            ],
            [
                'id' => 2,
                'name' => 'TEN11 Tumbler',
                'price' => 10.95,
                'category' => 'Tumbler',
                'image' => 'https://zandokh.com/image/catalog/products/2025-08/2522506759/Bilnd%20box%2002%20(3).jpg',
                'description' => 'Multicolor',
                'created_at' => '2025-08-18 09:17:20',
                'updated_at' => '2025-08-18 09:17:24',
            ],
            [
                'id' => 3,
                'name' => 'TEN11 Tumbler',
                'price' => 12.95,
                'category' => 'Tumbler',
                'image' => 'https://zandokh.com/image/catalog/products/2025-08/2522506758/TEN11%20-%20thumbler%20Blind%20Box%2002%20(3).jpg',
                'description' => 'Multicolor',
                'created_at' => '2025-08-18 22:13:42',
                'updated_at' => '2025-08-18 22:13:45',
            ],
            [
                'id' => 4,
                'name' => 'TEN11 Umbrella',
                'price' => 17.95,
                'category' => 'Umbrella',
                'image' => 'https://zandokh.com/image/catalog/products/2025-07/2522505877/ZANDO0705202523447.jpg',
                'description' => 'Beige',
                'created_at' => '2025-08-18 22:15:00',
                'updated_at' => '2025-08-18 22:15:03',
            ],
            [
                'id' => 5,
                'name' => 'Wide Leg Jeans',
                'price' => 23.59,
                'category' => 'Jean',
                'image' => 'https://zandokh.com/image/catalog/products/2024-11/2122409798/Wide-Leg-Jeans%20(4).jpg',
                'description' => 'Wide leg jean featuring side pockets with back embroidery design and front button with zipper-up fastening.100% Cotton',
                'created_at' => '2025-08-18 22:16:43',
                'updated_at' => '2025-08-18 22:16:46',
            ],
            [
                'id' => 6,
                'name' => 'Regular Fit T-Shirt With Printed',
                'price' => 13.95,
                'category' => 'T-Shirt',
                'image' => 'https://zandokh.com/image/catalog/products/2025-05/21225031245/ZANDO2605202527241.jpg',
                'description' => 'Regular fit t-shirt featuring short sleeves with two-strap-line shoulder , front with back graphic design printed and crew-neck.',
                'created_at' => '2025-08-18 22:18:07',
                'updated_at' => '2025-08-18 22:18:10',
            ],
            [
                'id' => 7,
                'name' => "Skater Fit Denim Jean Skater Fit Denim Jean Skater Fit Denim Jean",
                'price' => 22.59,
                'category' => 'Jean',
                'image' => 'https://zandokh.com/image/catalog/products/2025-01/2122411939/IMG_1576.jpg',
                'description' => 'Skater fit denim jean featuring side pockets with front button and zipper-up fastening.',
                'created_at' => '2025-08-18 22:19:47',
                'updated_at' => '2025-08-18 22:19:50',
            ],
            [
                'id' => 8,
                'name' => 'Loose Fit Shirts With Pr',
                'price' => 11.59,
                'category' => 'T-Shirt',
                'image' => 'https://zandokh.com/image/catalog/products/2024-12/2122410827/IMG_9877.jpg',
                'description' => 'Loose fit shirt featuring short sleeves with shirt collar and front graphic design printed and round neck.',
                'created_at' => '2025-08-18 22:20:44',
                'updated_at' => '2025-08-18 22:20:46',
            ],
            [
                'id' => 9,
                'name' => 'Maxi Skirt With Elastic Waistband',
                'price' => 17.95,
                'category' => 'Skirt',
                'image' => 'https://zandokh.com/image/catalog/products/2025-06/22225031380/AFTERNOON23998.jpg',
                'description' => 'Maxi skirt featuring with elastic wasitband and side stripe.',
                'created_at' => '2025-08-18 22:22:59',
                'updated_at' => '2025-08-18 22:23:01',
            ],
            [
                'id' => 10,
                'name' => 'One-sided Off Shoulder Top',
                'price' => 8.59,
                'category' => 'One-Sided',
                'image' => 'https://zandokh.com/image/catalog/products/2025-05/22225031253/ZANDO2305202526542.jpg',
                'description' => 'One-sided off shoulder top featuring embroidery printed at left chest.',
                'created_at' => '2025-08-18 22:24:02',
                'updated_at' => '2025-08-18 22:24:04',
            ],
            [
                'id' => 11,
                'name' => 'Mini Zip-Skirt',
                'price' => 16.59,
                'category' => 'Mini Zip-Skirt',
                'image' => 'https://zandokh.com/image/catalog/products/2025-04/22225031320/ZANDO2204202516858.jpg',
                'description' => 'Mini zip-skirt featuring front zipp-fastening.',
                'created_at' => '2025-08-18 22:25:26',
                'updated_at' => '2025-08-18 22:25:29',
            ],
            [
                'id' => 12,
                'name' => 'Loose Fit T-Shirts',
                'price' => 12.59,
                'category' => 'T-Shirt',
                'image' => 'https://zandokh.com/image/catalog/products/2024-11/2222410897/T-Shirt%20(6).jpg',
                'description' => 'Loose fit t-shirt featuring short sleeves with front printed on chest and round neck.',
                'created_at' => '2025-08-18 22:26:24',
                'updated_at' => '2025-08-18 22:26:27',
            ],
            [
                'id' => 13,
                'name' => 'Floral Mini Dresses',
                'price' => 17.59,
                'category' => 'Dress',
                'image' => 'https://zandokh.com/image/cache/catalog/products/2025-02/22224121142/IMG_0521-cr-450x672.jpg',
                'description' => 'Regular floral mini dress featuring short sleeves with pleats front wrap tie detail.',
                'created_at' => '2025-08-18 22:27:24',
                'updated_at' => '2025-08-18 22:27:27',
            ],
        ]);
    }
}