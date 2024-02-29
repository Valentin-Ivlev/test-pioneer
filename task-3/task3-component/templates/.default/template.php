<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

echo "<h1>".GetMessage("MAIN_USER_COMPONENT_NAME")."</h1>";

echo "<table>";
echo "<tr>";
echo "<th>".GetMessage("MAIN_USER_PARAM_LOGIN")."</th>";
echo "<th>".GetMessage("MAIN_USER_PARAM_EMAIL")."</th>";
echo "<th>".GetMessage("MAIN_USER_PARAM_NAME")."</th>";
echo "<th>".GetMessage("MAIN_USER_PARAM_LAST_NAME")."</th>";
echo "</tr>";
foreach ($arResult["USERS"] as $arUser)
{
    echo "<tr>";
    echo "<td>".$arUser["LOGIN"]."</td>";
    echo "<td>".$arUser["EMAIL"]."</td>";
    echo "<td>".$arUser["NAME"]."</td>";
    echo "<td>".$arUser["LAST_NAME"]."</td>";
    echo "</tr>";
}
echo "</table>";
?>
