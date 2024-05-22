-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2024 a las 15:33:30
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendita_de_comics`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE `artistas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `biografia` text NOT NULL,
  `foto_perfil` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`id`, `nombre_completo`, `biografia`, `foto_perfil`) VALUES
(1, 'Adrian Alphona', 'Adrian Alphona es un artista de c�mics canadiense mejor conocido por su trabajo en Marvel Comics \'Runaways, que co-cre� con el escritor Brian K. Vaughan.', ''),
(2, 'David Aja', 'David Aja es un dibujante de c�mic espa�ol, nacido en Valladolid el 16 de abril de 1977. Trabaja para el mercado estadounidense.', ''),
(3, 'Javier Pulido', 'Javier Pulido es un dibujante de c�mics espa�ol que trabaja principalmente para el mercado estadounidense. Sus obras notables incluyen Human Target, Robin: Year One, She-Hulk y The Amazing Spider-Man.', ''),
(4, 'John Buscema', 'John Buscema, nacido como Giovanni Natale Buscema,  fue un historietista estadounidense y uno de los mayores exponentes de Marvel Comics entre 1960 y 1980 contribuyendo a que el g�nero se convirtiera en un icono de la cultura pop. Su hermano menor, Sal Buscema, es tambi�n dibujante de historietas.', ''),
(6, 'Jimmy Cheung', 'Jim Cheung es un dibujante de c�mics brit�nico, conocido por su trabajo en series como Scion, New Avengers: Illuminati, Young Avengers y Avengers: The Children\'s Crusade.', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comics`
--

CREATE TABLE `comics` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(256) NOT NULL,
  `personaje_principal_id` int(10) UNSIGNED NOT NULL,
  `guionista_id` int(10) UNSIGNED NOT NULL,
  `artista_id` int(10) UNSIGNED NOT NULL,
  `serie_id` int(10) UNSIGNED NOT NULL,
  `volumen` tinyint(3) UNSIGNED NOT NULL,
  `numero` smallint(5) UNSIGNED NOT NULL,
  `publicacion` date NOT NULL,
  `origen` varchar(256) NOT NULL,
  `editorial` varchar(256) NOT NULL,
  `bajada` text NOT NULL,
  `portada` varchar(256) NOT NULL,
  `precio` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comics`
--

INSERT INTO `comics` (`id`, `titulo`, `personaje_principal_id`, `guionista_id`, `artista_id`, `serie_id`, `volumen`, `numero`, `publicacion`, `origen`, `editorial`, `bajada`, `portada`, `precio`) VALUES
(1, 'No Es Normal. Parte 1 de 5: Metamorfosis', 1, 1, 1, 1, 3, 1, '2014-04-01', 'Estados Unidos', 'Marvel', 'Kamala Khan es una chica normal y corriente de Jersey City, hasta que, de repente, se ve dotada de dones extraordinarios. �Pero qui�n es realmente la nueva Ms. Marvel? �Adolescente? �Musulmana? �Inhumana?', 'mmv301.webp', 200.00),
(2, 'No Es Normal. Parte 2 de 5: Toda la Humanidad', 1, 1, 1, 1, 3, 2, '2014-05-01', 'Estados Unidos', 'Marvel', 'La vida ordinaria de Kamala Khan se ha convertido de repente en extraordinaria. �Est� preparada para manejar estos extra�os e inmensos nuevos dones? �O el peso del legado que tiene ante s� ser� demasiado para ella?', 'mmv302.webp', 500.00),
(3, 'No Es Normal. Parte 3 de 5: Entrada Lateral', 1, 1, 1, 1, 3, 3, '2014-06-01', 'Estados Unidos', 'Marvel', 'La totalmente nueva Ms. Marvel ya ha ganado fama internacional. Pero en el caso de Kamala, el poder de las estrellas viene acompa�ado de mucha... incomodidad.', 'mmv303.webp', 500.00),
(4, 'No Es Normal. Parte 4 de 5: Toque de Queda Pasado', 1, 1, 1, 1, 3, 4, '2014-07-01', 'Estados Unidos', 'Marvel', 'El �xito de Marvel, Ms. Marvel, contin�a mientras Kamala Khan descubre los peligros de sus nuevos poderes pero tambi�n descubre un secreto detr�s de ellos.', 'mmv304.webp', 700.00),
(5, 'No Es Normal. Parte 5 de 5: Leyenda Urbana', 1, 1, 1, 1, 3, 5, '2014-08-01', 'Estados Unidos', 'Marvel', '�C�mo se convierte una joven de Jersey City en el pr�ximo superh�roe m�s grande? Kamala tampoco tiene idea. Pero ella viene por ti, Nueva York.', 'mmv305.webp', 500.00),
(6, 'Suerte: Parte 1 de 3', 2, 2, 2, 2, 4, 1, '2012-10-01', 'Estados Unidos', 'Marvel', 'Ojo de Halc�n, la estrella del �xito de taquilla de este verano y h�roe hecho a s� mismo, lucha por la justicia. Con la ex-vengadora Kate Bishop a su lado, quiere demostrar que es uno de los h�roes m�s poderosos de la Tierra.', 'hev401.webp', 500.00),
(7, 'Suerte: Parte 2 de 3', 2, 2, 2, 2, 4, 2, '2012-11-01', 'Estados Unidos', 'Marvel', 'Lo que hay que saber: Fracci�n. Aja. Hawkeye. Kate Bishop. Coches. Armas. Robar a los ricos nunca se vio tan bien.', 'hev402.webp', 500.00),
(8, 'Suerte: Parte 3 de 3', 2, 2, 2, 2, 4, 3, '2012-12-01', 'Estados Unidos', 'Marvel', '�Qu� es el C�digo Vagabundo? Barton y Bishop significan el doble de Hawkeye... y el doble de problemas.', 'hev403.webp', 800.00),
(9, 'La Cinta: Parte 1 de 2', 2, 2, 2, 2, 4, 4, '2013-01-01', 'Estados Unidos', 'Marvel', ' �No vas a creer lo que hay en La Cinta! S.H.I.E.L.D. recluta a Clint para interceptar pruebas incriminatorias, antes de que se convierta en el hombre m�s buscado del mundo.', 'hev404.webp', 500.00),
(10, 'La Cinta: Parte 2 de 2', 2, 2, 2, 2, 4, 5, '2013-02-01', 'Estados Unidos', 'Marvel', '�LA CINTA CONCLUYE! Alguien tiene un secreto mortal que cambiar� el curso de la relaci�n de Ojo de Halc�n con los Vengadores', 'hev405.webp', 500.00),
(11, 'La She-Hulk Vive', 3, 3, 3, 4, 1, 1, '1980-02-01', 'Estados Unidos', 'Marvel', 'Bruce Banner sube los escalones hasta un edificio de oficinas en Los �ngeles. Bruce piensa para s� mismo que no puede soportarlo m�s. Dice que tarde o temprano la polic�a lo va a alcanzar.', 'sshv101.webp', 500.00),
(12, 'Movimiento', 3, 4, 2, 3, 3, 1, '2014-04-01', 'Estados Unidos', 'Marvel', 'Vengadora incondicional, miembro valioso de la FF, salvadora del mundo en m�s de una ocasi�n, tambi�n es una abogada asesina con un mont�n de t�tulos y respeto profesional. Un trago de agua fr�a y esmeralda de 2 metros de altura, es lo suficientemente dura como para noquear a Galactus de un solo golpe (�posiblemente?) y tiene un coraz�n m�s grande que la luna.', 'shv301.webp', 5000.00),
(13, '...�Y?', 3, 4, 2, 3, 3, 2, '2014-05-01', 'Estados Unidos', 'Marvel', 'Jennifer abre su propia consulta, pero las cosas no van tan bien como le gustar�a. Un nuevo cliente llega a la ciudad... �pero es un h�roe o un villano?', 'shv302.webp', 500.00),
(14, 'El Que No Quiso Ser Rey', 3, 4, 2, 3, 3, 3, '2014-06-01', 'Estados Unidos', 'Marvel', 'Cuando el hijo de Victor Von Doom pide la extradici�n, �Jen Walters ir� hasta el fin del mundo por la Justicia!', 'shv303.webp', 500.00),
(15, 'El Celoso Defensor', 3, 4, 2, 3, 3, 4, '2014-07-01', 'Estados Unidos', 'DC', 'El nuevo cliente de Jen, Kristoff Vernard, ha sido secuestrado por su padre, DOCTOR DOOM. �Qu� sabe su colega abogado MATT MURDOCK al respecto?', 'shv304.webp', 500.00),
(21, 'Ayudantes Parte 1', 74, 5, 6, 5, 1, 1, '2005-04-01', 'Estados Unidos', 'Marvel', 'El Capit�n Am�rica, Iron Man y Jessica Jones, que trabaja para el Daily Bugle, investigan a un grupo de j�venes h�roes que la prensa ha decidido llamar \"J�venes Vengadores\".\r\n\r\nIron Lad, Patriota, Asgardiano y Hulkling tienen problemas para actuar como un equipo coordinado, lo que causa que no puedan resolver una toma de rehenes durante la boda de la hija del millonario Derek Bishop acaban huyendo. Momentos despu�s llega Cassandra Cassie Lang preguntando por el equipo de h�roes, la otra hija de Bishop, Kate, le informa de lo que pas� y ambas se dirigen a la vieja mansi�n de Los Vengadores a pedir ayuda.', '1666749018.webp', 1500.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guionistas`
--

CREATE TABLE `guionistas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `biografia` text NOT NULL,
  `foto_perfil` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `guionistas`
--

INSERT INTO `guionistas` (`id`, `nombre_completo`, `biografia`, `foto_perfil`) VALUES
(1, 'G. Willow Wilson', 'Gwendolyn Willow Wilson (31 de agosto de 1982), conocida profesionalmente como G. Willow Wilson, es una escritora de c�mics estadounidense, autora de prosa, ensayista, y periodista. Vivi� en Egipto durante su veintena; su primera novela gr�fica, Cairo (V�rtigo, 2007), se ambienta all� y estuvo considerada como mejor novela gr�fica para adolescentes tanto por la American Library Association como por la School Library Journal. Su c�mic Air fue nominado para el Premio Eisner, y su primera novela, Alif el invisible, gan� el World Fantasy Award de 2013.', 'fotoGenerica.png'),
(2, 'Matt Fraction', 'Matt Fritchman, m�s conocido por el seud�nimo de Matt Fraction, es un escritor de c�mics estadounidense ganador del premio Eisner, conocido por su trabajo como el escritor de The Invincible Iron Man, The Immortal Iron Fist, Uncanny X-Men y Hawkeye para Marvel.', 'fotoGenerica.png'),
(3, 'Stan Lee', 'Stanley Martin Lieber,  m�s conocido como Stan Lee, fue un escritor y editor de c�mics estadounidense, adem�s de productor y actor ocasional de cine.\r\n\r\nEs principalmente conocido por haber cocreado personajes ic�nicos del mundo del c�mic tales como Spider-Man, X-Men, Los 4 Fant�sticos, Hulk, Iron Man, Thor, Daredevil, Doctor Strange, Black Panther, Ant-Man y Bruja Escarlata, entre otros muchos superh�roes, casi siempre acompa�ado de los dibujantes y escritores Steve Ditko y Jack Kirby. El trabajo de Stan Lee fue fundamental para expandir Marvel Comics, llev�ndola de una peque�a casa publicitaria a una gran corporaci�n multimedia. Todav�a hoy, los c�mics de Marvel se distinguen por indicar siempre �Stan Lee presenta� en los r�tulos de presentaci�n. Tambi�n tuvo un programa televisivo en History Channel en donde buscaba superhumanos �reales�.', 'fotoGenerica.png'),
(4, 'Charles Soule', 'Charles Soule es un escritor de c�mics, novelista, m�sico y abogado residente en Nueva York. Es mejor conocido por escribir Daredevil, She-Hulk, Death of Wolverine y varios libros y series de c�mics.', 'fotoGenerica.png'),
(5, 'Allan Heinberg', 'Allan Heinberg es un guionista estadounidense responsable de la creaci�n para Marvel C�mics de J�venes Vengadores, pero que se ha encargado con anterioridad de escribir y/o producir para televisi�n La cruda realidad, Cinco en familia, Sexo en la ciudad, Las chicas Gilmore, The O.C. y Anatom�a de Grey.', 'fotoGenerica.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes`
--

CREATE TABLE `personajes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `alias` varchar(256) NOT NULL,
  `biografia` text NOT NULL,
  `creador` varchar(256) NOT NULL,
  `primera_aparicion` year(4) NOT NULL,
  `imagen` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personajes`
--

INSERT INTO `personajes` (`id`, `nombre`, `alias`, `biografia`, `creador`, `primera_aparicion`, `imagen`) VALUES
(1, 'Bruce Wayne', 'Batman', 'Batman (Bruce Wayne) s un personaje de c�mic creado por los estadounidenses Bob Kane y Bill Finger,14 y propiedad de DC Comics. Apareci� por primera vez en la historia titulada �El caso del sindicato qu�mico� de la revista Detective Comics N.� 27, lanzada por la editorial National Publications el 30 de marzo de 1939.', 'Bob Kane y Bill Finger', '1939', '1666655316_.webp'),
(2, 'Clint Barton', 'Hawkeye', 'Un h�bil tirador y arquero estadounidense, antiguo artista de circo y supervillano menor convertido en miembro de los Vengadores; \"Los h�roes m�s poderosos de la Tierra\". Como miembro de los Vengadores siempre tuvo roces con el equipo, pero siempre volvi� para luchar contra cualquier amenaza. Barton fue criado en el circo, entrenado por criminales y pas� de ser un joven problem�tico a uno de los mayores h�roes de la Tierra. Conocido por el uso de un arco y una flecha como arma principal, su habilidad es tan grande que parece que nunca falla. Ha trabajado con la Viuda Negra, con quien desarroll� una fuerte amistad.', 'Stan Lee y Don Heck', '1964', ''),
(3, 'Diana de Temiscira', 'Wonder Woman', 'Es una princesa guerrera de las Amazonas, pueblo ficticio basado en el de las amazonas de la mitolog�a griega. En su tierra natal es conocida como la princesa Diana de Temiscira pero fuera de esta utiliza la identidad secreta de Diana Prince. Est� dotada de una amplia gama de poderes superhumanos y habilidades de combate de batalla superiores, gracias a sus dones obtenidos de los dioses y su amplio entrenamiento. Ella posee un gran arsenal de armas, incluyendo entre las principales el Lazo de la Verdad, un par de brazaletes m�gicos indestructibles, su tiara, que sirve como arma, y en algunos relatos, en la edad de oro, tuvo un avi�n invisible. Pero m�s adelante, se le fue mostrando con la capacidad de volar cada vez con mayor frecuencia por lo que el avi�n invisible fue dejando de utilizarse.', 'William Moulton Marston y H. G. Peter', '1941', ''),
(19, 'Matt Murdock', 'Daredevil', 'Daredevil cuya identidad secreta es Matt Murdock fue abandonado por su madre, y criado por su padre, el boxeador Jack \"Batallador\" Murdock, en la Cocina del Infierno (Barrio de Manhattan, Nueva York). Al darse cuenta de que las reglas son necesarias para evitar que las personas se comporten indebidamente, el joven Matt decidi� estudiar Derecho. Sin embargo, al tratar de impedir un accidente, un cami�n derram� su carga radiactiva dejando ciego a Matt; sorprendentemente, la radiaci�n increment� sus cuatro sentidos restantes.\r\n\r\nBajo la tutela del maestro ciego de artes marciales, Stick, Matt domin� sus sentidos y se convirti� en un luchador formidable. Con el establecimiento de una peque�a firma de abogados en Nueva York junto a Foggy, Matt se comprometi� a servir a la Ley como Matt Murdock y luchar contra los males m�s all� del alcance de �sta como el gladiador carmes�, Daredevil.', 'Stan Lee, Bill Everett', '1964', '1666655285_.webp'),
(20, 'Tony Stark', 'Iron Man', 'Tony Stark es un genio inventor y multimillonario industrial, que se enfunda en su armadura de tecnolog�a punta para convertirse en el superh�roe Iron Man. Hijo adoptivo del fabricante de armas Howard Stark, Tony hered� la empresa de su familia a una edad temprana tras la muerte de sus padres. Mientras supervisaba una planta de fabricaci�n en un pa�s extranjero, Stark fue secuestrado por terroristas locales. En lugar de ceder a las exigencias de sus captores para construir armas para ellos, Stark cre� una poderosa armadura para poder escapar. De vuelta a Am�rica, Stark mejor� la armadura y puso sus vastos recursos y su intelecto al servicio de la mejora del mundo como Iron Man.', 'Stan Lee', '1962', '1666655291_.webp'),
(21, 'Kate Bishop', 'Hawkeye', 'Katherine Bishop, o simplemente Kate Bishop, es una superhero�na ficticia que aparece en los c�mics estadounidenses publicados por Marvel Comics. Ella es un miembro de los J�venes Vengadores, un equipo de superh�roes en el Universo compartido de Marvel, el Universo Marvel. Ella es el tercer personaje y la primera mujer en tomar el nombre del Ojo de Halc�n despu�s de Clint Barton de Los Vengadores y Wyatt McDonald del Escuadr�n Supremo. Su traje est� inspirado en el primer traje del Ojo de Halc�n y del P�jaro Burl�n.', 'Allan Heinberg, Jim Cheung', '2005', '1666745073_hawkeye.webp'),
(68, 'Billy Kaplan', 'Wiccan', 'Reclutado para los J�venes Vengadores por Iron Lad, la historia de Wiccan incluye el descubrimiento de que �l y su compa�ero h�roe adolescente Speed son, de hecho, hermanos gemelos perdidos hace mucho tiempo, y que la pareja son los hijos de Scarlet Witch y su esposo Visi�n. Las historias m�s importantes para el personaje incluyen la b�squeda de �l y su hermano de su madre desaparecida, aprender a dominar sus poderes y una relaci�n continua con su compa�ero de equipo Hulkling.', 'Allan Heinberg, Jim Cheung', '1986', '1666653905_wiccan.webp'),
(74, 'Young Avengers', 'J�venes Vengadores', 'J�venes Vengadores es una colecci�n de la editorial Marvel aparecida el mes de abril de 2005. Estos j�venes bautizados como los sucesores de Los Vengadores pasan a formar parte del rico Universo Marvel, interactuando desde su creaci�n con el resto de personajes de la editorial americana, compartiendo incluso cabecera durante la Guerra Civil con otros j�venes con los que, adem�s de compartir edad, comparten argumentos e historias similares (como la del Super Skrull), y nacimiento reciente: los Runaways.', 'Allan Heinberg, Jim Cheung', '2005', '1666748579.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `historia` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`id`, `nombre`, `historia`) VALUES
(1, 'Iron Man', ''),
(2, 'Hawkeye', ''),
(3, 'Wonder Woman', ''),
(4, 'Batman', ''),
(5, 'Young Avengers', 'J�venes Vengadores es una colecci�n de la editorial Marvel aparecida el mes de abril de 2005. Estos j�venes bautizados como los sucesores de Los Vengadores pasan a formar parte del rico Universo Marvel, interactuando desde su creaci�n con el resto de personajes de la editorial americana, compartiendo incluso cabecera durante la Guerra Civil con otros j�venes con los que, adem�s de compartir edad, comparten argumentos e historias similares (como la del Super Skrull), y nacimiento reciente: los Runaways.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `roles` enum('usuario','admin','superadmin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `comics`
--
ALTER TABLE `comics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personaje_principal_id` (`personaje_principal_id`),
  ADD KEY `guionista_id` (`guionista_id`),
  ADD KEY `artista_id` (`artista_id`),
  ADD KEY `serie_id` (`serie_id`);

--
-- Indices de la tabla `guionistas`
--
ALTER TABLE `guionistas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personajes`
--
ALTER TABLE `personajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `comics`
--
ALTER TABLE `comics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `guionistas`
--
ALTER TABLE `guionistas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personajes`
--
ALTER TABLE `personajes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `series`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comics`
--
ALTER TABLE `comics`
  ADD CONSTRAINT `comics_ibfk_1` FOREIGN KEY (`personaje_principal_id`) REFERENCES `personajes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `comics_ibfk_2` FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `comics_ibfk_3` FOREIGN KEY (`guionista_id`) REFERENCES `guionistas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `comics_ibfk_4` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
