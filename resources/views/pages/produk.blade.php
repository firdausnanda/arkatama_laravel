@extends('layouts.main')

@section('konten')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Produk</li>
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
                    <h4 class="card-title">Produk</h4>
                    <p class="card-text"></p>

                    <div class="table-responsive">
                        <table id="produk" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Jenis Produk</th>
                                    <th scope="col">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk as $i)
                                    <tr class="">
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $i->nama_produk }}</td>
                                        <td>{{ $i->jenis }}</td>
                                        <td>{{ $i->harga }}</td>
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
    $('#produk').DataTable();
  });
</script>
@endsection
