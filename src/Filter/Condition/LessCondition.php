<?php

namespace Sfadless\Filter\Condition;

/**
 * LessCondition
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class LessCondition implements ConditionInterface
{
    const NAME = 'less';

    public function getCondition()
    {
        return '<';
    }

    public function getName()
    {
        return static::NAME;
    }
}