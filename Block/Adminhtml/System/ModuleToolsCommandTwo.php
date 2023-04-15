<?php
namespace GDW\DecryptSystemField\Block\Adminhtml\System;

class ModuleToolsCommandTwo extends \GDW\Core\Block\Adminhtml\System\Core\ModuleToolsInfo
{
    const GDW_MODULE_COMMAND = 'gdw:decrypt:value';

    public function getDescFull()
    {
        $html = 
<<<HTML
    <p>--value | Is Required</p>
    <p>php bin/magento gdw:decrypt:value --value={data_encrypt}<br/>
HTML;
        return $html;
    }
}