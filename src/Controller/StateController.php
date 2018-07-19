<?php 

namespace App\Controller;

use App\Controller\AppController;


class StateController extends AppController
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
        $state = $this->State->find('all');
        $this->set([
            'state' => $state,
            '_serialize' => ['state']
        ]);
    }

    public function view($id)
    {
        $this->Bauth->checkAccess($this->request);
        $state = $this->State->get($id);
        $this->set([
            'state' => $state,
            '_serialize' => ['state']
        ]);
    }

    public function add()
    {
        $this->Bauth->checkAccess($this->request);
        $state = $this->State->newEntity($this->request->getData());
        if ($this->State->save($state)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'state' => $state,
            '_serialize' => ['message', 'state']
        ]);
    }

    public function edit($id)
    {
        $this->Bauth->checkAccess($this->request);
        $state = $this->State->get($id);
        if ($this->request->is(['post', 'put'])) {
            $state = $this->State->patchEntity($state, $this->request->getData());
            if ($this->State->save($state)) {
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
        $state = $this->State->get($id);
        $message = 'Deleted';
        if (!$this->State->delete($state)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}