<?php 

namespace App\Controller;

use App\Controller\AppController;

class LocalizationController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $localization = $this->Localization->find('all');
        $this->set([
            'localization' => $localization,
            '_serialize' => ['localization']
        ]);
    }

    public function view($id)
    {
        $recipe = $this->Localization->get($id);
        $this->set([
            'recipe' => $recipe,
            '_serialize' => ['recipe']
        ]);
    }

    public function add()
    {
        $recipe = $this->Localization->newEntity($this->request->getData());
        if ($this->Localization->save($recipe)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'recipe' => $recipe,
            '_serialize' => ['message', 'recipe']
        ]);
    }

    public function edit($id)
    {
        $recipe = $this->Localization->get($id);
        if ($this->request->is(['post', 'put'])) {
            $recipe = $this->Localization->patchEntity($recipe, $this->request->getData());
            if ($this->Localization->save($recipe)) {
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
        $recipe = $this->Localization->get($id);
        $message = 'Deleted';
        if (!$this->Localization->delete($recipe)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}