<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InvitedUsersFixture
 *
 */
class InvitedUsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'fullname' => ['type' => 'string', 'length' => 70, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'email' => ['type' => 'integer', 'length' => 70, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'accepted' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'event_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'manager_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'invited by', 'precision' => null],
        'checkedin' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => '64798545-088f-4c03-9bbc-d29b176c8925',
            'fullname' => 'Lorem ipsum dolor sit amet',
            'email' => 1,
            'accepted' => '2016-08-04 12:54:59',
            'event_id' => '66c0a5c2-afd5-404b-9331-e0a093a4baed',
            'manager_id' => '67964104-a967-436e-83ba-d32b59e7884a',
            'checkedin' => '2016-08-04 12:54:59',
            'created' => '2016-08-04 12:54:59',
            'modified' => '2016-08-04 12:54:59'
        ],
    ];
}
