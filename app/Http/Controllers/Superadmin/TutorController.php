<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\operator;
use App\Models\tutor;
use App\Models\tutor_criteria;
use Illuminate\Support\Facades\DB;
use App\Models\tutor_review;
use App\Models\tutor_schedule;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function list()
    {
        $provinsilist = $this->getProvinsiList();

        return view('superadmin.tutor-list', [
            'tutor' => tutor::paginate(10)
        ], compact('provinsilist'));
    }

    public function cari_tutor(Request $request){
        $search = $request->input('search');
        $tutor = DB::table('tutors');

        $result = $tutor->where(function($query) use ($search) {
            $query->orWhere('nama_tutor', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%")
                  ->orWhere('no_hp', 'like', "%{$search}%")
                  ->orWhere('provinsi_naungan', 'like', "%{$search}%");
                })->orderBy('created_at', 'desc')
                ->paginate(5);
        return view('superadmin.tutor-list', compact('result', 'search'));
    }

    public function listProvinsiTutor(Request $request) 
    {
        $provinsilist = $this->getProvinsiList();
        $filter = $request->input('province');
        $result = tutor::where('provinsi_naungan', $filter)->paginate(10);

        return view('superadmin.tutor-list', compact('result', 'provinsilist'));
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

    public function list_detail(string $id)
    {
        return view('superadmin.tutor-list-detail', [
            'tutor' => tutor::where('nik',$id)->first(),
        ]);
    }

    public function list_edit(string $id)
    {
    
        return view('superadmin.tutor-list-edit', [
            'tutor' => tutor::where('nik',$id)->first()
        ]);
    }

    public function list_update(Request $request, string $id)
    {
        $tutor = tutor::where('nik', $id)->first();

        $tutor->status = $request->status;
        $tutor->save();
        return redirect()->route('superadmin/tutor');
    }
    


    public function criteria()
    {
        $criteria = DB::table('tutor_criterias')
            ->join('parents', 'tutor_criterias.nik', '=', 'parents.nik')
            ->select('tutor_criterias.*', 'parents.nama_parents as parent_name')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('superadmin.tutor-criteria-inbox', compact('criteria'));
    }

    public function criteriasearch(Request $request)
    {
        $search = $request->input('search');
        $criteria = DB::table('tutor_criterias')
            ->join('parents', 'tutor_criterias.nik', '=', 'parents.nik')
            ->select('tutor_criterias.*', 'parents.nama_parents as parent_name');
        $result = $criteria->where(function($query) use ($search) {
            $query->orWhere('parents.nama_parents', 'like', "%{$search}%")
                  ->orWhere('parents.nik', 'like', "%{$search}%")
                  ->orWhere('tutor_criterias.provinsi', 'like', "%{$search}%")
                  ->orWhere('no_hp', 'like', "%{$search}%");
                })->orderBy('created_at', 'desc')
                ->paginate(5);
        return view('superadmin.tutor-criteria-inbox', compact('result'));
    }

    public function criteria_detail(string $id_lowongan)
    {

        $data = DB::table('tutor_criterias')
        ->join('parents', 'tutor_criterias.nik', '=', 'parents.nik')
        ->select('tutor_criterias.*', 'parents.nama_parents as parent_name')
        ->where('id', $id_lowongan)
        ->first();

        return view('superadmin.tutor-criteria-inbox-detail', compact('data'));
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

    public function review()
    {
        return view('superadmin.tutor-review', [
            'review' => tutor_review::all(),
        ]);
    }

    public function review_detail(string $id)
    {
        return view('superadmin.tutor-review-detail', [
            'review' => tutor_review::find($id),
        ]);
    }
}
