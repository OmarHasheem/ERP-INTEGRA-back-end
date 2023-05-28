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

    public function index() : PDFCollection
    {
        return new PDFCollection(PDFFile::all());
    }

    public function store(Request $request , $id)
    {

        // $validator = Validator::make($request->all(), [
        //     'name' => 'required | regex:/^[a-zA-Z0-9\s]+$/',
        // ]);

        // if ($validator->fails()) {
        //     return  $validator->errors();
        // }

        $campaign = Campaign::find($id);
        $name = "new";
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

        $pdf = PDFFile::loadView('marketingPDF', $data);
        $content = $pdf->download($name .'.pdf');

        if (PDFFile::create ([

            'name'        => "lolo" ,
            'content'     => $content ,
            'campaign_id' => $id

        ]))
            return $this->success();
        else
            return $this->failure();    
    }

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

    public function destroy($id)
    {
        if( $pdf = PDFFile::findOrFail($id)) {
            $pdf->delete();
            return $this->success();
        } 
        else
            return $this->failure();
    }
}
