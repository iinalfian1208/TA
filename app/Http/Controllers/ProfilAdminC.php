<?php

namespace App\Http\Controllers;

use App\Models\DataAdminM;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
// use App\Mail\LupaSandiMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilAdminC extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->model = new DataAdminM();
    }

    public function index()
    {
        $data = $this->model->data()->where('email', Auth::user()->email)->get();

        return view('admin.profil', ['data' => $data]);
    }


    public function updateData(Request $request)
    {
        $input = $request->validate([
            'email'      => 'required|email|max:40',
            'nama_admin' => 'required|max:25',
        ]);

        $data    = [
            'email'      => $request->email,
            'nama_admin' => $request->nama_admin,
            'tgl_ubah'   => date('Y-m-d H:i:s'),
        ];

        try {
            $this->model->data()->where('email', auth()->user()->email)->update($data);
            return redirect()->route('profil')->with('success', 'Berhasil memperbarui data profil');
        } catch (\Illuminate\Database\QueryException $ex) {
            $errorCode = $ex->errorInfo[1];
            if($errorCode == 1062){
                $request->validate([
                    'email'      => 'required|email|unique:t_admin,email|max:40'
                ]);
            }
            return redirect()->route('profil');
        }
    }

    public function updatePass(Request $request)
{
    try {
        $input = $request->validate([
            'password'            => 'required',
            'password_baru'       => ['required', 'string', 'min:8', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/'],
            'konfirmasi_password' => ['same:password_baru'],
        ], [
            'password_baru.min'    => 'Password harus memiliki minimal :min karakter.',
            'password_baru.regex'  => 'Password harus terdiri dari huruf, angka, dan setidaknya satu simbol.',
        ]);

        if (Hash::check($request->password, auth()->user()->password)) {
            $data = [
                'password' => Hash::make($request->password_baru),
                'tgl_ubah' => date('Y-m-d H:i:s'),
            ];

            $this->model->data()->where('email', auth()->user()->email)->update($data);

            Alert::success('Berhasil!', 'Password berhasil diubah')->position('');
            return redirect()->route('profil');
        }

        Alert::error('Gagal!', 'Password saat ini tidak sama')->position('');
        return redirect()->route('profil')->withErrors(['password' => 'Password saat ini tidak sama.']);
    } catch (ValidationException $e) {
        throw $e;
    }
}

    // public function updatePass(Request $request)
    // {
    //     $input = $request->validate([
    //         'password'            => 'required',
    //         // 'password_baru'       => ['required', Rules\Password::defaults()],
    //         'password_baru'       => ['required', 'string', 'min:8', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/'],
    //         'konfirmasi_password' => ['same:password_baru'],
    //     ]);

    //     if (Hash::check($request->password,  auth()->user()->password)) {
    //         $data    = [
    //             'password'   => Hash::make($request->password_baru),
    //             'tgl_ubah'   => date('Y-m-d H:i:s'),
    //         ];

    //         $this->model->data()->where('email', auth()->user()->email)->update($data);

    //         // Mail::to(auth()->user()->email)->send(new UpdateSandiMail(Auth::user()->email));
    //         // Session::flash('sukses', 'Berhasil memperbarui password');
    //         return redirect()->route('profil')->with('toast_success', 'Berhasil Merubah Password.');
    //     }
    //     // Session::flash('error', 'password saat ini tidak sama.');
    //     return redirect()->route('profil')->with('toast_error', 'Password Saat Ini Tidak Sama.');
    // }

    public function delete($email)
    {
        $this->model->data()->where('email', $email)->delete();
        return redirect()->route('data_admin');
    }

    public function gotoReset()
    {
        // $request->validate([
        //     'email' => 'required|email',
        // ]);

        $data   = $this->model->data()->where('email', Auth::user()->email)->get();

        if (count($data) == 0) {
            // Session::flash('error', 'Email tidak ada dalam daftar');
            return redirect()->back()->with('error', 'Email Tidak Ada Dalam Daftar');
        } else {
            // $token = Str::random(64);
            $email    = $data[0]->email;
            $password = $data[0]->password;
            $link     = route('verif_token', ['email' => $email, 'token' => $password]);
            // return $email.$password;
            Mail::to($data[0]->email)->send(new LupaSandiMail($data[0]->nama_admin, $link));

            // Session::flash('sukses', 'Periksa email Anda untuk merubah password. Periksa pada SPAM jika tidak terdapat di kotak masuk');
            return redirect()->route('profil')->with('success', 'Periksa email Anda untuk merubah password. Periksa pada SPAM jika tidak terdapat di kotak masuk');
        }
    }
}
