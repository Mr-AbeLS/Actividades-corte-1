# Entrevista

1. De que forma gestionan actualmente el inventario?

R1: Hemos trabajado con el inventario de forma manual registrando todos los movimientos de entra y salida en cuaderno.

2. ¿Usted ha pensado anteriormente en usar un sistema computarizado para la gestión del inventario?

R2: Si, he querido que se maneje el inventario desde un programa en el pc desde hace un tiempo pero nunca supe como hacerlo.

3. ¿Qué ventajas cree que le proporcionaría trabajar con un programa especializado para la gestión del inventario de su negocio?

R3: Creo que la primera ventaja seria ahorra recursos como tiempo y dinero y reducir errores en el registro de movimientos.

4. ¿Cuáles son los objetivos principales que se quieren alcanzar con este sistema? 

R4: Poder tener un registro de movimientos de entrada y salida de mercancia. 

5. Diga algunas características que quisiera implementar en el sistema y por que

R5: Quisiera que cada uno de los empleados posean un usuario para llevar el control de cuantas operaciones se ha hecho cada trabajador. tambien se deben guardar los datos de los proveedores y cliente. los usuarios tendran una foto de usuario y los productos tambien tendran una foto. los trabajadores, clientes o proveedores tambien deben guardarse sus numeros de telefonos

6. ¿Cómo se gestionará el acceso al sistema y a la información?

R6 Yo seria un administrador y seria la unica persona con este rol. tendria acceso a toda la información del sistema. los trabajadores entrarian con su numero de cedula y contraseña y podran registrar los movimientos, cliente, proveedores

7. ¿Cuáles son las funciones principales que el sistema debe realizar?

R7: Quiero que los trabajadores puedan registrarse, este registro solicitara información como nombre, apellido, Numero de cedula, correo, telefono y contraseña.
Tambien quiero funciones como las de registrar movimientos de entrada y salida de la mercancia, poder editarlos y eliminarlos en casos de errores o registros duplicados.

8. Que información utiliza para registrar los movimientos.

R8:si es un movimiento de entrada o salida de la mercancia, trabajador que hizo el movimiento, proveedor o cliente, id del producto, cantidad, precio en el momento en que se haga la operacion.

## Analisis de requerimientos

1. Gestión de usuarios y roles. El sistema permite registrar, modificar y eliminar usuarios con sus roles.

2. Control de acceso. Cada usuario inicia sesión con credenciales y su rol define los permisos.

3. Gestión de roles y permisos. Relación N:M entre role y permission define los privilegios de cada rol.

4. Gestión de clientes y proveedores. El sistema registra datos de clientes y proveedores. Ambos pueden tener teléfonos (relaciones polimórficas).

5. Registro de productos. Cada producto tiene nombre, precio variable y puede relacionarse con sabores y presentaciones (N:M).

6. Gestión de inventario (movimientos). Los movimientos registran compras y ventas, asociando usuario, productos, cliente/proveedor y fecha.

7. Detalle de movimientos. Cada movimiento tiene uno o más detalles con producto, cantidad y precio fijo al momento.

8. Control de imágenes. Las fotos se manejan de forma polimórfica: pueden pertenecer a productos y usuarios.

9. Control de teléfonos. Los números se guardan también con relación polimórfica para cualquier entidad (cliente, proveedor, trabajador).

10. Auditoría. Cada movimiento guarda fecha y usuario que lo realizó.

11. Reportes. Consultas de movimientos por tipo, usuario, cliente o proveedor.

## Relaciones de entidades

### User

1. user y role (1:N) un usuario solo puede tener un rol, y un rol puede pertenecer a multiples usuarios
2. user y imageable (1:1 POLIMORFICA) un usuario puede tener una foto, y una foto va a pertenecerle a un unico usuario.
3. user y phoneable (1:N POLIMORFICA) un usuario puede tener uno o mas numero de telefonos. pero un telefono solo estara asociado a un unico user
4. user y movement (1:N) un usuario puede realizar uno o mas registros de movimientos. pero un movimiento esta realizado por un unico user.

### Role y Permission

1. role y user (1:N) un usuario solo puede tener un rol, y un rol puede pertenecer a multiples usuarios
2. role y permission (N:M) un rol puede tener de uno a muchos permisos. y un permiso es poseido por uno o mas roles

### Product

1. product y imageable (1:1 POLIMORFICA) un producto puede tener una foto, y una foto va a pertenecerle a un unico producto.
2. product y movement_detail (1:N) un producto puede estar en uno o mas movimientos. pero un detalle de movimiento solo puede tener un unico producto.
3. product y presentation (N:M) uno o muchos productos pueden tener una o muchas presentaciones
4. product y flavor (N:M) uno o muchos productos pueden tener uno o muchos sabores

### Movement

1. Movement y user (1:N) un usuario puede realizar uno o mas registros de movimientos. pero un movimiento esta realizado por un unico user.
2. Movement y movement_detail (1:N) un movimiento puede tener de uno a muchos detalles, pero un detalle solo puede tener un unico movimiento
3. movement y supplier/ client (Relacion 1:N POLIMORFICA) un movimiento puede pertenecer a un unico cliente o proveedor. pero un cliente o proveedor pueden tener uno o muchos movimientos.

### Supplier/Client
1. Supplier/Client y movements (Relacion 1:N POLIMORFICA) un movimiento puede pertenecer a un unico cliente o proveedor. pero un cliente o proveedor pueden tener uno o muchos movimientos.
2. Supplier/Client y phoneable (1:N POLIMORFICA) un cliente o proveedor puede tener uno o mas numero de telefonos. pero un telefono solo estara asociado a un unico cliente o proveedor

# Formulario con html y php
actividad del pequeño programa con validaciones y ciclos.

Cree un formulario para el registro de un usuario en un sistema. dicho formulario posee campos como nombre de usuario, nombre, apellido, correo, y contraseña.

todos los datos se envian y almacenan en un array en el archivo validation.php
hago un foreach para quitar los espacio que pueda dejar el usuario en algun campo o si en algun campo esta vacio mande el error de campo obligatorio.

los errores se almacenan en un array de errors para despues imprimirlos todos en caso de que el usuario no cumpla con los requisitos.

la segunda validacion que se hace es por cada key del array con los datos del formulario. se hacen validaciones regex con condicionales para evitar inyecciones sql o datos malisiosos.

Si al final del foreach el campo errors esta vacio, fue exitosa la validacion e imprime. si no, error.

# Base de datos

Se hizo la base de datos con MER y modelo relacional, las relaciones y tablas se encuentran en releases

1. client
Tabla donde se registran los clientes al momento de hacer una operacion de venta
- id Int(11), autoincrementable, llave primaria de la tabla
- firstName varchar(50)     Nombre del cliente.
- lastName varchar(50)      Apellido del cliente.
- dni varchar(20)           Numero de cedula del cliente

2. flavor
Tabla donde se registran los sabores de los helados
- id Int(11), autoincrementable, llave primaria de la tabla
- name varchar(100)         Nombre de sabor de helado

3. flavor_product (pivote)
Tabla pivote entre los sabores y los productos
flavorId                    llave foranea de id de los sabores
productId	                llave foranea de id de los productos

4. imageable (polimorfica 1:1)
Tabla de imagenes polimorfica, donde se almacenan las url, la id y a que modelo pertenece dicha imagen (user o product)
- url varchar(255), , unico Direccion URL de la imagen de usuario o producto.   este campo es unico
- imageable_id int(11)      llave foranea de userId o productId
- imageable_type varchar(255) Modelo al que pertenece dicha id (models/UserModel o models/ProductModel) 

5. movement
Tabla donde se registran todos los movimientos que haga el negocio, ya sea movimientos de compra o de venta. Tambien se le podria llamar una tabla de facturas
- id Int(11), autoincrementable, llave primaria de la tabla
- type enum('Compra','Venta') Campo donde se definira si la operacion fue de compra o venta
- userId int(11)            Llave foranea de id de los usuarios. para registrar que usuario hizo tales operaciones
- originable_id int(11)     LLave foranea de supplierId y clientId
- originable_type varchar(255) Modelo al que pertenece dicha id (models/clientModel o models/supplierModel) 
- creationDate timestamp    toma la fecha y hora en la cual se realiza el registro de movimientos
- updateDate timestamp      toma la fecha y hora en la cual se actualiza un registro de movimientos

6. movement_detail
Tabla para registrar los detalles de cada movimiento, en pocas palabras esta tabla son los detalles de una factura.
- id Int(11), autoincrementable, llave primaria de la tabla
- movementId int(11)        Llave foranea de id de la tabla de movimientos
- productId int(11)         Llave foranea de id de la tabla de productos
- quantity int(11)          Cantidad de producto del detalle
- constantPrice decima(8,2) Precio del producto al momento de hacer una operacion. este precio no puede cambiar porque es para llevar el historial de operaciones

7. permission
Tabla donde estaran los permisos que pueden tener los distintos tipos de roles
- id Int(11), autoincrementable, llave primaria de la tabla
- name varchar(100)         Nombre del permiso

8. permission_role
Tabla pivote entre la tabla permission y la tabla role. Aqui se define que permiso podra ser usado por algun rol
- permissionId int(11)      LLave foranea de id de la tabla de permisos
- roleId int(11)            LLave foranea de id de la tabla de roles

9. phoneable (polimorfica 1:N)
Tabla donde se guardan los numeros de telefonos que pueden poseer los usuarios, cliente y proveedores
- id Int(11), autoincrementable, llave primaria de la tabla
- phone varchar(20), unico  Numero de telefono el cual no se puede repetir. 
- phoneable_id int(11)      llave foranea de id al que pertenece el numero telefonico
- phoneable_type varchar(255) Modelo al que pertenece dicha id (models/UserModel o models/CientModel models/SupplierModel) 

10. presentation
Tabla para registrar todas las presentaciones que puede tener los productos. ejemplo: paletas, barquillas, tinas, 1l, 2l, 5l. 
- id Int(11), autoincrementable, llave primaria de la tabla
- name varchar(100)         Nombre del tipo de presentacion

11. presentation_product (pivote)
Tabla pivote entre la tabla presentation y la tabla product. aqui se define que producto tiene que presentacion de helado.
- presentationId int(11)    Llave foranea de id de las presentaciones de un proudcto
- productId int(11)         LLave foranea de id del producto

12. product
Tabla donde se registran todos los productos que maneje la heladeria.
- id Int(11), autoincrementable, llave primaria de la tabla
- name varchar(100)         Nombre del producto. ejemplo: Tentacion
- variablePrice decimal(8,2) Precio de producto, este es variable para que pueda ser modificado al momento de que un producto suba o baje el precio.

13. role
Tablas de roles de usuarios. por los momentos solo tendra dos roles los cuales son admin y trabajador
- id Int(11), autoincrementable, llave primaria de la tabla
- name varchar(100)	        Nombre del rol. por los momentos solo admin y trabajador

14. supplier
Tabla donde se registran los proveedores de los productos
- id Int(11), autoincrementable, llave primaria de la tabla
- name varchar(100)         Nombre de la empresa que provee los productos.
- rif varchar(20), unico    Rif o numero de identificacion de la empresa

15. user
Tabla para registrar todos los usuarios del sistema.
- id Int(11), autoincrementable, llave primaria de la tabla
- firstName	varchar(50)     Nombre del trabajador
- lastName varchar(50)      Apellido del trabajador
- dni varchar(8), unico     Numero de identificion
- email varchar(255), unico Email unico del trabajador
- password varchar(24)      Contraseña para que el trabajador pueda acceder al sistema
- roleId int(11)            Llave foranea de id del role que poseera dicho usuario

# Landing Page y Conexion a DB

Cree una landing page sobre un exchange de cripto monedas, utilizando solo etiquetas de html con sus respectivos atributos. A esta landing, la ancle al pequeño sistema de validacion de formulario con ciclos, condicionales y expresiones regulares. En este mini programa tambien lo conecte con la base de datos, pero sin uso de sentencias sql como select, create, updata o detele, solamente la conexion que se hace desde el archivo DatabaseConnection. el cual tiene clases con atributos los cuales son los parametros para la conexion y creo una function __construct con un un try catch donde se crea el objeto pdo con todos los parametros establecidos en los atributos de la clase.

Si la conexion se crea, imprime conexion exitosa. De lo contrario, arroja error de conexion a la base de datos.

En el index.php se hace un require_once del archivo DatabaseConnection, se instancia la clase y se usa el metodo conn