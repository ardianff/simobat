<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // mengirimkan request ajax berupa json dan diolah oleh ajax di view medicine index
        if ($request->ajax()) {
            $medicines = Medicine::with('user')->get();
            return DataTables::of($medicines)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<table><tbody><tr class="text-center">';
                    $btn = $btn . '<td class="text-center">
                            <form action="' . route('medicine.show', $row->id) . '" method="post" class="d-inline" title="Lihat Data Obat '  . $row->medicine_name . '">
                            ' . method_field('GET') . '
                            ' . csrf_field() . '
                            <button class="btn btn-info btn-sm me-2"><i class="fa-regular fa-eye"></i></button>
                            </form>
                            </td>';
                    $btn = $btn . '<td class="text-center">
                            <form action="' . route('medicine.edit', $row->id) . '" method="post" class="d-inline" title="Edit Data Obat '  . $row->medicine_name . '">
                            ' . method_field('GET') . '
                            ' . csrf_field() . '
                            <button class="btn btn-warning btn-sm me-2"><i class="fa-regular fa-pencil"></i></button>
                            </form>
                            </td>';
                    $btn = $btn . '<td class="text-center">
                            <form action="' . route('medicine.destroy', $row->id) . '" method="post" class="d-inline" title="Hapus Data Obat '  . $row->medicine_name . '">
                            ' . method_field('Delete') . '
                            ' . csrf_field() . '
                            <button class="btn btn-danger btn-sm me-2"><i class="fa-regular fa-trash"></i></button>
                            </form>
                            </td>';

                    $btn = $btn . '</tr></tbody></table>';
                    return $btn;
                })
                ->editColumn('expiry_date', function ($data) {
                    // mengubah format tanggal Y-m-d ke d F Y dan juga ditranslate
                    $formatedDate = Carbon::createFromFormat('Y-m-d', $data->expiry_date)->translatedFormat('d F Y');
                    return $formatedDate;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.medicine.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.medicine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi
        $validator = Validator::make(
            $request->all(),
            [
                'medicine_name' => 'required|min:5',
                'medicine_made' => 'required|min:5',
                'medicine_expiry' => 'required|date'
            ],
            [
                'medicine_name.required' => 'Nama obat tidak boleh kosong',
                'medicine_name.min' => 'Nama obat berisi minimal 5 karakter',
                'medicine_made.required' => 'Form dibuat tidak boleh kosong',
                'medicine_name.min' => 'Form dibuat berisi minimal 5 karakter',
                'medicine_expiry.required' => 'Tanggal kedaluwarsa tidak boleh kosong',
                'medicine_expiry.date' => 'Tanggal kedaluwarsa harus berupa tanggal',
            ]
        );
        // jika validasi false maka kembali ke halaman dengan mengirimkan data lamanya/old data
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        // jika validasi benar maka akan mengambil data dari view dan menyimpan ke database
        else {
            $data = [
                'medicine_name' => $request->medicine_name,
                'medicine_made' => $request->medicine_made,
                'expiry_date' => Carbon::createFromFormat('d-m-Y', $request->medicine_expiry)
                    ->format('Y-m-d'),
                'created_by' => Auth::user()->id
            ];
            // menyimpan ke database
            Medicine::create($data);
            // kembali ke halaman index medicine
            return redirect()->route('medicine.index')->withSuccess('Data Obat berhasil diinput!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // mengambil data obat berdasarkan id dan memparsing datanya ke dalam view
        $medicine = Medicine::with(['user'])->findOrFail($id);
        return view('pages.medicine.view', compact('medicine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // mengambil data obat berdasarkan id dan memparsing datanya ke dalam view
        $medicine = Medicine::with(['user'])->findOrFail($id);
        return view('pages.medicine.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validasi data
        $validator = Validator::make(
            $request->all(),
            [
                'medicine_name' => 'required|min:5',
                'medicine_made' => 'required|min:5',
                'medicine_expiry' => 'required|date'
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {
            $medicine = Medicine::with(['user'])->findOrFail($id);
            $data = [
                'medicine_name' => $request->medicine_name,
                'medicine_made' => $request->medicine_made,
                'expiry_date' => Carbon::createFromFormat('d-m-Y', $request->medicine_expiry)
                    ->format('Y-m-d'),
                'created_by' => Auth::user()->id
            ];
            // melakukan update data setelah validasi benar
            $medicine->update($data);

            return redirect()->route('medicine.index')->with(['success' => 'Data Obat berhasil diubah!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);
        // menghapus data obat namun menggunakan soft delete sehingga data obat masih bisa direstore
        $medicine->delete();

        if ($medicine->delete())
            return redirect()->route('medicine.index')->with(['success' => 'Data Obat berhasil dihapus!']);
        else {
            return redirect()->route('medicine.index')->with(['error' => 'Data Obat gagal dihapus!']);
        }
    }
}