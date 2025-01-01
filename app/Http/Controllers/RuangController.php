<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpWord\IOFactory as IOWord;
use Spipu\Html2Pdf\Html2Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\TemplateProcessor;
use Dompdf\Dompdf;


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

    public function ruangexcelimport(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();

        $rows = [];
        foreach ($sheet->getRowIterator() as $row) {
            $cells = [];
            foreach ($row->getCellIterator() as $cell) {
                $cells[] = $cell->getValue();
            }
            $rows[] = $cells;
        }

        // Debug: Lihat data yang diimport
        dd($rows);
    }

    public function ruangword()
    {
        $templatePath = storage_path('templates/template_word.docx');

        if (!file_exists($templatePath)) {
            abort(404, 'Template file not found.');
        }

        $templateProcessor = new TemplateProcessor($templatePath);
        $templateProcessor->setValue('nama_data', 'Data Ruang');
        /** @disregard P1013 */
        $templateProcessor->setValue('pencetak', auth()->user()->nama);

        $table = new Table(['width' => 8000, 'unit' => 'dxa']);
        $table->addRow(300);
        $table->addCell(100)->addText('No');
        $table->addCell(3500)->addText('Nama Ruang');

        $ruang_collections = Ruang::all();

        $no = 1;
        foreach($ruang_collections as $ruang) {
            $table->addRow(300);
            $table->addCell(100)->addText($no++);
            $table->addCell(3500)->addText($ruang->nama_ruang);
        }

        $templateProcessor->setComplexBlock('table', $table);

        $pathToSave = 'result_surat.docx';
        $templateProcessor->saveAs($pathToSave);

        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=data_ruang.docx');

        readfile($pathToSave);
        unlink($pathToSave);
    }


    public function ruangwordpdf()
    {
        $templatePath = storage_path('templates/template_word.docx');

        if (!file_exists($templatePath)) {
            abort(404, 'Template file not found.');
        }

        $templateProcessor = new TemplateProcessor($templatePath);
        $templateProcessor->setValue('nama_data', 'Data Ruang');
        /** @disregard P1013 */
        $templateProcessor->setValue('pencetak', auth()->user()->nama);

        //styling lengkap ada di htdocs/pais
        $headerCellStyle = [
            'valign' => 'center',
            'bgColor' => '204853',
            'borderSize' => 6,
            'borderColor' => '204853',
            'cellMargin' => 80
        ];

        $contentCellStyle = [
            'valign' => 'center',
            'borderTopSize' => 6,
            'borderTopColor' => '000000',
            'borderBottomSize' => 6,
            'borderBottomColor' => '000000',
            'cellMargin' => 80
        ];

        $titleFontStyle = [
            'bold' => true,
            'color' => 'ffffff',
            'size' => 10,
            // 'name' => 'Century Gothic (Headings)'
        ];

        $contentFontStyle = [
            'size' => 10,
            // 'name' => 'Garamond (Body)'
        ];

        $paragraphStyle = [
            'align' => 'center',
        ];

        $textParagraphStyle = [
            'align' => 'left',
        ];

        $table = new Table(['width' => 8000, 'unit' => 'dxa']);
        $table->addRow(300);
        $table->addCell(100, $headerCellStyle)->addText('No', $titleFontStyle, $paragraphStyle);
        $table->addCell(3500, $headerCellStyle)->addText('Nama Ruang', $titleFontStyle, $paragraphStyle);

        $no = 1;
        $ruang_collections = Ruang::all();
        foreach ($ruang_collections as $ruang) {
            $table->addRow(300);
            $table->addCell(100, $contentCellStyle)->addText($no++, $contentFontStyle, $paragraphStyle);
            $table->addCell(3500, $contentCellStyle)->addText($ruang->nama_ruang, $contentFontStyle, $textParagraphStyle);
        }

        $templateProcessor->setComplexBlock('table', $table);

        $pathToSave = 'result_surat.docx';
        $templateProcessor->saveAs($pathToSave);

        $phpWord = IOWord::load($pathToSave, 'Word2007');
        $xmlWriter = IOWord::createWriter($phpWord, 'HTML');

        // Simpan file HTML sementara
        $tempHtmlFile = storage_path('result.html');
        $xmlWriter->save($tempHtmlFile);

        // $html2pdf = new Html2Pdf('P', 'A4', 'en');
        // $html2pdf->pdf->setDisplayMode('fullpage');
        // $html2pdf->writeHTML(file_get_contents($tempHtmlFile));
        // $html2pdf->output('cetak_ruang.pdf');

        $dompdf = new Dompdf();
        $dompdf->loadHtml(file_get_contents($tempHtmlFile));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Kirim file PDF ke browser untuk diunduh
        return response($dompdf->output())
            ->header('Content-Type', 'application/pdf')
          ;

        unlink($pathToSave);
        unlink(storage_path('result.html'));
    }

}
