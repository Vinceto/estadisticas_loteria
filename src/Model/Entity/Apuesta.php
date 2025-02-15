<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Apuesta Entity
 *
 * @property int $id
 * @property \Cake\I18n\Date $fecha
 * @property string $numero_carton
 * @property string $numeros_apostados
 *
 * @property \App\Model\Entity\Sorteo[] $sorteos
 */
class Apuesta extends Entity
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
        'fecha' => true,
        'numero_carton' => true,
        'numeros_apostados' => true,
        'sorteos' => true,
    ];
}
