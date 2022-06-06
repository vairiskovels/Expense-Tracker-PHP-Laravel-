<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Expense;
use Carbon\Carbon;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_id = [1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7, 7, 8, 8, 8, 8, 8, 8];
        $user_id = 4;
        $names = ['Bills product','Bills product','Bills product','Bills product','Bills product', 'Bills product', 'Groceries product','Groceries product','Groceries product','Groceries product','Groceries product', 'Groceries product', 'Entertainment product','Entertainment product','Entertainment product','Entertainment product','Entertainment product', 'Entertainment product', 'Wellbeing product','Wellbeing product','Wellbeing product','Wellbeing product','Wellbeing product','Wellbeing product', 'Snacks product','Snacks product','Snacks product','Snacks product','Snacks product','Snacks product', 'Clothes product','Clothes product','Clothes product','Clothes product','Clothes product', 'Clothes product', 'Transport product','Transport product','Transport product','Transport product','Transport product', 'Transport product', 'Other product','Other product','Other product','Other product','Other product', 'Other product'];
        $prices = [71.11, 55.66, 53.64, 53.72, 58.7, 59.2, 31.05, 36.26, 39.33, 29.9, 30.92, 35.32, 20.36, 21.23, 23.16, 22.4, 22.01, 23.1, 19.01, 17.73, 15.97, 16.44, 15.56, 17.45, 12.56, 10.43, 12.8, 10.5, 12.76, 11.67, 10.14, 11.6, 13.27, 9.4, 11.97, 10.3, 9.39, 11.15, 9.98, 7.69, 12.45, 10.3, 7.6, 9.63, 6.6, 8.2, 8.94, 9.15];
        $dates = ['2022-01-01', '2022-02-01','2022-03-01','2022-04-01','2022-05-01', '2022-06-01','2022-01-01', '2022-02-01','2022-03-01','2022-04-01','2022-05-01', '2022-06-01','2022-01-01', '2022-02-01','2022-03-01','2022-04-01','2022-05-01', '2022-06-01','2022-01-01', '2022-02-01','2022-03-01','2022-04-01','2022-05-01', '2022-06-01','2022-01-01', '2022-02-01','2022-03-01','2022-04-01','2022-05-01', '2022-06-01','2022-01-01', '2022-02-01','2022-03-01','2022-04-01','2022-05-01', '2022-06-01','2022-01-01', '2022-02-01','2022-03-01','2022-04-01','2022-05-01', '2022-06-01','2022-01-01', '2022-02-01','2022-03-01','2022-04-01','2022-05-01', '2022-06-01'];
        for ($i = 0; $i < count($type_id); $i++) {
            Expense::create([
                'type_id'   =>  $type_id[$i],
                'user_id'   =>  $user_id,
                'name'      =>  $names[$i],
                'price'     =>  $prices[$i],
                'date'      =>  Carbon::parse($dates[$i])
            ]);
        }
        
    }
}
