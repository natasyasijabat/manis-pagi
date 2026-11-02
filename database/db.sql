CREATE DATABASE IF NOT EXISTS bakery_db CHARACTER SET utf8mb4;
USE bakery_db;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin','user') NOT NULL DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS produk (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(120) NOT NULL,
  kategori VARCHAR(60) NOT NULL,
  harga INT NOT NULL DEFAULT 0,
  stok INT NOT NULL DEFAULT 0,
  deskripsi TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Admin default: admin@manispagi.com / admin123 (hash BCRYPT)
INSERT INTO users (nama,email,password,role) VALUES
('Administrator','admin@manispagi.com','$2y$10$XMhTTueAb7IO64nhBaIxjufEgBTCyL/w57sEz0WPrcK2H8lIV5JfG','admin');

-- 30 data dummy produk bakery
INSERT INTO produk (nama,kategori,harga,stok,deskripsi) VALUES
('Roti Tawar Gandum','Roti',22000,40,'Roti tawar gandum utuh, tanpa pengawet.'),
('Roti Tawar Susu','Roti',18000,45,'Lembut dan harum susu.'),
('Roti Sobek Cokelat','Roti',16000,35,'Isi cokelat leleh, sobek-sobek.'),
('Roti Sobek Keju','Roti',17000,35,'Taburan keju parut gurih.'),
('Roti Pisang Cokelat','Roti',9000,50,'Pisang dan cokelat dalam roti empuk.'),
('Roti Abon Sapi','Roti',10000,40,'Abon sapi gurih dengan mayones.'),
('Roti Sosis Bakar','Roti',11000,38,'Sosis sapi dibalut roti lembut.'),
('Baguette Original','Roti',20000,15,'Kulit renyah, dalam lembut.'),
('Bagel Wijen','Roti',14000,20,'Bagel panggang taburan wijen.'),
('Roti Bun Burger','Roti',12000,30,'Bun lembut untuk burger rumahan.'),
('Croissant Butter','Pastry',18000,25,'Berlapis, dibuat dengan butter asli.'),
('Croissant Almond','Pastry',24000,18,'Isi krim almond, taburan almond.'),
('Pain au Chocolat','Pastry',22000,20,'Pastry lapis dengan cokelat batang.'),
('Danish Blueberry','Pastry',21000,16,'Pastry dengan selai blueberry.'),
('Cinnamon Roll','Pastry',19000,22,'Kayu manis dan glaze gula.'),
('Egg Tart','Pastry',9000,40,'Kulit renyah, custard lembut.'),
('Apple Pie Mini','Pastry',15000,14,'Isi apel karamel dan kayu manis.'),
('Brownies Panggang','Kue',28000,25,'Brownies cokelat pekat, tekstur fudgy.'),
('Bolu Pandan','Kue',32000,18,'Bolu pandan wangi, lembut.'),
('Red Velvet Cake Slice','Kue',27000,12,'Irisan red velvet dengan cream cheese.'),
('Cheesecake Slice','Kue',29000,10,'Cheesecake lembut ala New York.'),
('Tiramisu Cup','Kue',26000,9,'Kopi, mascarpone, dan cokelat.'),
('Kue Lapis Legit Mini','Kue',45000,8,'Lapis legit manis, aroma rempah.'),
('Donat Gula Halus','Kue',7000,60,'Donat empuk berlapis gula halus.'),
('Nastar Keju Toples','Kue Kering',85000,20,'Nastar nanas isi selai asli, 500 g.'),
('Kastengel Toples','Kue Kering',90000,15,'Keju edam dan cheddar, 500 g.'),
('Choco Chips Cookies','Kue Kering',45000,30,'Cookies renyah dengan choco chips.'),
('Putri Salju','Kue Kering',60000,18,'Lumer di mulut, taburan gula halus.'),
('Es Kopi Susu Gula Aren','Minuman',22000,7,'Kopi susu dengan gula aren.'),
('Cokelat Panas','Minuman',20000,6,'Cokelat Belgia hangat dan creamy.');
