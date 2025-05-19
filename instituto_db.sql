-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS instituto;
USE instituto;

-- Tabla cursos
CREATE TABLE IF NOT EXISTS cursos (
    codcurso INT(10) NOT NULL PRIMARY KEY,
    nomcurso VARCHAR(30)
);

-- Tabla alumnos
CREATE TABLE IF NOT EXISTS alumnos (
    codalum INT(10) NOT NULL PRIMARY KEY,
    nombre VARCHAR(30),
    direccion VARCHAR(45),
    curso INT(10),
    CONSTRAINT fk_alumnos_cursos
        FOREIGN KEY (curso) REFERENCES cursos (codcurso)
);

-- Tabla asignaturas
CREATE TABLE IF NOT EXISTS asignaturas (
    codasig INT(10) NOT NULL PRIMARY KEY,
    nomasig VARCHAR(30),
    horas INT(11)
);

-- Tabla notas (relación muchos a muchos entre alumnos y asignaturas)
CREATE TABLE IF NOT EXISTS notas (
    codalum INT(10) NOT NULL,
    codasig INT(10) NOT NULL,
    eval INT(11),
    nota INT(11),
    PRIMARY KEY (codalum, codasig, eval),
    CONSTRAINT fk_alumnos_has_asignaturas_alumnos1
        FOREIGN KEY (codalum) REFERENCES alumnos (codalum),
    CONSTRAINT fk_alumnos_has_asignaturas_asignaturas1
        FOREIGN KEY (codasig) REFERENCES asignaturas (codasig)
);

-- Insertar datos en tablas principales para poder trabajar los ejemplos
INSERT INTO cursos (codcurso, nomcurso) VALUES
(1, '1º ESO'),
(2, '2º ESO'),
(3, '3º ESO'),
(4, '4º ESO'),
(5, '1º Bachillerato'),
(6, '2º Bachillerato');

INSERT INTO asignaturas (codasig, nomasig, horas) VALUES
(1, 'Matemáticas', 4),
(2, 'Lengua', 3),
(3, 'Inglés', 3),
(4, 'Ciencias Naturales', 3),
(5, 'Historia', 2),
(6, 'Educación Física', 2);
