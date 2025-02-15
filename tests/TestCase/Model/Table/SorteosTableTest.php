<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SorteosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SorteosTable Test Case
 */
class SorteosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SorteosTable
     */
    protected $Sorteos;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Sorteos',
        'app.Juegos',
        'app.Apuestas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Sorteos') ? [] : ['className' => SorteosTable::class];
        $this->Sorteos = $this->getTableLocator()->get('Sorteos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Sorteos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SorteosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SorteosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
