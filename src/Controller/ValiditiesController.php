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


	public function addAll($blackListedId = null)
	{
	if ($this->request->is(['get', 'post'])) {
	if($blackListedId == null)
	{
		$this->Flash->error(__('A valid user id must be provided to use this function.'));
		return $this->redirect(['controller'=>'BlacklistedUsers','action' => 'view', $blackListedId]);
	}
		$validities = $this->Validities->find('all', [
		'conditions'=>['blacklisted_user_id'=>$blackListedId]	
		]);
	if($validities->count()>0)
	{
		debug("error2");
		$this->Flash->error(__('You can use this function only if the person does not have any validity set already.'));
		return $this->redirect(['controller'=>'BlacklistedUsers','action' => 'view', $blackListedId]);
	}
	$this->loadModel('Clubs');
	$clubs = $this->Clubs->find('all');
	foreach ($clubs as $club){
	
	$validity = $this->Validities->newEntity();

	    $validity->club_id = $club->id;
	    $validity->blacklisted_user_id = $blackListedId;
            if (! $this->Validities->save($validity)) {
                $this->Flash->error(__('Not all validities could not be saved. Please, try again.'));
            }

		}
		$this->Flash->success(__('The validities has been saved.'));
	}
	return $this->redirect(['controller'=>'BlacklistedUsers','action' => 'view', $blackListedId]);
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
