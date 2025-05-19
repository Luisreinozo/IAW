<?php
// iaw06_insertaAlumno.php
include 'conexion.php';

// Obtener los cursos disponibles de la base de datos
$cursos_query = "SELECT codcurso, nomcurso FROM cursos";
$cursos_result = $conn->query($cursos_query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recojo los datos del formulario
    $codalum = $_POST['codalum'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $curso = $_POST['curso'];
    
    // inserto con SQL
    $sql = "INSERT INTO alumnos (codalum, nombre, direccion, curso)
            VALUES ($codalum, '$nombre', '$direccion', $curso)";
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
   <h1>Añadir Nuevo Alumno</h1>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
       <label for="codalum">Código de Alumno:</label>
       <input type="number" id="codalum" name="codalum" required><br><br>
       
       <label for="nombre">Nombre:</label>
       <input type="text" id="nombre" name="nombre" maxlength="30" required><br><br>
        
       <label for="direccion">Dirección:</label>
       <input type="text" id="direccion" name="direccion" maxlength="45" required><br><br>
        
       <label for="curso">Curso:</label>
       <select id="curso" name="curso" required>
           <option value="">Seleccione un curso</option>
           <?php
           if ($cursos_result->num_rows > 0) {
               while($row = $cursos_result->fetch_assoc()) {
                 echo '<option value="'.$row['codcurso'].'">'.$row['nomcurso'].'</option>';
                }
            }
            ?>
       </select><br><br>
        
       <input type="submit" value="Añadir Alumno">
   </form>
    
    <p><a href="iaw06_listado.php">Ver listado completo</a></p>
</body>
</html>
