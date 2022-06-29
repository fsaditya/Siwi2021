<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\NotificationSender;
use Illuminate\Support\Facades\Notification;

class CekNpmController extends Controller
{
    public function index()
    {
        return view('welcome');
    }


    public function notification()
    {

        return view('notification-check');
    }


    public function ceknpm(Request $request)
    {
    	$this->validate($request,[
    		'npm' => 'required'
    	]);

        $npm = $request->npm;
        $ceknpm = Mahasiswa::where('npm', '=', $npm)->first();
        if ($ceknpm === null) {
            return back()->with(['error' => 'NPM tidak ditemukan']);
        }
        else{
            $cekuser = User::where('npm', '=', $npm)->first();
            if($cekuser === null){
                $datamahasiswa = Mahasiswa::select('nama', 'email')
                            ->where('npm', $npm)
                            ->first();
                // return redirect('register')->with('npm', $npm);
                return redirect('register')->with('npm', $npm)->with('email' , $datamahasiswa->email)->with('nama' , $datamahasiswa->nama);
                // return view('auth.register', ['npm' =>$npm, 'email' => $datamahasiswa->email, 'nama' => $datamahasiswa->nama]);
            }
            else{
                $datamahasiswa = Mahasiswa::select('nama', 'email')
                            ->where('npm', $npm)
                            ->first();
                // return redirect()->route('login', ['npm' =>$npm, 'email' => $datamahasiswa->email, 'nama' => $datamahasiswa->nama]);
                return redirect('login')->with('npm', $npm)->with('email' , $datamahasiswa->email)->with('nama' , $datamahasiswa->nama);
                // return view('auth.login',['npm' =>$npm, 'email' => $datamahasiswa->email, 'nama' => $datamahasiswa->nama]);
            }
        }
    }
}
