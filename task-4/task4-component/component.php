<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if($this->startResultCache())
{
    if(!CModule::IncludeModule("iblock"))
    {
        $this->abortResultCache();
        ShowError("Модуль Информационных блоков не установлен");
        return;
    }

    $section_id = $arParams["SECTION_ID"];
    $arSelect = array("ID", "NAME");
    $arFilter = array("IBLOCK_ID" => 2, "SECTION_ID" => $section_id, "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
    $arResult["ITEMS"] = array();
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        $arResult["ITEMS"][] = $arFields;
    }
    $this->includeComponentTemplate();
}