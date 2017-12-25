<?php

namespace Sfadless\Filter\Condition;

/**
 * LessOrMoreCondition
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class LessOrEqualCondition implements ConditionInterface
{
    const NAME = 'less-or-equal';

    public function getCondition()
    {
        return '<=';
    }

    public function getName()
    {
        return static::NAME;
    }
}