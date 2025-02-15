<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sorteo Entity
 *
 * @property int $id
 * @property int $numero_sorteo
 * @property \Cake\I18n\Date $fecha_sorteo
 * @property int $juego_id
 * @property string $numeros_sorteados
 *
 * @property \App\Model\Entity\Juego $juego
 * @property \App\Model\Entity\Apuesta[] $apuestas
 */
class Sorteo extends Entity
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
        'numero_sorteo' => true,
        'fecha_sorteo' => true,
        'juego_id' => true,
        'numeros_sorteados' => true,
        'juego' => true,
        'apuestas' => true,
    ];
}
