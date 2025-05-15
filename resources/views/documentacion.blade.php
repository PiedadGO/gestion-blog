<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Documentación de la API</title>
    <style>
        body {
            margin-left: 3em;
        }
    </style>
</head>

<body>
    <h1>Documentación de la API - Blog</h1>

    <h2>Artículos</h2>

    <p><strong>Devuelve todos los artículos:</strong></p>
    <code>http GET piedaddev2.alwaysdata.net/api/articulos</code>

    <p><strong>Devuelve el artículo con identificador 4:</strong></p>
    <code>http GET piedaddev2.alwaysdata.net/api/articulos/4</code>

    <p><strong>Crea un nuevo artículo con los datos proporcionados:</strong></p>
    <code>
        http POST piedaddev2.alwaysdata.net/api/articulos titulo="Título" contenido="Contenido" fecha_publicacion="2023-03-15T08:00:00" autor="Autor"
    </code>

    <p><strong>Edita el artículo con identificador 4:</strong></p>
    <code>
        http PUT piedaddev2.alwaysdata.net/api/articulos/4 titulo="Título" contenido="Contenido"
    </code>

    <p><strong>Borra el artículo con identificador 4:</strong></p>
    <code>http DELETE piedaddev2.alwaysdata.net/api/articulos/4</code>

    <h2>Comentarios</h2>

    <p><strong>Devuelve todos los comentarios:</strong></p>
    <code>http GET piedaddev2.alwaysdata.net/api/comentarios</code>

    <p><strong>Devuelve el comentario con identificador 5:</strong></p>
    <code>http GET piedaddev2.alwaysdata.net/api/comentarios/5</code>

    <p><strong>Devuelve todos los comentarios del artículo con ID 6:</strong></p>
    <code>http GET piedaddev2.alwaysdata.net/api/articulos/6/comentarios</code>

    <p><strong>Agrega un nuevo comentario al artículo con ID 6:</strong></p>
    <code>
        http POST piedaddev2.alwaysdata.net/api/articulos/6/comentarios contenido="Nuevo comentario" fecha_publicacion="2023-03-16T10:00:00" autor="Comentarista"
    </code>

    <p><strong>Edita el comentario con ID 5:</strong></p>
    <code>http PUT piedaddev2.alwaysdata.net/api/comentarios/5 contenido="Comentario editado"</code>

    <p><strong>Borra el comentario con ID 5:</strong></p>
    <code>http DELETE piedaddev2.alwaysdata.net/api/comentarios/5</code>
</body>

</html>
