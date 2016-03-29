<?php

namespace yz\shoppingcartprivate;

use yii\base\Behavior;


/**
 * Class DiscountBehavior
 * @package \yz\shoppingcartprivate
 */
class DiscountBehavior extends Behavior
{
    public function events()
    {
        return [
            ShoppingCart::EVENT_COST_CALCULATION => 'onCostCalculation',
            CartPositionInterface::EVENT_COST_CALCULATION => 'onCostCalculation',
        ];
    }

    /**
     * @param CostCalculationEvent $event
     */
    public function onCostCalculation($event)
    {

    }
}
