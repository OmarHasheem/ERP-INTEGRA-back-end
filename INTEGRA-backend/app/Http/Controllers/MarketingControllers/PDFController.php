<?php

namespace App\Http\Controllers\MarketingControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use App\Models\marketing\Campaign;
use App\Models\User;
use App\Models\Repository\Export;
use App\Models\Repository\Import;
use App\Models\HR\Employee;
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

    public function storeCampaign(Request $request , $id)
    {

        // $validator = Validator::make($request->all(), [
        //     'name' => 'required | regex:/^[a-zA-Z0-9\s]+$/',
        // ]);

        // if ($validator->fails()) {
        //     return  $validator->errors();
        // }

        $campaign = Campaign::find($id);
        $name = "new";
        $SM = $campaign->socialmedia;
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

        
        PDFFile::create ([

            'name'          => "lolo" ,
            'content'       => $content ,
            'pdfable_id'    => $campaign->id,
            'pdfable_type'  => Campaign::class,

        ]);


        return $content;
 
    }


    public function storeExport(Request $request , $id)
    {

        // $validator = Validator::make($request->all(), [
        //     'name'         => 'required | regex:/^[a-zA-Z0-9\s]+$/',
        //     'date'         => 'required | date',
        //     'total_amount' => 'required | numeric',
        //     'customer_id'  => 'required | regex:/^[a-zA-Z0-9\s]+$/',
        //     'employee_id'  => 'required | regex:/^[a-zA-Z0-9\s]+$/',
        // ]);

        // if ($validator->fails()) {
        //     return  $validator->errors();
        // }

        $export  = Export::find($id);
        $name    = $export->name;
        foreach($export->products as $product ){
        
        $data    = [
            'title'    => $name,
            'date'     => date('m/d/Y'),
            'export'   => $export,
            'product'  => $product
            
                           ];  
                        

        $pdf = PDF::loadView('exportPDF', $data);
        $content = $pdf->download($name .'.pdf');
                        }

        // PDFFile::create ([

        //     'name'          => "lolo" ,
        //     'content'       => $content ,
        //     'pdfable_id'    => $export->id,
        //     'pdfable_type'  => Export::class,

        // ]);
            return $content;
        }

        public function storeEmployeeVacation(Request $request , $id)
        {
    
            // $validator = Validator::make($request->all(), [
            //     'name' => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            // ]);
    
            // if ($validator->fails()) {
            //     return  $validator->errors();
            // }
    
            $employee = Employee::find($id);
            $name = $employee-> firstName;
            $EP = $employee->employeeVacations;
            
            $data = [
                'title' => $name,
                'date' => date('m/d/Y'),
                'employee' => $employee,
                'EP'   => $EP,

            ];
    
            $pdf = PDF::loadView('employeeVacationPDF', $data);
            $content = $pdf->download($name .'.pdf');
    
            
            PDFFile::create ([
    
                'name'          => "lolo" ,
                'content'       => $content ,
                'pdfable_id'    => $employee->id,
                'pdfable_type'  => Employee::class,
    
            ]);
    
    
            return $content;
     
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
