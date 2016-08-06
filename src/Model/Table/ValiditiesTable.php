<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Validities Model
 *
 * @property \Cake\ORM\Association\BelongsTo $BlacklistedUsers
 * @property \Cake\ORM\Association\BelongsTo $Clubs
 *
 * @method \App\Model\Entity\Validity get($primaryKey, $options = [])
 * @method \App\Model\Entity\Validity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Validity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Validity|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Validity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Validity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Validity findOrCreate($search, callable $callback = null)
 */
class ValiditiesTable extends Table
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

        $this->table('validities');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('BlacklistedUsers', [
            'foreignKey' => 'blacklisted_user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Clubs', [
            'foreignKey' => 'club_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['blacklisted_user_id'], 'BlacklistedUsers'));
        $rules->add($rules->existsIn(['club_id'], 'Clubs'));

        return $rules;
    }
}
