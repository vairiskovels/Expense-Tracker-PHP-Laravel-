<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name'     => 'Bills', 'icon_name' => 'fa-file-invoice-dollar', 'color_id'  => 1],
            ['name'     => 'Groceries', 'icon_name' => 'fa-basket-shopping', 'color_id'  => 2],
            ['name'     => 'Entertainment', 'icon_name' => 'fa-film', 'color_id'  => 3],
            ['name'     => 'Wellbeing', 'icon_name' => 'fa-staff-aesculapius', 'color_id'  => 4],
            ['name'     => 'Snacks', 'icon_name'    => 'fa-burger', 'color_id'  => 5],
            ['name'     => 'Clothes', 'icon_name'   => 'fa-shirt', 'color_id'  => 6],
            ['name'     => 'Transport', 'icon_name' => 'fa-bus', 'color_id'  => 7],
            ['name'     => 'Other', 'icon_name' => 'fa-universal-access', 'color_id'  => 8],
        ];
        
        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
