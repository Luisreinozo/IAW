<?php
// iaw06_insertaNota.php
include 'conexion.php';

// Obtener alumnos y asignaturas disponibles
$alumnos_query = "SELECT codalum, nombre FROM alumnos ORDER BY nombre";
$asignaturas_query = "SELECT codasig, nomasig FROM asignaturas ORDER BY nomasig";

$alumnos_result = $conn->query($alumnos_query);
$asignaturas_result = $conn->query($asignaturas_query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recojo los datos del formulario
    $codalum = $_POST['codalum'];
    $codasig = $_POST['codasig'];
    $eval = $_POST['eval'];
    $nota = $_POST['nota'];
    
    // Realizo la consulta de las no
    $sql = "INSERT INTO notas (codalum, codasig, eval, nota) 
				    VALUES ($codalum, $codasig, $eval, $nota)"
    $stmt = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Añadir Nueva Nota</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Añadir Nueva Nota</h1>
    
    <?php if(isset($mensaje)): ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="codalum">Alumno:</label>
        <select id="codalum" name="codalum" required>
            <option value="">Seleccione un alumno</option>
            <?php while($alumno = $alumnos_result->fetch_assoc()): ?>
                <option value="<?php echo $alumno['codalum']; ?>">
                    <?php echo htmlspecialchars($alumno['nombre']); ?>
                </option>
            <?php endwhile; ?>
        </select><br><br>
        
        <label for="codasig">Asignatura:</label>
        <select id="codasig" name="codasig" required>
            <option value="">Seleccione una asignatura</option>
            <?php while($asig = $asignaturas_result->fetch_assoc()): ?>
                <option value="<?php echo $asig['codasig']; ?>">
                    <?php echo htmlspecialchars($asig['nomasig']); ?>
                </option>
            <?php endwhile; ?>
        </select><br><br>
        
        <label for="eval">Evaluación:</label>
        <select id="eval" name="eval" required>
            <option value="">Seleccione evaluación</option>
            <option value="1">1ª Evaluación</option>
            <option value="2">2ª Evaluación</option>
            <option value="3">3ª Evaluación</option>
        </select><br><br>
        
        <label for="nota">Nota (0-10):</label>
        <input type="number" id="nota" name="nota" min="0" max="10" step="0.1" required><br><br>
        
        <input type="submit" value="Guardar Nota">
    </form>
    
    <p><a href="iaw06_listado.php">Ver listado completo</a></p>
</body>
</html>
