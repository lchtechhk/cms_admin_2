<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\View_ManufacturerService;
use App\Http\Controllers\Admin\Service\LanguageService;
use App\Http\Controllers\Admin\Service\UploadService;
use App\Http\Controllers\Admin\Service\ManufacturerDescriptionService;
use function GuzzleHttp\json_encode;

class ManufacturerService extends BaseApiService{
    private $View_ManufacturerService;
    private $LanguageService;
    private $UploadService;
    private $ManufacturerService;


    function __construct(){
        $this->setTable('manufacturer');
        $this->View_ManufacturerService = new View_ManufacturerService();
        $this->LanguageService = new LanguageService();
        $this->UploadService = new UploadService();
        $this->ManufacturerDescriptionService = new ManufacturerDescriptionService();

    }
    function redirect_view($result,$title){
        $result['languages'] = $this->LanguageService->findAll();
        $result['label'] = "Manufacturer";
        switch($result['operation']){
            case 'listing':
                Log::info('[listing] --  : ');
                return view("admin.manufacturer.listingManufacturer", $title)->with('result', $result);
            break;
            case 'view_add':
                Log::info('[view_add] --  : ');
                return view("admin.manufacturer.viewManufacturer", $title)->with('result', $result);
            break;
            case 'view_edit':
                Log::info('[view_edit] --  : ');

                return view("admin.manufacturer.viewManufacturer", $title)->with('result', $result);
            break;
            case 'add':
                try{
                    DB::beginTransaction();
                    Log::info('[add] --  : ');
                    DB::commit();
                    return view("admin.manufacturer.viewManufacturer", $title)->with('result', $result);
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                    return view("admin.manufacturer.viewManufacturer", $title)->with('result', $result);
                }
            break;
            case 'edit':
                try{
                    DB::beginTransaction();
                    Log::info('[edit] --  : ');
                    DB::commit();
                    return view("admin.manufacturer.viewManufacturer", $title)->with('result', $result);
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                    return view("admin.manufacturer.viewManufacturer", $title)->with('result', $result);
                }		
            break;
            case 'delete': 
                try{
                    Log::info('[delete] --  : ');
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	
                
                return view("admin.manufacturer.listingManufacturer", $title)->with('result', $result);
            break;
        }
    }
}

?>