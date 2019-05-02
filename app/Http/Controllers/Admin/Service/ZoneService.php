<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use App\Http\Controllers\Admin\Service\BaseApiService;
use App\Http\Controllers\Admin\Service\View_CCADZoneService;
use App\Http\Controllers\Admin\Service\CountryService;
use App\Http\Controllers\Admin\Service\CityService;
use App\Http\Controllers\Admin\Service\AreaService;
use App\Http\Controllers\Admin\Service\DistrictService;

     class ZoneService extends BaseApiService{
        private $DistrictService;
        private $View_CCADZoneService;
        function __construct(){
            $this->setTable('zones');
            $this->CountryService = new CountryService();
            $this->CityService = new CityService();
            $this->AreaService = new AreaService();
            $this->DistrictService = new DistrictService();
            $this->View_CCADZoneService = new View_CCADZoneService();
        }

        function redirect_view($result,$title){
            $result['label'] = "Zone";
            switch($result['operation']){
                case 'listing':
                    $result['country_search'] = $this->CountryService->findAll();
                    $result['city_search'] = $this->CityService->findAll();
                    $result['area_search'] = $this->AreaService->findAll();
                    $result['district_search'] = $this->DistrictService->findAll();
                    $result['zones'] = $this->View_CCADZoneService->getListing();
                    return view("admin.location.listingZone", $title)->with('result', $result);
                break;
                case 'add':
                    $result['district'] = $this->DistrictService->findAll();
                    return view("admin.location.addZone", $title)->with('result', $result);
                break;

                case 'edit':
                    $result['zones'] = $this->findById($result['request']->id);
                    $result['district'] = $this->DistrictService->findAll();
                    return view("admin.location.editZone", $title)->with('result', $result);		
                break;
                case 'delete': 
                    $result['country_search'] = $this->CountryService->findAll();
                    $result['city_search'] = $this->CityService->findAll();
                    $result['area_search'] = $this->AreaService->findAll();
                    $result['district_search'] = $this->DistrictService->findAll();
                    $result['zones'] = $this->View_CCADZoneService->getListing();
                    return view("admin.location.listingZone", $title)->with('result', $result);	
                break;
            }
        }
    }
?>