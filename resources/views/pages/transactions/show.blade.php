<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>{{ $item->name }}</th>
    </tr>
    <tr>
        <th>Email</th>
        <th>{{ $item->email }}</th>
    </tr>
    <tr>
        <th>Number</th>
        <th>{{ $item->number }}</th>
    </tr>
    <tr>
        <th>Address</th>
        <th>{{ $item->address }}</th>
    </tr>
    <tr>
        <th>Total Transaction</th>
        <th>{{ $item->transaction_total }}</th>
    </tr>
    <tr>
        <th>Status Transaction</th>
        <th>{{ $item->transaction_status }}</th>
    </tr>
    <tr>
        <th>Pembelian Produk</th>
        <td>
            <table class="table table-bordered">
                <tr>
                    <th>Nama</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                </tr>
                @foreach($item->details as $detail)
                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->product->type }}</td>
                        <td>{{ $detail->product->price }}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>

<div class="row">
    <div class="col-4">
        <a href="{{ route('transactions.status', $item->id) }}?status=SUCCESS" class="btn btn-success btn-block">
            <i class="fa fa-check"></i> Set Sukses
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transactions.status', $item->id) }}?status=FAILED" class="btn btn-warning btn-block">
            <i class="fa fa-times"></i> Set Gagal
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transactions.status', $item->id) }}?status=PENDING" class="btn btn-info btn-block">
            <i class="fa fa-spinner"></i> Set Pending
        </a>
    </div>
</div>
