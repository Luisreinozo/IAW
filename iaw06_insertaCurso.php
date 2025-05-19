<?php
// iaw06_insertaCurso.php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recojo los datos del formulario
    $codcurso= $_POST['codcurso'];
    $nomcurso= $_POST['nomcurso'];
    
    // Inserto los datos en la tabla
    $sql = "INSERT INTO cursos (codcurso, nomcurso)
            VALUES ($codcurso, '$nomcurso')";
    $stmt = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Añadir Nuevo Alumno</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Añadir Nuevo Curso</h1>
    <form method="post">
        <label for="codcurso">Código de Curso:</label>
        <input type="number" id="codcurso" name="codcurso" maxlength="10" required><br><br>
        
        <label for="nombre">Nombre de curso:</label>
        <input type="text" id="nomcurso" name="nomcurso" maxlength="30" required><br><br>
        
        <input type="submit" value="Añadir Curso">
    </form>
    
    <p><a href="iaw06_listado.php">Ver listado completo</a></p>
</body>
</html>
