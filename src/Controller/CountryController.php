<?php 

namespace App\Controller;

use App\Controller\AppController;


class CountryController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Bauth');
        
    }

    public function index()
    {
        $this->Bauth->checkAccess($this->request);
        $country = $this->Country->find('all');
        $this->set([
            'country' => $country,
            '_serialize' => ['country']
        ]);
    }

    public function view($id)
    {
        $this->Bauth->checkAccess($this->request);
        $country = $this->Country->get($id);
        $this->set([
            'country' => $country,
            '_serialize' => ['country']
        ]);
    }

    public function add()
    {
        $this->Bauth->checkAccess($this->request);
        $country = $this->Country->newEntity($this->request->getData());
        if ($this->Country->save($country)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'country' => $country,
            '_serialize' => ['message', 'country']
        ]);
    }

    public function edit($id)
    {
        $this->Bauth->checkAccess($this->request);
        $country = $this->Country->get($id);
        if ($this->request->is(['put'])) {
            $country = $this->Country->patchEntity($country, $this->request->getData());
            if ($this->Country->save($country)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }

    public function delete($id)
    {
        $this->Bauth->checkAccess($this->request);
        $country = $this->Country->get($id);
        $message = 'Deleted';
        if (!$this->Country->delete($country)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}