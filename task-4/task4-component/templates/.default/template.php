<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>
<div class="catalog-section">
    <?php
    foreach($arResult["ITEMS"] as $arItem): // перебираем товары
        echo "ID товара: ".$arItem["ID"].", Название товара: ".$arItem["NAME"]."<br>"; // выводим ID и название товара
    endforeach;
    ?>
</div>