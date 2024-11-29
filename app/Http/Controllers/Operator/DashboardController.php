<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\operator;
use App\Models\Mengajar;
use App\Models\Lamaran;
use App\Models\tutor;
use App\Models\tutor_criteria;

class DashboardController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $operator = operator::where('user_id', $id)->first();
        $provinsi = $operator->provinsi_naungan;
        $jumlahtutor = tutor::where('provinsi_naungan', $provinsi)->count();
        $status_pending = 'Menunggu Persetujuan';
        $status_acc = 'Disetujui';
        $pending = tutor_criteria::where('provinsi', $provinsi)
                ->where('status', $status_pending)->count();
        $public = tutor_criteria::where('provinsi', $provinsi)
                ->where('status', $status_acc)->count();
        return view('operator.operator-dashboard', compact('provinsi', 'jumlahtutor', 'pending',
        'public'
    ));
    }

    public function tutorcriteria()
    {
        $id = auth()->user()->id;
        $operator = operator::where('user_id', $id)->first();
        $provinsi = $operator->provinsi_naungan;
        $criteria = DB::table('tutor_criterias')
            ->join('parents', 'tutor_criterias.nik', '=', 'parents.nik')
            ->select('tutor_criterias.*', 'parents.nama_parents as parent_name')
            ->orderBy('created_at', 'desc')
            ->where('tutor_criterias.provinsi', $provinsi)
            ->paginate(10);
        return view('operator.operator-tutor-criteria-inbox', compact('operator', 'criteria'));

    }

    public function tutorcriteriasearch(Request $request)
    {
        $search = $request->input('search');
        // dd($search);
        $id = auth()->user()->id;
        $operator = operator::where('user_id', $id)->first();
        $provinsi = $operator->provinsi_naungan;
        $criteria = DB::table('tutor_criterias')
            ->join('parents', 'tutor_criterias.nik', '=', 'parents.nik')
            ->select('tutor_criterias.*', 'parents.nama_parents as parent_name')
            ->orderBy('created_at', 'desc')
            ->where('tutor_criterias.provinsi', $provinsi);

            $result = $criteria->where(function($query) use ($search) {
                $query->orWhere('nama_parents', 'like', "%{$search}%")
                      ->orWhere('tutor_criterias.nik', 'like', "%{$search}%");
                    })->orderBy('created_at', 'desc')
                    ->paginate(5);
        return view('operator.operator-tutor-criteria-inbox', compact('result', 'search', 'operator'));

    }

    public function tutorcriteriadetail($id_lowongan)
    {
        $id = auth()->user()->id;
        $operator = operator::where('user_id', $id)->first();
        $provinsi = $operator->provinsi_naungan;
        $data = DB::table('tutor_criterias')
        ->join('parents', 'tutor_criterias.nik', '=', 'parents.nik')
        ->select('tutor_criterias.*', 'parents.nama_parents as parent_name')
        ->where('id', $id_lowongan)
        ->first();

        return view('operator.operator-tutor-criteria-inbox-detail', compact('data'));
    }

    public function tutorcriteria_terima($id_lowongan){

        $data = tutor_criteria::where('id', $id_lowongan)->first();
        $data->status = "Disetujui";
        $data->save();
        return redirect()->back()->with('success_terima', 'status berhasil di ubah');
    }

    public function tutorcriteria_tolak($id_lowongan){
        

        $data = tutor_criteria::where('id', $id_lowongan)->first();
        $data->status = "Ditolak";
        $data->save();
        return redirect()->back()->with('success_tolak', 'status berhasil di ubah');
    }

    public function profile(){
        $id = auth()->user()->id;
        $operator = operator::where('user_id', $id)->first();

        return view('operator.operator_profile', compact('operator'));
    }

    public function editpassword(){
        return view('operator.operator-edit-profile_password');
    }

    public function inserteditpassword(Request $request)
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

    public function tampilstatusmengajar()
    {
        $id = auth()->user()->id;
        $operator = operator::where('user_id', $id)->first();
        $provinsi = $operator->provinsi_naungan;
        $data = DB::table('mengajars')->join('parents', 'mengajars.nik_parent', '=', 'parents.nik')
                ->join('tutors', 'mengajars.nik_tutor', '=', 'tutors.nik')
                ->select('*', 'mengajars.status as status_mengajar', 'mengajars.created_at as waktu',
                'mengajars.updated_at as waktu_berakhir')
                ->where('parents.provinsi', $provinsi)
                ->paginate(10);
                // dd($data);
                
        return view('operator.operator-tutor-status', compact('data', 'provinsi'));
    }

    public function tampilstatusmengajarsearch(Request $request)
    {
    $search = $request->input('search');
    $id = auth()->user()->id;
    $operator = operator::where('user_id', $id)->first();
    $provinsi = $operator->provinsi_naungan;

    // Query dengan filter dan pagination langsung
    $result = DB::table('mengajars')
        ->join('parents', 'mengajars.nik_parent', '=', 'parents.nik')
        ->join('tutors', 'mengajars.nik_tutor', '=', 'tutors.nik')
        ->select('*', 'mengajars.status as status_mengajar', 'mengajars.created_at as waktu', 'mengajars.updated_at as waktu_berakhir')
        ->where('parents.provinsi', $provinsi)
        ->where(function ($query) use ($search) {
            $query->where('parents.nik', 'like', "%{$search}%")
                  ->orWhere('tutors.nik', 'like', "%{$search}%")
                  ->orWhere('tutors.nama_tutor', 'like', "%{$search}%");
        })
        ->orderBy('mengajars.created_at', 'desc')
        ->paginate(5);

    return view('operator.operator-tutor-status', compact('provinsi', 'search', 'result'));
    }


    public function hentikan_mengajar($id)
    {

        $data_mengajar = Mengajar::where('id', $id)->first();
        $data_lamaran = Lamaran::where('id_lamaran', $data_mengajar->lamaran_id)->first();
        $data_lowongan = tutor_criteria::where('id', $data_mengajar->lowongan_id)->first();
        $data_mengajar->status = 'Berhenti';
        $data_lowongan->status_accept = 'Belum Dilamar';
        $data_mengajar->save();
        $data_lowongan->save();
        DB::beginTransaction();
        
        try {
            $data_lamaran->delete();

            // Jika semua operasi berhasil, komit transaksi
            DB::commit();

            return redirect()->back()->with('success', 'Tutor berhasil dihentikan.');
        } catch (\Exception $e) {
            // Jika ada kesalahan, rollback transaksi
            dd($e);
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghentikan tutor.');
        }

        return redirect()->back()->with('success', 'Berhentikan Mengajar');
    }

    // public function tampilstatusmengajar_detail($id){

    //     $data = tutor_criteria::where('id', $id)->first();

    //     dd($data);
    //     return view('operator.detail_pengajar', compact('data'));
    // }
    
}
