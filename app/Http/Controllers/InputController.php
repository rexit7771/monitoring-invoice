<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class InputController extends Controller
{
    public function index()
    {
        

        return view('input.index');
    }

    public function store(Request $request)
    {

        // return $request;

        Invoice::insert([
            'id_invoice'                        =>  $request->id_invoice,
            'nominal'                           =>  $request->nominal,
            'nama_perusahaan'                   =>  $request->nama_perusahaan,
            'keterangan'                        =>  $request->keterangan,
            'kategori'                          =>  $request->kategori,
            'tgl_resepsionis_terima'            =>  $request->tgl_resepsionis_terima,
            'tgl_sign_pp_invoice'               =>  $request->tgl_sign_pp_invoice,
            'tgl_input_pr_sap'                  =>  $request->tgl_input_pr_sap,
            'tgl_approve_pr_direksi'            =>  $request->tgl_approve_pr_direksi,
            'tgl_invoice_hcm_ke_finance'        =>  $request->tgl_invoice_hcm_ke_finance,
            'tgl_email_ke_ga'                   =>  $request->tgl_email_ke_ga,
            'tgl_ses_user'                      =>  $request->tgl_ses_user,
            'tgl_rilis_ses_user'                =>  $request->tgl_rilis_ses_user,
            'tgl_bayar'                         =>  $request->tgl_bayar,
        ]);
        
        toastr()->success('Data Berhasil Di Input');
        return redirect()->to('/')->with('message', [
            'type'  =>  'success',
            'msg'   =>  'Berhasil'
        ]);


    }

    public function edit($id)
    {
        $invoices = Invoice::where('id', $id)->get();
        
        
        
        return view('input.edit', compact('invoices'));
    }

    public function update(Request $request)
    {
        // return $request;

        if($request->kategori == 'non'){
            $db_up = DB::table('invoice')->where('id', $request->id)
            ->update([
                'id_invoice'                        =>  $request->id_invoice,
                'nominal'                           =>  $request->nominal,
                'nama_perusahaan'                   =>  $request->nama_perusahaan,
                'keterangan'                        =>  $request->keterangan,
                'kategori'                          =>  $request->kategori,
                'tgl_resepsionis_terima'            =>  $request->tgl_resepsionis_terima,
                'tgl_sign_pp_invoice'               =>  $request->tgl_sign_pp_invoice,
                'tgl_input_pr_sap'                  =>  null,
                'tgl_approve_pr_direksi'            =>  $request->tgl_approve_pr_direksi,
                'tgl_invoice_hcm_ke_finance'        =>  $request->tgl_invoice_hcm_ke_finance,
                'tgl_email_ke_ga'                   =>  null,
                'tgl_ses_user'                      =>  null,
                'tgl_rilis_ses_user'                =>  null,
                'tgl_bayar'                         =>  $request->tgl_bayar,
            ]);
        }else{
            $db_up = DB::table('invoice')->where('id', $request->id)
            ->update([
                'id_invoice'                        =>  $request->id_invoice,
                'nominal'                           =>  $request->nominal,
                'nama_perusahaan'                   =>  $request->nama_perusahaan,
                'keterangan'                        =>  $request->keterangan,
                'kategori'                          =>  $request->kategori,
                'tgl_resepsionis_terima'            =>  $request->tgl_resepsionis_terima,
                'tgl_sign_pp_invoice'               =>  $request->tgl_sign_pp_invoice,
                'tgl_input_pr_sap'                  =>  $request->tgl_input_pr_sap,
                'tgl_approve_pr_direksi'            =>  $request->tgl_approve_pr_direksi,
                'tgl_invoice_hcm_ke_finance'        =>  $request->tgl_invoice_hcm_ke_finance,
                'tgl_email_ke_ga'                   =>  $request->tgl_email_ke_ga,
                'tgl_ses_user'                      =>  $request->tgl_ses_user,
                'tgl_rilis_ses_user'                =>  $request->tgl_rilis_ses_user,
                'tgl_bayar'                         =>  $request->tgl_bayar,
            ]);
        }

        toastr()->success('Data Berhasil Di Perbaharui');
        return redirect()->to('/')->with('message', [
            'type'  =>  'success',
            'msg'   =>  'Berhasil'
        ]);
    }
}
