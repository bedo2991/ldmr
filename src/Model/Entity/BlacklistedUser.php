<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BlacklistedUser Entity
 *
 * @property string $id
 * @property string $fullname
 * @property \Cake\I18n\Time $birthdate
 * @property string $picture_path
 * @property string $description
 * @property string $reason
 * @property \Cake\I18n\Time $valid_from
 * @property \Cake\I18n\Time $valid_until
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Validity[] $validities
 */
class BlacklistedUser extends Entity
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
}
