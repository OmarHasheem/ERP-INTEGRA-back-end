<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $superAdminRole = Role::where('name', 'Super Admin')->first();
        $SApermissionNames = ['Marketing', 'HR', 'Repository' ,
                            'index campaign', 'store campaign', 'update campaign', 'show campaign', 'destroy campaign' , 'attachCampaignToLead campaign' , 'detachCampaignToLead campaign' ,'showCampaignEvents campaign' ,'showCampaignTvs campaign' ,'showCampaignSocialMedia campaign' ,'showCampaignLeads campaign' ,
                            'index socialMedia' ,'store socialMedia' ,'update socialMedia' ,'show socialMedia' ,'destroy socialMedia',
                            'index tv' ,'store tv' ,'update tv' ,'show tv' ,'destroy tv',
                            'index event' ,'store event' ,'update event' ,'show event' ,'destroy event',
                            'index lead' ,'store lead' ,'update lead' ,'show lead' ,'destroy lead' ,'attachLeadToCustomer lead' ,'detachLeadToCustomer lead' ,'showLeadCustomers lead' ,'showLeadCampaigns lead',
                            'index customer' ,'store customer' ,'update customer' ,'show customer' ,'destroy customer' ,'showCustomerLeads customer',

                            'index benefit' ,'store benefit' ,'update benefit' ,'show benefit' ,'destroy benefit' ,'showbenefitEmployees benefit' ,
                            'index department' ,'store department' ,'update department' ,'show department' ,'destroy department' ,'showdepartmentEmployees department',
                            'index employee' ,'store employee' ,'update employee' ,'show employee' ,'destroy employee' ,'destroy showEmployeeDetails' ,'attachBenefitToEmployee employee',
                            'index employeeCertificate' ,'store employeeCertificate' ,'update employeeCertificate' ,'show employeeCertificate' ,'destroy employeeCertificate',
                            'index employeePerformance' ,'store employeePerformance' ,'update employeePerformance' ,'show employeePerformance' ,'destroy employeePerformance',
                            'index employeeVacation' ,'store employeeVacation' ,'update employeeVacation' ,'show employeeVacation' ,'destroy employeeVacation',
                            'index employeeEducation' ,'store employeeEducation' ,'update employeeEducation' ,'show employeeEducation' ,'destroy employeeEducation',

                            'index catagory' ,'store catagory' ,'update catagory' ,'show catagory' ,'destroy catagory' ,'getProductsByCategory catagory',
                            'index export' ,'store export' ,'update export' ,'show export' ,'destroy export',
                            'index exportProducts' ,'store exportProducts' ,'update exportProducts' ,'show exportProducts' ,'destroy exportProducts' ,'productsByExportId exportProducts',
                            'index import' ,'store import' ,'update import' ,'show import' ,'destroy import',
                            'index importProducts' ,'store importProducts' ,'update importProducts' ,'show importProducts' ,'destroy importProducts' ,'productsByImportId importProducts',
                            'index product' ,'store product' ,'update product' ,'show product' ,'destroy product',
                            'index productDetails' ,'store productDetails' ,'update productDetails' ,'show productDetails' ,'destroy productDetails',
                            'index attribute' ,'store attribute' ,'update attribute' ,'show attribute' ,'destroy attribute',
                            'index attributeGroup' ,'store attributeGroup' ,'update attributeGroup' ,'show attributeGroup' ,'destroy attributeGroup' ,'getProductsBySupplier supplier',
                            'index supplier' ,'store supplier' ,'update supplier' ,'show supplier' ,'destroy supplier',

                            'index role' ,'store role' ,'update role' ,'show role' ,'destroy role', 'attach role' ,'detach role' ,'assignRole role' ,'unassignRole role',
                            'index user' ,'store user' ,'update user' ,'show user' ,'destroy user',
                            'index showPermissionRoles permission' ,'store permission' ,

                            'index pdf' ,'store storeImport' , 'store storeCampaign' ,'store storeExport' ,'store storeEmployeeVacation' ,'show pdf' ,'destroy pdf',
                            ];
        foreach ($SApermissionNames as $permissionName) {
            $permission = Permission::where('name', $permissionName)->first();
            $superAdminRole->givePermissionTo($permission);
        }


        $marketingMangerRole = Role::where('name', 'Marketing Manger')->first();
        $MMpermissionNames = ['Marketing',
                            'index campaign', 'show campaign', 'showCampaignEvents campaign' ,'showCampaignTvs campaign' ,'showCampaignSocialMedia campaign' ,'showCampaignLeads campaign' ,
                            'index socialMedia' ,'show socialMedia' ,
                            'index tv' ,'show tv' ,
                            'index event'  ,'show event' ,
                            'index lead','show lead' ,'showLeadCustomers lead' ,'showLeadCampaigns lead',
                            'index customer' ,'show customer' ,'showCustomerLeads customer',

                            'index pdf' ,'store storeImport' , 'store storeCampaign' ,'store storeExport' ,'store storeEmployeeVacation' ,'show pdf' ,'destroy pdf',
                            ];
        foreach ($MMpermissionNames as $permissionName) {
            $Mpermission = Permission::where('name', $permissionName)->first();
            $marketingMangerRole->givePermissionTo($Mpermission);
        }


        $HRMangerRole = Role::where('name', 'HR Manger')->first();
        $HRMpermissionNames = ['HR',
                            'index benefit' ,'show benefit' ,'showbenefitEmployees benefit' ,
                            'index department' ,'show department' ,'showdepartmentEmployees department',
                            'index employee' ,'show employee' ,'destroy employee' ,
                            'index employeeCertificate' ,'show employeeCertificate' ,
                            'index employeePerformance' ,'show employeePerformance' ,
                            'index employeeVacation' ,'show employeeVacation' ,
                            'index employeeEducation' ,'show employeeEducation' ,

                            'index pdf' ,'store storeImport' , 'store storeCampaign' ,'store storeExport' ,'store storeEmployeeVacation' ,'show pdf' ,'destroy pdf',
                            ];
        foreach ($HRMpermissionNames as $permissionName) {
            $HRpermission = Permission::where('name', $permissionName)->first();
            $HRMangerRole->givePermissionTo($HRpermission);
        }


        $repositoryAdminRole = Role::where('name', 'Repository Manger')->first();
        $RMpermissionNames = ['Repository' ,
                            'index catagory' ,'show catagory' ,'getProductsByCategory catagory',
                            'index export' ,'show export' ,
                            'index exportProducts' ,'show exportProducts' ,'productsByExportId exportProducts',
                            'index import' ,'show import' ,
                            'index importProducts' ,'show importProducts' ,'productsByImportId importProducts',
                            'index product' ,'show product' ,
                            'index productDetails' ,'show productDetails' ,
                            'index attribute' ,'show attribute' ,
                            'index attributeGroup' ,'show attributeGroup' ,'getProductsBySupplier supplier',
                            'index supplier' ,'show supplier' ,

                            'index pdf' ,'store storeImport' , 'store storeCampaign' ,'store storeExport' ,'store storeEmployeeVacation' ,'show pdf' ,'destroy pdf',
                            ];
        foreach ($RMpermissionNames as $permissionName) {
            $Rpermission = Permission::where('name', $permissionName)->first();
            $repositoryAdminRole->givePermissionTo($Rpermission);
        }
    }

}
