<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
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
        return view('superadmin.tutor-list', [
            'tutor' => tutor::all(),
        ]);
    }
    public function list_detail(string $id)
    {
        return view('superadmin.tutor-list-detail', [
            'tutor' => tutor::where('nik',$id)->first(),
            'schedules' => tutor_schedule::where('tutor_name', $id)->get(),
        ]);
    }

    public function criteria()
    {
        $criteria = DB::table('tutor_criterias')
            ->join('parents', 'tutor_criterias.nik', '=', 'parents.nik')
            ->select('tutor_criterias.*', 'parents.nama_parents as parent_name')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('superadmin.tutor-criteria-inbox', compact('criteria'));
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
