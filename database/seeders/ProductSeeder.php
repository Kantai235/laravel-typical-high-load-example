<?php

namespace Database\Seeders;

use App\Domains\Products\Models\Products;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Class ProductSeeder.
 */
class ProductSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->disableForeignKeys();

        $this->truncate('products');

        for ($index = 1; $index <= 10000; $index++) {
            Products::create([
                'name' => Str::random(256),
                'avatar' => 'img/product/default.png',
                'description' => Str::random(4096),
                'active' => true,
                'price' => mt_rand(100, 100000),
                'count' => mt_rand(100, 100000),
            ]);
        }

        $this->enableForeignKeys();
    }
}
