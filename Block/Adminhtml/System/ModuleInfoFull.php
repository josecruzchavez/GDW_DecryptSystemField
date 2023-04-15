<?php
namespace GDW\DecryptSystemField\Block\Adminhtml\System;

use GDW\Core\Block\Adminhtml\System\Core\ModuleInfoFull as Fieldset;

class ModuleInfoFull extends Fieldset
{
    const GDW_MODULE_CODE = 'GDW_DecryptSystemField';
    const GDW_MODULE_LINK = '';
    const GDW_MODULE_LINK_SECC = '';
    
    public function getDescFull()
    {
        $html =
<<<HTML
    <p>Permite Obtener el valor real de un campo encriptado en system.xml o de un string proporciando desde consola</p>
    <p>php bin/magento gdw:decrypt:field --path={path/to_field/system} --store_Id={store_id}</p>
    <p>php bin/magento gdw:decrypt:value --value={data_encrypted}</p>
HTML;
        return $html;
    }
}