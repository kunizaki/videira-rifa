<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Participante;

class ComprovanteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $ticket = DB::table('participant')
            ->select('participant.*','products.name AS product_name','products.price','products.slug', 'products_images.name AS image_name', )
            ->join('products', 'products.id', '=', 'participant.product_id')
            ->join('products_images', 'products_images.product_id', '=', 'products.id')
            ->where('participant.id', '=', $request->id)
            ->first();

        $cotas = count(json_decode($ticket->numbers));
        $cotas_checkout = view('layouts.cotas-checkout', ['participante' => Participante::find($request->id)])->render();

        // dd($cotas);
        $data = [
            'ticket' => $ticket,
            'cotas' =>  $cotas,
            'cotas_innerHtml' => $cotas_checkout
        ];

        return view('comprovante', $data);
    }
}
