<?php

namespace yz\shoppingcartprivate;

use yii\base\Component;
use yii\base\Object;

/**
 * Trait CartPositionTrait
 * @property int $quantity Returns quantity of cart position
 * @property int $cost Returns cost of cart position. Default value is 'price * quantity'
 * @package \yz\shoppingcartprivate
 */
trait CartPositionTrait
{
    protected $_quantity;
    protected $_tax;

    public function getQuantity()
    {
        return $this->_quantity;
    }

    public function setQuantity($quantity)
    {
        $this->_quantity = $quantity;
    }

    public function getTax()
    {
        return $this->_tax;
    }

    public function setTax($tax)
    {
        $this->_tax = $tax;
    }

    /**
     * Default implementation for getCost function. Cost is calculated as price * quantity
     * @param bool $withDiscount
     * @return int
     */
    public function getCost($withDiscount = true)
    {
        /** @var Component|CartPositionInterface|self $this */
        $cost = $this->getQuantity() * $this->getPrice();
		$cost = $cost + ($this->getQuantity() * $this->getPrice() * $this->getTax());
        $costEvent = new CostCalculationEvent([
            'baseCost' => $cost,
        ]);
        if ($this instanceof Component)
            $this->trigger(CartPositionInterface::EVENT_COST_CALCULATION, $costEvent);

        if ($withDiscount)
            $cost = max(0, $cost - $costEvent->discountValue);

        return $cost;
    }
} 
