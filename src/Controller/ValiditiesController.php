<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Validities Controller
 *
 * @property \App\Model\Table\ValiditiesTable $Validities
 */
class ValiditiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['BlacklistedUsers', 'Clubs']
        ];
        $validities = $this->paginate($this->Validities);

        $this->set(compact('validities'));
        $this->set('_serialize', ['validities']);
    }

    /**
     * View method
     *
     * @param string|null $id Validity id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $validity = $this->Validities->get($id, [
            'contain' => ['BlacklistedUsers', 'Clubs']
        ]);

        $this->set('validity', $validity);
        $this->set('_serialize', ['validity']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $validity = $this->Validities->newEntity();
        if ($this->request->is('post')) {
            $validity = $this->Validities->patchEntity($validity, $this->request->data);
            if ($this->Validities->save($validity)) {
                $this->Flash->success(__('The validity has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The validity could not be saved. Please, try again.'));
            }
        }
        $blacklistedUsers = $this->Validities->BlacklistedUsers->find('list', ['limit' => 200]);
        $clubs = $this->Validities->Clubs->find('list', ['limit' => 200]);
        $this->set(compact('validity', 'blacklistedUsers', 'clubs'));
        $this->set('_serialize', ['validity']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Validity id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $validity = $this->Validities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $validity = $this->Validities->patchEntity($validity, $this->request->data);
            if ($this->Validities->save($validity)) {
                $this->Flash->success(__('The validity has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The validity could not be saved. Please, try again.'));
            }
        }
        $blacklistedUsers = $this->Validities->BlacklistedUsers->find('list', ['limit' => 200]);
        $clubs = $this->Validities->Clubs->find('list', ['limit' => 200]);
        $this->set(compact('validity', 'blacklistedUsers', 'clubs'));
        $this->set('_serialize', ['validity']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Validity id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $validity = $this->Validities->get($id);
        if ($this->Validities->delete($validity)) {
            $this->Flash->success(__('The validity has been deleted.'));
        } else {
            $this->Flash->error(__('The validity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
