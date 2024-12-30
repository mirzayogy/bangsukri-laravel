<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;
use Spipu\Html2Pdf\Html2Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruang_collections = Ruang::all();
        return view('ruang.index', [
            "title" => "Ruang",
            "master_show" => 'show',
            "master_active" => 'active',
            "ruang_active" => 'link-success',
            "ruang_collections" => $ruang_collections,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ruang.create', [
            "title" => "Ruang",
            "master_show" => 'show',
            "master_active" => 'active',
            "ruang_active" => 'link-success',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_ruang' => 'required|min:3|max:255|unique:ruang',
        ]);

        Ruang::create($validatedData);
        return redirect('/ruang')->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruang $ruang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruang $ruang)
    {
        return view('ruang.edit', [
            "title" => "Ruang",
            "master_show" => 'show',
            "master_active" => 'active',
            "ruang_active" => 'link-success',
            "ruang" => $ruang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruang $ruang)
    {
        $request->validate([
            'nama_ruang' => 'required|min:3|max:255|unique:ruang,nama_ruang,' . $ruang->id,
        ]);

        $ruang->update([
            'nama_ruang' => $request->nama_ruang,
        ]);
        return redirect('/ruang')->with('success', 'Berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruang $ruang)
    {
        Ruang::destroy($ruang->id);
        return redirect('/ruang')->with('success', 'Berhasil hapus data');
    }

    public function ruangpdf()
    {
        $ruang_collections = Ruang::all();

        $content = view('ruang.pdf', [
            "ruang_collections" => $ruang_collections,
        ]);

        $html2pdf = new Html2Pdf('P','A4','en');
        $html2pdf->pdf->setDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
        $html2pdf->output('cetak_ruang.pdf');

    }

    public function ruangexcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Ruang');

        $ruang_collections = Ruang::all();
        $row = 2;
        foreach ($ruang_collections as $ruang) {
            $sheet->setCellValue("A{$row}", $ruang->id);
            $sheet->setCellValue("B{$row}", $ruang->nama_ruang);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'ruang.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"{$fileName}\"");

        $writer->save('php://output');
    }

}
