<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateApuestas extends BaseMigration
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
        $table = $this->table('apuestas');
        $table->addColumn('fecha', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('numero_carton', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('numeros_apostados', 'text', [
            'default' => null,
            'null' => false,
            'comment' => 'Guardado como JSON'
        ]);
        $table->create();
    }
}
