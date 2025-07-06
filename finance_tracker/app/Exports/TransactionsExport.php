<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\Auth;

class TransactionsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Auth::user()->transactions()->orderBy('transaction_date', 'desc')->get();
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Judul',
            'Deskripsi',
            'Kategori',
            'Tipe',
            'Jumlah',
        ];
    }

    public function map($transaction): array
    {
        return [
            $transaction->transaction_date->format('d/m/Y'),
            $transaction->title,
            $transaction->description,
            $transaction->category,
            $transaction->type == 'income' ? 'Pemasukan' : 'Pengeluaran',
            $transaction->amount,
        ];
    }
}