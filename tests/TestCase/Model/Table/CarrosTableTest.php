<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarrosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarrosTable Test Case
 */
class CarrosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CarrosTable
     */
    protected $Carros;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Carros',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Carros') ? [] : ['className' => CarrosTable::class];
        $this->Carros = $this->getTableLocator()->get('Carros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Carros);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CarrosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
