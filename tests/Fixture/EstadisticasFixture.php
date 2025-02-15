<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EstadisticasFixture
 */
class EstadisticasFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'juego_id' => 1,
                'numero' => 1,
                'frecuencia' => 1,
            ],
        ];
        parent::init();
    }
}
