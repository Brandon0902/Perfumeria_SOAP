<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = [
            [
                'name' => 'Chanel No. 5',
                'price' => 100,
                'description' => 'Fragancia floral icónica de Chanel.',
                'image' => 'https://example.com/imagenes/chanel-no-5.jpg'
            ],
            [
                'name' => 'Dolce & Gabbana Light Blue',
                'price' => 120,
                'description' => 'Fragancia fresca y vibrante con notas cítricas y de jazmín.',
                'image' => 'https://example.com/imagenes/dolce-gabbana-light-blue.jpg'
            ],
            [
                'name' => 'Gucci Bloom',
                'price' => 150,
                'description' => 'Elegante fragancia floral con notas de tuberosa y jazmín.',
                'image' => 'https://example.com/imagenes/gucci-bloom.jpg'
            ],
            [
                'name' => 'Versace Bright Crystal',
                'price' => 110,
                'description' => 'Fragancia sensual y femenina con notas frutales y florales.',
                'image' => 'https://example.com/imagenes/versace-bright-crystal.jpg'
            ],
            [
                'name' => 'Yves Saint Laurent Black Opium',
                'price' => 130,
                'description' => 'Fragancia audaz y seductora con notas de café y vainilla.',
                'image' => 'https://example.com/imagenes/yves-saint-laurent-black-opium.jpg'
            ],
            [
                'name' => 'Marc Jacobs Daisy',
                'price' => 90,
                'description' => 'Fragancia juguetona y juvenil con una mezcla de notas florales.',
                'image' => 'https://example.com/imagenes/marc-jacobs-daisy.jpg'
            ],
            [
                'name' => 'Calvin Klein Euphoria',
                'price' => 95,
                'description' => 'Fragancia sensual con notas de granada y ámbar.',
                'image' => 'https://example.com/imagenes/calvin-klein-euphoria.jpg'
            ],
            [
                'name' => 'Prada Candy',
                'price' => 125,
                'description' => 'Fragancia dulce y adictiva con notas de caramelo y almizcle.',
                'image' => 'https://example.com/imagenes/prada-candy.jpg'
            ],
            [
                'name' => 'Estée Lauder Pleasures',
                'price' => 115,
                'description' => 'Fragancia fresca y floral con una mezcla de lirios y peonías.',
                'image' => 'https://example.com/imagenes/estee-lauder-pleasures.jpg'
            ],
            [
                'name' => 'Bvlgari Omnia Crystalline',
                'price' => 140,
                'description' => 'Fragancia limpia y refrescante con notas de bambú y flor de loto.',
                'image' => 'https://example.com/imagenes/bvlgari-omnia-crystalline.jpg'
            ],
        ];

        foreach ($productos as $producto) {
            Product::create($producto);
        }
    }
}