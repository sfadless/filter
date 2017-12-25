<?php

use Sfadless\Filter\Condition\ConditionFactory;
use Sfadless\Filter\Expression;
use Sfadless\Filter\Filter;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . '/vendor/autoload.php';
$request = Request::createFromGlobals();

//$factory = new ConditionFactory();
//$cond = $factory->getCondition('less');
$filter = new Filter(new ConditionFactory(), 'filt', '__');
$filter->fromQuery($request->query);
//$filter
//    ->addExpressionGroup()
//        ->addExpression(new Expression('foo', 'bar', $factory->getCondition('equal')))
//        ->addExpression(new Expression('baz', 3, $factory->getCondition('less')))
//    ->end()
//    ->addExpressionGroup()
//        ->addExpression(new Expression('echo', 6, $factory->getCondition('more-or-equal')))
//        ->addExpression(new Expression('pre', 'gets', $factory->getCondition('not-equal')))
//    ->end()
//;

//$filter
//    ->addExpression(new Expression('foo', 'bar', $factory->getCondition('equal')))
//    ->addExpression(new Expression('baz', 3, $factory->getCondition('more-or-equal')))
//;
echo '<pre>';
//var_dump($filter);
//var_dump($filter->getHttpQuery());
//var_dump($filter->fromQuery($request->query));

//var_dump($filter->getForQuery());
//var_dump($filter->getHttpQuery());
echo '</pre>';
//echo $filter->getExpressionFromParam('filter_g1_f0_cond', $)
//echo http_build_query($filter->getForQuery());

?>
<form>
    <input type="text" name="<?php echo $filter->bindParam('foo', 'more-or-equal', 'g1');?>" value="<?php echo $filter->getParam('foo', 'g1');?>">
    <input type="text" name="<?php echo $filter->bindParam('bar', 'less-or-equal', 'g1');?>" value="<?php echo $filter->getParam('bar', 'g1');?>">
    <input type="text" name="<?php echo $filter->bindParam('baz', 'less-or-equal', 'g2');?>" value="<?php echo $filter->getParam('baz', 'g2');?>">
    <input type="submit">
</form>
