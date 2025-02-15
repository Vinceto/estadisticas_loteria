<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Apuestas Model
 *
 * @property \App\Model\Table\SorteosTable&\Cake\ORM\Association\BelongsToMany $Sorteos
 *
 * @method \App\Model\Entity\Apuesta newEmptyEntity()
 * @method \App\Model\Entity\Apuesta newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Apuesta> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Apuesta get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Apuesta findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Apuesta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Apuesta> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Apuesta|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Apuesta saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Apuesta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Apuesta>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Apuesta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Apuesta> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Apuesta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Apuesta>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Apuesta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Apuesta> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ApuestasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('apuestas');
        $this->setDisplayField('numero_carton');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Sorteos', [
            'foreignKey' => 'apuesta_id',
            'targetForeignKey' => 'sorteo_id',
            'joinTable' => 'apuestas_sorteos',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmptyDate('fecha');

        $validator
            ->scalar('numero_carton')
            ->maxLength('numero_carton', 255)
            ->requirePresence('numero_carton', 'create')
            ->notEmptyString('numero_carton');

        $validator
            ->scalar('numeros_apostados')
            ->requirePresence('numeros_apostados', 'create')
            ->notEmptyString('numeros_apostados');

        return $validator;
    }
}
