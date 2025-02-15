<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sorteos Model
 *
 * @property \App\Model\Table\JuegosTable&\Cake\ORM\Association\BelongsTo $Juegos
 * @property \App\Model\Table\ApuestasTable&\Cake\ORM\Association\BelongsToMany $Apuestas
 *
 * @method \App\Model\Entity\Sorteo newEmptyEntity()
 * @method \App\Model\Entity\Sorteo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Sorteo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sorteo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Sorteo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Sorteo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Sorteo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sorteo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Sorteo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Sorteo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sorteo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Sorteo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sorteo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Sorteo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sorteo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Sorteo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sorteo> deleteManyOrFail(iterable $entities, array $options = [])
 */
class SorteosTable extends Table
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

        $this->setTable('sorteos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Juegos', [
            'foreignKey' => 'juego_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Apuestas', [
            'foreignKey' => 'sorteo_id',
            'targetForeignKey' => 'apuesta_id',
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
            ->integer('numero_sorteo')
            ->requirePresence('numero_sorteo', 'create')
            ->notEmptyString('numero_sorteo');

        $validator
            ->date('fecha_sorteo')
            ->requirePresence('fecha_sorteo', 'create')
            ->notEmptyDate('fecha_sorteo');

        $validator
            ->integer('juego_id')
            ->notEmptyString('juego_id');

        $validator
            ->scalar('numeros_acertados')
            ->requirePresence('numeros_acertados', 'create')
            ->notEmptyString('numeros_acertados');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['juego_id'], 'Juegos'), ['errorField' => 'juego_id']);

        return $rules;
    }
}
