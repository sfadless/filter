<?php

namespace Sfadless\Filter;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Interface FilterInterface
 * @package Sfadless\Filter
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
interface FilterInterface
{
    /**
     * @return array
     */
    public function getForQuery();

    /**
     * @param Expression $expression
     * @return mixed
     */
    public function addExpression(Expression $expression);

    /**
     * @return mixed
     */
    public function addExpressionGroup();

    /**
     * @param ParameterBag $query
     * @return mixed
     */
    public function fromQuery(ParameterBag $query);

    /**
     * @return array
     */
    public function getHttpQuery();

    /**
     * @param $param
     * @return mixed
     */
    public function bindParam($param);

    /**
     * @param $param string
     * @return string
     */
    public function getParam($param);
}