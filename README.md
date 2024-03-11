# App-DevWebCamp
Este proyecto es una demostración de DebWebCamp, una plataforma para gestionar eventos y boletos.

## Pasos para iniciar la demo del proyecto

1. **Clonar el proyecto DebWebCamp o descargarlo como Zip:**
   - Puedes clonar el repositorio usando el siguiente comando en tu terminal:
     ```
     git clone https://github.com/jorge-DPS/App-DevWebCamp.git
     ```
   - También puedes descargar el código fuente como un archivo ZIP desde la página del repositorio en GitHub.

2. **Abrir la terminal en la carpeta raíz del proyecto (DOS en Windows):**
   - Navega a la carpeta raíz del proyecto donde has clonado o descomprimido los archivos.

3. **Instalar las dependencias de Node.js y Composer:**
   - Ejecuta los siguientes comandos en la terminal:
     ```
     npm install
     composer update
     ```

4. **Acceder a la carpeta public y ejecutar el servidor PHP:**
   - Utiliza los siguientes comandos en la terminal:
     ```
     cd public
     php -S localhost:8000
     ```

5. **Abrir el navegador y acceder a la aplicación:**
   - Abre tu navegador web preferido (Chrome, Firefox, etc.).
   - En la barra de direcciones, escribe `localhost:8000` y presiona Enter.

6. **Requisitos previos:**
   - El proyecto está hecho en PHP 8.2 o superior.
   - Asegúrate de tener instalado Composer y Node.js en tu PC para ejecutar el proyecto sin inconvenientes.

7. **Iniciar sesión como administrador o usuario:**
   - Para iniciar sesión como administrador, usa el siguiente correo y contraseña:
     - Correo electrónico: correo@correo.com
     - Contraseña: 123456
   - Para iniciar sesión como usuario con boleto presencial, usa el siguiente correo y contraseña:
     - Correo electrónico: correo2@correo.com
     - Contraseña: 123456
   - Para iniciar sesión como usuario con boleto sin costo, usa el siguiente correo y contraseña:
     - Correo electrónico: correo3@correo.com
     - Contraseña: 123456

8. **Importar la base de datos:**
   - La base de datos se llama `devwebcamp.sql`.
   - Importa esta base de datos a MySQL (XAMPP es más sencillo) para acceder a los datos necesarios para la aplicación.

¡Ahora estás listo para acceder a la demo del proyecto DebWebCamp! Si tienes alguna pregunta o problema, no dudes en abrir un issue en este repositorio.
