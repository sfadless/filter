<?php

namespace Sfadless\Filter\Condition;

/**
 * Interface ConditionInterface
 * @package Sfadless\Filter\Condition
 */
interface ConditionInterface
{
    /**
     * @return string
     */
    public function getCondition();

    /**
     * @return string
     */
    public function getName();
}