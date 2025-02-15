<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstadisticasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstadisticasTable Test Case
 */
class EstadisticasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EstadisticasTable
     */
    protected $Estadisticas;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Estadisticas',
        'app.Juegos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Estadisticas') ? [] : ['className' => EstadisticasTable::class];
        $this->Estadisticas = $this->getTableLocator()->get('Estadisticas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Estadisticas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EstadisticasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EstadisticasTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
