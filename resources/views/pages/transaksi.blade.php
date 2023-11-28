@extends('layouts.main')

@section('konten')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card text-start">
                <div class="card-body">
                    <h4 class="card-title">Transaksi</h4>
                    <p class="card-text"></p>

                    <div class="table-responsive">
                        <table id="transaksi" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama User</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Tanggal Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $i)
                                    <tr class="">
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $i->user->name }}</td>
                                        <td>{{ $i->produk->nama_produk }}</td>
                                        <td>{{ $i->tgl_transaksi }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('script')
<script>
  $(document).ready(function () {
    $('#transaksi').DataTable();
  });
</script>
@endsection
