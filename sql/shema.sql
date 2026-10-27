-- Base de datos: manuel1_apex (crear en HestiaCP primero)
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    ultimo_login DATETIME NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(60) NOT NULL,
    model VARCHAR(100) NOT NULL,
    year SMALLINT NOT NULL,
    type ENUM('SUV','Deportivo','Eléctrico/Híbrido','Sedán','Pickup') NOT NULL,
    status ENUM('Nuevo','Seminuevo','Destacado') DEFAULT 'Nuevo',
    price DECIMAL(12,2) NOT NULL,
    mileage VARCHAR(30) DEFAULT '0 km',
    trans VARCHAR(60),
    fuel VARCHAR(40),
    hp VARCHAR(30),
    engine VARCHAR(100),
    traction VARCHAR(60),
    image VARCHAR(500),
    gallery_json TEXT,
    features_json TEXT,
    destacado TINYINT(1) DEFAULT 0,
    activo TINYINT(1) DEFAULT 1,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    telefono VARCHAR(30),
    password_hash VARCHAR(255) NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS purchases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    car_id INT NOT NULL,
    user_id INT NULL,
    precio_final DECIMAL(12,2) NOT NULL,
    estado ENUM('pendiente','pagado','entregado','cancelado') DEFAULT 'pendiente',
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (car_id) REFERENCES cars(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    car_id INT NULL,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150),
    telefono VARCHAR(30),
    fecha DATETIME NOT NULL,
    estado ENUM('pendiente','confirmada','completada','cancelada') DEFAULT 'pendiente',
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (car_id) REFERENCES cars(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    nombre VARCHAR(100),
    texto TEXT NOT NULL,
    aprobado TINYINT(1) DEFAULT 0,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS sell_leads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(60),
    modelo VARCHAR(100),
    anio SMALLINT,
    km VARCHAR(30),
    nombre VARCHAR(100),
    contacto VARCHAR(150),
    estado ENUM('nuevo','contactado','cerrado') DEFAULT 'nuevo',
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS contact_msgs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    mensaje TEXT NOT NULL,
    leido TINYINT(1) DEFAULT 0,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS settings (
    clave VARCHAR(60) PRIMARY KEY,
    valor TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Admin por defecto: usuario "admin" / contraseña "Apex2026!"
INSERT INTO admins (username, password_hash, nombre) VALUES
('admin', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHe1HlCSqZ0fZ1aVnQdQZ4zZ2y3z4z5z6z', 'Administrador')
ON DUPLICATE KEY UPDATE username = username;

-- Autos de ejemplo
INSERT INTO cars (brand, model, year, type, status, price, mileage, trans, fuel, hp, engine, traction, image, destacado, activo) VALUES
('Porsche','911 GT3 RS',2024,'Deportivo','Nuevo',285000,'0 km','PDK 7 Vel','Gasolina','525 HP','4.0L Atmosférico 6 Cil','Trasera (RWD)','https://images.unsplash.com/photo-1614162692292-7ac56d7f7f1e?auto=format&fit=crop&w=800&q=80',1,1),
('BMW','M4 Competition xDrive',2023,'Deportivo','Seminuevo',98500,'12,500 km','Aut 8 Vel','Gasolina','510 HP','3.0L Bi-Turbo I6','Integral (xDrive)','https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=800&q=80',1,1),
('Tesla','Model S Plaid',2024,'Eléctrico/Híbrido','Nuevo',110000,'0 km','Direct Drive','100% Eléctrico','1,020 HP','Trimotor Eléctrico','AWD Integral','https://images.unsplash.com/photo-1617788138017-80ad40651399?auto=format&fit=crop&w=800&q=80',1,1),
('Audi','RS Q8 V8 Dynamic',2023,'SUV','Destacado',135000,'8,200 km','Tiptronic 8','Híbrido MHEV','600 HP','4.0L V8 Twin-Turbo','Quattro Integral','https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?auto=format&fit=crop&w=800&q=80',0,1),
('Mercedes-Benz','AMG GT Coupe',2024,'Deportivo','Nuevo',165000,'0 km','AMG Speedshift 9','Gasolina','585 HP','4.0L V8 Biturbo','4MATIC+','https://images.unsplash.com/photo-1618843479313-40f8afb456d8?auto=format&fit=crop&w=800&q=80',0,1),
('Range Rover','Sport SVR V8',2022,'SUV','Seminuevo',115000,'24,000 km','Aut 8 Vel','Gasolina','575 HP','5.0L Supercharged V8','4WD Terrain Response','https://images.unsplash.com/photo-1563720223185-11003d516935?auto=format&fit=crop&w=800&q=80',0,1);

SET FOREIGN_KEY_CHECKS = 1;