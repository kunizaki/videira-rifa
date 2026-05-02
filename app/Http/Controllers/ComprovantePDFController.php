<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Participante;
use Dompdf\Dompdf;
use Dompdf\Options;

class ComprovantePDFController extends Controller
{
    public function __invoke($id)
    {
        $participante = Participante::find($id);
        $config = DB::table('consulting_environments')->where('id', '=', 1)->first();

        $data = [
            'participante' => $participante,
            'config' => $config
        ];
        if ($participante->pagos <= 0) {
            return Redirect::back()->withErrors('O comprovante só pode ser gerado após o pagamento.');
        }

        $view = view('pdf.resumoRifa', $data)->render();

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Set the Content-Disposition header to force download
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="Comprovante ' . $participante->name . '.pdf"');

        // Output the generated PDF to the browser
        $dompdf->stream();
        exit();
    }
}
