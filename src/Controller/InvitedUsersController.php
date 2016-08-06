<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InvitedUsers Controller
 *
 * @property \App\Model\Table\InvitedUsersTable $InvitedUsers
 */
class InvitedUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events', 'Managers']
        ];
        $invitedUsers = $this->paginate($this->InvitedUsers);

        $this->set(compact('invitedUsers'));
        $this->set('_serialize', ['invitedUsers']);
    }
	
	/**
     * Event method
     *
     * @return \Cake\Network\Response|null
     */
    public function event($eventId=null)
    {
		if ($this->request->is('ajax')) {
    		$this->response->disableCache();
		}
		//else
		//	return;
		$data = $this->DataTables->find('InvitedUsers', 'all', [
			'conditions'=>['InvitedUsers.event_id'=>$eventId,
						  'InvitedUsers.checkedin is NULL'],
			'order' => ['InvitedUsers.fullname' => 'asc']
		]);
		$this->set('data', $data);
		$this->set('_serialize', array_merge($this->viewVars['_serialize'], ['data']));
    }
	
	public function check($id = null)
	{
		if ($this->request->is(['ajax'])) {
			$invitedUser = $this->InvitedUsers->get($id, [
				'contain' => []
			]);

			if( $invitedUser ) {
				$invitedUser->checkedin = date('Y-m-d H:i:s');
				if ($this->InvitedUsers->save($invitedUser)) {
       				$this->set('invitedUser', $invitedUser);
        			$this->set('_serialize', ['invitedUser']);
				} else {
					$this->Flash->error(__('The invited user could not be saved. Please, try again.'));
				}

			}
		}
	}
	
	public function uncheck($id = null)
	{
		if ($this->request->is(['ajax'])) {
			$invitedUser = $this->InvitedUsers->get($id, [
				'contain' => []
			]);

			if( $invitedUser ) {
				$invitedUser->checkedin = null;
				if ($this->InvitedUsers->save($invitedUser)) {
					//$this->Flash->success(__('The invited user has been saved.'));
					$this->set('invitedUser', $invitedUser);
        			$this->set('_serialize', ['invitedUser']);
				} else {
					$this->Flash->error(__('The invited user could not be saved. Please, try again.'));
				}

			}
		}
	}

    /**
     * View method
     *
     * @param string|null $id Invited User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invitedUser = $this->InvitedUsers->get($id, [
            'contain' => ['Events', 'Managers']
        ]);

        $this->set('invitedUser', $invitedUser);
        $this->set('_serialize', ['invitedUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $invitedUser = $this->InvitedUsers->newEntity();
        if ($this->request->is('post')) {
            $invitedUser = $this->InvitedUsers->patchEntity($invitedUser, $this->request->data);
			$invitedUser->manager_id = $this->Auth->user('id');
            if ($this->InvitedUsers->save($invitedUser)) {
                $this->Flash->success(__('The invited user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The invited user could not be saved. Please, try again.'));
            }
        }
        $events = $this->InvitedUsers->Events->find('list', ['limit' => 200]);
        $managers = $this->InvitedUsers->Managers->find('list', ['limit' => 200]);
        $this->set(compact('invitedUser', 'events', 'managers'));
        $this->set('_serialize', ['invitedUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Invited User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invitedUser = $this->InvitedUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invitedUser = $this->InvitedUsers->patchEntity($invitedUser, $this->request->data);
            if ($this->InvitedUsers->save($invitedUser)) {
                $this->Flash->success(__('The invited user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The invited user could not be saved. Please, try again.'));
            }
        }
        $events = $this->InvitedUsers->Events->find('list', ['limit' => 200]);
        $managers = $this->InvitedUsers->Managers->find('list', ['limit' => 200]);
        $this->set(compact('invitedUser', 'events', 'managers'));
        $this->set('_serialize', ['invitedUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Invited User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invitedUser = $this->InvitedUsers->get($id);
        if ($this->InvitedUsers->delete($invitedUser)) {
            $this->Flash->success(__('The invited user has been deleted.'));
        } else {
            $this->Flash->error(__('The invited user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
