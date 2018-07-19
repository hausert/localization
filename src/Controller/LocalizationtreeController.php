<?php 

namespace App\Controller;

use App\Controller\AppController;


class LocalizationtreeController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Bauth');
        $this->loadModel('Country');
        $this->loadModel('state');
        $this->loadModel('city');
    }

    public function index()
    {
        $this->Bauth->checkAccess($this->request);
        $country = $this->Country->find('all');
        foreach ($country as $cvalue){
            $localization[$cvalue->country_id]=$cvalue->toArray();
            $state = $this->state->find('all',['conditions' => ["country_id =" => $cvalue->country_id , "parent_id  is null " ]]);
            $localization[$cvalue->country_id]["state"]=$state->toArray();
            foreach ($localization[$cvalue->country_id]["state"] as $sk => $svalue) {
                $county = $this->state->find('all')->where(["parent_id =" => $svalue->state_id]);
                if(!empty($county->toArray())){
                    $localization[$cvalue->country_id]["state"][$sk]['county'] = $county->toArray();
                }
                $city = $this->city->find('all')->where(["state_id =" => $svalue->state_id]);
                if(!empty($city->toArray())){
                    $localization[$cvalue->country_id]["state"][$sk]["citys"] = $city->toArray();
                }
                foreach ($localization[$cvalue->country_id]["state"][$sk]['county'] as $cok => $covalue) {
                    $city = $this->city->find('all')->where(["state_id =" => $covalue->state_id]);
                    if(!empty($city->toArray())){
                        $localization[$cvalue->country_id]["state"][$sk]['county'][$cok]["city"] = $city->toArray();
                    }
                }
            }
        }
        $this->set([
            'localization' => $localization,
            '_serialize' => ['localization']
        ]);
    }

    public function view($id)
    {
        $this->Bauth->checkAccess($this->request);
        $localization = $this->Localizationtree->get($id);
        $this->set([
            'localization' => $localization,
            '_serialize' => ['localization']
        ]);
    }
}