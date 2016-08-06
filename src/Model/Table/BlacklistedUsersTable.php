<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BlacklistedUsers Model
 *
 * @property \Cake\ORM\Association\HasMany $Validities
 *
 * @method \App\Model\Entity\BlacklistedUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\BlacklistedUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BlacklistedUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BlacklistedUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BlacklistedUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BlacklistedUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BlacklistedUser findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BlacklistedUsersTable extends Table
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

        $this->table('blacklisted_users');
        $this->displayField('fullname');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Validities', [
            'foreignKey' => 'blacklisted_user_id'
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
            ->allowEmpty('fullname');

        $validator
            ->date('birthdate')
            ->allowEmpty('birthdate');

        $validator
            ->allowEmpty('picture_path');

        $validator
            ->allowEmpty('description');

        $validator
            ->requirePresence('reason', 'create')
            ->notEmpty('reason');

        $validator
            ->dateTime('valid_from')
            ->requirePresence('valid_from', 'create')
            ->notEmpty('valid_from');

        $validator
            ->dateTime('valid_until')
            ->allowEmpty('valid_until');

        return $validator;
    }
}
