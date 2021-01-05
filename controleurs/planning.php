<?php
$action = $_REQUEST['action'];
switch($action)
{
    case 'voir':
    {
        $agent = $university->getEmployer($_REQUEST['agent']);
        $lesPlannings = $university->getPlanningFromAgent($_REQUEST['agent']);
        include("vues/planning.php");
        break;
    }
    case 'get':
    {
        $lesEmployers= $university->getEmployerFrom(1);
        include("vues/list_employer.php");
        break;
    }
}
?>