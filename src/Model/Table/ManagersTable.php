<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Managers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Clubs
 * @property \Cake\ORM\Association\HasMany $Events
 * @property \Cake\ORM\Association\HasMany $InvitedUsers
 *
 * @method \App\Model\Entity\Manager get($primaryKey, $options = [])
 * @method \App\Model\Entity\Manager newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Manager[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Manager|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Manager patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Manager[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Manager findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ManagersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('managers');
        $this->displayField('fullname');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clubs', [
            'foreignKey' => 'club_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Events', [
            'foreignKey' => 'manager_id'
        ]);
        $this->hasMany('InvitedUsers', [
            'foreignKey' => 'manager_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('fullname', 'create')
            ->notEmpty('fullname');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');
		
		$validator
            ->requirePresence('email', 'create')
            ->notEmpty('email')
		    ->add(
        'email', 
        ['unique' => [
            'rule' => 'validateUnique', 
            'provider' => 'table', 
            'message' => 'Not unique']
        ]
    	);


        $validator
            ->requirePresence('role', 'create')
            ->notEmpty('role')
			->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'entrance', 'event_manager']],
                'message' => 'Please enter a valid role'
            ]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['club_id'], 'Clubs'));

        return $rules;
    }
}
