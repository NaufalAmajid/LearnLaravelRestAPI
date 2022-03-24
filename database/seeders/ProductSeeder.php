<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Products;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dummy = Faker::create('id_ID');

        $categories = ['Pakaian', 'Gadget', 'Digital'];
        $titles = [
            'Pakaian' => [
                'material' => ['Kaos', 'Kemaja', 'Celana', 'Jas'],
                'jenis' => ['Besar', 'Kecil', 'Anak-anak', 'Laki-laki', 'Perempuan'],
                'warna' => ['Putih', 'Merah', 'Kuning', 'Hijau', 'Biru', 'Pink', 'Ungu', 'Hitam']
            ],
            'Gadget' => [
                'material' => ['HP', 'Table', 'Laptop', 'PC', 'Mini PC'],
                'jenis' => ['Samsung', 'Asus', 'Xiaomi', 'Dell', 'Acer', 'Polytron'],
                'warna' => ['Silver', 'Gold', 'Putih', 'Hitam']
            ],
            'Digital' => [
                'material' => ['Pulsa', 'Kuota', 'Perdana'],
                'jenis' => ['Telkomsel', 'XL', 'Indosat Ooredoo', '3', 'Axis'],
                'warna' => ['100', '50', '20', '10', '5']
            ]
        ];

        for ($i=0; $i <= 100; $i++) {

            $category = $dummy->randomElement($categories);
            $titleStr = $dummy->randomElement($titles[$category]['material']);
            $titleStr .= ' ' . $dummy->randomElement($titles[$category]['jenis']);
            $titleStr .= ' ' . $dummy->randomElement($titles[$category]['warna']);

            $data[] = [
                'category'     => $category,
                'title'        => $titleStr,
                'price'        => $dummy->numberBetween(1,100) * 1000,
                'description'  => $dummy->text(),
                'stock'        => $dummy->numberBetween(1,200),
                'free_shipping'=> $dummy->numberBetween(0,1),
                'rate'         => $dummy->randomFloat(2,1,5)
            ];
        }
        (new Products())->insert($data);
    }
}
