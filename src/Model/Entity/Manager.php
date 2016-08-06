<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Manager Entity
 *
 * @property string $id
 * @property string $fullname
 * @property string $username
 * @property string $password
 * @property string $role
 * @property string $club_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Club $club
 * @property \App\Model\Entity\Event[] $events
 * @property \App\Model\Entity\InvitedUser[] $invited_users
 */
class Manager extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
	
	protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
