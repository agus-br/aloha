# Instrucciones de Configuración y Ejecución

Este README proporciona instrucciones detalladas sobre cómo configurar el entorno de ejecución y ejecutar el proyecto correctamente.

## 1. Entorno de Ejecución

Para ejecutar este proyecto, necesitarás configurar tu entorno de ejecución siguiendo estos pasos:

### Instalación de XAMPP y PostgreSQL

1. Descarga e instala XAMPP desde [https://www.apachefriends.org/es/download.html](https://www.apachefriends.org/es/download.html) siguiendo las instrucciones proporcionadas por el sitio web oficial.
2. Descarga e instala PostgreSQL desde [https://www.postgresql.org/download/](https://www.postgresql.org/download/) según las instrucciones disponibles en su página web.

### Configuración de Apache en XAMPP

3. Abre el archivo de configuración del servidor Apache accediendo a `[[panel de xamp] -> [config] -> [Apache(httpd.conf)]`.
4. Modifica las siguientes instrucciones:
   - `DocumentRoot "C:/xampp/htdocs"`: Cambia la ruta por la ubicación donde deseas que el servidor tome los archivos de ejecución. Esta configuración es opcional.
   - `<Directory "C:/xampp/htdocs">`: Igualmente, ajusta la ruta según tu preferencia. Esta configuración es opcional.

### Configuración del Driver de PHP para PostgreSQL

5. Abre el panel de XAMPP y navega a `[config] -> PHP (php.ini)`.
6. Busca la línea comentada `;extension=pdo_pgsql` y elimina el punto y coma (`;`) al principio de la línea para descomentarla.

### Clonar el repositorio

7. Clonar el repositorio en la ruta configurada en los pasos 3 y 4.

## 2. Ejecución

Una vez que hayas completado la configuración del entorno, sigue estos pasos para ejecutar el proyecto:

1. Abre el panel de XAMPP.
2. Inicia el servidor Apache.
3. Abre tu navegador web y escribe `localhost/[PROYECTO]` en la barra de direcciones.

¡Listo! Ahora deberías poder ejecutar el proyecto sin problemas en tu entorno local.

---

**Nota**: Asegúrate de seguir todas las instrucciones detenidamente para evitar posibles errores durante la configuración y ejecución del proyecto.
