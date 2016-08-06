<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Managers Controller
 *
 * @property \App\Model\Table\ManagersTable $Managers
 */
class ManagersController extends AppController
{
	
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add', 'logout']);
    }
	
	public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clubs']
        ];
        $managers = $this->paginate($this->Managers);

        $this->set(compact('managers'));
        $this->set('_serialize', ['managers']);
    }

    /**
     * View method
     *
     * @param string|null $id Manager id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $manager = $this->Managers->get($id, [
            'contain' => ['Clubs', 'Events', 'InvitedUsers']
        ]);

        $this->set('manager', $manager);
        $this->set('_serialize', ['manager']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $manager = $this->Managers->newEntity();
        if ($this->request->is('post')) {
            $manager = $this->Managers->patchEntity($manager, $this->request->data);
            if ($this->Managers->save($manager)) {
                $this->Flash->success(__('The manager has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The manager could not be saved. Please, try again.'));
            }
        }
        $clubs = $this->Managers->Clubs->find('list', ['limit' => 200]);
        $this->set(compact('manager', 'clubs'));
        $this->set('_serialize', ['manager']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Manager id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $manager = $this->Managers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $manager = $this->Managers->patchEntity($manager, $this->request->data);
            if ($this->Managers->save($manager)) {
                $this->Flash->success(__('The manager has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The manager could not be saved. Please, try again.'));
            }
        }
        $clubs = $this->Managers->Clubs->find('list', ['limit' => 200]);
        $this->set(compact('manager', 'clubs'));
        $this->set('_serialize', ['manager']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Manager id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $manager = $this->Managers->get($id);
        if ($this->Managers->delete($manager)) {
            $this->Flash->success(__('The manager has been deleted.'));
        } else {
            $this->Flash->error(__('The manager could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
