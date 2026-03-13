# Gym_Center
Sistema para la administración y gestión de las operaciones de un gimnasio.

## Estructura del proyecto

### Carpeta principal

- **app/** → Contiene la lógica principal de la aplicación (configuración, controladores, modelos, rutas y utilidades).

### Dentro de `app/`

- **app/config/** → Archivos de configuración del sistema, como la conexión a la base de datos.
  - **conexion.php** → Archivo encargado de establecer la conexión con la base de datos.

- **app/controllers/** → Controladores que manejan las solicitudes del usuario y coordinan la comunicación entre los modelos y las vistas.

- **app/helpers/** → Funciones auxiliares reutilizables que ayudan a simplificar tareas comunes en la aplicación.
  - **funciones.php** → Contiene funciones de apoyo utilizadas en diferentes partes del sistema.

- **app/models/** → Representa la lógica de datos de la aplicación y se encarga de interactuar con la base de datos.

- **app/routes/** → Define las rutas del sistema, es decir, cómo se conectan las URLs con los controladores.
  - **web.php** → Archivo donde se registran las rutas principales de la aplicación.

- **app/views/** → Contiene las vistas o plantillas encargadas de mostrar la interfaz al usuario.

### Carpeta pública

- **public/** → Contiene los archivos accesibles desde el navegador.

  - **public/index.php** → Punto de entrada principal de la aplicación; recibe todas las peticiones y las redirige a las rutas correspondientes.

  - **public/assets/** → Recursos estáticos utilizados en la interfaz.
    - **css/** → Archivos de estilos.
    - **js/** → Archivos de JavaScript.
    - **img/** → Imágenes utilizadas en la aplicación.

### Almacenamiento

- **storage/** → Carpeta utilizada para guardar archivos generados por el sistema.

  - **storage/progresoFisico/** → Almacena archivos relacionados con el seguimiento del progreso físico de los clientes.

### Archivos adicionales

- **.htaccess** → Archivo de configuración del servidor Apache para manejar redirecciones y rutas amigables.

- **composer.json** → Archivo de configuración de dependencias del proyecto manejadas con Composer.

- **README.md** → Documento que describe el proyecto, su estructura y cómo utilizarlo.