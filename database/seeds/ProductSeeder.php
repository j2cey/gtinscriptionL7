<?php

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
        //Product::factory()->times(10457)->create();
        factory(Product::class, 1457)->create();
        //factory(App\Models\Product::class, 10457)->create();
    }
}
