create database examen; 
use examen; 


create user examen;
grant all on examen.* to 'examen'@'localhost' identified by 'examen';

drop TABLE `t_empleados`; 

CREATE TABLE `t_empleados` (
  `idEmpleado` mediumint(8) unsigned NOT NULL auto_increment,
  `nombre` varchar(255) default NULL,
  `apellidoPaterno` varchar(255) default NULL,
  `apellidoMaterno` varchar(255) default NULL,
  PRIMARY KEY (`idEmpleado`)
) AUTO_INCREMENT=1;

INSERT INTO `t_empleados` (`nombre`,`apellidoPaterno`,`apellidoMaterno`) VALUES ("Aaron","Burns","Maynard"),("Clinton","Mcgowan","Boyer"),("Jarrod","Malone","Blake"),("Cyrus","Carter","Bauer"),("Tyrone","Alexander","Reynolds"),("Rajah","Stevens","Coleman"),("Rooney","Bush","Melendez"),("Dale","Mcdowell","Fox"),("Igor","Hester","Mcpherson"),("Alvin","Horne","Harper");
INSERT INTO `t_empleados` (`nombre`,`apellidoPaterno`,`apellidoMaterno`) VALUES ("Rudyard","Stephenson","Harding"),("Nehru","Barron","Mcintyre"),("Clark","Cortez","Hoffman"),("Gareth","Keller","Sweet"),("Rigel","Daniel","Manning"),("Chaney","Ewing","Moody"),("Barrett","Maynard","Morin"),("Scott","Velazquez","Lee"),("Hop","Parsons","Chapman"),("Burke","Blackwell","Ingram");
INSERT INTO `t_empleados` (`nombre`,`apellidoPaterno`,`apellidoMaterno`) VALUES ("Quentin","Lawrence","Delgado"),("Lester","Lewis","Becker"),("Robert","Price","Steele"),("Dylan","Burnett","Fisher"),("Tate","Thomas","Savage"),("Zachary","Rice","Edwards"),("Flynn","Ortiz","Hampton"),("Kuame","Frank","Henderson"),("Hyatt","Mccarthy","Riley"),("Dominic","Walters","Vincent");
INSERT INTO `t_empleados` (`nombre`,`apellidoPaterno`,`apellidoMaterno`) VALUES ("Laith","Sosa","Callahan"),("Gage","Manning","Hood"),("Hedley","Mcmahon","Franklin"),("Jack","Monroe","Munoz"),("Joseph","Mcconnell","Willis"),("Josiah","Osborn","Hicks"),("Declan","Perkins","Harris"),("Kermit","Atkins","Mathis"),("Tobias","Medina","Stokes"),("Christian","Jimenez","Trevino");
INSERT INTO `t_empleados` (`nombre`,`apellidoPaterno`,`apellidoMaterno`) VALUES ("Igor","Davis","Huff"),("Mannix","Medina","Cruz"),("Nissim","Everett","Miranda"),("Beck","Delaney","Sanford"),("Harper","Little","Bailey"),("Walker","Walton","Taylor"),("Warren","Stephenson","Clemons"),("Berk","Bowen","Carver"),("Rogan","Sandoval","Abbott"),("Stewart","Michael","Zimmerman");
INSERT INTO `t_empleados` (`nombre`,`apellidoPaterno`,`apellidoMaterno`) VALUES ("Keegan","Chase","Booth"),("Castor","Cunningham","Rush"),("Tate","Griffin","Kinney"),("Lawrence","Willis","Bryant"),("Price","Mercado","Faulkner"),("Plato","Mays","Mccoy"),("Hashim","Vazquez","Torres"),("Ryder","Meyers","Hampton"),("Drew","Duffy","Fox"),("Ignatius","Bradford","Mathis");
INSERT INTO `t_empleados` (`nombre`,`apellidoPaterno`,`apellidoMaterno`) VALUES ("Ethan","Norman","Freeman"),("Macaulay","Reed","Turner"),("Victor","Thomas","Mcfadden"),("Hakeem","Hopkins","Becker"),("Austin","Mcclure","Terry"),("Xenos","Burt","Hunt"),("Finn","Macdonald","Chan"),("Bradley","Dillon","Campbell"),("Amery","Noel","Brock"),("Reed","Johnson","Robertson");
INSERT INTO `t_empleados` (`nombre`,`apellidoPaterno`,`apellidoMaterno`) VALUES ("Gage","Brady","Langley"),("Oleg","Richardson","Sanders"),("Herman","Camacho","Flowers"),("Francis","Strickland","Meyer"),("Kennan","Montoya","Schneider"),("Hoyt","Ratliff","Castillo"),("Prescott","Kane","Fuentes"),("Sylvester","Burke","Mcmillan"),("Palmer","Berg","Boyle"),("Jelani","Cameron","Kelly");
INSERT INTO `t_empleados` (`nombre`,`apellidoPaterno`,`apellidoMaterno`) VALUES ("Nigel","Welch","Bright"),("Judah","Wright","Estrada"),("Ira","Simmons","Mills"),("Phelan","Woodard","Dixon"),("Lawrence","Clarke","Chambers"),("Perry","Booker","Webb"),("Tyler","Hendricks","Kemp"),("Cody","Michael","Juarez"),("Samson","Tyler","Atkins"),("Griffin","Mathis","Garza");
INSERT INTO `t_empleados` (`nombre`,`apellidoPaterno`,`apellidoMaterno`) VALUES ("Callum","Stokes","Wooten"),("Leo","Griffith","Hodges"),("Fletcher","Justice","Acosta"),("Allen","Chan","Mejia"),("Tobias","Rhodes","Conway"),("Sawyer","Stevens","Cortez"),("Jacob","Chan","Morse"),("Ferdinand","Estes","Cox"),("Griffith","Joyce","Montgomery"),("Amos","Molina","Mercado");

DROP TABLE `t_empleadosDetalle`;

CREATE TABLE `t_empleadosDetalle` (
  `idEmpleado` mediumint(8) unsigned NOT NULL auto_increment,
  `fechaDeNacimiento` varchar(255),
  `ingresosAnuales` float(10,2), 
  PRIMARY KEY (`idEmpleado`)
) AUTO_INCREMENT=1;

INSERT INTO `t_empleadosDetalle` (`fechaDeNacimiento`,`ingresosAnuales`) VALUES ("07/08/2015","20000.45"),("09/03/2017","10000.45"),("31/07/2016","30000.45"),("29/08/2016","10000.45"),("06/11/2015","30000.45"),("19/10/2015","30000.45"),("02/08/2016","10000.45"),("06/10/2015","30000.45"),("15/05/2017","20000.45"),("10/01/2017","20000.45");
INSERT INTO `t_empleadosDetalle` (`fechaDeNacimiento`,`ingresosAnuales`) VALUES ("13/01/2016","20000.45"),("10/05/2016","30000.45"),("19/05/2016","10000.45"),("01/07/2015","30000.45"),("15/01/2016","10000.45"),("10/03/2016","10000.45"),("06/11/2016","30000.45"),("06/04/2017","20000.45"),("05/11/2015","10000.45"),("14/12/2015","20000.45");
INSERT INTO `t_empleadosDetalle` (`fechaDeNacimiento`,`ingresosAnuales`) VALUES ("14/08/2016","10000.45"),("02/05/2017","30000.45"),("29/08/2015","30000.45"),("17/08/2015","30000.45"),("16/01/2017","20000.45"),("19/01/2017","30000.45"),("10/01/2016","10000.45"),("16/11/2016","30000.45"),("16/11/2015","10000.45"),("27/08/2016","20000.45");
INSERT INTO `t_empleadosDetalle` (`fechaDeNacimiento`,`ingresosAnuales`) VALUES ("10/08/2015","10000.45"),("20/12/2015","30000.45"),("26/10/2015","20000.45"),("01/01/2017","20000.45"),("02/10/2016","20000.45"),("21/12/2016","30000.45"),("22/01/2016","10000.45"),("22/12/2016","20000.45"),("23/02/2016","30000.45"),("06/06/2015","30000.45");
INSERT INTO `t_empleadosDetalle` (`fechaDeNacimiento`,`ingresosAnuales`) VALUES ("09/07/2016","30000.45"),("14/08/2015","30000.45"),("11/10/2016","30000.45"),("18/06/2016","10000.45"),("17/02/2016","30000.45"),("08/07/2015","30000.45"),("27/12/2016","30000.45"),("25/01/2017","30000.45"),("17/07/2016","10000.45"),("26/08/2016","10000.45");
INSERT INTO `t_empleadosDetalle` (`fechaDeNacimiento`,`ingresosAnuales`) VALUES ("31/01/2016","30000.45"),("29/07/2015","30000.45"),("04/09/2016","30000.45"),("09/09/2015","20000.45"),("26/02/2017","20000.45"),("07/06/2015","20000.45"),("12/12/2016","20000.45"),("23/12/2016","20000.45"),("30/09/2016","10000.45"),("20/03/2017","10000.45");
INSERT INTO `t_empleadosDetalle` (`fechaDeNacimiento`,`ingresosAnuales`) VALUES ("04/07/2015","10000.45"),("03/08/2015","30000.45"),("22/01/2017","20000.45"),("14/10/2015","30000.45"),("27/12/2016","30000.45"),("04/07/2015","30000.45"),("23/08/2016","10000.45"),("04/04/2016","30000.45"),("10/07/2016","20000.45"),("25/11/2016","30000.45");
INSERT INTO `t_empleadosDetalle` (`fechaDeNacimiento`,`ingresosAnuales`) VALUES ("26/02/2017","30000.45"),("22/04/2017","20000.45"),("22/09/2015","30000.45"),("18/08/2015","30000.45"),("07/03/2016","20000.45"),("24/08/2016","30000.45"),("29/07/2016","30000.45"),("31/07/2016","20000.45"),("06/03/2017","20000.45"),("12/06/2016","20000.45");
INSERT INTO `t_empleadosDetalle` (`fechaDeNacimiento`,`ingresosAnuales`) VALUES ("11/01/2017","10000.45"),("25/02/2017","30000.45"),("08/04/2017","30000.45"),("22/07/2016","30000.45"),("06/08/2016","20000.45"),("01/11/2016","10000.45"),("15/07/2016","20000.45"),("20/04/2016","20000.45"),("08/05/2016","30000.45"),("18/09/2016","10000.45");
INSERT INTO `t_empleadosDetalle` (`fechaDeNacimiento`,`ingresosAnuales`) VALUES ("11/07/2016","10000.45"),("17/12/2015","30000.45"),("14/07/2015","30000.45"),("14/02/2017","20000.45"),("04/08/2015","30000.45"),("07/03/2016","30000.45"),("06/07/2016","30000.45"),("09/11/2016","10000.45"),("26/06/2016","10000.45"),("27/11/2016","20000.45");


SELECT * from t_empleados, t_empleadosDetalle where t_empleados.idEmpleado = t_empleados.idEmpleado; 
SELECT * from t_empleados, t_empleadosDetalle INNER JOIN t_empleados on t_empleados.idEmpleado=t_empleados.idEmpleado;
SELECT t_empleados.idEmpleado, nombre, apellidoPaterno, apellidoMaterno, fechaDeNacimiento, ingresosAnuales
FROM `t_empleados`
INNER JOIN `t_empleadosDetalle` on t_empleadosDetalle.idEmpleado= t_empleados.idEmpleado;

select * from t_empleadosDetalle; 


SELECT t_empleados.idEmpleado, nombre, apellidoPaterno, apellidoMaterno, fechaDeNacimiento, ingresosAnuales
                                    FROM `t_empleados`
                                    INNER JOIN `t_empleadosDetalle` on t_empleadosDetalle.idEmpleado= t_empleados.idEmpleado
                                    WHERE t_empleados.idEmpleado=1;