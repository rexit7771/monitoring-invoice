<?php

namespace App\Exports;

use App\Models\Invoice;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\DB;

class MonitoringInvoiceExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;
    protected $params;

    public function __construct($start_date, $end_date)
    {
        $this->start_date   =   $start_date;
        $this->end_date     =   $end_date;
    }

    public function collection()
    {
        $query = "SELECT DATE(tgl_resepsionis_terima) as tgl_resepsionis_terima,
                    id_invoice,
                    nominal,
                    nama_perusahaan,
                    keterangan,
                    tgl_sign_pp_invoice,
                    tgl_input_pr_sap,
                    tgl_approve_pr_direksi,
                    tgl_invoice_hcm_ke_finance,
                    tgl_email_ke_ga,
                    tgl_ses_user,
                    tgl_rilis_ses_user,
                    tgl_bayar
                    FROM invoice 
                    WHERE DATE(tgl_resepsionis_terima) 
                    BETWEEN '$this->start_date' AND '$this->end_date'";

                    return collect(DB::select($query));
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(20);
            },
        ];
    }

    public function headings(): array
    {
        return[
                    'ID Invoice',
                    'Nominal',
                    'Nama Perusahaan',
                    'Keterangan',
                    'Tgl Resepsionis Terima',
                    'Tgl Sign PP Invoice',
                    'Tgl Input PR SAP',
                    'Tgl Approve PR Direksi',
                    'Tgl Invoice HCM Ke Finance',
                    'Tgl Email Dari Purchasing Ke GA',
                    'Tgl SES User',
                    'Tgl Rilis SES User',
                    'Tgl Bayar',
        ];
    }
    
    public function map($row): array
    {
        return [
            $row->id_invoice,
            $row->nama_perusahaan,
            $row->nominal,
            $row->keterangan,
            date('d-m-Y', strtotime($row->tgl_resepsionis_terima)),
            date('d-m-Y', strtotime($row->tgl_sign_pp_invoice)) != '01-01-1970' ? date('d-m-Y', strtotime($row->tgl_sign_pp_invoice)) : '',
            date('d-m-Y', strtotime($row->tgl_input_pr_sap)) != '01-01-1970' ? date('d-m-Y', strtotime($row->tgl_input_pr_sap)) : '',
            date('d-m-Y', strtotime($row->tgl_approve_pr_direksi)) != '01-01-1970' ? date('d-m-Y', strtotime($row->tgl_approve_pr_direksi)) : '',
            date('d-m-Y', strtotime($row->tgl_invoice_hcm_ke_finance)) != '01-01-1970' ? date('d-m-Y', strtotime($row->tgl_invoice_hcm_ke_finance)) : '',
            date('d-m-Y', strtotime($row->tgl_email_ke_ga)) != '01-01-1970' ? date('d-m-Y', strtotime($row->tgl_email_ke_ga)) : '',
            date('d-m-Y', strtotime($row->tgl_ses_user)) != '01-01-1970' ? date('d-m-Y', strtotime($row->tgl_ses_user)) : '',
            date('d-m-Y', strtotime($row->tgl_rilis_ses_user)) != '01-01-1970' ? date('d-m-Y', strtotime($row->tgl_rilis_ses_user)) : '',
            date('d-m-Y', strtotime($row->tgl_bayar)) != '01-01-1970' ? date('d-m-Y', strtotime($row->tgl_bayar)) : '',
            
        ];
        }
}
