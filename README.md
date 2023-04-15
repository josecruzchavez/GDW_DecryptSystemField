# GDW DecryptSystemField para Magento 2

Permite obtener el valor real de un campo encriptado.
Se agregan 2 nuevos comandos:
1.- Permite desencriptar un valor guardado en system.xml
2.- Permite desencriptar un string agregado directamente en consola.

## Compatibilidad
✓ Magento 2.3.x, ✓ Magento 2.4.x

![gdw_decryptsystemfield_01](https://gestiondigitalweb.com/github_assets/gdw_decryptsystemfield/gdw_decrypt_01.png)
![gdw_decryptsystemfield_02](https://gestiondigitalweb.com/github_assets/gdw_decryptsystemfield/gdw_decrypt_02.png)

###### Ejecuta los siguientes comandos en la ruta base de Magento.

### Instalación

```
composer require gdw/decryptsystemfield

php bin/magento module:enable GDW_DecryptSystemField
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento cache:flush
```

### Actualización

```
composer update gdw/decryptsystemfield

php bin/magento module:enable GDW_DecryptSystemField
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento cache:flush
```

### Eliminación

```
php bin/magento module:disbale GDW_DecryptSystemField
composer remove gdw/decryptedsystemfield
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento cache:flush
```

### Uso

```
Commando:
php bin/magento gdw:decrypt:field --path={path/to_field/system} --store_id={store_id}

Información:
--path: Es requerido.
--store_id: Es opcional, se puede obtener el valor dependiendo la vista de tienda.
```

```
Comando:
php bin/magento gdw:decrypt:value --value={data_encrypted}

Información:
--value: Es requerido.
```
> **Nota**
> Ninguno de los 2 comandos valida si la información proporcionada por el usuario está encriptada realmente, simplemente hace el proceso de desenciptación y muestra el resultado.

### Expresiones de Gratitud

* 📢 Comenta a otros sobre este proyecto.
* 👨🏽‍💻 Da las gracias públicamente.
* [🍺 Invítame una cerveza](https://www.paypal.me/gestiondigitalweb)


### Otros enlaces

* [ Sitio web](https://gdw.mx/?utm_source=github&utm_medium=gdw&utm_campaign=decryptedsystemfield&utm_id=link)
* [Listado de Módulos](https://gdw.mx/modulos/)
* [Facebook](https://www.facebook.com/GestionDigitalWeb)
* [Youtube](https://www.youtube.com/c/Gestiondigitalweb)

### Tags
* Magento 2 tools
* Magento 2 decrypt data
* Magento 2 inspect data
* Magento 2 encrypt data
* Magento 2 decrypt field
* Magento 2 decrypt system field
