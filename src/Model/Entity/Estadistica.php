<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Estadistica Entity
 *
 * @property int $id
 * @property int $juego_id
 * @property int $numero
 * @property int $frecuencia
 *
 * @property \App\Model\Entity\Juego $juego
 */
class Estadistica extends Entity
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
        'juego_id' => true,
        'numero' => true,
        'frecuencia' => true,
        'juego' => true,
    ];
}
