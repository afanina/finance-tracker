<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        
        if ($user) {
            $transactions = [
                [
                    'title' => 'Gaji Bulan Ini',
                    'description' => 'Gaji bulanan dari perusahaan',
                    'amount' => 5000000,
                    'type' => 'income',
                    'category' => 'Gaji',
                    'transaction_date' => now()->subDays(1),
                ],
                [
                    'title' => 'Belanja Groceries',
                    'description' => 'Belanja bahan makanan di supermarket',
                    'amount' => 250000,
                    'type' => 'expense',
                    'category' => 'Makanan',
                    'transaction_date' => now()->subDays(2),
                ],
                [
                    'title' => 'Ongkos Transportasi',
                    'description' => 'Biaya transportasi ke kantor',
                    'amount' => 50000,
                    'type' => 'expense',
                    'category' => 'Transportasi',
                    'transaction_date' => now()->subDays(3),
                ],
                [
                    'title' => 'Bonus Proyek',
                    'description' => 'Bonus dari penyelesaian proyek',
                    'amount' => 1000000,
                    'type' => 'income',
                    'category' => 'Bonus',
                    'transaction_date' => now()->subDays(5),
                ],
                [
                    'title' => 'Tagihan Listrik',
                    'description' => 'Pembayaran tagihan listrik bulanan',
                    'amount' => 150000,
                    'type' => 'expense',
                    'category' => 'Tagihan',
                    'transaction_date' => now()->subDays(7),
                ],
            ];

            foreach ($transactions as $transaction) {
                $user->transactions()->create($transaction);
            }
        }
    }
}