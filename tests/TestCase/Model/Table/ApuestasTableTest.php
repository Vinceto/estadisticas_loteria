<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApuestasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApuestasTable Test Case
 */
class ApuestasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ApuestasTable
     */
    protected $Apuestas;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Apuestas',
        'app.Sorteos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Apuestas') ? [] : ['className' => ApuestasTable::class];
        $this->Apuestas = $this->getTableLocator()->get('Apuestas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Apuestas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ApuestasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
