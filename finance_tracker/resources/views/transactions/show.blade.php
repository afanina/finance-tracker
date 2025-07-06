@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-eye me-2"></i>Detail Transaksi</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Judul Transaksi</h6>
                            <p class="text-muted">{{ $transaction->title }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Kategori</h6>
                            <p><span class="badge bg-secondary">{{ $transaction->category }}</span></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h6>Tipe Transaksi</h6>
                            <p>
                                <span class="badge bg-{{ $transaction->type == 'income' ? 'success' : 'danger' }}">
                                    {{ $transaction->type == 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                                </span>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6>Jumlah</h6>
                            <p class="text-{{ $transaction->type == 'income' ? 'success' : 'danger' }} h5">
                                {{ $transaction->type == 'income' ? '+' : '-' }}Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h6>Tanggal Transaksi</h6>
                            <p class="text-muted">{{ $transaction->transaction_date->format('d F Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Dibuat</h6>
                            <p class="text-muted">{{ $transaction->created_at->format('d F Y H:i') }}</p>
                        </div>
                    </div>

                    @if($transaction->description)
                        <div class="row">
                            <div class="col-12">
                                <h6>Deskripsi</h6>
                                <p class="text-muted">{{ $transaction->description }}</p>
                            </div>
                        </div>
                    @endif

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                        <div>
                            <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-warning">
                                <i class="fas fa-edit me-1"></i>Edit
                            </a>
                            <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash me-1"></i>Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection