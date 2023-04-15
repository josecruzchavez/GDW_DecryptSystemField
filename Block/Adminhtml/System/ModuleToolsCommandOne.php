<?php
namespace GDW\DecryptSystemField\Block\Adminhtml\System;

class ModuleToolsCommandOne extends \GDW\Core\Block\Adminhtml\System\Core\ModuleToolsInfo
{
    const GDW_MODULE_COMMAND = 'gdw:decrypt:field';

    public function getDescFull()
    {
        $html = 
<<<HTML
    <p>--path | Is Required</p>
    <p>--store_Id | Is Optional</p>
    <p>php bin/magento gdw:decrypt:field --path={path/to_field/system} --store_Id={store_id}</p>
HTML;
        return $html;
    }
}