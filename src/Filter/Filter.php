<?php

namespace Sfadless\Filter;
use Sfadless\Filter\Condition\ConditionFactory;
use Sfadless\Filter\Condition\EqualCondition;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Filter
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class Filter implements FilterInterface
{
    /**
     * @var array
     */
    private $groups;

    /**
     * @var string
     */
    private $delimiter;

    /**
     * @var array
     */
    private $expressions;

    /**
     * @var string
     */
    private $prefix;

    /**
     * @var
     */
    private $currentGroup;

    private $factory;

    /**
     * @return array
     */
    public function getForQuery()
    {
        return count($this->groups) > 0 ? $this->getArrayFromGroups() : $this->getArrayFromExpressions();
    }

    /**
     * @param Expression $expression
     * @return $this|mixed
     */
    public function addExpression(Expression $expression)
    {
        if (!$this->currentGroup) {
            $this->expressions[] = $expression;
        } else {
            $this->groups[$this->currentGroup][] = $expression;
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function addExpressionGroup()
    {
        $groupName = 'g' . count($this->groups);
        $this->groups[$groupName] = [];
        $this->currentGroup = $groupName;

        return $this;
    }

    /**
     * @return $this
     */
    public function end()
    {
        $this->currentGroup = null;

        return $this;
    }

    /**
     * Filter constructor.
     * @param ConditionFactory $factory
     * @param string $prefix
     * @param string $delimiter
     */
    public function __construct(ConditionFactory $factory, $prefix = 'filter', $delimiter  = '_')
    {
        $this->prefix = $prefix;
        $this->delimiter = $delimiter;
        $this->factory = $factory;
        $this->groups = [];
        $this->expressions = [];
    }

    /**
     * @return array
     */
    protected function getArrayFromGroups()
    {
        $array = [];

        foreach ($this->groups as $groupName => $group) {
            foreach ($group as $expression) {
                $array[$this->prefix . $this->delimiter . $groupName . $this->delimiter . $expression->getName() . $this->delimiter . $expression->getCondition()->getName()] = $expression->getValue();
            }
        }

        return $array;
    }

    /**
     * @return array
     */
    protected function getArrayFromExpressions()
    {
        $array = [];

        foreach ($this->expressions as $expression) {
            $array[$this->prefix . $this->delimiter . $expression->getName() . $this->delimiter . $expression->getCondition()->getName()] = $expression->getValue();
        }

        return $array;
    }

    /**
     * @param ParameterBag $query
     */
    public function fromQuery(ParameterBag $query)
    {
        $factory = new ConditionFactory();
        $this->expressions = [];
        $this->groups = [];

        foreach ($query->all() as $param => $value) {
            if (0 === strripos($param, $this->prefix . $this->delimiter)) {
                $parsed = explode($this->delimiter, $param);

                if (count($parsed) === 4) {
                    if (!isset($this->groups[$parsed[1]])) {
                        $this->groups[$parsed[1]] = [];
                    }

                    $this->groups[$parsed[1]][] = new Expression($parsed[2], $value, $factory->getCondition($parsed[3]));
                } elseif (count($parsed) === 3) {
                    $this->expressions[] = new Expression($parsed[2], $value, $factory->getCondition($parsed[3]));
                }
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getHttpQuery()
    {
        return http_build_query($this->getForQuery());
    }

    /**
     * @param string $param
     * @param string $condition
     * @param string $group
     * @return string
     */
    public function bindParam($param, $condition = EqualCondition::NAME, $group = null)
    {
        $condition = $this->factory->getCondition($condition);

        if (null === $group) {
            return $this->prefix . $this->delimiter . (string) $param . $this->delimiter . $condition->getName();
        } else {
            return $this->prefix . $this->delimiter . $group . $this->delimiter . (string) $param . $this->delimiter . $condition->getName();
        }
    }


    public function getParam($param, $group = null)
    {
        $array = null === $group ? $this->expressions : $this->groups[$group];

        foreach ($array as $expression) {$param;
            if ($expression->getName() === $param) {
                return $expression->getValue();
            }
        }
    }
}