<?php

namespace Sfadless\Filter\Condition;

/**
 * NotEqual
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class NotEqualCondition implements ConditionInterface
{
    const NAME = 'not-equal';

    public function getCondition()
    {
        return '!=';
    }

    public function getName()
    {
        return static::NAME;
    }
}