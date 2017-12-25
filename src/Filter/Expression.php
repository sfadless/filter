<?php

namespace Sfadless\Filter;
use Sfadless\Filter\Condition\ConditionInterface;

/**
 * Expression
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class Expression
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;

    /**
     * @var ConditionInterface
     */
    private $condition;

    /**
     * Expression constructor.
     * @param $name
     * @param $value
     * @param ConditionInterface $condition
     */
    public function __construct($name, $value, ConditionInterface $condition)
    {
        $this
            ->setName($name)
            ->setValue($value)
            ->setCondition($condition)
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Expression
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Expression
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return ConditionInterface
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @param ConditionInterface $condition
     * @return Expression
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;
        return $this;
    }
}