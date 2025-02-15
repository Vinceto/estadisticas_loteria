<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Juegos Model
 *
 * @property \App\Model\Table\EstadisticasTable&\Cake\ORM\Association\HasMany $Estadisticas
 *
 * @method \App\Model\Entity\Juego newEmptyEntity()
 * @method \App\Model\Entity\Juego newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Juego> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Juego get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Juego findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Juego patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Juego> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Juego|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Juego saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Juego>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Juego>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Juego>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Juego> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Juego>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Juego>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Juego>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Juego> deleteManyOrFail(iterable $entities, array $options = [])
 */
class JuegosTable extends Table
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

        $this->setTable('juegos');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->hasMany('Estadisticas', [
            'foreignKey' => 'juego_id',
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
            ->scalar('nombre')
            ->maxLength('nombre', 255)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('descripcion')
            ->requirePresence('descripcion', 'create')
            ->notEmptyString('descripcion');

        return $validator;
    }
}
