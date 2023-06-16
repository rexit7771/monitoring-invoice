@extends('layouts.main')

@section('content')
<section class="section" id="input">
    <div class="container">
        <h6 class="display-4 text-center">Edit Form Monitoring Invoice</h6>
        <p class="has-line"></p>

        <form method="POST" action="{{ route('update') }}">
            @csrf
            <div class="container">
                <div class="row mb-4">
                    @foreach ($invoices as $invoice)
                    <input type="hidden" name="id" value="{{$invoice->id}}">
                    <div class="col-md-6">
                        <div class="form-group pb-1">
                            <label for="name"><b>ID Invoice*</b></label>
                            <input name="id_invoice" class="form-control selectpicker" data-live-search="true" value="{{$invoice->id_invoice}}" required>
                        </div>
                        <div class="form-group pb-1">
                            <label for="name"><b>Nama Perusahaan*</b></label>
                            <input type="text" class="form-control" name="nama_perusahaan" id="perusahaan" value="{{$invoice->nama_perusahaan}}" required>
                        </div>
                        <div class="form-group pb-1">
                            <label for="name"><b>Nominal*</b></label>
                            <input type="text" class="form-control" name="nominal" id="rupiah" value="{{$invoice->nominal}}" required>
                        </div>
                        <div class="form-group pb-1">
                            <label for="name"><b>Keterangan*</b></label>
                            <input type="text" class="form-control" name="keterangan" value="{{$invoice->keterangan}}" required>
                        </div>
                        <div class="form-group pb-1">
                            <label for="name"><b>Kategori</b></label>
                            <div class="form-check">
                                <label class="form-check-label" for="flexRadioDefault1"><input class="form-check-input" type="radio" name="kategori" id="yes-pr" value="yes" {{$invoice->kategori == 'yes' ? 'checked' : ''}} >PR</label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label" for="flexRadioDefault2"><input class="form-check-input" type="radio" name="kategori" id="non-pr" value="non" {{$invoice->kategori == 'non' ? 'checked' : ''}} >Non PR</label>
                            </div>
                            <div class="form-group">
                                <p class="text-muted"><span class="text-danger">*</span> Hati - hati dalam mengubah kategori</br>Setelah submit, tanggal kategori Non-PR akan hilang</p>
                            </div>
                        </div>
                        <div class="form-group pb-1 yes pr ">
                            <label for="name"><b>Tanggal Resepsionis Terima*</b></label>
                            <input type="date" class="form-control" name="tgl_resepsionis_terima" id="date1" value="{{$invoice->tgl_resepsionis_terima}}" required>
                        </div>
                        <div class="form-group pb-1 yes pr ">
                            <label for="name"><b>Tanggal Sign PP Invoice</b></label>
                            <input type="date" class="form-control" name="tgl_sign_pp_invoice" value="{{$invoice->tgl_sign_pp_invoice}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group pb-1 yes pr non pr">
                            <label for="name"><b>Tanggal Input PR SAP</b></label>
                            <input type="date" class="form-control" name="tgl_input_pr_sap" value="{{$invoice->tgl_input_pr_sap}}">
                        </div>
                        <div class="form-group pb-1 yes pr ">
                            <label for="name"><b>Tanggal Approve PR Direksi</b></label>
                            <input type="date" class="form-control" name="tgl_approve_pr_direksi" value="{{$invoice->tgl_approve_pr_direksi}}">
                        </div>
                        <div class="form-group pb-1 yes pr">
                            <label for="name"><b>Tanggal Invoice Kirim HCM ke Finance</b></label>
                            <input type="date" class="form-control" name="tgl_invoice_hcm_ke_finance" value="{{$invoice->tgl_invoice_hcm_ke_finance}}">
                        </div>
                        <div class="form-group pb-1 yes pr non pr">
                            <label for="name"><b>Tanggal Pengiriman Email SES dari purchasing ke GA</b></label>
                            <input type="date" class="form-control" name="tgl_email_ke_ga"   value="{{$invoice->tgl_email_ke_ga}}">
                        </div>
                        <div class="form-group yes pr non pr">
                            <label for="name"><b>Tanggal SES User</b></label>
                            <input type="date" class="form-control" name="tgl_ses_user" value="{{$invoice->tgl_ses_user}}">
                        </div>
                        <div class="form-group yes pr non pr">
                            <label for="name"><b>Tanggal rilis approval SES dari User</b></label>
                            <input type="date" class="form-control" name="tgl_rilis_ses_user" value="{{$invoice->tgl_rilis_ses_user     }}">
                        </div>
                        <div class="form-group yes pr">
                            <label for="name"><b>Tanggal Bayar</b></label>
                            <input type="date" class="form-control" name="tgl_bayar" value="{{$invoice->tgl_bayar}}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="text-right">
                            <input type="submit" class="btn btn-primary" id="submit" value="Submit">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@section('script')
<script>
    //Script hide / show
    // var inputValue = $("").attr("value");
    if (document.getElementById('non-pr').checked) {
        $( "#non-pr" ).ready(function() {
        $(".non").hide();
    });
} else {
        $('#yes-pr').ready(function(){
        $(".non").show();
    });
        
    }

    // $('#yes-pr').ready(function(){
    //     $(".non").show();
    // });

    $('#yes-pr').click(function(){ 
        $(".non").show();
        
    });

    // $( "#non-pr" ).ready(function() {
    //     // $(".non").val(null);
    //     // $(".non").prop("disabled", true);
    //     $(".non").hide();
    // });

    $("#non-pr").click(function(){ 
        $(".non").hide();
        
    });

    //Script Auto format rupiah
    var rupiah = document.getElementById("rupiah");
    rupiah.addEventListener("keyup", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, "Rp. ");
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
</script>
@endsection
