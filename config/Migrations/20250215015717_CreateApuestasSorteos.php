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
        $table->addColumn('apuesta_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('sorteo_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addForeignKey('apuesta_id', 'apuestas', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION']);
        $table->addForeignKey('sorteo_id', 'sorteos', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION']);
        $table->create();
    }
}
