<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (!CModule::IncludeModule("main"))
{
    ShowError(GetMessage("MAIN_MODULE_NOT_INSTALLED"));
    return;
}

$arParams["USER_PROPERTY"] = array();
$arParams["USER_PROPERTY"][] = "UF_DEPARTMENT";

$by = "timestamp_x";
$order = "desc";
$filter = array("GROUPS_ID" => array(1));
$select = array("ID", "LOGIN", "EMAIL", "NAME", "LAST_NAME");
$rsUsers = CUser::GetList($by, $order, $filter, $select);

$arResult["USERS"] = array();
while ($arUser = $rsUsers->Fetch())
{
    $arResult["USERS"][] = $arUser;
}

$this->IncludeComponentTemplate();