<?php

namespace App\Http\Controllers;

use App\Models\Invoice;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        
        
        return view('home.index', compact('invoices'));

    }
    
    public function detail($id)
    {
        
        $invoices = Invoice::where('id', $id)->get();

        // return $invoices;

        return view('home.detail', compact('invoices'));
    }

    public function delete($id)
    {
        $invoices = Invoice::where('id', $id)->delete();
        
        toastr()->success('Data Berhasil Di Hapus');
        return redirect()->to('/')->with('message', [
            'type'  =>  'success',
            'msg'   =>  'Berhasil'
        ]);
    }
}
