<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Xendit\Xendit;
use App\Pelunasan;
use App\Mahasiswa;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");

        //ambil jam dan menit
        $jam = date('H:i');

        //atur salam menggunakan IF
        if ($jam > '00:01' && $jam < '10:00') {
            $salam = 'Pagi';
        } elseif ($jam >= '10:00' && $jam < '15:00') {
            $salam = 'Siang';
        } elseif ($jam < '18:00') {
            $salam = 'Sore';
        } else {
            $salam = 'Malam';
        }

        $user = Auth::user();
        $users = DB::table('users')->where('id', '=', $user->id)->get()
        ->first();
        $mahasiswas = DB::table('mahasiswas')->where('npm', '=', $user->npm)->get()
        ->first();
        $banners = DB::table('banners')->get();
        $status_persembahan = DB::table('statuss')->where('id', '=', 3)->get()->first();
        $status_keringanan = DB::table('statuss')->where('id', '=', 4)->get()->first();
        $status_regis = DB::table('statuss')->where('id', '=', 1)->get()->first();
        $status_toga = DB::table('statuss')->where('id', '=', 2)->get()->first();

        $pelunasan = DB::table('pelunasans')->where('mahasiswa_id', '=', $user->id)->get()->first();

        $getInvoice = array('status' => 'Bla');

        if(!empty($pelunasan)){

            Xendit::setApiKey('xnd_production_UlOYPCqw7NmD9JNJK6RCAUXwmNm8KT23Xrlp7uxTkqGpP93ikIPLU7nWXGY');

            $id = $pelunasan->invoice_id;
            $getInvoice = \Xendit\Invoice::retrieve($id);

            $exist_pelunasan = Pelunasan::whereMahasiswa_id(Auth::user()->id)->first();
            if ($exist_pelunasan->status != $getInvoice['status']) {
                if($getInvoice['status'] == "SETTLED" ){
                    $datae_ambiltoga['status_ambil_toga'] = 3;
                    $datae_pelunasan['status'] = $getInvoice['status'];
                    $updatestatus = Mahasiswa::whereNpm(Auth::user()->npm)->update($datae_ambiltoga);
                    Pelunasan::whereMahasiswa_id(Auth::user()->id)->update($datae_pelunasan);
                    if($updatestatus){
                        return view('home', ['users'=>$users,
                                            'salam'=>$salam,
                                            'banners'=>$banners,
                                            'status_persembahan'=>$status_persembahan,
                                            'status_keringanan'=>$status_keringanan,
                                            'status_regis'=>$status_regis,
                                            'status_toga'=>$status_toga,
                                            'getInvoices'=>$getInvoice,
                                            'mahasiswas'=>$mahasiswas]
                        );
                    }
                }
                else if($getInvoice['status'] == "PAID" ){
                    $datae_ambiltoga['status_ambil_toga'] = 3;
                    $datae_pelunasan['status'] = $getInvoice['status'];
                    $updatestatus = Mahasiswa::whereNpm(Auth::user()->npm)->update($datae_ambiltoga);
                    Pelunasan::whereMahasiswa_id(Auth::user()->id)->update($datae_pelunasan);
                    if($updatestatus){
                        return view('home', ['users'=>$users,
                                            'salam'=>$salam,
                                            'banners'=>$banners,
                                            'status_persembahan'=>$status_persembahan,
                                            'status_keringanan'=>$status_keringanan,
                                            'status_regis'=>$status_regis,
                                            'status_toga'=>$status_toga,
                                            'getInvoices'=>$getInvoice,
                                            'mahasiswas'=>$mahasiswas]
                        );
                    }
                }
                else if($getInvoice['status'] == "PENDING"){
                    $datae_ambiltoga['status_ambil_toga'] = 2;
                    $datae_pelunasan['status'] = $getInvoice['status'];
                    $updatestatus = Mahasiswa::whereNpm(Auth::user()->npm)->update($datae_ambiltoga);
                    Pelunasan::whereMahasiswa_id(Auth::user()->id)->update($datae_pelunasan);
                    if($updatestatus){
                        return view('home', ['users'=>$users,
                                            'salam'=>$salam,
                                            'banners'=>$banners,
                                            'status_persembahan'=>$status_persembahan,
                                            'status_keringanan'=>$status_keringanan,
                                            'status_regis'=>$status_regis,
                                            'status_toga'=>$status_toga,
                                            'getInvoices'=>$getInvoice,
                                            'mahasiswas'=>$mahasiswas]
                        );
                    }
                }
                else if($getInvoice['status'] == "EXPIRED"){
                    $datae_ambiltoga['status_ambil_toga'] = 1;
                    $datae_pelunasan['status'] = $getInvoice['status'];
                    $updatestatus = Mahasiswa::whereNpm(Auth::user()->npm)->update($datae_ambiltoga);
                    Pelunasan::whereMahasiswa_id(Auth::user()->id)->update($datae_pelunasan);
                    if($updatestatus){
                        return view('home', ['users'=>$users,
                                            'salam'=>$salam,
                                            'banners'=>$banners,
                                            'status_persembahan'=>$status_persembahan,
                                            'status_keringanan'=>$status_keringanan,
                                            'status_regis'=>$status_regis,
                                            'status_toga'=>$status_toga,
                                            'getInvoices'=>$getInvoice,
                                            'mahasiswas'=>$mahasiswas]
                        );
                    }
                }
            }
            else{
                $datae_pelunasan['status'] = $getInvoice['status'];
                Pelunasan::whereMahasiswa_id(Auth::user()->id)->update($datae_pelunasan);
            }

        }
        return view('home', ['users'=>$users,
                            'salam'=>$salam,
                            'banners'=>$banners,
                            'status_persembahan'=>$status_persembahan,
                            'status_keringanan'=>$status_keringanan,
                            'status_regis'=>$status_regis,
                            'status_toga'=>$status_toga,
                            'getInvoices'=>$getInvoice,
                            'mahasiswas'=>$mahasiswas]
        );
    }
}
