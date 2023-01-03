CREATE SCHEMA `usuarios`;

USE `usuarios`;

CREATE TABLE `departamentos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `fecha_de_creacion` DATETIME NOT NULL,
  `estado` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tipo_telefonos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `fecha_de_creacion` DATETIME NOT NULL,
  `estado` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `telefonos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(255) NOT NULL,
  `extension` VARCHAR(255) NOT NULL,
  `tipo_telefono_id` INT NOT NULL,
  `fecha_de_creacion` DATETIME NOT NULL,
  `estado` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`tipo_telefono_id`) REFERENCES `tipo_telefonos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(255) NOT NULL,
  `apellidos` VARCHAR(255) NOT NULL,
  `departamento_id` INT NOT NULL,
  `fecha_de_nacimiento` DATE NOT NULL,
  `fecha_de_creacion` DATETIME NOT NULL,
  `estado` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `usuario_telefonos` (
  `telefono_id` INT NOT NULL,
  `usuario_id` INT NOT NULL,
  `fecha_de_creacion` DATETIME NOT NULL,
  `estado` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`telefono_id`, `usuario_id`),
  FOREIGN KEY (`telefono_id`) REFERENCES `telefonos` (`id`),
  FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `departamentos` (`nombre`, `fecha_de_creacion`, `estado`) VALUES
  ('Ventas', NOW(), 1),
  ('Desarrollo', NOW(), 1),
  ('Recursos Humanos', NOW(), 1),
  ('Marketing', NOW(), 1);

INSERT INTO `tipo_telefonos` (`nombre`, `fecha_de_creacion`, `estado`) VALUES
  ('Casa', NOW(), 1),
  ('Trabajo', NOW(), 1),
  ('Móvil', NOW(), 1),
  ('Fax', NOW(), 1);


