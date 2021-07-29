![logo](/public/img/logo.png)

# Libro-recetas 
 
Blog para publicar recetas de cocina. 
 
## Tecnologías 
 
* Laravel 
* Bootstrap 
* PostgreSQL 
* Laravel Breeze 
* Git 
   
## Laravel 
 
### Modelos 
 
* Receta 
  * Receta pertenece a un usuario 
  * Receta tiene muchos ingredientes 
* User 
  * User tiene muchas recetas 
* Ingrediente 
  * Ingrediente pertenece a muchas recetas 
* Receta_Ingrediente 
 
### [Migraciones](/database/migrations/)
 
#### recetas 
| Campo       | Tipo    | Restricciones  | Descripción                         |
| ----------- | ------- | -------------- | ----------------------------------- |
| id          | serial  | Clave primaria | identificación de receta            |
| nombre      | string  | NOT NULL       | Nombre de la receta                 |
| ingrediente |         |                |                                     |
| tiempo      | time    | NOT NULL       | Tiempo de preparación               |
| comensales  | integer | NOT NULL       | Cantidad de comensales              |
| dificultad  | string  | NOT NULL       | fácil, media, difícil               |
| proceso     | text    | NOT NULL       | Proceso de preparación              |
| extracto    | text    | NOT NULL       | Extracto del proceso de preparación |
| imagen      | string  |                | Imagen de la preparación            |
| user_id     | integer | clave foránea  | referencia al usuario autor         |
 
#### ingredientes 
 
| Campo  | Tipo   | Restricciones  | Descripción                    |
| ------ | ------ | -------------- | ------------------------------ |
| id     | serial | Clave primaria | identificación del ingrediente |
| nombre | string | NOT NULL       | Nombre del ingrediente         |
 
#### recetas_ingredientes 
 
| Campo          | Tipo    | Restricciones | Descripción                 |
| -------------- | ------- | ------------- | --------------------------- |
| receta_id      | integer | clave foránea | referencia a una receta     |
| ingrediente_id | integer | clave foránea | referencia a un ingrediente |
| cantidad       | string  | NOT NULL      | cantidad del ingrediente    |
 
 
 
### Rutas 
 
| Ruta                 | método | descripción                                                                            |
| -------------------- | ------ | -------------------------------------------------------------------------------------- |
| `/`                  | GET    | Pagina de inicio para recibir los usuarios y ver las recetas creadas (poder borrarlas) |
| `/receta/{id}`       | GET    | Pagina para ver una receta y poder modificarla                                         |
| `/receta_nueva`      | GET    | Pagina del formulario para crear una receta                                            |
| `/receta_nueva`      | POST   | Ruta para procesar formulario de crear receta                                          |
| `/user/{id}`         | GET    | Pagina de recetas de un usuario                                                        |
| `/ingrediente/{id}`  | GET    | Nos da el JSON con los datos del ingredientes                                          |
| `/ingrediente_nuevo` | GET    | Página con Formulario para pedir el ingrediente                                        |
| `/ingrediente_nuevo` | POST   | Página con la ruta que procesa el formulario de nuevo ingrediente                      |
| `/borrar_receta`     | POST   | Borrar recetas de un user logeado                                                      |
 
 
### Vistas 
 
| Vista                            | Información que recibe | Ruta               |
| -------------------------------- | ---------------------- | ------------------ |
| portada.blade.php                | Todas las recetas      | /                  |
| receta.blade.php                 | Una receta             | /receta/{id}       |
| formulario-receta.blade.php      | Ingredientes           | /receta_nueva      |
| formulario-ingrediente-blade.php |                        | /ingrediente_nuevo |
| user.blade.php                   | Recetas del auth       | /user/{id}         |
 
### Componentes 
 
| Componente                 | Función                          | Propiedades |
| -------------------------- | -------------------------------- | ----------- |
| layout-principal.blade.php | Header/Elementos comunes/ Footer |             |
 
### Controladores 
 
(Funciones existentes que no vamos a dejar en las rutas) 
 
* UserController.php (ya viene) 
* RecetaController.php 
* IngredienteController.php 
 
### Fábricas 
 
* Receta 
* User (ya viene) 
* Ingrediente 
* Receta_Ingrediente (pendiente)
