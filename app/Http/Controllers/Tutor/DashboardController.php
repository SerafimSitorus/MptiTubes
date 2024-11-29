<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\tutor_criteria;
use App\Models\tutor;
use App\Models\Lamaran;
use App\Models\Mengajar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $nik = tutor::where('user_id', $id)->first()->nik;
        $status_pending = 'Menunggu Persetujuan';
        $status_disetujui = 'Disetujui';
        $data_setuju = Lamaran::where('nik_tutor', $nik)
            ->where('status', $status_disetujui)->count();
        $data_pending = Lamaran::where('nik_tutor', $nik)
        ->where('status', $status_pending)->count();
        return view('tutor.tutor-dashboard', compact('data_setuju', 'data_pending'));
    }

    public function alljob()
    {
        $alljob = tutor_criteria::where('status', 'Disetujui')
                    ->where('status_accept', 'Belum Dilamar')
                    ->orderBy('created_at', 'desc')
                    ->paginate(6);

        return view('tutor.tutor-alljob', compact('alljob'));
    }

    public function searchjob(Request $request)
    {
        $search = $request->input('search');

        $result = tutor_criteria::where('status', 'Disetujui')
            ->where('status_accept', 'Belum Dilamar')
            ->where(function($query) use ($search) {
                $query->orWhere('jenis_kelamin', 'like', "%{$search}%")
                      ->orWhere('provinsi', 'like', "%{$search}%")
                      ->orWhere('alamat_mengajar', 'like', "%{$search}%")
                      ->orWhere('universitas_sekolah', 'like', "%{$search}%")
                      ->orWhere('student_level', 'like', "%{$search}%")
                      ->orWhere('jurusan', 'like', "%{$search}%")
                      ->orWhere('mata_pelajaran', 'like', "%{$search}%")
                      ->orWhere('hari', 'like', "%{$search}%")
                      ->orWhere('jam', 'like', "%{$search}%")
                      ->orWhere('fee', 'like', "%{$search}%");

                // Penanganan khusus untuk jenis_kelamin
                if (strtolower($search) == 'perempuan') {
                    $query->orWhere('jenis_kelamin', 'P');
                } elseif (strtolower($search) == 'laki laki') {
                    $query->orWhere('jenis_kelamin', 'L');
                }
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('tutor.tutor-alljob', compact('result', 'search'));
    }

    public function detailjob($id_job)
    {
        $data = DB::table('tutor_criterias')
        ->join('parents', 'tutor_criterias.nik', '=', 'parents.nik')
        ->select('tutor_criterias.*', 'parents.nama_parents as parent_name', 'parents.no_hp as kontak')
        ->where('id', $id_job)
        ->first();
        return view('tutor.detail_job', compact('data'));
    }

    public function lamarjob($id_lowongan)
    {
        $lowongan = tutor_criteria::where('id', $id_lowongan)->first();
        $nik_tutor = tutor::where('user_id', auth()->user()->id)->first();
        $status = 'Menunggu Persetujuan';
        // dd($lowongan->nik);

        $existing = Lamaran::where('nik_tutor', $nik_tutor->nik)
                    ->where('lowongan_id', $id_lowongan)
                    ->first();

        if($existing) {
            return redirect()->route('tutor.alljob')->with('gagal_lamar', 'Gagal melamar karena sudah di ambil');
        }
        try {
            $lamar = [
                'nik_tutor' => $nik_tutor->nik, 
                'nik_parent' => $lowongan->nik,
                'lowongan_id' => $id_lowongan,
                'status' => $status
            ];

            Lamaran::create($lamar);

            return redirect()->route('tutor/dashboard')->with('success_lamar', 'Berhasil Melamar Pekerjaan');
        } catch (\Throwable $th) {
            dd($th);
        }

        
    }

    public function historyjob()
    {
        $id = auth()->user()->id;
        $pelamar = tutor::where('user_id', $id)->first();
        $nik_pelamar = $pelamar->nik;
        $data = DB::table('tutor_criterias')
        ->join('lamarans', 'tutor_criterias.id', '=', 'lamarans.lowongan_id')
        ->select('tutor_criterias.*', 'lamarans.*', 'tutor_criterias.id as kode',
        'lamarans.id_lamaran as kode_lamaran',
        'lamarans.created_at as waktu')
        ->where('nik_tutor', $nik_pelamar)->orderBy('waktu', 'desc')->paginate(5);
        return view('tutor.tutor-history', compact('data'));
    }

    public function detailhistoryjob($id)
    {
        $data = DB::table('tutor_criterias')
        ->join('parents', 'tutor_criterias.nik', '=', 'parents.nik')
        ->select('tutor_criterias.*', 'parents.nama_parents as parent_name',
        'no_hp as kontak')
        ->where('id', $id)
        ->first();
        return view('tutor.detail_job_history', compact('data'));
    }

    public function batalkanlamaran($id)
    {
        $lamaran = Lamaran::where('id_lamaran', $id)->first();
        $lamaran->delete(); 

        return redirect()->route('historyjob')->with('success_hapus', 'Lamaran Berhasil dibatalkan');
    }

    public function profile()
    {
        $tutors = tutor::where('user_id', auth()->id())->first();

        return view('tutor.tutor-profil', compact('tutors'));
    }

    public function editprofile()
    {
        $tutors = tutor::where('user_id', auth()->id())->first();
        $provinsiList = $this->getProvinsiList();

        return view('tutor.edit-profile-tutor', compact('tutors', 'provinsiList'));
    }

    public function inserteditprofile(Request $request)
    {
        $id = $request->id;
        $tutors = tutor::where('user_id', $id)->first();

        $request->validate([
            'nik' => [
                'required',
                'string',
                'max:16',
                'unique:tutors,nik,' . $request->id . ',user_id' // Menyatakan bahwa NIK harus unik di antara tutors, kecuali untuk current authenticated user
            ],
            'nama_tutor' => 'required|string|max:150',
            'jenis_kelamin' => 'required|in:P,L',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|string|max:14',
            'provinsi_naungan' => 'required|string|in:' . implode(',', $this->getProvinsiList()),
            'alamat_domisili' => 'required|string|max:250',
            'universitasorsekolah' => 'required|string|max:250',
            'jenjang_pendidikan' => 'required|in:S3,S2,S1,SMA,SMK',
            'jurusan' => 'required|string|max:100',
            'status' => '|in:Aktif,Tidak Aktif,Diberhentikan',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cv' => 'required|file|max:2048|mimes:pdf,doc,docx'
        ]);

        $user = auth()->user();

        // Handle profile image upload
        if ($request->hasFile('image')) {
            if ($tutors->image) {
                Storage::delete($tutors->image);
            }
            $path = public_path('images/');
            $newimage = $request->file('image');
            $imagename = $user->username . '.' . $newimage->getClientOriginalExtension();
            $newimage->move($path, $imagename);
            $pathimage = 'images/' . $imagename;
            $tutors->image = $pathimage;
            $tutors->save();
        }
        // Handle CV upload
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvName = $user->username . '.cv.' . $cv->getClientOriginalExtension();

            // Move CV to public/cv folder
            $cv->move('cv/', $cvName);

            // Update CV path in the database (optional, depending on your needs)
            $tutors->cv = 'cv/' . $cvName; // Update with relative path if needed
        }
        $tutors->nik = $request->input('nik');
        $tutors->nama_tutor = $request->input('nama_tutor');
        $tutors->jenis_kelamin = $request->input('jenis_kelamin');
        $tutors->tempat_lahir = $request->input('tempat_lahir');
        $tutors->tanggal_lahir = $request->input('tanggal_lahir');
        $tutors->no_hp = $request->input('no_hp');
        $tutors->provinsi_naungan = $request->input('provinsi_naungan');
        $tutors->alamat_domisili = $request->input('alamat_domisili');
        $tutors->universitasorsekolah = $request->input('universitasorsekolah');
        $tutors->jenjang_pendidikan = $request->input('jenjang_pendidikan');
        $tutors->jurusan = $request->input('jurusan');
        $tutors->status = 'Aktif';
        $tutors->save(); // Save the changes to the database

        return redirect()->route('tutor.tutor-profil')->with('success', 'Profil berhasil di update');
    }

    private function getProvinsiList()
    {
        return [
            'Nanggroe Aceh Darussalam',
            'Sumatera Utara',
            'Sumatera Barat',
            'Riau',
            'Kepulauan Riau',
            'Jambi',
            'Sumatera Selatan',
            'Bangka Belitung',
            'Bengkulu',
            'Lampung',
            'DKI Jakarta',
            'Jawa Barat',
            'Banten',
            'Jawa Tengah',
            'DI Yogyakarta',
            'Jawa Timur',
            'Bali',
            'Nusa Tenggara Barat',
            'Nusa Tenggara Timur',
            'Kalimantan Barat',
            'Kalimantan Tengah',
            'Kalimantan Selatan',
            'Kalimantan Timur',
            'Kalimantan Utara',
            'Sulawesi Utara',
            'Sulawesi Tengah',
            'Sulawesi Selatan',
            'Sulawesi Tenggara',
            'Gorontalo',
            'Sulawesi Barat',
            'Maluku',
            'Maluku Utara',
            'Papua Barat',
            'Papua',
            'Papua Tengah',
            'Papua Pegunungan',
            'Papua Selatan',
            'Papua Barat Daya',
        ];
    }

    public function updateemail()
    {
        return view('tutor.edit-email');
    }

    public function insertupdateemail(Request $request)
    {
        $request->validate([
            'current_email' => 'required|email',
            'new_email' => 'required|email|different:current_email'
        ]);


        $user = Auth::user();

        if ($user->email !== $request->current_email) {
            return back()->withErrors(['current_email' => 'Email lama tidak sesuai.']);
        }

        $user->email = $request->new_email;
        $user->save();

        return redirect()->route('tutor.tutor-profil')->with('success_editemail', 'Email Sukses diupdate.');
    }

    public function updatepassword()
    {
        return view('tutor.edit-password');
    }

    public function insertupdatepassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8', // confirmed untuk mencocokkan new_password dengan confirm_password
        ]);

        $user = Auth::user();

        // Memastikan password saat ini benar
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai.']);
        }

        // Update password user
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('tutor.tutor-profil')->with('success_editpassword', 'Password sukses di update.');
    }

    public function jadwal()
    {
        $id = auth()->user()->id;
        $tutor = tutor::where('user_id', $id)->first();
        $status_ngajar = 'Mengajar';
        $kerja = DB::table('mengajars')
        ->join('tutor_criterias', 'mengajars.lowongan_id', '=', 'tutor_criterias.id')
        ->join('tutors', 'mengajars.nik_tutor', '=', 'tutors.nik')
        ->select('tutor_criterias.*')
        ->where('mengajars.nik_tutor', $tutor->nik)
        ->where('mengajars.status', $status_ngajar)->paginate(3);
        // dd($kerja);

        return view('tutor.tutor-schedule', compact('kerja'));
    }

}
