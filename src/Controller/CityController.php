<?php 

namespace App\Controller;

use App\Controller\AppController;


class CityController extends AppController
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
        $city = $this->City->find('all');
        $this->set([
            'city' => $city,
            '_serialize' => ['city']
        ]);
    }

    public function view($id)
    {
        $this->Bauth->checkAccess($this->request);
        $city = $this->City->get($id);
        $this->set([
            'city' => $city,
            '_serialize' => ['city']
        ]);
    }

    public function add()
    {
        $this->Bauth->checkAccess($this->request);
        $city = $this->City->newEntity($this->request->getData());
        if ($this->City->save($city)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'city' => $city,
            '_serialize' => ['message', 'city']
        ]);
    }

    public function edit($id)
    {
        $this->Bauth->checkAccess($this->request);
        $city = $this->City->get($id);
        if ($this->request->is(['post', 'put'])) {
            $city = $this->City->patchEntity($city, $this->request->getData());
            if ($this->City->save($city)) {
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
        $city = $this->City->get($id);
        $message = 'Deleted';
        if (!$this->City->delete($city)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}