<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;
use App\Models\Training;
use App\Models\Pegawai;
use App\Models\PegawaiTraining;

class AdminTrainingPegawaiController extends Controller
{

    public function create(){
        $trainings = Training::all();
        $pegawais = Pegawai::all();
        return view('pages.admin.training-pegawai.create',[
            'trainings' => $trainings,
            'pegawais' => $pegawais,
       
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:trainings,id',
            'pegawai_id' => 'required|exists:pegawais,id',
            'tgl_sertifikat' => 'required|date',
        ]);

        $trainingId = $request->input('id');
        $pegawaiId = $request->input('pegawai_id');
        $tglSertifikat = $request->input('tgl_sertifikat');

        PegawaiTraining::create([
            'pegawai_id' => $pegawaiId,
            'training_id' => $trainingId,
            'tgl_sertifikat' => $tglSertifikat,
        ]);

        session()->flash('success', 'Data berhasil disimpan.');

        return redirect()->route('create-pegawai-training');
    }

    public function datakaryawan()
    {
        if (request()->ajax()) {
            $query = PegawaiTraining::with(['pegawai','training']);

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                    type="button" id="action' .  $item->id . '"
                                        data-toggle="dropdown" 
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        Aksi
                                </button>

                                <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                    <a class="dropdown-item" href="' . route('data-karyawan-edit', $item->id) . '">
                                        Edit
                                    </a>
                                    <form action="' . route('data-karyawan-destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.admin.training-pegawai.index');
    }

    public function datatraining()
    {
        if (request()->ajax()) {
            $query = PegawaiTraining::with(['pegawai','training']);

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                    type="button" id="action' .  $item->id . '"
                                        data-toggle="dropdown" 
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        Aksi
                                </button>

                                <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                    <a class="dropdown-item" href="' . route('data-karyawan-edit', $item->id) . '">
                                        Edit
                                    </a>
                                    <form action="' . route('data-karyawan-destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>';
                })
                
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.admin.training-pegawai.training');
    }

    public function edit_data_karyawan($id)
    {
        $item = PegawaiTraining::findOrFail($id);
        $trainings = Training::all();
        $pegawais = Pegawai::all();

        return  view('pages.admin.training-pegawai.edit-data-karyawan',[
            'item' => $item,
            'trainings' => $trainings,
            'pegawais' => $pegawais
        ]);
    }

    public function update_data_karyawan(Request $request, $id)
    {
        //
        $data = $request->all();

        $item = PegawaiTraining::findOrFail($id);

        $item->update($data);


        return redirect()->route('data-karyawan-index');
    }
    

    public function destroy_data_karyawan($id)
    {
        //
        $item = PegawaiTraining::findOrFail($id);

        $item->delete();

        return redirect()->route('data-karyawan-index');
    }


}
