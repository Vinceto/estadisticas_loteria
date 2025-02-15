<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JuegosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JuegosTable Test Case
 */
class JuegosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\JuegosTable
     */
    protected $Juegos;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Juegos',
        'app.Estadisticas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Juegos') ? [] : ['className' => JuegosTable::class];
        $this->Juegos = $this->getTableLocator()->get('Juegos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Juegos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\JuegosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
