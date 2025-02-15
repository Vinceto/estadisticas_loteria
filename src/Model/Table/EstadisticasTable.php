<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Estadisticas Model
 *
 * @property \App\Model\Table\JuegosTable&\Cake\ORM\Association\BelongsTo $Juegos
 *
 * @method \App\Model\Entity\Estadistica newEmptyEntity()
 * @method \App\Model\Entity\Estadistica newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Estadistica> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Estadistica get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Estadistica findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Estadistica patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Estadistica> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Estadistica|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Estadistica saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Estadistica>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estadistica>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Estadistica>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estadistica> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Estadistica>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estadistica>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Estadistica>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estadistica> deleteManyOrFail(iterable $entities, array $options = [])
 */
class EstadisticasTable extends Table
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

        $this->setTable('estadisticas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Juegos', [
            'foreignKey' => 'juego_id',
            'joinType' => 'INNER',
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
            ->integer('juego_id')
            ->notEmptyString('juego_id');

        $validator
            ->integer('numero')
            ->requirePresence('numero', 'create')
            ->notEmptyString('numero');

        $validator
            ->integer('frecuencia')
            ->requirePresence('frecuencia', 'create')
            ->notEmptyString('frecuencia');

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
