@extends('layouts.main')

@section('content')
<section class="section" id="home">
    <div class="container text-center">
        <h6 class="display-4">List Monitoring Invoice</h6>
        <p class="has-line"></p>
        {{-- <button type="button" class="btn btn-primary btn-sm mb-5 pb-2" data-toggle="modal" data-target="#exportModal">
            <i class="fas fa-file-export"></i> Export Data
        </button> --}}
        

        <div class="container">
            <table id="dttable" class="table table-stripeds">
                <thead>
                    <tr>
                        <th class="text-center">Identifikasi Invoice</th>
                        <th class="text-center">Nama Perusahaan</th>
                        <th class="text-center">Nominal</th>
                        <th class="text-center">Resepsionis Terima</th>
                        <th></th>
                        <th class="text-center">Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{$invoice->id_invoice}}</td>
                            <td>{{$invoice->nama_perusahaan}}</td>
                            <td>{{$invoice->nominal}}</td>
                            <td>{{$invoice->tgl_resepsionis_terima}}</td>
                            <td>
                                <a href="/{{$invoice->id}}/edit" class="btn btn-sm btn-primary">Edit</a>
                            </td>
                            <td>
                                <a href="/{{$invoice->id}}/delete" class="btn btn-sm btn-primary" onclick="return confirm('Apakah Anda Yakin ingin menghapus data ini ?')">Delete</a>
                            </td>
                            <td>
                                <a href="/{{$invoice->id}}/detail" class="btn btn-sm btn-primary">Detail</a>
                            </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

{{-- <div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modal">Ekspor Data Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('exportexcel') }}" method="post" id="exportFormModal">
                    @csrf
                    <div class="form-group">
                        <label for="">Dari Tanggal</label>
                        <input type="date" class="form-control" name="start_date" placeholder="Pilih Tanggal">
                    </div>
                    <div class="form-group">
                        <label for="">Sampai</label>
                        <input type="date" class="form-control" name="end_date" placeholder="Pilih Tanggal">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary"><i class="fa fa-save"></i> Export</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@section('script')
<script>
$(document).ready(function() {
    $('#dttable').DataTable();
});

$('#dttable').dataTable( {
    // "columnDefs": [
    //     { "targets": 0, "width": 100 },
    //     { "targets": 1, "width": 100 },
    //     { "targets": 3, "width": 100 }
    // ]
});
</script>
@endsection