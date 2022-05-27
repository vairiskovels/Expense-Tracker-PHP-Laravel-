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
        // $type_id = [3,1,6,3,3,1,4,3,1,1,5,6,4,3,4,1,4,7,6,2,1,3,3,3,1,7,1,1,1,1,7,1,5,6,4,4,8,5,7,1,2,5,5,7,7,2,8,4,1,1];
        // $user_id = 4;
        // $names = ['Entertainment product', 'Other product', 'Clothes product', 'Entertainment product', 'Entertainment product', 'Bills product', 'Wellbeing product', 'Entertainment product', 'Bills product', 'Other product', 'Snacks product', 'Clothes product', 'Wellbeing product', 'Entertainment product', 'Wellbeing product', 'Bills product', 'Wellbeing product', 'Transport product', 'Clothes product', 'Groceries product', 'Bills product', 'Entertainment product', 'Entertainment product', 'Entertainment product', 'Bills product', 'Transport product', 'Other product', 'Bills product', 'Other product', 'Other product', 'Transport product', 'Other product', 'Snacks product', 'Clothes product', 'Wellbeing product', 'Wellbeing product', 'Other product', 'Snacks product', 'Transport product', 'Bills product', 'Groceries product', 'Snacks product', 'Snacks product', 'Transport product', 'Transport product', 'Groceries product', 'Other product', 'Wellbeing product', 'Bills product', 'Bills product'];
        // $prices = ['5.06', '2.11', '9.03', '5.68', '5.9', '2.0', '7.88', '2.81', '6.26', '6.19', '8.1', '6.9', '8.0', '3.91', '2.62', '2.26', '6.74', '3.34', '8.83', '5.36', '5.74', '4.96', '3.26', '4.09', '2.21', '5.66', '5.81', '1.44', '5.22', '3.44', '6.85', '9.14', '1.33', '1.57', '9.58', '4.16', '9.68', '6.2', '6.72', '3.55', '6.21', '5.77', '5.71', '4.29', '1.24', '3.97', '4.93', '2.9', '8.71', '7.26'];
        // $dates = ['2022-04-13', '2022-04-16', '2022-04-25', '2022-04-27', '2022-04-30', '2022-05-12', '2022-05-14', '2022-02-23', '2022-05-02', '2022-05-13', '2022-05-25', '2022-05-03', '2022-05-09', '2022-05-26', '2022-05-16', '2022-03-16', '2022-04-05', '2022-04-08', '2022-04-15', '2022-04-18', '2022-04-21', '2022-05-07', '2022-05-14', '2022-05-17', '2022-05-19', '2022-04-05', '2022-04-18', '2022-04-22', '2022-04-23', '2022-04-26', '2022-05-05', '2022-05-06', '2022-05-05', '2022-04-05', '2022-04-15', '2022-04-26', '2022-05-14', '2022-05-27', '2022-05-07', '2022-05-27', '2022-03-05', '2022-03-04', '2022-03-07', '2022-03-15', '2022-03-16', '2022-03-17', '2022-04-14', '2022-04-19', '2022-04-21', '2022-05-19'];
        $type_id = [1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7, 8, 8, 8, 8, 8];
        $user_id = 4;
        $names = ['Bills product','Bills product','Bills product','Bills product','Bills product','Groceries product','Groceries product','Groceries product','Groceries product','Groceries product','Entertainment product','Entertainment product','Entertainment product','Entertainment product','Entertainment product','Wellbeing product','Wellbeing product','Wellbeing product','Wellbeing product','Wellbeing product','Snacks product','Snacks product','Snacks product','Snacks product','Snacks product','Clothes product','Clothes product','Clothes product','Clothes product','Clothes product','Transport product','Transport product','Transport product','Transport product','Transport product','Other product','Other product','Other product','Other product','Other product'];
        $prices = [71.11, 55.66, 53.64, 53.72, 58.7, 31.05, 36.26, 39.33, 29.9, 30.92, 20.36, 21.23, 23.16, 22.4, 22.01, 19.01, 17.73, 15.97, 16.44, 15.56, 12.56, 10.43, 12.8, 10.5, 12.76, 10.14, 11.6, 13.27, 9.4, 11.97, 9.39, 11.15, 9.98, 7.69, 17.45, 7.6, 9.63, 6.6, 8.2, 8.94];
        $dates = ['2022-01-01', '2022-02-01','2022-03-01','2022-04-01','2022-05-01','2022-01-01', '2022-02-01','2022-03-01','2022-04-01','2022-05-01','2022-01-01', '2022-02-01','2022-03-01','2022-04-01','2022-05-01','2022-01-01', '2022-02-01','2022-03-01','2022-04-01','2022-05-01','2022-01-01', '2022-02-01','2022-03-01','2022-04-01','2022-05-01','2022-01-01', '2022-02-01','2022-03-01','2022-04-01','2022-05-01','2022-01-01', '2022-02-01','2022-03-01','2022-04-01','2022-05-01','2022-01-01', '2022-02-01','2022-03-01','2022-04-01','2022-05-01',];
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
