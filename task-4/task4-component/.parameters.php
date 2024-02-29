<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
    "PARAMETERS" => array(
        "SECTION_ID" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("SECTION_ID"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "CACHE_TIME" => array("DEFAULT" => 36000000),
    ),
);