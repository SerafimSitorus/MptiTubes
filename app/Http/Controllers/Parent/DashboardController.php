<?php

namespace App\Http\Controllers\Parent;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\parents as Parents; 
use App\Models\tutor_criteria;
use App\Models\Lamaran;
use App\Models\Mengajar;
use App\Models\tutor;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user()->id;
        $nik = Parents::where('user_id', $user)->first()->nik;
        // $status_mengajar = 'Mengajar'
        $status_public = 'Disetujui';
        $status_pending = 'Menunggu Persetujuan';
        $public = tutor_criteria::where('status', $status_public)
                ->where('nik', $nik)->count();
        $menunggu = tutor_criteria::where('status', $status_pending)
                ->where('nik', $nik)->count();
        $mengajar = Mengajar::where('nik_parent', $nik)->where('status', 'Mengajar')->count();

        return view('parents.dashboard-parents', compact('public', 'mengajar', 'menunggu'));
    }

    public function profile()
    {
        $parents = parents::where('user_id', auth()->id())->first();

        return view('parents.profile', compact('parents'));
    }

    public function editprofile()
    {
        $parents = parents::where('user_id', auth()->id())->first();
        $provinsiList = $this->getProvinsiList();

        return view('parents.edit-profile', compact('parents', 'provinsiList'));
    }

    public function inserteditprofile(Request $request)
        {
            $id = $request->id;
            $parents = parents::where('user_id', $id)->first();

            // dd($parents);
            $request->validate([
                'nik' => [
                'required',
                'string',
                'max:16',
                'unique:parents,nik,' . $request->id . ',user_id' // Menyatakan bahwa NIK harus unik di antara parent, kecuali untuk current authenticated user
                ],
                'nama_parents' => 'required|string|max:150',
                'jenis_kelamin' => 'required|in:P,L',
                'tempat_lahir' => 'required|string|max:100',
                'tanggal_lahir' => 'required|date',
                'no_hp' => 'required|string|max:14',
                'provinsi' => 'required|string|in:' . implode(',', $this->getProvinsiList()),
                'alamat_domisili' => 'required|string|max:250',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $user = auth()->user();

            // Handle profile image upload
            if ($request->hasFile('image')) {
                if ($parents->image){
                    Storage::delete($parents->image);
                }
                $path = public_path('images/');
                $newimage = $request->file('image');
                $imagename = $user->username . '.' .$newimage->getClientOriginalExtension();
                $newimage->move($path, $imagename);
                $pathimage = 'images/' .$imagename;
                $parents->image = $pathimage;
                $parents->save();
            }
            $parents->nik = $request->input('nik');
            $parents->nama_parents = $request->input('nama_parents');
            $parents->jenis_kelamin = $request->input('jenis_kelamin');
            $parents->tempat_lahir = $request->input('tempat_lahir');
            $parents->tanggal_lahir = $request->input('tanggal_lahir');
            $parents->no_hp = $request->input('no_hp');
            $parents->provinsi = $request->input('provinsi');
            $parents->alamat_domisili = $request->input('alamat_domisili');
            $parents->save(); // Save the changes to the database

            return redirect()->route('parents.profile')->with('success', 'Profil berhasil di update');
        }

    public function profile_edit_username()
    {
        return view('parents.edit-username');
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
        return view('parents.edit-email');
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

        return redirect()->route('parents.profile')->with('success_editemail', 'Email Sukses diupdate.');
    }

    public function updatepassword()
    {
        return view('parents.edit-password');
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

        return redirect()->route('parents.profile')->with('success_editpassword', 'Password sukses di update.');
    }

    public function findtutor()
    {
        $parent = parents::where('user_id', auth()->id())->first();
        $nik = $parent->nik;
        $lowongans = tutor_criteria::where('nik', $nik)->get();

        return view('parents.find-tutor-parent', compact('lowongans'));
    }

    public function findtutorform()
    {
        $parent = parents::where('user_id', auth()->id())->first();
        $nik = $parent->nik;
        $lowongans = tutor_criteria::where('nik', $nik)->first();
        $provinsiList = $this->getProvinsiList();
        return view('parents.find-tutor-parent-form', compact('nik', 'provinsiList', 'parent'));
    }

    public function insertfindtutorform(Request $request)
    {
        $request->validate([
            'jenis_kelamin' => 'required',
            'provinsi' => 'required',
            'alamat_mengajar' => 'required|max:250',
            'universitas_sekolah' => 'required|max:250',
            'student_level' => 'required',
            'jurusan' => 'required|max:100',
            'mata_pelajaran' => 'required',
            'hari' => 'required|array',
            'jam' => 'required',
            'fee' => 'required',
            'additional_notes' => 'nullable|max:250',
            'cover_image' => 'nullable|image|max:2048'
        ]);

        $tutorCriteria = new tutor_criteria();
        $tutorCriteria->jenis_kelamin = $request->input('jenis_kelamin');
        $tutorCriteria->provinsi = $request->input('provinsi');
        $tutorCriteria->alamat_mengajar = $request->input('alamat_mengajar');
        $tutorCriteria->universitas_sekolah = $request->input('universitas_sekolah');
        $tutorCriteria->student_level = $request->input('student_level');
        $tutorCriteria->jurusan = $request->input('jurusan');
        $tutorCriteria->mata_pelajaran = $request->input('mata_pelajaran');
        $tutorCriteria->hari = implode(', ', $request->input('hari'));
        $tutorCriteria->jam = $request->input('jam');
        $tutorCriteria->fee = $request->input('fee');
        $tutorCriteria->additional_notes = $request->input('additional_notes');
        $tutorCriteria->status = 'Menunggu Persetujuan';
        $tutorCriteria->nik = $request->input('nik');
        $tutorCriteria->save();

        if ($request->hasFile('cover_image')) {
            $path = public_path('images/cover_criteria');
            $newimage = $request->file('cover_image');
            $imagename = 'cover_' . $tutorCriteria->id . '.' .$newimage->getClientOriginalExtension();
            $newimage->move($path, $imagename);
            $pathimage = 'images/cover_criteria/' .$imagename;
            $tutorCriteria->cover_image = $pathimage;
            $tutorCriteria->save();
        }

        return redirect()->route('parents.find-tutor')->with('success', 'Data berhasil dikirim, Tunggu persetujuan oleh operator untuk di publikasi');
    }

    public function applicants()
    {
        $id = auth()->user()->id;
        $nik = Parents::where('user_id', $id)->first()->nik;
        $data = DB::table('tutor_criterias')
        ->join('lamarans', 'tutor_criterias.id', '=', 'lamarans.lowongan_id')
        ->join('tutors', 'lamarans.nik_tutor', '=', 'tutors.nik')
        ->select('tutor_criterias.*', 'tutors.nama_tutor as tutor_name',
        'lamarans.created_at as waktu', 'lamarans.id_lamaran as lamaran_id', 
        'tutors.nik as tutor_nik', 'tutor_criterias.id as lowongan_tutor', 'lamarans.status as status_lamaransss')
        ->where('nik_parent', $nik)
        ->get();
        return view('parents.tutor-applicants-parent', compact('data'));
    }

    public function detailapplicants($nik)
    {
        $tutors = tutor::where('nik', $nik)->first();
        return view('parents.detail_pengajar', compact('tutors'));
    }

    public function detaillowongan($id)
    {
        $data = tutor_criteria::where('id', $id)->first();
        return view('parents.detail_lowongan', compact('data'));
    }
    
    public function applicants_tolak($id){
        
        $terima = Lamaran::where('id_lamaran', $id)->first();
        $terima->status = 'Ditolak';
        $terima->save();
        return redirect()->back()->with('success_tolak', 'status berhasil di ubah');
    }

    public function applicants_terima($id)
    {
        $terima = Lamaran::where('id_lamaran', $id)->first();
        $status_lamar = tutor_criteria::where('id', $terima->lowongan_id)->first();
        // dd($terima);
        $terima->status = 'Disetujui';
        $terima->save();
        try {
            $terima = [
                'lowongan_id' => $terima->lowongan_id,
                'lamaran_id' => $terima->id_lamaran,
                'nik_tutor' => $terima->nik_tutor,
                'nik_parent' => $terima->nik_parent,
            ];
            
            Mengajar::create($terima);

            $status_lamar->status_accept = 'Sudah Dilamar';
            $status_lamar->save();
            
            return redirect()->back()->with('success_menerima', 'Berhasil Menerima Tutor');
        } catch (\Throwable $th) {
            dd($th);
        }
        dd($terima);

        return redirect()->back()->wit('success_menerima', 'Berhasil menerima tutor');
    }

    public function berhentikantutor()
    {
        $id = auth()->user()->id;
        $nik = Parents::where('user_id', $id)->first()->nik;
        $status = 'Mengajar';
        $kerja = DB::table('mengajars')
        ->join('tutor_criterias', 'mengajars.lowongan_id', '=', 'tutor_criterias.id')
        ->join('tutors', 'mengajars.nik_tutor', '=', 'tutors.nik')
        ->select('tutor_criterias.*', 'mengajars.id as id_mengajar', 
        'tutors.nama_tutor as nama_tutor', 'tutors.image as gambar')
        ->where('mengajars.nik_parent', $nik)
        ->where('mengajars.status', $status)
        ->get();

        return view('parents.tutor-review-parent', compact('kerja'));
    }

    public function berhentikantutortombol($id)
    {

        $data_mengajar = Mengajar::where('id', $id)->first();
        $data_lamaran = Lamaran::where('id_lamaran', $data_mengajar->lamaran_id)->first();
        $data_lowongan = tutor_criteria::where('id', $data_mengajar->lowongan_id)->first();
        $data_mengajar->status = 'Berhenti';
        $data_mengajar->save();
        DB::beginTransaction();
        
        try {
            $data_lamaran->delete();
            $data_lowongan->delete();

            // Jika semua operasi berhasil, komit transaksi
            DB::commit();

            return redirect()->back()->with('success', 'Tutor berhasil dihentikan.');
        } catch (\Exception $e) {
            // Jika ada kesalahan, rollback transaksi
            dd($e);
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghentikan tutor.');
        }
    }
    
}
