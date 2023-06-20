<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([

            //Marketing
            ['name' => 'Marketing' , 'guard_name' => 'api'],
            ['name' => 'HR' , 'guard_name' => 'api'],
            ['name' => 'Repository' , 'guard_name' => 'api'],

            ['name' => 'index campaign' , 'guard_name' => 'api'],
            ['name' => 'store campaign' , 'guard_name' => 'api'],
            ['name' => 'update campaign' , 'guard_name' => 'api'],
            ['name' => 'show campaign' , 'guard_name' => 'api'],
            ['name' => 'destroy campaign' , 'guard_name' => 'api'],
            ['name' => 'attachCampaignToLead campaign' , 'guard_name' => 'api'],
            ['name' => 'detachCampaignToLead campaign' , 'guard_name' => 'api'],
            ['name' => 'showCampaignEvents campaign' , 'guard_name' => 'api'],
            ['name' => 'showCampaignTvs campaign' , 'guard_name' => 'api'],
            ['name' => 'showCampaignSocialMedia campaign' , 'guard_name' => 'api'],
            ['name' => 'showCampaignLeads campaign' , 'guard_name' => 'api'],

            ['name' => 'index socialMedia' , 'guard_name' => 'api'],
            ['name' => 'store socialMedia' , 'guard_name' => 'api'],
            ['name' => 'update socialMedia' , 'guard_name' => 'api'],
            ['name' => 'show socialMedia' , 'guard_name' => 'api'],
            ['name' => 'destroy socialMedia' , 'guard_name' => 'api'],

            ['name' => 'index tv' , 'guard_name' => 'api'],
            ['name' => 'store tv' , 'guard_name' => 'api'],
            ['name' => 'update tv' , 'guard_name' => 'api'],
            ['name' => 'show tv' , 'guard_name' => 'api'],
            ['name' => 'destroy tv' , 'guard_name' => 'api'],

            ['name' => 'index event' , 'guard_name' => 'api'],
            ['name' => 'store event' , 'guard_name' => 'api'],
            ['name' => 'update event' , 'guard_name' => 'api'],
            ['name' => 'show event' , 'guard_name' => 'api'],
            ['name' => 'destroy event' , 'guard_name' => 'api'],

            ['name' => 'index lead' , 'guard_name' => 'api'],
            ['name' => 'store lead' , 'guard_name' => 'api'],
            ['name' => 'update lead' , 'guard_name' => 'api'],
            ['name' => 'show lead' , 'guard_name' => 'api'],
            ['name' => 'destroy lead' , 'guard_name' => 'api'],
            ['name' => 'attachLeadToCustomer lead' , 'guard_name' => 'api'],
            ['name' => 'detachLeadToCustomer lead' , 'guard_name' => 'api'],
            ['name' => 'showLeadCustomers lead' , 'guard_name' => 'api'],
            ['name' => 'showLeadCampaigns lead' , 'guard_name' => 'api'],

            ['name' => 'index customer' , 'guard_name' => 'api'],
            ['name' => 'store customer' , 'guard_name' => 'api'],
            ['name' => 'update customer' , 'guard_name' => 'api'],
            ['name' => 'show customer' , 'guard_name' => 'api'],
            ['name' => 'destroy customer' , 'guard_name' => 'api'],
            ['name' => 'showCustomerLeads customer' , 'guard_name' => 'api'],


            //HR
            ['name' => 'index benefit' , 'guard_name' => 'api'],
            ['name' => 'store benefit' , 'guard_name' => 'api'],
            ['name' => 'update benefit' , 'guard_name' => 'api'],
            ['name' => 'show benefit' , 'guard_name' => 'api'],
            ['name' => 'destroy benefit' , 'guard_name' => 'api'],
            ['name' => 'showbenefitEmployees benefit' , 'guard_name' => 'api'],

            ['name' => 'index department' , 'guard_name' => 'api'],
            ['name' => 'store department' , 'guard_name' => 'api'],
            ['name' => 'update department' , 'guard_name' => 'api'],
            ['name' => 'show department' , 'guard_name' => 'api'],
            ['name' => 'destroy department' , 'guard_name' => 'api'],
            ['name' => 'showdepartmentEmployees department' , 'guard_name' => 'api'],

            ['name' => 'index employee' , 'guard_name' => 'api'],
            ['name' => 'store employee' , 'guard_name' => 'api'],
            ['name' => 'update employee' , 'guard_name' => 'api'],
            ['name' => 'show employee' , 'guard_name' => 'api'],
            ['name' => 'destroy employee' , 'guard_name' => 'api'],
            ['name' => 'destroy showEmployeeDetails' , 'guard_name' => 'api'],
            ['name' => 'attachBenefitToEmployee employee' , 'guard_name' => 'api'],

            ['name' => 'index employeeCertificate' , 'guard_name' => 'api'],
            ['name' => 'store employeeCertificate' , 'guard_name' => 'api'],
            ['name' => 'update employeeCertificate' , 'guard_name' => 'api'],
            ['name' => 'show employeeCertificate' , 'guard_name' => 'api'],
            ['name' => 'destroy employeeCertificate' , 'guard_name' => 'api'],

            ['name' => 'index employeePerformance' , 'guard_name' => 'api'],
            ['name' => 'store employeePerformance' , 'guard_name' => 'api'],
            ['name' => 'update employeePerformance' , 'guard_name' => 'api'],
            ['name' => 'show employeePerformance' , 'guard_name' => 'api'],
            ['name' => 'destroy employeePerformance' , 'guard_name' => 'api'],

            ['name' => 'index employeeVacation' , 'guard_name' => 'api'],
            ['name' => 'store employeeVacation' , 'guard_name' => 'api'],
            ['name' => 'update employeeVacation' , 'guard_name' => 'api'],
            ['name' => 'show employeeVacation' , 'guard_name' => 'api'],
            ['name' => 'destroy employeeVacation' , 'guard_name' => 'api'],

            ['name' => 'index employeeEducation' , 'guard_name' => 'api'],
            ['name' => 'store employeeEducation' , 'guard_name' => 'api'],
            ['name' => 'update employeeEducation' , 'guard_name' => 'api'],
            ['name' => 'show employeeEducation' , 'guard_name' => 'api'],
            ['name' => 'destroy employeeEducation' , 'guard_name' => 'api'],


            //Repository
            ['name' => 'index catagory' , 'guard_name' => 'api'],
            ['name' => 'store catagory' , 'guard_name' => 'api'],
            ['name' => 'update catagory' , 'guard_name' => 'api'],
            ['name' => 'show catagory' , 'guard_name' => 'api'],
            ['name' => 'destroy catagory' , 'guard_name' => 'api'],
            ['name' => 'getProductsByCategory catagory' , 'guard_name' => 'api'],

            ['name' => 'index export' , 'guard_name' => 'api'],
            ['name' => 'store export' , 'guard_name' => 'api'],
            ['name' => 'update export' , 'guard_name' => 'api'],
            ['name' => 'show export' , 'guard_name' => 'api'],
            ['name' => 'destroy export' , 'guard_name' => 'api'],

            ['name' => 'index exportProducts' , 'guard_name' => 'api'],
            ['name' => 'store exportProducts' , 'guard_name' => 'api'],
            ['name' => 'update exportProducts' , 'guard_name' => 'api'],
            ['name' => 'show exportProducts' , 'guard_name' => 'api'],
            ['name' => 'destroy exportProducts' , 'guard_name' => 'api'],
            ['name' => 'productsByExportId exportProducts' , 'guard_name' => 'api'],

            ['name' => 'index import' , 'guard_name' => 'api'],
            ['name' => 'store import' , 'guard_name' => 'api'],
            ['name' => 'update import' , 'guard_name' => 'api'],
            ['name' => 'show import' , 'guard_name' => 'api'],
            ['name' => 'destroy import' , 'guard_name' => 'api'],

            ['name' => 'index importProducts' , 'guard_name' => 'api'],
            ['name' => 'store importProducts' , 'guard_name' => 'api'],
            ['name' => 'update importProducts' , 'guard_name' => 'api'],
            ['name' => 'show importProducts' , 'guard_name' => 'api'],
            ['name' => 'destroy importProducts' , 'guard_name' => 'api'],
            ['name' => 'productsByImportId importProducts' , 'guard_name' => 'api'],

            ['name' => 'index product' , 'guard_name' => 'api'],
            ['name' => 'store product' , 'guard_name' => 'api'],
            ['name' => 'update product' , 'guard_name' => 'api'],
            ['name' => 'show product' , 'guard_name' => 'api'],
            ['name' => 'destroy product' , 'guard_name' => 'api'],

            ['name' => 'index productDetails' , 'guard_name' => 'api'],
            ['name' => 'store productDetails' , 'guard_name' => 'api'],
            ['name' => 'update productDetails' , 'guard_name' => 'api'],
            ['name' => 'show productDetails' , 'guard_name' => 'api'],
            ['name' => 'destroy productDetails' , 'guard_name' => 'api'],

            ['name' => 'index attribute' , 'guard_name' => 'api'],
            ['name' => 'store attribute' , 'guard_name' => 'api'],
            ['name' => 'update attribute' , 'guard_name' => 'api'],
            ['name' => 'show attribute' , 'guard_name' => 'api'],
            ['name' => 'destroy attribute' , 'guard_name' => 'api'],

            ['name' => 'index attributeGroup' , 'guard_name' => 'api'],
            ['name' => 'store attributeGroup' , 'guard_name' => 'api'],
            ['name' => 'update attributeGroup' , 'guard_name' => 'api'],
            ['name' => 'show attributeGroup' , 'guard_name' => 'api'],
            ['name' => 'destroy attributeGroup' , 'guard_name' => 'api'],
            ['name' => 'getAttributesByGroup attributeGroup' , 'guard_name' => 'api'],

            ['name' => 'index supplier' , 'guard_name' => 'api'],
            ['name' => 'store supplier' , 'guard_name' => 'api'],
            ['name' => 'update supplier' , 'guard_name' => 'api'],
            ['name' => 'show supplier' , 'guard_name' => 'api'],
            ['name' => 'destroy supplier' , 'guard_name' => 'api'],
            ['name' => 'getProductsBySupplier supplier' , 'guard_name' => 'api'],


            //UserMangment
            ['name' => 'showPermissionRoles permission' , 'guard_name' => 'api'],
            ['name' => 'index permission' , 'guard_name' => 'api'],

            ['name' => 'index role' , 'guard_name' => 'api'],
            ['name' => 'store role' , 'guard_name' => 'api'],
            ['name' => 'update role' , 'guard_name' => 'api'],
            ['name' => 'show role' , 'guard_name' => 'api'],
            ['name' => 'destroy role' , 'guard_name' => 'api'],
            ['name' => 'attach role' , 'guard_name' => 'api'],
            ['name' => 'detach role' , 'guard_name' => 'api'],
            ['name' => 'assignRole role' , 'guard_name' => 'api'],
            ['name' => 'unassignRole role' , 'guard_name' => 'api'],

            ['name' => 'index user' , 'guard_name' => 'api'],
            ['name' => 'store user' , 'guard_name' => 'api'],
            ['name' => 'update user' , 'guard_name' => 'api'],
            ['name' => 'show user' , 'guard_name' => 'api'],
            ['name' => 'destroy user' , 'guard_name' => 'api'],


            //PDF
            ['name' => 'index pdf' , 'guard_name' => 'api'],
            ['name' => 'store pdf' , 'guard_name' => 'api'],
            ['name' => 'show pdf' , 'guard_name' => 'api'],
            ['name' => 'destroy pdf' , 'guard_name' => 'api'],


        ]);


    }
}
