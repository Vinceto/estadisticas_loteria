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
        $table->addColumn('numero_sorteo', 'integer', ['null' => false])
            ->addColumn('fecha_sorteo', 'date', ['null' => false])
            ->addColumn('juego_id', 'integer', ['null' => false])
            ->addColumn('numeros_sorteados', 'text', ['null' => false, 'comment' => 'Guardado como JSON'])
            ->addForeignKey('juego_id', 'juegos', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
        ->create();
    }
}
