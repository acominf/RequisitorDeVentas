# RequisitorDeCompras

**Descripción**

El proyecto consiste en una página web para el departamento de Compras de una empresa, done se registran las *requisiciones de compra*,  cada requisición es solicitada por un **usuario**, en la página de igual forma se tendrá el catálogo de proveedores, productos.
Se deberá de crear diferentes usuarios y asignar permisos desde la página, el **usuario administrador** es el que podrá dar de alta la información y para algunos usuarios solo será como consulta.

dentro de la pagina podran existir 3 tipos de usuarios 

**Usuario** | **tipo De Permisos**
------------|---------------------
Admin (ROOT) | Usuario que tendra permisos total sobre la pagina, dar de alta/baja usuarios asi como los proveedores y productos, podra tambien ver y editar requisisiones, no se podran borrar solo cancelar. 
Requisitor | Usuario solo podra dar de alta requisisiones y ver su estatus (*solo de sus requisisiones*), asi como editar o cancelar.
Proveedor | Usuario que podra ver las requisisiones de sus productos, usuario de solo lectura.
