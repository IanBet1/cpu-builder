CREATE DATABASE IF NOT EXISTS dbCpuBuilder;
USE dbCpuBuilder;

CREATE TABLE IF NOT EXISTS categoriaComponente  (
  idComponente INT NOT NULL AUTO_INCREMENT,
  idCategoria INT NOT NULL,
  nomeComponente VARCHAR(12) NOT NULL,
  PRIMARY KEY (idComponente)
);

CREATE TABLE IF NOT EXISTS socketComponente  (
  idSocket INT NOT NULL AUTO_INCREMENT,
  marcaComponente VARCHAR(12) NOT NULL,
  nomeSocket VARCHAR(12) NOT NULL,
  PRIMARY KEY (idSocket)
);

INSERT INTO categoriaComponente (idComponente, idCategoria, nomeComponente)
VALUES
  (null, 95, 'processador'),
  (null, 3623, 'placamae'),
  (null, 2464, 'memoriaram'),
  (null, 3737, 'hd/ssd'),
  (null, 35, 'placavideo'),
  (null, 9550, 'fonte'),
  (null, 114, 'gabinete');

INSERT INTO socketComponente (idSocket, marcaComponente, nomeSocket)
VALUES
  (null, 'Intel', 'LGA 775'),
  (null, 'Intel', 'LGA 1366'),
  (null, 'Intel', 'LGA 1156'),
  (null, 'Intel', 'LGA 1155'),
  (null, 'Intel', 'LGA 2011'),
  (null, 'Intel', 'LGA 1150'),
  (null, 'Intel', 'LGA 1151'),
  (null, 'Intel', 'LGA 2066'),
  (null, 'AMD', 'F'),
  (null, 'AMD', 'AM1'),
  (null, 'AMD', 'AM2'),
  (null, 'AMD', 'AM2+'),
  (null, 'AMD', 'AM3'),
  (null, 'AMD', 'AM3+'),
  (null, 'AMD', 'FM1'),
  (null, 'AMD', 'FM2'),
  (null, 'AMD', 'FM2+'),
  (null, 'AMD', 'AM4'),
  (null, 'AMD', 'TR4');
