@extends('layouts.main')

@section('content')
<section class="section" id="home">
    <div class="container text-center">
        <h6 class="display-4">Detail Monitoring Invoice</h6>
        <p class="has-line"></p>
        <div class="ml-5 container">
            @foreach ($invoices as $invoice)
            <div class="row mb-4 ">
                <div class="col-11"></div>
                <a href="/{{$invoice->id}}/edit" class="col-1 btn btn-primary">Edit</a>
            </div>
            <div class="row ml-5 pl-5">
                <div class="col-md-6 text-left mb-4">
                    <h5>ID Invoice:</h5>
                    <p><strong>{{$invoice->id_invoice}}</strong></p>
                    <h5>Nama Perusahaan:</h5>
                    <p><strong> {{$invoice->nama_perusahaan}}</strong></p>
                    <h5>Nominal:</h5>
                    <p><strong> {{$invoice->nominal}}</strong></p>
                    <h5>Keterangan:</h5>
                    <p><strong> {{$invoice->keterangan}}</strong></p>
                    <h5>Kategori:</h5>
                    @if($invoice->kategori == 'yes')
                        <p><strong>PR</strong></p>
                    @else
                        <p><strong>Non PR</strong></p>
                    @endif
                    <h5>Tanggal Resepsionis Terima:</h5>
                    <p ><strong> {{date("d-m-Y", strtotime($invoice->tgl_resepsionis_terima))}}</strong></p>
                    <h5>Tanggal Sign PP Invoice:</h5>
                    @if($invoice->tgl_sign_pp_invoice == null)
                        <p class="text-muted"><strong> Tidak Ada Data yang tersimpan</strong></p>
                    @else
                        <p ><strong> {{date("d-m-Y", strtotime($invoice->tgl_sign_pp_invoice))}}</strong></p>
                    @endif
                </div>
                <div class="col-6 text-left mb-4">
                    <h5>Tanggal Input PR SAP:</h5>
                    @if($invoice->tgl_input_pr_sap == null)
                        <p class="text-muted"><strong> Tidak Ada Data yang tersimpan</strong></p>
                    @else
                        <p ><strong> {{date("d-m-Y", strtotime($invoice->tgl_input_pr_sap))}}</strong></p>
                    @endif
                    <h5>Tanggal Approve PR Direksi:</h5>
                    @if($invoice->tgl_approve_pr_direksi == null)
                        <p class="text-muted"><strong> Tidak Ada Data yang tersimpan</strong></p>
                    @else
                        <p ><strong> {{date("d-m-Y", strtotime($invoice->tgl_approve_pr_direksi))}}</strong></p>
                    @endif
                    <h5>Tanggal Invoice Kirim HCM ke Finance:</h5>
                    @if($invoice->tgl_invoice_hcm_ke_finance == null)
                        <p class="text-muted"><strong> Tidak Ada Data yang tersimpan</strong></p>
                    @else
                        <p ><strong> {{date("d-m-Y", strtotime($invoice->tgl_invoice_hcm_ke_finance))}}</strong></p>
                    @endif
                    <h5>Tanggal Pengiriman Email SES dari Purchasing ke GA:</h5>
                    @if($invoice->tgl_email_ke_ga == null)
                        <p class="text-muted"><strong> Tidak Ada Data yang tersimpan</strong></p>
                    @else
                        <p ><strong> {{date("d-m-Y", strtotime($invoice->tgl_email_ke_ga))}}</strong></p>
                    @endif
                    <h5>Tanggal SES User:</h5>
                    @if($invoice->tgl_ses_user == null)
                        <p class="text-muted"><strong> Tidak Ada Data yang tersimpan</strong></p>
                    @else
                        <p ><strong> {{date("d-m-Y", strtotime($invoice->tgl_ses_user))}}</strong></p>
                    @endif
                    <h5>Tanggal Rilis Approval SES dari User:</h5>
                    @if($invoice->tgl_rilis_ses_user == null)
                        <p class="text-muted"><strong> Tidak Ada Data yang tersimpan</strong></p>
                    @else
                        <p ><strong> {{date("d-m-Y", strtotime($invoice->tgl_rilis_ses_user))}}</strong></p>
                    @endif
                    <h5>Tanggal Bayar:</h5>
                    @if($invoice->tgl_bayar == null)
                        <p class="text-muted"><strong> Tidak Ada Data yang tersimpan</strong></p>
                    @else
                        <p ><strong> {{date("d-m-Y", strtotime($invoice->tgl_bayar))}}</strong></p>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection