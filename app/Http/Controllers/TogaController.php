<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Mahasiswa;
use App\Toga;
use Exception;
use App\Province;
use App\City;
use App\District;
use App\Village;
use App\Alamat;
use Xendit\Xendit;
use Illuminate\Support\Facades\Log;
use App\Pelunasan;

class TogaController extends Controller
{
    function __construct () {
      $options['secret_api_key']='xnd_production_UlOYPCqw7NmD9JNJK6RCAUXwmNm8KT23Xrlp7uxTkqGpP93ikIPLU7nWXGY';
      $this->server_domain = 'https://api.xendit.co';
      $this->secret_api_key = $options['secret_api_key'];
    }
    public function index()
    {
        $user = Auth::user();
        $users = DB::table('users')->where('id', '=', $user->id)->get()
        ->first();
        $mahasiswas = DB::table('mahasiswas')->where('npm', '=', $user->npm)->get()
        ->first();
        $toga = DB::table('togas')->where('mahasiswa_id', '=', $user->id)->get()
        ->first();
        $prodis = DB::table('prodis')->where('id', '=', $mahasiswas->prodi_id)->get()
        ->first();
        $alamat = DB::table('alamats')->where('mahasiswa_id', '=', $user->id)->get()
        ->first();
        $provinces = Province::orderBy('name', 'asc')->pluck('name', 'id');
        $provinsis = DB::table('provinces')->where('id', '=', $alamat->provinsi ?? '')->get()
        ->first();
        $kota = DB::table('cities')->where('id', '=', $alamat->kota ?? '')->get()
        ->first();
        $kecamatan = DB::table('districts')->where('id', '=', $alamat->kecamatan ?? '')->get()
        ->first();
        $kelurahan = DB::table('villages')->where('id', '=', $alamat->kelurahan ?? '')->get()
        ->first();
        $status_toga = DB::table('statuss')->where('id', '=', 2)->get()->first();
        $pelunasan = DB::table('pelunasans')->where('mahasiswa_id', '=', $user->id)->get()->first();



        $getInvoice = array('status' => 'Bla');

        if(!empty($pelunasan)){

            Xendit::setApiKey($this->secret_api_key);

            $id = $pelunasan->invoice_id;
            $getInvoice = \Xendit\Invoice::retrieve($id);
            $exist_pelunasan = Pelunasan::whereMahasiswa_id(Auth::user()->id)->first();

            if ($exist_pelunasan->status != $getInvoice['status']) {
                if($getInvoice['status'] == "SETTLED"){
                    $datae_ambiltoga['status_ambil_toga'] = 3;
                    $datae_pelunasan['status'] = $getInvoice['status'];
                    $updatestatus = Mahasiswa::whereNpm(Auth::user()->npm)->update($datae_ambiltoga);
                    Pelunasan::whereMahasiswa_id(Auth::user()->id)->update($datae_pelunasan);
                    if($updatestatus){
                        return view('home.toga', ['users'=>$users,
                                            'mahasiswas'=>$mahasiswas,
                                            'prodis'=>$prodis,
                                            'provinces' => $provinces,
                                            'alamats' => $alamat,
                                            'provinsis' => $provinsis,
                                            'kotas' => $kota,
                                            'kecamatans' => $kecamatan,
                                            'kelurahans' => $kelurahan,
                                            'status_toga' => $status_toga,
                                            'pelunasan' => $pelunasan,
                                            'getInvoices' => $getInvoice,
                                            'togas'=>$toga]
                        );
                    }
                }
                else if($getInvoice['status'] == "PAID" ){
                    $datae_ambiltoga['status_ambil_toga'] = 3;
                    $datae_pelunasan['status'] = $getInvoice['status'];
                    $updatestatus = Mahasiswa::whereNpm(Auth::user()->npm)->update($datae_ambiltoga);
                    Pelunasan::whereMahasiswa_id(Auth::user()->id)->update($datae_pelunasan);
                    if($updatestatus){
                        return view('home.toga', ['users'=>$users,
                                            'mahasiswas'=>$mahasiswas,
                                            'prodis'=>$prodis,
                                            'provinces' => $provinces,
                                            'alamats' => $alamat,
                                            'provinsis' => $provinsis,
                                            'kotas' => $kota,
                                            'kecamatans' => $kecamatan,
                                            'kelurahans' => $kelurahan,
                                            'status_toga' => $status_toga,
                                            'pelunasan' => $pelunasan,
                                            'getInvoices' => $getInvoice,
                                            'togas'=>$toga]
                        );
                    }
                }
                else if($getInvoice['status'] == "PENDING"){
                    $datae_ambiltoga['status_ambil_toga'] = 2;
                    $datae_pelunasan['status'] = $getInvoice['status'];
                    $updatestatus =Mahasiswa::whereNpm(Auth::user()->npm)->update($datae_ambiltoga);
                    Pelunasan::whereMahasiswa_id(Auth::user()->id)->update($datae_pelunasan);
                    if($updatestatus){
                        return view('home.toga', ['users'=>$users,
                                            'mahasiswas'=>$mahasiswas,
                                            'prodis'=>$prodis,
                                            'provinces' => $provinces,
                                            'alamats' => $alamat,
                                            'provinsis' => $provinsis,
                                            'kotas' => $kota,
                                            'kecamatans' => $kecamatan,
                                            'kelurahans' => $kelurahan,
                                            'status_toga' => $status_toga,
                                            'pelunasan' => $pelunasan,
                                            'getInvoices' => $getInvoice,
                                            'togas'=>$toga]
                        );
                    }
                }
                else if($getInvoice['status'] == "EXPIRED"){
                    $datae_ambiltoga['status_ambil_toga'] = 1;
                    $datae_pelunasan['status'] = $getInvoice['status'];
                    $updatestatus = Mahasiswa::whereNpm(Auth::user()->npm)->update($datae_ambiltoga);
                    Pelunasan::whereMahasiswa_id(Auth::user()->id)->update($datae_pelunasan);
                    if($updatestatus){
                        return view('home.toga', ['users'=>$users,
                                            'mahasiswas'=>$mahasiswas,
                                            'prodis'=>$prodis,
                                            'provinces' => $provinces,
                                            'alamats' => $alamat,
                                            'provinsis' => $provinsis,
                                            'kotas' => $kota,
                                            'kecamatans' => $kecamatan,
                                            'kelurahans' => $kelurahan,
                                            'status_toga' => $status_toga,
                                            'pelunasan' => $pelunasan,
                                            'getInvoices' => $getInvoice,
                                            'togas'=>$toga]
                        );
                    }
                }
            }
            else{
                $datae_pelunasan['status'] = $getInvoice['status'];
                Pelunasan::whereMahasiswa_id(Auth::user()->id)->update($datae_pelunasan);
                return view('home.toga', ['users'=>$users,
                                'mahasiswas'=>$mahasiswas,
                                'prodis'=>$prodis,
                                'provinces' => $provinces,
                                'alamats' => $alamat,
                                'provinsis' => $provinsis,
                                'kotas' => $kota,
                                'kecamatans' => $kecamatan,
                                'kelurahans' => $kelurahan,
                                'status_toga' => $status_toga,
                                'pelunasan' => $pelunasan,
                                'getInvoices' => $getInvoice,
                                'togas'=>$toga]
                );
            }

        }
        else{
        return view('home.toga', ['users'=>$users,
            'mahasiswas'=>$mahasiswas,
            'prodis'=>$prodis,
            'provinces' => $provinces,
            'alamats' => $alamat,
            'provinsis' => $provinsis,
            'kotas' => $kota,
            'kecamatans' => $kecamatan,
            'kelurahans' => $kelurahan,
            'status_toga' => $status_toga,
            'pelunasan' => $pelunasan,
            'getInvoices' => $getInvoice,
            'togas'=>$toga]
);
        }
    }

    public function store(Request $request)
    {
        $cities = City::orderBy('name', 'asc')->where('province_id', $request->get('id'))
            ->pluck('name', 'id');

        return response()->json($cities);
    }

    public function storeDistrict(Request $request)
    {
        $cities = District::orderBy('name', 'asc')->where('city_id', $request->get('id'))
            ->pluck('name', 'id');

        return response()->json($cities);
    }

    public function storeVillage(Request $request)
    {
        $cities = Village::orderBy('name', 'asc')->where('district_id', $request->get('id'))
            ->pluck('name', 'id');

        return response()->json($cities);
    }

    public function editToga(){
        $user = Auth::user();
        $editToga = DB::table('mahasiswas')
              ->where('npm', $user->npm)
              ->update(['status_ambil_toga' => 0]);
        if($editToga){
            return back();
        }
        else{
            return back()->with(['error' => 'Gagal']);
        }
    }

    public function lockToga(Request $request){

        request()->validate([
			'size_toga' => 'required|string|min:1|max:255',
			'no_wa' => 'required|string|min:1|max:15',
			'alamat' => 'required|string|min:1|max:255',
			'kode_pos' => 'required|string|min:1|max:5'
		]);

        $user = Auth::user();
        $editToga = DB::table('mahasiswas')
              ->where('npm', $user->npm)
              ->update(['status_ambil_toga' => 2]);

        if($editToga){

            Xendit::setApiKey($this->secret_api_key);

            $external_id = "".Auth::user()->id.".".Auth::user()->npm.".".Auth::user()->email;

            $params = [
              'external_id' => $external_id,
              'payer_email' => Auth::user()->email,
              'description' => 'Pembayaran Toga',
              'amount' => 10000
            ];

            $createInvoice = \Xendit\Invoice::create($params);

            $data_pelunasan = new Pelunasan;
            $exist_pelunasan = Pelunasan::whereMahasiswa_id(Auth::user()->id)->first();

            if (!empty($exist_pelunasan)) {
                // if($exist_toga) {
                if ($exist_pelunasan->order_id != $createInvoice['external_id']) {
                    $datae_pelunasan['order_id'] = $createInvoice['external_id'];
                }
                else{
                    $datae_pelunasan['order_id'] = $createInvoice['external_id'];
                }
                if ($exist_pelunasan->type != $createInvoice['amount']) {
                    $datae_pelunasan['type'] = $createInvoice['amount'];
                }
                else{
                    $datae_pelunasan['type'] = $createInvoice['amount'];
                }
                if ($exist_pelunasan->status != $createInvoice['status']) {
                    $datae_pelunasan['status'] = $createInvoice['status'];
                }
                else{
                    $datae_pelunasan['status'] = $createInvoice['status'];
                }
                if ($exist_pelunasan->link_xendit != $createInvoice['invoice_url']) {
                    $datae_pelunasan['link_xendit'] = $createInvoice['invoice_url'];
                }
                else{
                    $datae_pelunasan['link_xendit'] = $createInvoice['invoice_url'];
                }
                if ($exist_pelunasan->invoice_id != $createInvoice['id']) {
                    $datae_pelunasan['invoice_id'] = $createInvoice['id'];
                }
                else{
                    $datae_pelunasan['invoice_id'] = $createInvoice['id'];
                }

                Pelunasan::whereMahasiswa_id(Auth::user()->id)->update($datae_pelunasan);
            }
            else{
                $data_pelunasan->mahasiswa_id = Auth::user()->id;
                $data_pelunasan->order_id = $createInvoice['external_id'];
                $data_pelunasan->type = $createInvoice['amount'];
                $data_pelunasan->status = $createInvoice['status'];
                $data_pelunasan->link_xendit = $createInvoice['invoice_url'];
                $data_pelunasan->invoice_id = $createInvoice['id'];
                $data_pelunasan->save();
            }

            Log::info($createInvoice);

            return redirect($createInvoice['invoice_url']);
            var_dump($createInvoice);
        }
        else{
            return back()->with(['error' => 'Gagal']);
        }
    }


    public function createToga(Request $request){
        //validasi
        request()->validate([
			'size_toga' => 'required|string|min:1|max:255',
			'no_wa' => 'required|string|min:1|max:15',
			'provinsi' => 'required|string|min:1|max:255',
			'kota' => 'required|string|min:1|max:255',
			'kecamatan' => 'required|string|min:1|max:255',
			'kelurahan' => 'required|string|min:1|max:255',
			'alamat' => 'required|string|min:1|max:255',
			'kode_pos' => 'required|string|min:1|max:5'
		]);

        // $prodis = DB::table('prodis')->where('id', '=', $request->prdi_id)->get()->first();
        // $prodis = DB::table('prodis')->where('id', '=', $request->prodi_id)->get()->first();
        ## preset awal

        //inisiasi
        $data_alamat = new Alamat;
        $exist_alamat = Alamat::whereMahasiswa_id(Auth::user()->id)->first();
        $data_toga = new Toga;
        $exist_toga = Toga::whereMahasiswa_id(Auth::user()->id)->first();


        ## periksa apakah ada data di database table mahasiswa
        if (!empty($exist_alamat)) {
            // if($exist_alamat) {
            if ($exist_alamat->provinsi != $request->provinsi) {
                $datae_alamat['provinsi'] = $request->provinsi;
            }
            else{
                $datae_alamat['provinsi'] = $request->provinsi;
            }
            if ($exist_alamat->kota != $request->kota) {
                $datae_alamat['kota'] = $request->kota;
            }
            else{
                $datae_alamat['kota'] = $request->kota;
            }
            if ($exist_alamat->kecamatan != $request->kecamatan) {
                $datae_alamat['kecamatan'] = $request->kecamatan;
            }
            else{
                $datae_alamat['kecamatan'] = $request->kecamatan;
            }
            if ($exist_alamat->kelurahan != $request->kelurahan) {
                $datae_alamat['kelurahan'] = $request->kelurahan;
            }
            else{
                $datae_alamat['kelurahan'] = $request->kelurahan;
            }
            if ($exist_alamat->alamat != $request->alamat) {
                $datae_alamat['alamat'] = $request->alamat;
            }
            else{
                $datae_alamat['alamat'] = $request->alamat;
            }
            if ($exist_alamat->kode_pos != $request->kode_pos) {
                $datae_alamat['kode_pos'] = $request->kode_pos;
            }
            else{
                $datae_alamat['kode_pos'] = $request->kode_pos;
            }

            Mahasiswa::whereNpm(Auth::user()->npm)->update(['status_ambil_toga' => 1]);

            if (!empty($exist_toga)) {
                // if($exist_toga) {
                if ($exist_toga->size_toga != $request->size_toga) {
                    $datae_toga['size_toga'] = $request->size_toga;
                }
                else{
                    $datae_toga['size_toga'] = $request->size_toga;
                }
                if ($exist_toga->no_wa != $request->no_wa) {
                    $datae_toga['no_wa'] = $request->no_wa;
                }
                else{
                    $datae_toga['no_wa'] = $request->no_wa;
                }

                Toga::whereMahasiswa_id(Auth::user()->id)->update($datae_toga);
                Alamat::whereMahasiswa_id(Auth::user()->id)->update($datae_alamat);

                return back()->with(['success' => 'Data berhasil diubah.']);

            }
            ## jika tidak ada data di database
            else {
                $data_toga->mahasiswa_id = Auth::user()->id;
                $data_toga->size_toga = $request->size_toga;
                $data_toga->no_wa = $request->no_wa;
                $data_toga->save();
                Alamat::whereMahasiswa_id(Auth::user()->id)->update($datae_alamat);

                return back()->with(['success' => 'Data berhasil disimpan.']);
            }


        }
        ## jika tidak ada data di database table mahasiswa
        else {
            $data_alamat->mahasiswa_id = Auth::user()->id;
            $data_alamat->provinsi = $request->provinsi;
            $data_alamat->kota = $request->kota;
            $data_alamat->kecamatan = $request->kecamatan;
            $data_alamat->kelurahan = $request->kelurahan;
            $data_alamat->alamat = $request->alamat;
            $data_alamat->kode_pos = $request->kode_pos;
            Mahasiswa::whereNpm(Auth::user()->npm)->update(['status_ambil_toga' => 1]);
            $data_alamat->save();

            $data_toga->mahasiswa_id = Auth::user()->id;
            $data_toga->size_toga = $request->size_toga;
            $data_toga->no_wa = $request->no_wa;
            $data_toga->save();

            if (!empty($exist_toga)) {
                // if($exist_toga) {
                if ($exist_toga->size_toga != $request->size_toga) {
                    $datae_toga['size_toga'] = $request->size_toga;
                }
                else{
                    $datae_toga['size_toga'] = $request->size_toga;
                }
                if ($exist_toga->no_wa != $request->no_wa) {
                    $datae_toga['no_wa'] = $request->no_wa;
                }
                else{
                    $datae_toga['no_wa'] = $request->no_wa;
                }
                Toga::whereMahasiswa_id(Auth::user()->id)->update($datae_toga);
                return back()->with(['success' => 'Data berhasil disimpan.']);

            }
            ## jika tidak ada data di database
            else {
                $data_toga->mahasiswa_id = Auth::user()->id;
                $data_toga->size_toga = $request->size_toga;
                $data_toga->no_wa = $request->no_wa;
                $data_toga->save();
                return back()->with(['success' => 'Data berhasil disimpan.']);

            }
        }
    }
}
