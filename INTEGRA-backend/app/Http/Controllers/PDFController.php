<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use App\Models\marketing\Campaign;
use App\Models\Repository\Export;
use App\Models\Repository\Import;
use App\Models\HR\Employee;
use App\Models\PDFFile;
use PDF;
use App\Http\Resources\PDFCollection;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class PDFController extends Controller
{

    public function index() {

        $allowedTypes = [];

        $user = JWTAuth::toUser(JWTAuth::getToken());

        if ($user->hasPermissionTo("Marketing")) {
            $allowedTypes[] = Campaign::class;
        }

        if ($user->hasPermissionTo("HR")) {
            $allowedTypes[] = Employee::class;
        }

        if ($user->hasPermissionTo("Repository")) {
            $allowedTypes[] = Export::class;
            $allowedTypes[] = Import::class;
        }

        $results = PDFFile::whereIn('pdfable_type', $allowedTypes)->get();
        return new PDFCollection($results);
    }

    public function storeCampaign(Request $request , $id){

        $campaign = Campaign::find($id);
        $data = [
            'title' => $campaign->name,
            'date' => date('m/d/Y'),
            'campaign' => $campaign,
            'SM'   => $campaign->socialmedia,
            'TV'   => $campaign->tvs,
            'EV'   => $campaign->events
        ];

        $pdf = PDF::loadView('MarketingPDF', $data);
        $content = $pdf->download('MarketingPDF' .'.pdf');

        PDFFile::create ([

            'name'          => $campaign->name ,
            'content'       => $content ,
            'pdfable_id'    => $campaign->id,
            'pdfable_type'  => Campaign::class,

        ]);


        return $content;

    }

    public function storeExport( $id){

        $export = Export::find($id)->join('employees'  , 'exports.employee_id', '=', 'employees.id')
                                   ->join('customers', 'exports.customer_id', '=', 'customers.id')
                                   ->select( 'employees.firstName  as employee_name'
                                            ,'customers.name as customer_name'
                                            ,'exports.name as export_name' ,'exports.date' ,'exports.total_amount' ,'exports.id')
                                   ->get()->first();

        $product = Export::find($id)->join('export_product', 'exports.id', '=', 'export_product.export_id')
                                   ->join('products'  , 'export_product.product_id', '=', 'products.id')
                                   ->join('categories', 'products.category_id', '=', 'categories.id')
                                   ->select( 'products.name as product_name', 'products.price'
                                    ,'export_product.quantity', 'export_product.total_amount'
                                    ,'categories.name as category_name' )
                                    ->get();

        $data    = [
            'title'    => $export->export_name,
            'date'     => date('m/d/Y'),
            'export'   => $export,
            'product'  => $product

                           ];

        $pdf = PDF::loadView('ExportPDF', $data);
        $content = $pdf->download('ExportPDF' .'.pdf');



        PDFFile::create ([

            'name'          => $export->name ,
            'content'       => $content ,
            'pdfable_id'    => $export->id,
            'pdfable_type'  => Export::class,

        ]);

            return $content;
    }

    public function storeImport( $id){

            $import = Import::find($id)->join('employees'  , 'imports.employee_id', '=', 'employees.id')
                                       ->join('suppliers', 'imports.supplier_id', '=', 'suppliers.id')
                                       ->select('employees.firstName  as employee_name'
                                                ,'suppliers.name as supplier_name'
                                                ,'imports.name as import_name' ,'imports.date' ,'imports.total_amount','imports.id' )
                                       ->get()->first();

            $product = Import::find($id)->join('import_product', 'imports.id', '=', 'import_product.import_id')
                                        ->join('products'  , 'import_product.product_id', '=', 'products.id')
                                        ->join('categories', 'products.category_id', '=', 'categories.id')
                                        ->select( 'products.name as product_name', 'products.price'
                                         ,'import_product.quantity', 'import_product.total_amount'
                                         ,'categories.name as category_name' )
                                         ->get();


            $data    = [
                'title'    => $import->import_name,
                'date'     => date('m/d/Y'),
                'import'   => $import,
                'product'  => $product

                               ];

            $pdf = PDF::loadView('ImportPDF', $data);
            $content = $pdf->download('ImportPDF' .'.pdf');

            PDFFile::create ([

                'name'          => "Import" ,
                'content'       => $content ,
                'pdfable_id'    => $import->id,
                'pdfable_type'  => Import::class,

            ]);

                return $content;
    }

    public function storeEmployeeVecation( $id){

            $employee = Employee::find($id);
            $name = $employee-> firstName;

            $data = [
                'title' => $name,
                'date' => date('m/d/Y'),
                'employee' => $employee,
                'EP'   =>  $employee->employeeVacations,

            ];

            $pdf = PDF::loadView('employeeVacationPDF', $data);
            $content = $pdf->download('employeeVacationPDF'.'.pdf');


            PDFFile::create ([

                'name'          => "Employee Vacation" ,
                'content'       => $content ,
                'pdfable_id'    => $employee->id,
                'pdfable_type'  => Employee::class,

            ]);

            return $content;

    }//error

    public function show($id){
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

    public function destroy($id){
        if( $pdf = PDFFile::findOrFail($id)) {
            $pdf->delete();
            return $this->success();
        }
        else
            return $this->failure();
    }
}
