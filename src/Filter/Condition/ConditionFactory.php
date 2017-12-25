<?php

namespace Sfadless\Filter\Condition;

/**
 * ConditionFactory
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class ConditionFactory
{
    /**
     * @param $name
     * @return ConditionInterface
     */
    public function getCondition($name)
    {
        switch ($name) {
            case EqualCondition::NAME : return new EqualCondition();
            case MoreCondition::NAME : return new MoreCondition();
            case LessCondition::NAME : return new LessCondition();
            case LessOrEqualCondition::NAME : return new LessOrEqualCondition();
            case MoreOrEqualCondition::NAME : return new MoreOrEqualCondition();
            case NotEqualCondition::NAME : return new NotEqualCondition();

            default : throw new \InvalidArgumentException('Invalid name {$name} given in condition factory construct');
        }
    }
}