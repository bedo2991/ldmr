<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BlacklistedUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BlacklistedUsersTable Test Case
 */
class BlacklistedUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BlacklistedUsersTable
     */
    public $BlacklistedUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.blacklisted_users',
        'app.validities',
        'app.clubs',
        'app.managers',
        'app.events',
        'app.invited_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BlacklistedUsers') ? [] : ['className' => 'App\Model\Table\BlacklistedUsersTable'];
        $this->BlacklistedUsers = TableRegistry::get('BlacklistedUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BlacklistedUsers);

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
}
