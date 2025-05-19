<?php
// iaw06_listado.php
include 'conexion.php';

// Consultas para todas las tablas
$alumnos = $conn->query("SELECT * FROM alumnos");
$asignaturas = $conn->query("SELECT * FROM asignaturas");
$notas = $conn->query("SELECT * FROM notas");
$cursos = $conn->query("SELECT * FROM cursos");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listado Completo</title>
    <meta charset="UTF-8">
</head>
<body>

<h2>Alumnos</h2>
<table border="1">
    <tr><th>Código</th><th>Nombre</th><th>Dirección</th><th>Curso</th></tr>
    <?php while($a = $alumnos->fetch_assoc()): ?>
    <tr>
        <td><?=$a['codalum']?></td>
        <td><?=$a['nombre']?></td>
        <td><?=$a['direccion']?></td>
        <td><?=$a['curso']?></td>
    </tr>
    <?php endwhile; ?>
</table>

<h2>Asignaturas</h2>
<table border="1">
    <tr><th>Código</th><th>Nombre</th><th>Horas</th></tr>
    <?php while($asig = $asignaturas->fetch_assoc()): ?>
    <tr>
        <td><?=$asig['codasig']?></td>
        <td><?=$asig['nomasig']?></td>
        <td><?=$asig['horas']?></td>
    </tr>
    <?php endwhile; ?>
</table>

<h2>Notas</h2>
<table border="1">
    <tr><th>Alumno</th><th>Asignatura</th><th>Evaluación</th><th>Nota</th></tr>
    <?php while($n = $notas->fetch_assoc()): ?>
    <tr>
        <td><?=$n['codalum']?></td>
        <td><?=$n['codasig']?></td>
        <td><?=$n['eval']?></td>
        <td><?=$n['nota']?></td>
    </tr>
    <?php endwhile; ?>
</table>

<h2>Cursos</h2>
<table border="1">
    <tr><th>Código</th><th>Nombre</th></tr>
    <?php while($c = $cursos->fetch_assoc()): ?>
    <tr>
        <td><?=$c['codcurso']?></td>
        <td><?=$c['nomcurso']?></td>
    </tr>
    <?php endwhile; ?>
</table>

<p><a href="iaw06_insertaAlumno.php">Volver</a></p>

</body>
</html>
