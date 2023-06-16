<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Exports\MonitoringInvoiceExport;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Excel as ExcelExcel;

class ExportController extends Controller
{
    public function index()
    {
        

        return view('export.index');
    }

    public function export(Request $request)
    {
        $request->validate([
            'start_date' => 'bail|nullable|date',
            'end_date'   => 'bail|nullable|date',
        ]);

        $start_date = $request->start_date;
        $end_date   = $request->end_date;

        $data = Invoice::whereBetween('tgl_resepsionis_terima', [$start_date, $end_date])
                ->select([
                    'id_invoice',
                    'nominal',
                    'nama_perusahaan',
                    'keterangan',
                    'tgl_resepsionis_terima',
                    'tgl_sign_pp_invoice',
                    'tgl_input_pr_sap',
                    'tgl_approve_pr_direksi',
                    'tgl_invoice_hcm_ke_finance',
                    'tgl_email_ke_ga',
                    'tgl_ses_user',
                    'tgl_rilis_ses_user',
                    'tgl_bayar',
                ])
                ->get([
                    'id_invoice',
                    'nominal',
                    'nama_perusahaan',
                    'keterangan',
                    'tgl_resepsionis_terima',
                    'tgl_sign_pp_invoice',
                    'tgl_input_pr_sap',
                    'tgl_approve_pr_direksi',
                    'tgl_invoice_hcm_ke_finance',
                    'tgl_email_ke_ga',
                    'tgl_ses_user',
                    'tgl_rilis_ses_user',
                    'tgl_bayar',
                ]);

        return Excel::download(new MonitoringInvoiceExport($start_date, $end_date),'Monitoring-Invoice-export '.date('d-m-Y').'.xlsx', ExcelExcel::XLSX);
    }
}
