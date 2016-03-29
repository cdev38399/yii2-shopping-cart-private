<?php

namespace yz\shoppingcartprivate;


/**
 * Interface CartPositionProviderInterface
 * @property CartPositionInterface $cartPosition
 * @package \yz\shoppingcartprivate
 */
interface CartPositionProviderInterface
{
    /**
     * @param array $params Parameters for cart position
     * @return CartPositionInterface
     */
    public function getCartPosition($params = []);
} 
