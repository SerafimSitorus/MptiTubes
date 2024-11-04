<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\operator;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OperatorController extends Controller
{
    public function index()
    {
        return view('superadmin/listoperator', [
            'operator' => operator::all(),
        ]);
    }
    public function create()
    {
        return view('superadmin/addoperator');
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'regex:#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$#'
            ],
            'nik' => 'required|regex:/^\d{16}$/',
            'nama_operator' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'provinsi' => 'required',
            'alamat_domisili' => 'required',
            'jenjang_pendidikan' => 'required',
            'jurusan' => 'required',
            'status' => 'required',
            'image' => 'required',
            
        ]);
        DB::beginTransaction();
        try {
            User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'operator',
            ]);
            operator::create([
                'nik' => $request->nik,
                'user_id' => User::latest()->first()->id,
                'nama_operator' => $request->nama_operator,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'provinsi_naungan' => $request->provinsi,
                'alamat_domisili' => $request->alamat_domisili,
                'jenjang_pendidikan' => $request->jenjang_pendidikan,
                'jurusan' => $request->jurusan,
                'status' => $request->status,
                'image' => $request->image,
            ]);
            DB::commit();
            Log::info('info',['berhasil']);
            Toastr::success('Berhasil menambahkan operator', 'success');
            return redirect()->route('superadmin/operator');
        } catch (\Exception $th) {
            DB::rollBack();
            Log::error('error', [$th->getMessage()]);
            Toastr::error('Gagal menambahkan operator', 'error');
            return redirect()->back()->with('error', 'Gagal Menambah Operator');
        }
    }
    public function show(string $nik)
    {
        $operator = Operator::where('nik', $nik)->first();
        if (!$operator) {
            abort(404); // Jika operator tidak ditemukan, tampilkan error 404
        }
    
        $user = User::find($operator->user_id);
        
        return view('superadmin/operatordetail', [
            'operator' => $operator,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $operator = operator::find($id);
        $user = User::find($operator->nik);
        return view('superadmin.editoperator', [
            'operator' => $operator,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'provinsi_naungan' => 'required',
            'alamat_domisili' => 'required',
            'jenjang_pendidikan' => 'required',
            'jurusan' => 'required',
            'status' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $operator = Operator::findOrFail($id); // Find the operator by ID
            $operator->provinsi_naungan = $request->provinsi_naungan;
            $operator->alamat_domisili = $request->alamat_domisili;
            $operator->jenjang_pendidikan = $request->jenjang_pendidikan;
            $operator->jurusan = $request->jurusan;
            $operator->status = $request->status;
            // Update other fields similarly

            $operator->save(); // Save the updated operator

            DB::commit();
            Toastr::success('Operator successfully updated', 'Success');
            return redirect()->route('superadmin/operator');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error updating operator: ' . $e->getMessage());
            Toastr::error('Failed to update operator', 'Error');
            return redirect()->back()->withErrors(['error' => 'Failed to update operator']);
        }
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nik)
    {
        /*
        DB::beginTransaction();
    try {
        // Cari operator berdasarkan 'nik'
        $operator = Operator::where('nik', $nik)->first();

        if (!$operator) {
            throw new \Exception("Operator not found with nik: {$nik}");
        }

        // Hapus user terkait operator
        User::where('id', $operator->user_id)->delete();

        // Hapus operator dari tabel operator
        $operator->delete();

        DB::commit();

        Toastr::success('Operator successfully deleted', 'Success');
        return redirect()->route('superadmin/operator');
    } catch (\Exception $e) {
        DB::rollback();
        Log::error('Error deleting operator: ' . $e->getMessage());
        Toastr::error('Failed to delete operator', 'Error');
        return redirect()->back()->withErrors(['error' => 'Failed to delete operator']);
    }
    */
    }

}