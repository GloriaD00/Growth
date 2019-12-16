# Growth
##How to use it

Edit config.php file with your database name, password and user.

The table structure of the database is the one that follows 


#Utenti table
```
CREATE TABLE `Utenti` (
  `id_utente` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `Cognome` char(30) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `Email` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `Password` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_utente`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```
#Progetti table
```

CREATE TABLE `Progetti` (
  `id_proj` int(11) NOT NULL AUTO_INCREMENT,
  `cod_utente` int(11) NOT NULL,
  `NomeProj` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_proj`),
  KEY `cod_utente` (`cod_utente`),
  CONSTRAINT `cod_utente` FOREIGN KEY (`cod_utente`) REFERENCES `utenti` (`id_utente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

```
#Liste table
```
CREATE TABLE `Liste` (
  `id_lista` int(11) NOT NULL AUTO_INCREMENT,
  `Scala` int(11) NOT NULL,
  `cod_proj` int(11) NOT NULL,
  `nome` char(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_lista`),
  KEY `cod_proj` (`cod_proj`),
  CONSTRAINT `cod_proj` FOREIGN KEY (`cod_proj`) REFERENCES `progetti` (`id_proj`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

```
#Tasks table
```
CREATE TABLE `Tasks` (
  `id_task` int(11) NOT NULL AUTO_INCREMENT,
  `cod_lista` int(11) NOT NULL,
  `Nome` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '',
  `descr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `due_date` char(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_task`),
  KEY `cod_lista` (`cod_lista`),
  CONSTRAINT `cod_lista` FOREIGN KEY (`cod_lista`) REFERENCES `liste` (`id_lista`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

```
You will also need to install webpack and composer to run the project. I have provided the composer.json file to link all the repositories together.
