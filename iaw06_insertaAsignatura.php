<?php
// iaw06_insertaAsignatura.php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recojo los datos del formulario
    $codasig= $_POST['codasig'];
    $nomasig= $_POST['nomasig'];
    $horas= $_POST['horas'];
    
    // Inserto los datos en la tabla
    $sql = "INSERT INTO alumnos (codasig, nomasig, horas)
            VALUES ($codasig, '$nomasig', '$horas)";
    $stmt = $conn->query($
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Añadir Nuevo Alumno</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Añadir Nueva Asignatura</h1>
    <form method="post">
        <label for="codasig">Código de Alumno:</label>
        <input type="number" id="codasig" name="codasig" required><br><br>
        
        <label for="nomasig">Nombre:</label>
        <input type="text" id="nomasig" name="nomasig" maxlength="30" required><br><br>
        
        <label for="horas">Curso:</label>
        <input type="number" id="horas" name="horas" required><br><br>
        
        <input type="submit" value="Añadir Asignatura">
    </form>
    
    <p><a href="iaw06_listado.php">Ver listado completo</a></p>
</body>
</html>
