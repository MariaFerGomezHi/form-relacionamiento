CREATE DATABASE territorios_transforman
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE territorios_transforman;

CREATE TABLE inscripciones (
    id INT AUTO_INCREMENT PRIMARY KEY,

    -- Datos del participante
    nombres VARCHAR(150) NOT NULL,
    documento_participante VARCHAR(50) NOT NULL,
    telefono_participante VARCHAR(30) NOT NULL,
    correo VARCHAR(150) NOT NULL,
    cargo VARCHAR(150) NOT NULL,

    -- Datos empresa
    razon_social VARCHAR(200) NOT NULL,
    nit VARCHAR(50) NOT NULL,
    representante_legal VARCHAR(150) NOT NULL,
    documento_representante VARCHAR(50) NOT NULL,
    telefono_empresa VARCHAR(30) NOT NULL,
    municipio VARCHAR(150) NOT NULL,
    direccion VARCHAR(200) NOT NULL,

    nodo ENUM('Minero', 'Lácteo', 'Turístico', 'Curtiembre') NOT NULL,

    tamano_empresa ENUM(
        'Microempresa',
        'Pequeña empresa',
        'Mediana empresa',
        'Gran empresa'
    ) NOT NULL,

    numero_empleados INT NOT NULL,

    -- Validaciones
    acepta_datos TINYINT(1) NOT NULL DEFAULT 1,
    acepta_compromiso TINYINT(1) NOT NULL DEFAULT 1,

    -- Documentos
    certificado_matricula VARCHAR(255) NOT NULL,
    cedula_participante VARCHAR(255) NOT NULL,

    -- Estado administrativo
    estado ENUM(
        'Pendiente',
        'En revisión',
        'Seleccionado',
        'No seleccionado'
    ) NOT NULL DEFAULT 'Pendiente',

    observaciones TEXT NULL,

    fecha_inscripcion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE usuarios_admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nombre VARCHAR(150) NOT NULL
);