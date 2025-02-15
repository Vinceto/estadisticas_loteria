<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateApuestasSorteos extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('apuestas_sorteos');
        $table->addColumn('apuesta_id', 'integer', ['null' => false])
          ->addColumn('sorteo_id', 'integer', ['null' => false])
          ->addForeignKey('apuesta_id', 'apuestas', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
          ->addForeignKey('sorteo_id', 'sorteos', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
          ->create();
    }
}
