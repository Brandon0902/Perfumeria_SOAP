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
                'image' => 'https://marketinginsiderreview.com/wp-content/uploads/2021/08/chanel-cumple-100-anos-900x506.png'
            ],
            [
                'name' => 'Dolce & Gabbana Light Blue',
                'price' => 120,
                'description' => 'Fragancia fresca y vibrante con notas cítricas y de jazmín.',
                'image' => 'https://www.perfumecenter.com.mx/cdn/shop/products/737052079097_188078a2-a9a3-4167-b1d3-e2dcfc5f68a0.jpg?v=1602237800'
            ],
            [
                'name' => 'Gucci Bloom',
                'price' => 150,
                'description' => 'Elegante fragancia floral con notas de tuberosa y jazmín.',
                'image' => 'https://m.media-amazon.com/images/I/612YYmdKXXL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'name' => 'Versace Bright Crystal',
                'price' => 110,
                'description' => 'Fragancia sensual y femenina con notas frutales y florales.',
                'image' => 'https://www.costco.com.mx/medias/sys_master/products/h3d/h8f/11022042431518.jpg'
            ],
            [
                'name' => 'Yves Saint Laurent Black Opium',
                'price' => 130,
                'description' => 'Fragancia audaz y seductora con notas de café y vainilla.',
                'image' => 'https://www.kreiconceptstore.com/media/catalog/product/b/l/black-opium-edp_qttwj9qmykjbzyyl.jpg?optimize=medium&bg-color=255,255,255&fit=bounds&height=1000&width=1250&canvas=1250:1000'
            ],
            [
                'name' => 'Marc Jacobs Daisy',
                'price' => 90,
                'description' => 'Fragancia juguetona y juvenil con una mezcla de notas florales.',
                'image' => 'https://static.beautytocare.com/media/catalog/product/m/a/marc-jacobs-daisy-ever-so-fresh-eau-de-parfum-125ml_1.jpg'
            ],
            [
                'name' => 'Calvin Klein Euphoria',
                'price' => 95,
                'description' => 'Fragancia sensual con notas de granada y ámbar.',
                'image' => 'https://www.perfumecenter.com.mx/cdn/shop/products/088300178278_e4ab8fe1-8e85-415b-ada4-cfc6d6d2337a_800x.jpg?v=1602237222'
            ],
            [
                'name' => 'Prada Candy',
                'price' => 125,
                'description' => 'Fragancia dulce y adictiva con notas de caramelo y almizcle.',
                'image' => 'https://resources.claroshop.com/medios-plazavip/mkt/614e4543e049b_candynight1jpg.jpg'
            ],
            [
                'name' => 'Estée Lauder Pleasures',
                'price' => 115,
                'description' => 'Fragancia fresca y floral con una mezcla de lirios y peonías.',
                'image' => 'https://http2.mlstatic.com/D_NQ_NP_769733-MLU70065252019_062023-O.webp'
            ],
            [
                'name' => 'Bvlgari Omnia Crystalline',
                'price' => 140,
                'description' => 'Fragancia limpia y refrescante con notas de bambú y flor de loto.',
                'image' => 'https://lubie.com.mx/cdn/shop/products/1a60e54af72af655ff16894fb07e311a.jpg?v=1631734700'
            ],
        ];

        foreach ($productos as $producto) {
            Product::create($producto);
        }
    }
}