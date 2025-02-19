<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Juego Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 *
 * @property \App\Model\Entity\Estadistica[] $estadisticas
 */
class Juego extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'nombre' => true,
        'descripcion' => true,
        'estadisticas' => true,
    ];
}
