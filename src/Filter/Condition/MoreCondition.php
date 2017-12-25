<?php

namespace Sfadless\Filter\Condition;

/**
 * MoreCondition
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class MoreCondition implements ConditionInterface
{
    const NAME = 'more';

    public function getCondition()
    {
        return '>';
    }

    public function getName()
    {
        return static::NAME;
    }
}