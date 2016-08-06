<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Club Entity
 *
 * @property string $id
 * @property string $short_name
 * @property string $full_name
 * @property string $address
 * @property string $city
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Manager[] $managers
 * @property \App\Model\Entity\Validity[] $validities
 */
class Club extends Entity
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
