<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!CModule::IncludeModule("main")) {
    ShowError(GetMessage("MAIN_MODULE_NOT_INSTALLED"));
    return;
}

$arComponentParameters = array(
    "GROUPS" => array(
        "USER" => array(
            "NAME" => GetMessage("MAIN_USER_GROUP_NAME"),
            "SORT" => 100
        ),
    ),
    "PARAMETERS" => array(
        "USER_PROPERTY" => array(
            "PARENT" => "USER",
            "NAME" => GetMessage("MAIN_USER_PARAM_USER_PROPERTY"),
            "TYPE" => "LIST",
            "MULTIPLE" => "Y",
            "VALUES" => $arUserFields,
            "DEFAULT" => array("UF_DEPARTMENT"),
        ),
        "CACHE_TIME" => array("DEFAULT" => 3600),
    ),
);