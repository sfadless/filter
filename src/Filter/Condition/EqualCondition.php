<?php

namespace Sfadless\Filter\Condition;

/**
 * EqualCondition
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class EqualCondition implements ConditionInterface
{
    const NAME = 'equal';

    /**
     * @var string
     */
    private $condition = '=';

    /**
     * {@inheritdoc}
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return static::NAME;
    }
}