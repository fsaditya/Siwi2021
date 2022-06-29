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

class RegistrasiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $users = DB::table('users')->where('id', '=', $user->id)->get()
        ->first();
        $mahasiswas = DB::table('mahasiswas')->where('npm', '=', $user->npm)->get()
        ->first();
        $toga = DB::table('togas')->where('mahasiswa_id', '=', $mahasiswas->id)->get()
        ->first();
        $prodis = DB::table('prodis')->where('id', '=', $mahasiswas->prodi_id)->get()
        ->first();
        $status_registrasi = DB::table('statuss')->where('id', '=', 1)->get()->first();

        return view('home.register', ['users'=>$users,
                            'mahasiswas'=>$mahasiswas,
                            'prodis'=>$prodis,
                            'status_registrasi'=>$status_registrasi,
                            'toga'=>$toga]
        );
    }

    public function editRegistrasi(){
        $user = Auth::user();
        $editRegistrasi = DB::table('mahasiswas')
              ->where('npm', $user->npm)
              ->update(['status_registrasi' => 0]);
        if($editRegistrasi){
            return back();
        }
        else{
            return back()->with(['error' => 'Gagal']);
        }
    }

    public function lockRegistrasi(Request $request){

        request()->validate([
			'nama' => 'required|string|min:3|max:255',
			'npm' => 'required|string|min:1|max:10',
			'kelas' => 'required|string|min:1|max:255',
			'absen' => 'required|string|min:1|max:255',
			'prodi_id' => 'required|string|min:1|max:255',
			'jenis_kelamin' => 'required|string|min:1|max:255',
			'nama_ayah' => 'required|string|min:1|max:255',
			'nama_ibu' => 'required|string|min:1|max:255'
		]);



        $user = Auth::user();
        $editRegistrasi = DB::table('mahasiswas')
              ->where('npm', $user->npm)
              ->update(['status_registrasi' => 2]);
        if($editRegistrasi){
            return back();
        }
        else{
            return back()->with(['error' => 'Gagal Mengunci Data']);
        }
    }


    public function createRegistrasi(Request $request){
        //validasi
        request()->validate([
			'nama' => 'required|string|min:3|max:255',
			'npm' => 'required|string|min:1|max:10',
			'kelas' => 'required|string|min:1|max:255',
			'absen' => 'required|string|min:1|max:255',
			'prodi_id' => 'required|string|min:1|max:255',
			'jenis_kelamin' => 'required|string|min:1|max:255',
			'nama_ayah' => 'required|string|min:1|max:255',
			'nama_ibu' => 'required|string|min:1|max:255',
            'image' => ['mimes:png,jpg,jpeg', 'max:1024']
		]);

        // $prodis = DB::table('prodis')->where('id', '=', $request->prdi_id)->get()->first();
        $prodis = DB::table('prodis')->where('id', '=', $request->prodi_id)->get()->first();
        ## preset awal
        $destinationPath = 'foto/'.$prodis->nama_prodi.'';

        //inisiasi
        $data_mahasiswa = new Mahasiswa;
        $exist_mahasiswa = Mahasiswa::whereNpm(Auth::user()->npm)->first();
        $data_toga = new Toga;
        $exist_toga = Toga::whereMahasiswa_id($exist_mahasiswa->id )->first();

        ## mulai prosedur editing data
        $registform = $request->file('image');
        if ($registform) {
            # penamaan file baru
            $profilefile = Auth::user()->npm . '_' . $request->nama.'.' .$registform->getClientOriginalExtension();
            # file lama dihapus
            if (!empty($exist_mahasiswa->foto)) {
                if (public_path($destinationPath . '/' . $exist_mahasiswa->foto)) {
                    unlink(public_path($destinationPath . '/' . $exist_mahasiswa->foto));
                }
            }
            # penggantian file lama dengan yang baru
            $registform->move(public_path($destinationPath), $profilefile);
            $data_mahasiswa->foto = $profilefile;
        }


        ## periksa apakah ada data di database table mahasiswa
        if (!empty($exist_mahasiswa)) {
            // if($exist_mahasiswa) {
            if ($exist_mahasiswa->nama != $request->nama) {
                $datae_mahasiwa['nama'] = $request->nama;
            }
            else{
                $datae_mahasiwa['nama'] = $request->nama;
            }
            if ($exist_mahasiswa->npm != $request->npm) {
                $datae_mahasiwa['npm'] = $request->npm;
            }
            else{
                $datae_mahasiwa['npm'] = $request->npm;
            }
            if ($exist_mahasiswa->kelas != $request->kelas) {
                $datae_mahasiwa['kelas'] = $request->kelas;
            }
            else{
                $datae_mahasiwa['kelas'] = $request->kelas;
            }
            if ($exist_mahasiswa->absen != $request->absen) {
                $datae_mahasiwa['absen'] = $request->absen;
            }
            else{
                $datae_mahasiwa['absen'] = $request->absen;
            }
            if ($exist_mahasiswa->prodi_id != $request->prodi_id) {
                $datae_mahasiwa['prodi_id'] = $request->prodi_id;
            }
            else{
                $datae_mahasiwa['prodi_id'] = $request->prodi_id;
            }
            if ($exist_mahasiswa->jenis_kelamin != $request->jenis_kelamin) {
                $datae_mahasiwa['jenis_kelamin'] = $request->jenis_kelamin;
            }
            else{
                $datae_mahasiwa['jenis_kelamin'] = $request->jenis_kelamin;
            }
            $datae_mahasiwa['foto'] = $data_mahasiswa->foto;
            $datae_mahasiwa['status_registrasi'] = 1;

            if (!empty($exist_toga)) {
                // if($exist_toga) {
                if ($exist_toga->nama_ayah != $request->nama_ayah) {
                    $datae_toga['nama_ayah'] = $request->nama_ayah;
                }
                else{
                    $datae_toga['nama_ayah'] = $request->nama_ayah;
                }
                if ($exist_toga->nama_ibu != $request->nama_ibu) {
                    $datae_toga['nama_ibu'] = $request->nama_ibu;
                }
                else{
                    $datae_toga['nama_ibu'] = $request->nama_ibu;
                }
                Toga::whereMahasiswa_id($exist_mahasiswa->id)->update($datae_toga);
                Mahasiswa::whereNpm(Auth::user()->npm)->update($datae_mahasiwa);

                return back()->with(['success' => 'Data berhasil diubah.']);

            }
            ## jika tidak ada data di database
            else {
                $data_toga->mahasiswa_id = $exist_mahasiswa->id;
                $data_toga->nama_ayah = $request->nama_ayah;
                $data_toga->nama_ibu = $request->nama_ibu;
                $data_toga->save();
                Mahasiswa::whereNpm(Auth::user()->npm)->update($datae_mahasiwa);

                return back()->with(['success' => 'Data berhasil disimpan.']);
            }


        }
        ## jika tidak ada data di database table mahasiswa
        else {
            $data_mahasiswa->nama = $request->nama;
            $data_mahasiswa->npm = $request->npm;
            $data_mahasiswa->kelas = $request->kelas;
            $data_mahasiswa->absen = $request->absen;
            $data_mahasiswa->prodi_id = $request->prodi_id;
            $data_mahasiswa->jenis_kelamin = $request->jenis_kelamin;
            $data_mahasiswa['status_registrasi'] = 1;
            $data_mahasiswa->save();

            $data_toga->mahasiswa_id = $exist_mahasiswa->id;
            $data_toga->nama_ayah = $request->nama_ayah;
            $data_toga->nama_ibu = $request->nama_ibu;
            $data_toga->save();

            if (!empty($exist_toga)) {
                // if($exist_toga) {
                if ($exist_toga->nama_ayah != $request->nama_ayah) {
                    $datae_toga['nama_ayah'] = $request->nama_ayah;
                }
                else{
                    $datae_toga['nama_ayah'] = $request->nama_ibu;
                }
                if ($exist_toga->nama_ibu != $request->nama_ibu) {
                    $datae_toga['nama_ibu'] = $request->nama_ibu;
                }
                else{
                    $datae_toga['nama_ibu'] = $request->nama_ibu;
                }
                Toga::whereMahasiswa_id(Auth::user()->id)->update($datae_toga);
                return back()->with(['success' => 'Data dan berkas berhasil disimpan.']);

            }
            ## jika tidak ada data di database
            else {
                $data_toga->mahasiswa_id = Auth::user()->id;
                $data_toga->nama_ayah = $request->nama_ayah;
                $data_toga->nama_ibu = $request->nama_ibu;
                $data_toga->save();
                return back()->with(['success' => 'Data dan berkas berhasil disimpan.']);

            }
        }

        ## periksa apakah ada data di database table toga


    }
}
