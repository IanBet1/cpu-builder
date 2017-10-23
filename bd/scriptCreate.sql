CREATE DATABASE IF NOT EXISTS dbCpuBuilder;
USE dbCpuBuilder;

CREATE TABLE IF NOT EXISTS categoriaComponente  (
  idComponente INT NOT NULL AUTO_INCREMENT,
  idCategoria INT NOT NULL,
  nomeComponente VARCHAR(12) NOT NULL,
  PRIMARY KEY (idComponente)
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
