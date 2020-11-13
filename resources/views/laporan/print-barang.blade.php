<!DOCTYPE html>
<html>
<head>
    <title>Laporan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body onafterprint="redirect()">
    <br>
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Tanggal Masuk</th>
                    <th scope="col">Harga Barang</th>
                    <th scope="col">Stok Barang</th>
                    <th scope="col">Nama Merek</th>
                    <th scope="col">Nama Distributor</th>
                </tr>
            </thead>
             @foreach ($barang as $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item->kd_barang }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->tanggal_masuk }}</td>
                <td>{{ $item->harga_barang }}</td>
                <td>{{ $item->stok_barang }}</td>
                <td>{{ $item->merek->merek }}</td>
                <td>{{ $item->distributor->nama_distributor }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

<h6 align="right">
@php $tgl=date('d-m-Y'); @endphp
   Bogor,{{$tgl}} 
</h6>

<h6 align="right"> 
Muhammad Ridwan Pratama
</h6>
<script type="text/javascript">
    window.print();
</script>
<script type="text/javascript">
    function redirect() {
        window.location.href = '@php echo $redirect; @endphp';
    }
</script>
</html>
