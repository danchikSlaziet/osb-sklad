<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$cp = $this->__component; // объект компонента

if (defined('BX_COMP_MANAGED_CACHE') && is_object($GLOBALS['CACHE_MANAGER']))
{
    if (strlen($cp->getCachePath()))
    {
        $GLOBALS['CACHE_MANAGER']->RegisterTag('elem_section_tag'.SITE_ID);
    }
}
