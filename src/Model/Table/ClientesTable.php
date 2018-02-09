<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clientes Model
 *
 * @property \App\Model\Table\PedidosTable|\Cake\ORM\Association\HasMany $Pedidos
 *
 * @method \App\Model\Entity\Cliente get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cliente newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cliente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cliente|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cliente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cliente[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cliente findOrCreate($search, callable $callback = null, $options = [])
 */
class ClientesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('clientes');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->hasMany('Pedidos', [
            'foreignKey' => 'cliente_id',
            'update' => 'CASCADE',
            'delete' => 'CASCADE'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 60)
            ->allowEmpty('telefone');

        $validator
            ->scalar('senha')
            ->maxLength('senha', 15)
            ->requirePresence('senha', 'create')
            ->notEmpty('senha');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 15)
            ->requirePresence('tipo', 'create')
            ->notEmpty('tipo');

        $validator
            ->dateTime('datacadastro')
            ->allowEmpty('datacadastro');

        $validator
            ->scalar('endereco')
            ->maxLength('endereco', 255)
            ->allowEmpty('endereco');

        return $validator;
    }
}
