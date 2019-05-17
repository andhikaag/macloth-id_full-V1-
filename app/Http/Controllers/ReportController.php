<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Transaksi;
use App\Pembeli;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Excel;
use PDF;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $pembeli = Pembeli::where('status', '=', 'Shipped')->orderBy('id')->get();

        return view('admin.reports.index', compact('pembeli'));
    }

    public function setPeriode(){
        $fromDate = Input::get('from');
        $toDate = Input::get('to');
        $date_range = [$fromDate . ' 00:00:00', $toDate . ' 23:59:59'];

        $pembeli = Pembeli::where('status', '=', 'Shipped')->whereBetween('created_at', $date_range)
        ->get();
        
        $sumharga = Pembeli::where('status', '=', 'Shipped')->whereBetween('created_at', $date_range)->sum('total');
        $sumjml = Pembeli::where('status', '=', 'Shipped')->whereBetween('created_at', $date_range)->sum('jml_brg');

        $pdf = PDF::loadView('admin.reports.save', compact('pembeli', 'fromDate', 'toDate', 'sumharga', 'sumjml'));
        $pdf->save(storage_path().'_filename.pdf');
        return $pdf->download('customers.pdf');
    }

    public function detail(){
        $formid = Input::get('formid');
        $transaksi = Transaksi::whereHas('product', function($q) {
            $formid = Input::get('formid');
            $q->where('formid', '=', $formid);
        })->get();
    
        $pembeli = Pembeli::where('formid', '=', $formid)->first();
            
    
        return view('admin.reports.detail', compact('pembeli', 'transaksi'));
    }

    public function search(){
        $search = $_GET['search'];

        $pembeli = Pembeli::where('nama','LIKE', '%'.$search.'%')->where('status', '=', 'Shipped')->get();
  

        return view('admin.reports.index', compact('pembeli'));
    }
}
