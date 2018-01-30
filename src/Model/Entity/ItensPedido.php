<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItensPedido Entity
 *
 * @property int $id
 * @property int $pedido_id
 * @property int $produto_id
 * @property float $valor
 * @property float $quantidade
 * @property float $totali
 * @property string $descricao
 * @property float $preco
 *
 * @property \App\Model\Entity\Pedido $pedido
 * @property \App\Model\Entity\Produto $produto
 */
class ItensPedido extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'pedido_id' => true,
        'produto_id' => true,
        'valor' => true,
        'quantidade' => true,
        'totali' => true,
        'descricao' => true,
        'preco' => true,
        'pedido' => true,
        'produto' => true
    ];
}
