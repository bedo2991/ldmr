<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InvitedUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InvitedUsersTable Test Case
 */
class InvitedUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InvitedUsersTable
     */
    public $InvitedUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.invited_users',
        'app.events',
        'app.managers',
        'app.clubs',
        'app.validities',
        'app.blacklisted_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InvitedUsers') ? [] : ['className' => 'App\Model\Table\InvitedUsersTable'];
        $this->InvitedUsers = TableRegistry::get('InvitedUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InvitedUsers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
