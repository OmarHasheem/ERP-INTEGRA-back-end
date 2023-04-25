<?php

namespace App\Http\Controllers\MarketingControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use App\Models\marketing\Campaign;
use App\Models\User;
use App\Models\marketing\PDFFile;
use PDF;
use App\Http\Resources\Marketing\PDFResource;
use App\Http\Resources\Marketing\PDFCollection;
use Illuminate\Support\Facades\Validator;



class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new PDFCollection(PDFFile::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required | alpha:ascii',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }


        $campaign = Campaign::find($id);

        $name = request('name');

        $SM = $campaign->socialmedias;
        $TV = $campaign->tvs;
        $EV = $campaign->events;


        $data = [
            'title' => $name,
            'date' => date('m/d/Y'),
            'campaign' => $campaign,
            'SM'   => $SM,
            'TV'   => $TV,
            'EV'   => $EV
        ];

        $pdf = PDF::loadView('marketingPDF', $data);

        $content = $pdf->download($name .'.pdf');

        if (PDFFile::create ([

            'name'        => "lolo" ,
            'content'     => $content ,
            'campaign_id' => $id

        ]));

        return response()->json(['message' => 'PDF has been stored']);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pdf_file = PDFFile::find($id);

        if (!$pdf_file) {
            abort(404);
        }

        $response = new Response($pdf_file->content, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $pdf_file->name . '"',
        ]);

        return $response;

    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pdf = PDFFile::findOrFail($id);
        $pdf->delete();
        return response()->json(['message' => 'PDF ' . $pdf->name . ' has been deleted']);
    }
}
