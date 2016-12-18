<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BlacklistedUsers Controller
 *
 * @property \App\Model\Table\BlacklistedUsersTable $BlacklistedUsers
 */
class BlacklistedUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $blacklistedUsers = $this->paginate($this->BlacklistedUsers);

        $this->set(compact('blacklistedUsers'));
        $this->set('_serialize', ['blacklistedUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Blacklisted User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blacklistedUser = $this->BlacklistedUsers->get($id, [
            'contain' => ['Validities', 'Validities.Clubs']
        ]);

        $this->set('blacklistedUser', $blacklistedUser);
        $this->set('_serialize', ['blacklistedUser']);
    }

	    /**
     * Search method
     *
     * @param string|null $id Blacklisted User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function search()
    {
       $blacklistedUsers = $this->BlacklistedUsers->find('all',[
	   'order'=>['BlacklistedUsers.fullname'=>'ASC']
	   ]);
     
		foreach ($blacklistedUsers as $row) {
			$row['basic'] = strtr(utf8_decode($row->fullname),
            utf8_decode('ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ'),
            'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy');
		}

        $this->set(compact('blacklistedUsers'));
        $this->set('_serialize', ['blacklistedUsers']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $blacklistedUser = $this->BlacklistedUsers->newEntity();
        if ($this->request->is('post')) {
            $blacklistedUser = $this->BlacklistedUsers->patchEntity($blacklistedUser, $this->request->data);
            if ($this->BlacklistedUsers->save($blacklistedUser)) {
                $this->Flash->success(__('The blacklisted user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The blacklisted user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('blacklistedUser'));
        $this->set('_serialize', ['blacklistedUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Blacklisted User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $blacklistedUser = $this->BlacklistedUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blacklistedUser = $this->BlacklistedUsers->patchEntity($blacklistedUser, $this->request->data);
            if ($this->BlacklistedUsers->save($blacklistedUser)) {
                $this->Flash->success(__('The blacklisted user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The blacklisted user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('blacklistedUser'));
        $this->set('_serialize', ['blacklistedUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Blacklisted User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blacklistedUser = $this->BlacklistedUsers->get($id);
        if ($this->BlacklistedUsers->delete($blacklistedUser)) {
            $this->Flash->success(__('The blacklisted user has been deleted.'));
        } else {
            $this->Flash->error(__('The blacklisted user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

	public function isAuthorized($user)
	{
	  // All registered users can see the index
		if($user['role'] === 'entrance'){
			if (in_array($this->request->action, ['search', 'view'])) {
					return true;
			}
		}
		return parent::isAuthorized($user);
	}
}
