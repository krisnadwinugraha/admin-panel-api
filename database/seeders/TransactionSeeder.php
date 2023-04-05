<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::create([
            'name' => '5 Kg of Orange',
            'product_id' => '2',
            'qty' => '5',
            'status' => 'Paid',
            'created_at' => Carbon::now()->subYear()->startOfYear(),
        ]);

        Transaction::create([
            'name' => '6 Kg of Tomato',
            'product_id' => '2',
            'qty' => '6',
            'status' => 'Paid',
        ]);

        Transaction::create([
            'name' => '12 Kg of Orange',
            'product_id' => '2',
            'qty' => '12',
            'status' => 'Paid',
        ]);
    }
}
