<?php

namespace Sfadless\Filter\Condition;

/**
 * MoreOrEqual
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class MoreOrEqualCondition implements ConditionInterface
{
    const NAME = 'more-or-equal';

    public function getCondition()
    {
        return '>=';
    }

    public function getName()
    {
        return static::NAME;
    }
}