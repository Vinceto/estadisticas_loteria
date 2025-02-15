<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateSorteos extends BaseMigration
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
        $table = $this->table('sorteos');
        $table->addColumn('numero_sorteo', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('fecha_sorteo', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('juego_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('numeros_acertados', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addForeignKey('juego_id', 'juegos', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION']);
        $table->create();
    }
}
