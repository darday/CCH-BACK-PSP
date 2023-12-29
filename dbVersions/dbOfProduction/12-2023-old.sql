-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-12-2023 a las 18:35:33
-- Versión del servidor: 10.6.16-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fundaci4_cch-front`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `bank_accounts_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `money_available` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bank_accounts_tours`
--

CREATE TABLE `bank_accounts_tours` (
  `bank_account_tour_id` bigint(20) UNSIGNED NOT NULL,
  `bank_accounts_id` bigint(20) UNSIGNED NOT NULL,
  `monthly_tour_id` bigint(20) UNSIGNED NOT NULL,
  `utility` double(8,2) NOT NULL,
  `money_before_tour` double(8,2) NOT NULL,
  `money_after_tour` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipment`
--

CREATE TABLE `equipment` (
  `equipment_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cost` double(8,2) NOT NULL,
  `img_1` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `type` varchar(255) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `discount_description` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `messagge_for_contact` varchar(255) NOT NULL,
  `varchar_1` varchar(255) DEFAULT NULL,
  `varchar_2` varchar(255) DEFAULT NULL,
  `varchar_3` varchar(255) DEFAULT NULL,
  `last_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `equipment`
--

INSERT INTO `equipment` (`equipment_id`, `name`, `description`, `cost`, `img_1`, `state`, `type`, `discount`, `discount_description`, `contact_phone`, `messagge_for_contact`, `varchar_1`, `varchar_2`, `varchar_3`, `last_user`, `created_at`, `updated_at`) VALUES
(1, 'Buff Ruta Altar', '¡Prepárate para explorar la naturaleza con nuestro buff de montaña! 🏞️❄️ Este accesorio versátil y cómodo te mantendrá abrigado en los días fríos. 🌄 Además, su diseño de alta calidad te garantiza durabilidad y resistencia para tus aventuras al aire libre. ¡No esperes más y obtén el tuyo ahora! 🙌🧣', 4.00, 'equipment/DsdMhoO49Dphoto1674782397.jpeg', 1, 'Accesorios', 0.00, 'Ninguno', '0961119670', 'Hola Me gustaría adquirir su buff personalizado del Altar', NULL, NULL, NULL, NULL, '2023-04-18 23:14:09', NULL),
(2, 'Manta Térmica', '🔆 ¡No dejes que el frío te detenga en tus aventuras al aire libre! Con nuestra manta térmica de emergencia, estarás preparado para enfrentar cualquier situación y mantener el calor en todo momento. ❄️🔥\r\n\r\n💪 Diseñada con materiales de alta calidad, nuestra manta térmica es ligera, compacta y fácil de llevar contigo en tus excursiones, campamentos o actividades al aire libre. 🏕️🚵‍♂️🏔️\r\n\r\n🛡️ La manta está fabricada con un material reflectante que ayuda a conservar el calor corporal, brindándote protección contra el frío extremo y manteniéndote resguardado incluso en condiciones adversas. ⛄️🌬️', 4.99, 'equipment/aIxIpBTBhLmodelo para web (7).png', 1, 'Accesorios', 0.00, '0', '0961119670', 'Hola me gustaría comprar una manta térmica', NULL, NULL, NULL, NULL, '2023-06-22 17:07:52', NULL),
(3, 'Energizante Natural', '«Es un Energizante con Extractos Naturales » que gracias a su alto contenido de vitaminas del complejo B ayuda a la producción de energía, antioxidante, mejora el rendimiento en las actividades deportivas, ayuda a mejorar síntomas de cansancio y somnolencia.', 1.50, 'equipment/AgsL5MbL8Cmodelo para web.png', 1, 'Accesorios', 0.00, '0', '0961119670', 'Hola me ayudas con el biocros', NULL, NULL, NULL, NULL, '2023-07-13 11:11:30', '2023-07-13 11:21:13'),
(4, 'Relajante Muscular', 'Proporciona energía y bienestar general. Ayuda a combatir las sensaciones de cansancio, fatiga y estrés, así como dolores de cabeza, gota y calambres.\r\nGarantiza un máximo de rendimiento físico y mental.\r\nDa energía a nivel muscular.\r\nCombate el estrés.\r\nAyuda a eliminar el dolor muscular y los calambres.\r\nEs ideal para atletas y físico culturistas.\r\nAyuda a desaparecer el dolor o lastimadura de huesos y músculos, y los calambres.', 1.50, 'equipment/MkjJ4b2DBimodelo para web (1).png', 1, 'Accesorios', 0.00, 'Ninguno', '0961119670', 'Hola me ayudas con un starbien', NULL, NULL, NULL, NULL, '2023-07-13 11:15:33', '2023-07-13 11:33:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipment_rents`
--

CREATE TABLE `equipment_rents` (
  `equipment_rent_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cost` double(8,2) NOT NULL,
  `img_1` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `type` varchar(255) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `discount_description` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `messagge_for_contact` varchar(255) NOT NULL,
  `varchar_1` varchar(255) DEFAULT NULL,
  `varchar_2` varchar(255) DEFAULT NULL,
  `varchar_3` varchar(255) DEFAULT NULL,
  `last_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `equipment_rents`
--

INSERT INTO `equipment_rents` (`equipment_rent_id`, `name`, `description`, `cost`, `img_1`, `state`, `type`, `discount`, `discount_description`, `contact_phone`, `messagge_for_contact`, `varchar_1`, `varchar_2`, `varchar_3`, `last_user`, `created_at`, `updated_at`) VALUES
(1, 'Carpa 2 Personas 3 Estaciones', '¡Prepárate para una aventura épica en la montaña con nuestra carpa de 3 estaciones! 🏕️⛰️🌟 Perfecta para tus viajes de camping en media y alta montaña, esta carpa te mantendrá protegido del clima y cómodo mientras disfrutas de la naturaleza. 💪🌲 Además, su fácil montaje te permitirá ahorrar tiempo y esfuerzo para que puedas disfrutar más de tu viaje. No te conformes con cualquier carpa, ¡elige la mejor! 🙌🌄 Reserva ahora y comienza a planear tu próxima aventura al aire libre. 🌳🌞🏞️', 10.00, 'equipmentRent/0D9w90UDqP9bk7sHl9ViesG8AboWRmsL2QhxrCAP.png', 1, 'Carpa', 0.00, '0', '0961119670', 'Hola me gustaría alquilar una carpa de 2 personas me ayudas con información por favor.', NULL, NULL, NULL, NULL, '2023-04-20 07:01:09', '2023-12-01 12:04:55'),
(2, 'Carpa 3 Personas 3 Estaciones', '¡Haz que tu próxima aventura de camping sea inolvidable con nuestra carpa de 3 estaciones para 3 personas! 🏕️⛰️👨‍👩‍👧 Perfecta para tus viajes a la montaña, esta carpa espaciosa te brindará la comodidad y protección que necesitas para disfrutar de la naturaleza en grande. 💪🌲 Con su fácil montaje y resistencia al clima, estarás preparado para cualquier eventualidad. Además, su tamaño compacto la hace fácil de transportar en cualquier mochila de campamento. 🎒🌄 Reserva ahora y asegura tu lugar en la naturaleza. 🌳🌞🏞️', 15.00, 'equipmentRent/709GNhuw1vndKiTN5SITeNR0ELxoB9AB5Q3jfzNT.png', 1, 'Carpa', 0.00, '0', '0961119670', 'Hola me gustaría alquilar una carpa de 2 personas me ayudas con información por favor.', NULL, NULL, NULL, NULL, '2023-04-20 07:19:01', '2023-12-01 12:05:07'),
(3, 'Sleeping Bag Oursky -4°C', '¡No dejes que el frío arruine tu aventura de camping! 🏕️🌬️ Con nuestro sleeping Oursky -5°C, tendrás la mejor protección contra el clima frío de la montaña. ❄️🏔️👨‍👩‍👧 Diseñado con los materiales más resistentes y cálidos, te mantendrá cómodo y abrigado durante toda la noche. Su fácil transporte y almacenamiento te permitirá llevarlo contigo a cualquier lugar y estar siempre preparado para las condiciones climáticas más exigentes. 🎒🏕️🌡️ Alquila ahora y asegura un sueño reparador en medio de la naturaleza. 🌳🌞🏞️', 7.00, 'equipmentRent/93mZeyicaRDiseño sin título (2).png', 1, 'Sleeping', 0.00, '0', '0961119670', 'Hola me gustaría alquilar una Sleeping me ayudas con información por favor.', NULL, NULL, NULL, NULL, '2023-04-20 07:22:58', '2023-09-06 01:30:08'),
(4, 'Aislante Térmico', '¡No pases frío en tu próxima aventura de camping! Alquila nuestro aislante térmico y mantén tu cuerpo caliente y cómodo toda la noche. ¡Es liviano, fácil de transportar y perfecto para cualquier terreno! 🔥🏕️❄️', 5.00, 'equipmentRent/HrP3xrhFjaDiseño sin título (3).png', 1, 'Accesorios', 0.00, '0', '0961119670', 'Hola me gustaría alquilar un Aislante Térmico me ayudas con información por favor.', NULL, NULL, NULL, NULL, '2023-04-20 07:25:28', '2023-09-06 01:30:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expenses_tours`
--

CREATE TABLE `expenses_tours` (
  `expense_tour_id` bigint(20) UNSIGNED NOT NULL,
  `monthly_tour_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` double(8,2) NOT NULL,
  `description` text NOT NULL,
  `unit_cost` double(8,2) NOT NULL,
  `total_cost` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exposition_tours`
--

CREATE TABLE `exposition_tours` (
  `exposition_tour_id` bigint(20) UNSIGNED NOT NULL,
  `tour_name` varchar(255) NOT NULL,
  `tour_destiny` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `include` text NOT NULL,
  `cost_1` double(8,2) NOT NULL,
  `cost_2` double(8,2) NOT NULL,
  `cost_3` double(8,2) NOT NULL,
  `cost_4` double(8,2) NOT NULL,
  `img_1` varchar(255) NOT NULL,
  `img_2` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `type` varchar(255) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `varchar_1` varchar(255) NOT NULL,
  `varchar_2` varchar(255) NOT NULL,
  `varchar_3` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galleries`
--

CREATE TABLE `galleries` (
  `gallery_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img_1` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `galleries`
--

INSERT INTO `galleries` (`gallery_id`, `name`, `img_1`, `created_at`, `updated_at`) VALUES
(1, 'Puñay', 'gallery/gAxJIfmJZJIMG-20230409-WA0062.jpg', '2023-04-13 10:24:33', NULL),
(2, NULL, 'gallery/cwoc4yZ249IMG-20230411-WA0024.jpg', '2023-04-13 10:27:19', NULL),
(4, NULL, 'gallery/2O9zf3EXC0gallery2.jpeg', '2023-04-18 12:31:13', NULL),
(5, NULL, 'gallery/BPDvgo6B02WhatsApp Image 2023-04-04 at 18.21.37 (1).jpeg', '2023-04-18 12:31:35', NULL),
(6, NULL, 'gallery/pNvHo8I60lWhatsApp Image 2022-11-20 at 4.32.53 PM.jpeg', '2023-04-18 13:52:33', NULL),
(7, NULL, 'gallery/2HNJTOPiDOIMG_20221119_194508 (1).jpg', '2023-04-18 13:53:31', NULL),
(8, NULL, 'gallery/GbCleIm3UOIMG_20221029_171326.jpg', '2023-06-23 17:13:19', NULL),
(9, NULL, 'gallery/7JbvhTeHQVIMG_20230128_133120.jpg', '2023-06-23 17:13:32', NULL),
(10, NULL, 'gallery/XCnA51gkyaIMG_20230408_181848.jpg', '2023-06-23 17:14:23', NULL),
(11, NULL, 'gallery/F7oFGekX3IIMG_20230618_082057.jpg', '2023-06-23 17:14:43', NULL),
(12, NULL, 'gallery/I6jsLX0NncIMG_20230618_090952.jpg', '2023-06-23 17:15:58', NULL),
(13, NULL, 'gallery/FjVgtQbF5PIMG-20230527-WA0013.jpg', '2023-06-23 17:17:28', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incomes_tours`
--

CREATE TABLE `incomes_tours` (
  `income_tour_id` bigint(20) UNSIGNED NOT NULL,
  `monthly_tour_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` double(8,2) NOT NULL,
  `description` text NOT NULL,
  `unit_cost` double(8,2) NOT NULL,
  `total_cost` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2022_06_14_073855_create_exposition_tours_table', 1),
(10, '2022_06_14_073925_create_monthly_tours_table', 1),
(11, '2022_06_14_074030_create_montly_tours_users_table', 1),
(12, '2022_06_14_074050_create_participants_table', 1),
(13, '2022_06_14_074120_create_incomes_tours_table', 1),
(14, '2022_06_14_074200_create_expenses_tours_table', 1),
(15, '2022_06_14_074238_create_bank_accounts_table', 1),
(16, '2022_06_14_074306_create_bank_accounts_tours_table', 1),
(17, '2022_09_18_201603_create_tour_catalogues_table', 1),
(18, '2022_10_11_221452_create_equipment_table', 1),
(19, '2023_01_08_191159_create_equipment_rents_table', 1),
(20, '2023_03_22_154149_create_galleries_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monthly_tours`
--

CREATE TABLE `monthly_tours` (
  `monthly_tour_id` bigint(20) UNSIGNED NOT NULL,
  `tour_name` varchar(255) NOT NULL,
  `tour_destiny` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `include` text NOT NULL,
  `img_1` varchar(255) NOT NULL,
  `img_2` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `type` varchar(255) NOT NULL,
  `dificulty` varchar(255) NOT NULL,
  `person_cost` double(8,2) NOT NULL,
  `group_cost` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `income` double(8,2) DEFAULT NULL,
  `egress` double(8,2) DEFAULT NULL,
  `utility` double(8,2) DEFAULT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `messagge_for_contact` varchar(255) NOT NULL,
  `departure_date` date NOT NULL,
  `return_date` date NOT NULL,
  `varchar_1` varchar(255) DEFAULT NULL,
  `varchar_2` varchar(255) DEFAULT NULL,
  `varchar_3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `monthly_tours`
--

INSERT INTO `monthly_tours` (`monthly_tour_id`, `tour_name`, `tour_destiny`, `description`, `include`, `img_1`, `img_2`, `state`, `type`, `dificulty`, `person_cost`, `group_cost`, `discount`, `income`, `egress`, `utility`, `contact_phone`, `messagge_for_contact`, `departure_date`, `return_date`, `varchar_1`, `varchar_2`, `varchar_3`, `created_at`, `updated_at`) VALUES
(1, 'CAMPING Y TREKING', 'COTOPAXI', 'Uno de los nevados más hermosos del País nos espera 🤗🏔️. Acompañanos a visitar el maravilloso Cotopaxi y sus hermosos atractivos 🤩🗻🏕️⛺', 'Guia, Cena Campestre Domingo, Desayuno Domingo, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Ticket y permisos de entrada, Charla y Observación Astronómica.', 'monthly/nqnzbaV08a340487327_698422098700624_2303131838253661940_n.jpg', 'monthly/XgIvTuv62Fcotopaxi-ecuador-camping.jpg', 1, 'Camping', 'Facil', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Hola me ayudas con info del camping en el cotopaxi vi su publicación en su página web.', '2023-04-15', '2023-04-16', NULL, NULL, NULL, '2023-04-13 08:46:04', NULL),
(2, 'VISITANDO EL CRÁTER DE UN VOLCÁN', 'QUILOTOA', '¿Alguna vez has soñado con acampar en el cráter de un volcán? ¡Pues ahora es tu oportunidad! Únete a nosotros en nuestro camping en el cráter del volcán Quilotoa, uno de los paisajes más impresionantes de Ecuador. 🤩🗻🏕️⛺', 'Guia, Cena Campestre Domingo, Desayuno Domingo, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Ticket y permisos de entrada, Fogata, Charla y Observación Astronómica.', 'monthly/aAKZXUytpaQuilotoa (1).png', 'monthly/oWDHVYS91QQuilotoa-Lagoon-3 (1).jpg', 1, 'Camping', 'Moderada - Facil', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Hola me ayudas con info del camping en el Quilotoa, vi su publicación en su página web.', '2023-04-22', '2023-04-23', NULL, NULL, NULL, '2023-04-13 08:54:32', '2023-04-13 17:50:46'),
(3, 'LAGUNA CONGELADA', 'CARIHUAIRAZO', 'Si eres un amante de la naturaleza y de los paisajes impresionantes, este es el camping perfecto para ti. Te invitamos a unirte a nosotros en nuestra aventura en la laguna congelada del Nevado Carihuairazo, ubicada en la cordillera de los Andes en Ecuador.. 🤩🗻🏕️⛺', 'Guia, Cena Campestre Domingo, Desayuno Domingo, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Ticket y permisos de entrada, Fogata, Charla y Observación Astronómica.', 'monthly/fDde79Ql05Explore the World with Us!.png', 'monthly/QFK2kSPn7CIMG-20211128-WA0060.jpg', 1, 'Camping', 'Moderada', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0993786135', 'Hola me ayudas con info del camping en el Carihuairazo, vi su publicación en su página web.', '2023-04-29', '2023-04-30', NULL, NULL, NULL, '2023-04-13 09:01:02', NULL),
(5, 'AGUAS TERMALES', 'ILLINIZAS', '¿Qué podría ser mejor que disfrutar de las maravillas naturales de la cordillera de los Andes, mientras te sumerges en las cálidas aguas termales? Únete a nosotros en nuestra aventura de camping en las aguas termales de los Illinizas, en Ecuador. 🤩🗻🏕️⛺', 'Guia, Cena Campestre Domingo, Desayuno Domingo, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Ticket y permisos de entrada, Fogata, Charla y Observación Astronómica.', 'monthly/fTHDnhKOayWhatsApp Image 2023-03-08 at 21.25.39 (2).jpeg', 'monthly/uU5poCR3ACTERMAS-DE-CUNUYACU-ILINIZAS-04.jpg', 1, 'Camping', 'Moderada', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0993786135', 'Hola me ayudas con info del camping en las aguas termales de los Illinizas, vi su publicación en su página web.', '2023-05-06', '2023-05-07', NULL, NULL, NULL, '2023-04-13 09:05:43', NULL),
(6, 'AGUAS TERMALES', 'OJO DEL FANTASMA', '¿Te imaginas disfrutar de las maravillas naturales de la cordillera de los Andes, mientras te sumerges en las cálidas aguas termales? Únete a nosotros en nuestra aventura de camping en las aguas termales en las faldas del Volcán Tungurahua, en Ecuador. 🤩🗻🏕️⛺', 'Guia, Transporte desde Riobamba, Cena Campestre Domingo, Desayuno Domingo, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Ticket y permisos de entrada, Fogata, Charla y Observación Astronómica.', 'monthly/yDUlvcEAkaWhatsApp Image 2023-03-08 at 21.25.39 (2).jpeg', 'monthly/pLKS2Eln4JTermales.jpg', 1, 'Camping', 'Moderada - Facil', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0993786135', 'Hola me ayudas con info del camping en las aguas termales del ojo del fantasma, vi su publicación en su página web.', '2023-05-06', '2023-05-07', NULL, NULL, NULL, '2023-04-13 09:13:20', NULL),
(7, 'GARGANTA DE FUEGO', 'TUNGURAHUA', '¡🌋🥾Descubre la majestuosidad del Volcán Tungurahua con nuestro trekking guiado! 🌄 .\r\nDurante dos días y una noche, podrás disfrutar de la belleza de los paisajes andinos y la naturaleza en su máxima expresión 🌿🌺.', 'Transporte desde Baños, Cena Sábado, Desayuno Domingo, Guia, Casco y Crampones, Descanso en Refugio, Sleeping Bag', 'monthly/8ax3pCZx2S333183194_3325440291104193_2912457516233324018_n.jpg', 'monthly/FHsOm5iikk333183194_3325440291104193_2912457516233324018_n.jpg', 1, 'Refugio', 'Alta', 99.00, 90.00, 0.00, 0.00, 0.00, 0.00, '093993786135', 'Por favor me ayudas con información del Tungurahua, vi esta publicación en la web.', '2023-05-13', '2023-05-14', NULL, NULL, NULL, '2023-04-13 18:34:12', NULL),
(8, 'PON A PRUEBA TU MENTE Y CUERPO', 'ALTAR - LAGUNA AMARILLA', '🏕️ ¡Aventureros, les invitamos a un camping en el Nevado El Altar! ⛺\r\nÚnete a nuestra expedición hacia la majestuosidad del Altar, uno de los nevados más impresionantes de Ecuador 🇪🇨. \r\nDurante dos días y una noche, podrás disfrutar de la belleza natural de la zona, acampando bajo las estrellas y rodeado de los paisajes andinos más impresionantes 🌄🌲.', 'Transporte desde Riobamba, Desayuno Sábado, Cena Sábado, Desayuno Domingo, Guia, Mula de Carga para Equipo de Camping, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico.', 'monthly/AyZZqHrLamDiseño sin título (4).png', 'monthly/QXACytgNxOWhatsApp Image 2023-03-08 at 21.25.39.jpeg', 1, 'Camping', 'Alta', 75.00, 70.00, 0.00, 0.00, 0.00, 0.00, '093993786135', 'Por favor me ayudas con información del Altar, vi esta publicación en la web.', '2023-05-26', '2023-05-27', NULL, NULL, NULL, '2023-04-13 18:42:18', '2023-05-18 00:33:34'),
(9, 'CAMPING SOBRE LAS NUBES', 'PUÑAY', '¡No pierdas la oportunidad de vivir esta experiencia única y reservar tu lugar en nuestro camping \"Sobre las Nubes\" en el Cerro Sagrado Puñay! 🌄⛺ Te aseguramos que será una aventura que recordarás por siempre 🤩.', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogara, Charla Astronómica.', 'monthly/6dURWAvQRuDiseño sin título (6).png', 'monthly/fhmzewKukyWhatsApp Image 2023-03-08 at 21.25.39.jpeg', 1, 'Camping', 'Alta', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Por favor me ayudas con información del Puñay, vi esta publicación en la web.', '2023-05-26', '2023-05-27', NULL, NULL, NULL, '2023-04-13 18:46:34', '2023-05-18 00:39:03'),
(10, 'CAMPING SOBRE LAS NUBES', 'PUÑAY', '¡No pierdas la oportunidad de vivir esta experiencia única y reservar tu lugar en nuestro camping \"Sobre las Nubes\" en el Cerro Sagrado Puñay! 🌄⛺ Te aseguramos que será una aventura que recordarás por siempre 🤩.', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogara, Charla Astronómica.', 'monthly/LswR512qygDiseño sin título (7).png', 'monthly/BZhUZwRBWEWhatsApp Image 2023-03-08 at 21.25.39.jpeg', 1, 'Camping', 'Alta', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Por favor me ayudas con información del Puñay, vi esta publicación en la web.', '2023-05-27', '2023-05-28', NULL, NULL, NULL, '2023-04-13 18:47:18', '2023-05-18 00:39:55'),
(11, 'CONVERSANDO CON EL CHIMBORAZO', 'TEMPLO MACHAY', '🌋🏞️ ¡Descubre el místico Templo Machay en el corazón del Chimborazo! 🗻🌌\r\n🚀 Embárcate en una aventura de un día completo hacia el famoso Templo Machay, conocido como el \"oído\" del majestuoso volcán Chimborazo. 🦻✨', 'Charla de Flota y Fauna, Paradas Fotográficas, Transporte desde Riobamba, Refrigerio y Guianza', 'monthly/A87591SZPPcampingchimborazo_348711640_235403389106051_2395880684137853692_n.jpg', 'monthly/puACe2ggNh1.jpg', 1, 'Full Day', 'Moderada - Facil', 25.00, 21.75, 0.00, 0.00, 0.00, 0.00, '0998373817', 'Hola Me gustaria reservar un cipo para el templo machay', '2023-06-04', '2023-06-04', NULL, NULL, NULL, '2023-05-25 09:47:16', '2023-05-25 09:50:07'),
(12, 'PON A PRUEBA TU MENTE Y CUERPO', 'ALTAR - LAGUNA AMARILLA', '🌄🏕️ ¡Sumérgete en la magia ancestral del camping en la Laguna Amarilla, en el majestuoso volcán Altar, también conocido como Kapak Urku! 🌅💛\r\n\r\n🌋 Descubre un lugar sagrado donde la historia y la naturaleza se fusionan en una experiencia única. 🦉✨ Disfruta de un camping rodeado de paisajes impresionantes y aguas cristalinas que te transportarán a tiempos ancestrales. 🌿💦', 'Transporte desde Riobamba, Desayuno Sábado, Cena Sábado, Desayuno Domingo, Guía, Mula de Carga para Equipo de Camping, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico.', 'monthly/8B8feklQu2WhatsApp Image 2023-05-25 at 11.18.17.jpeg', 'monthly/WEdE8AtJi520210904_164959.jpg', 1, 'Camping', 'Moderada - Alta', 75.00, 70.00, 0.00, 0.00, 0.00, 0.00, '0998373817', 'Hola, Me gustaría información de la ruta al Altar del 10 de junio', '2023-06-10', '2023-06-11', NULL, NULL, NULL, '2023-05-25 11:25:27', NULL),
(13, 'FREE EXPLORER CARIHUAIRAZO', 'LAGUNA CONGELADA', '🌟 ¡Trekking Exclusivo para Chicas! 🚺❄️ Descubre la Magia de la Laguna Congelada del Carihuairazo ❄️🗓️ Únete a nuestra aventura de un día y vive una experiencia inolvidable en la Laguna Congelada del Carihuairazo. ⛰️❄️\r\n\r\n🚶‍♀️ Nuestra guía experta, una chica apasionada por la naturaleza, nos guiará a través de esta increíble travesía. ¡Prepárate para vivir una aventura única junto a otras chicas valientes!', 'Esta ruta no tiene un costo de guianza.', 'monthly/JP6Ymb0IbBPost Instagram Turismo Agencia Viajes Orgánico Azul.png', 'monthly/kGHoHgGeRd1.jpg', 1, 'Full Day', 'Moderada - Alta', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Hola, Me gustaría información de la ruta al Carihuairazo del 18 de junio', '2023-06-18', '2023-06-18', NULL, NULL, NULL, '2023-05-25 12:33:32', '2023-06-03 22:52:36'),
(14, 'GARGANTA DE FUEGO', 'TUNGURAHUA', '🔥🌋 ¡Granata de Fuego! 🌌⛺️ Vive una Noche Épica en el Refugio del Volcán Tungurahua 🌠\r\n\r\n🗓️ Únete a esta increíble aventura y adéntrate en el majestuoso Volcán Tungurahua. ¡Una experiencia que encenderá tu espíritu aventurero! 🔥🌋', 'Transporte desde Baños, Cena Sábado, Desayuno Domingo, Guia, Casco y Crampones, Descanso en Refugio, Sleeping Bag', 'monthly/BHUy15moOUWhatsApp Image 2023-05-25 at 11.18.17 (1).jpeg', 'monthly/hoXJ1T3H60IMG_20230121_135131.jpg', 1, 'Refugio', 'Moderada - Alta', 99.00, 90.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Hola, Me gustaría información de la ruta al Tungurahua del 17 de junio', '2023-06-17', '2023-06-18', NULL, NULL, NULL, '2023-05-25 12:43:37', NULL),
(15, 'Camping Sobre Las Nubes', 'CERRO PUÑAY', '🌄⛺ ¡Camping sobre las Nubes en el Cerro Sagrado Puñay! 🌈✨ Vive una Noche Mágica en la Naturaleza 🌳🌙\r\n\r\n🗓️ Únete a esta aventura única y déjate sorprender por la belleza del Cerro Sagrado Puñay. ¡Una experiencia que elevará tu espíritu aventurero! 🌄⛺', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogara, Charla Astronómica.', 'monthly/NWZRpJKiKRcampingchimborazo_1700504081617.jpeg', 'monthly/HxqqzgPZJncampingchimborazo_1700504081617.jpeg', 1, 'Camping', 'Moderada', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Hola, Me gustaría información de la ruta al Puñay del 24 de junio', '2023-06-24', '2023-06-25', NULL, NULL, NULL, '2023-05-25 12:52:06', '2023-11-20 13:15:04'),
(16, 'UNA RUTA DIFERENTE', 'ALTAR CAMPAMENTO ITALIANO', '🏔️ ¡Descubre una ruta diferente y sumérgete en la belleza del Campamento Italiano en el Nevado Altar! 🌄🏕️\r\n\r\n🌿 Únete a nuestro camping de 2 días y 1 noche y adéntrate en un mundo de aventura y exploración. 🏞️🌌\r\n\r\n🥾 Exploraremos senderos fuera de lo común, rodeados de imponentes montañas y exuberante vegetación. 🏔️🌿', 'Carpa de media-alta montaña, Sleeping Bag, Aislante térmico, Permisos y costo de ingreso al atractivo, Cena sábado, Desayuno Domingo, Guia de Ruta, Observación y charla astronómica', 'monthly/ChNaUHeBRwAltar Campamento italiano.png', 'monthly/gYfjeOu2PPmodelo para web.png', 1, 'Camping', 'Moderada - Alta', 50.00, 45.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Hola Me gustaria reservar un cipo para el campamento italiano', '2023-07-01', '2023-07-02', NULL, NULL, NULL, '2023-06-05 22:50:58', NULL),
(18, 'PON A PRUEBA TU MENTE Y CUERPO', 'ALTAR - LAGUNA AMARILLA', '🌄 ¡Descubre la majestuosidad del volcán Altar y sumérgete en la belleza de la Laguna Amarilla en nuestro camping de 2 días y 1 noche! 🏕️🌈\r\n\r\n🗻 Únete a nosotros en este maravilloso camping y sé testigo de la grandiosidad del Kapak Urku, el volcán Altar. 🌋💛\r\n\r\n💦 Ven y báñate en las aguas místicas de la Laguna Amarilla, rodeada de un paisaje impresionante y la tranquilidad de la naturaleza. 🌿🏞️', 'Transporte desde Riobamba, Desayuno Sábado, Cena Sábado, Desayuno Domingo, Guía, Mula de Carga para Equipo de Camping, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico.', 'monthly/Q1HLEEawvGPost Julio 2023.png', 'monthly/0KmP6rdejcmodelo para web (2).png', 1, 'Camping', 'Moderada - Alta', 75.00, 70.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Hola Me gustaria reservar un cipo para el altar laguna amarilla', '2023-07-15', '2023-07-16', NULL, NULL, NULL, '2023-06-05 23:05:51', '2023-06-06 00:20:12'),
(19, 'AGUAS TERMALES +', 'CARIHUAIRAZO LAGUNA CONGELADA', '🌄 ¡Embárcate en una aventura única de 2 días y 1 noche en nuestro camping! 🏕️\r\n\r\n🗻 En el primer día, descubre la mágica belleza de la laguna congelada del Carihuairazo, un espectáculo natural impresionante que te dejará sin aliento. ❄️🏞️\r\n\r\n💦 En el segundo día, sumérgete en las relajantes aguas termales del Chimborazo, donde podrás renovar cuerpo y mente mientras disfrutas de las vistas panorámicas de los majestuosos paisajes montañosos. 🌿🔥', 'Transporte desde Riobamba, Desayuno Sábado, Cena Sábado, Desayuno Domingo, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Guianza, Costo de Ingreso al Carihuairazo, Costo de Ingreso a Aguas Termales.', 'monthly/2zfTgOWpG6Post Julio 2023 (1).png', 'monthly/mHZHUxzBeqmodelo para web (3).png', 1, 'Camping', 'Moderada - Alta', 70.00, 65.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Hola Me gustaría reservar un cupo para el Carihuairazo', '2023-07-22', '2023-07-23', NULL, NULL, NULL, '2023-06-05 23:33:53', '2023-06-06 00:24:12'),
(20, 'CAMPING SOBRE LAS NUBES', 'CERRO PUÑAY', '☁️ ¡Explora las alturas y duerme entre las nubes en nuestro camping de 2 días y 1 noche en el sagrado Cerro Puñay! 🌄🏕️\r\n🌌 Prepárate para una experiencia única mientras acampamos sobre las nubes y nos sumergimos en la belleza y tranquilidad de este cerro sagrado. 🌿☁️', 'Guía, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogata, Charla Astronómica.', 'monthly/Sm8ijxL3qPmodelo para web (4).png', 'monthly/6qJZ2JWa4lmodelo para web (5).png', 1, 'Camping', 'Moderada - Alta', 70.00, 65.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Hola Me gustaría reservar un cupo para el Cerro Puñay', '2023-07-29', '2023-07-30', NULL, NULL, NULL, '2023-06-05 23:46:36', '2023-06-06 00:28:51'),
(22, 'GARGANTA DE FUEGO', 'TUNGURAHUA', '🌋 ¡Adéntrate en la majestuosidad del Volcán Tungurahua y vive una experiencia inolvidable durante nuestro tour de 2 días y 1 noche! 🏕️🌌\r\n🌟 Únete a nosotros en esta aventura épica y descubre la belleza y el poderoso encanto del Volcán Tungurahua. 🌄🔥\r\n⛺️ Durante el día, exploraremos los senderos escarpados, caminaremos por la imponente caldera y nos maravillaremos con las vistas panorámicas de la región. 🚶‍♀️🌿🌋', 'Transporte desde Baños, Permisos de ingreso, Cena Sábado, Desayuno Domingo, Estadía en el refugio, Sleeping, Casco, Guía, Recuerdo de Ruta', 'monthly/9Ja3rVZsPIPost Julio 2023 (3).png', 'monthly/lJtVrKVY9Smodelo para web (6).png', 1, 'Refugio', 'Moderada - Alta', 99.00, 95.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Hola Me gustaría reservar un cupo para el Tungurahua', '2023-07-29', '2023-07-30', NULL, NULL, NULL, '2023-06-06 00:16:16', '2023-06-26 09:59:29'),
(23, 'CAMPING SOBRE LAS NUBES', 'CERRO PUÑAY', '☁️ ¡Vive una experiencia única en el Camping Sobre las Nubes, en el sagrado Cerro Puñay! ☁️⛰️\r\n\r\n🌌 Únete a nuestro camping de 2 días y 1 noche y déjate llevar por la magia de dormir entre las nubes en el místico Cerro Puñay. 🌄🏕️\r\n\r\n🌈 Disfruta de paisajes de ensueño, rodeado de naturaleza virgen y una vista panorámica impresionante. 🌿🌄', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogara, Charla Astronómica.', 'monthly/Dm8wzk8HXFAltar Campamento italiano (2).png', 'monthly/lsb3uEj6jvmodelo para web (1).png', 1, 'Camping', 'Moderada', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Hola Me gustaria reservar un cipo para el cerro Puñay', '2023-07-08', '2023-07-09', NULL, NULL, NULL, '2023-06-06 00:34:08', NULL),
(24, 'AGUAS TERMALES CUNUCYACU', 'ILLINIZAS', '🏕️ ¡Vive una experiencia llena de naturaleza y relajación en nuestro camping ! 🌿💦\r\n\r\n🌄 Únete a nosotros en este increíble tour donde visitaremos las aguas termales de Cunucyacu, para sumergirnos en sus hermosas aguas termales y disfrutar de una renovadora experiencia de bienestar. 🌊🧖‍♀️\r\n\r\n🌟 Además, exploraremos la impresionante cascada de Oro de los Illinizas, donde seremos testigos de su belleza y energía revitalizante. 🌈✨', 'Guia, Cena Campestre Domingo, Desayuno Domingo, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Ticket y permisos de entrada, Fogata, Charla y Observación Astronómica.', 'monthly/spsxuwZDS2WhatsApp Image 2023-07-05 at 10.28.14 AM (3).jpeg', 'monthly/zT2mWYcHfBWhatsApp Image 2023-07-05 at 10.28.14 AM (3).jpeg', 1, 'Camping', 'Moderada', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Hola me ayudas con info de los Illinizas', '2023-08-05', '2023-08-06', NULL, NULL, NULL, '2023-07-05 12:46:04', NULL),
(25, 'VISITANDO EL CRÁTER DE UN VOLCÁN', 'QUILOTOA', '🌈 Únete a nosotros en esta increíble aventura donde visitaremos un volcán extinto y acamparemos junto a su hermosa laguna. 🌌💦\r\n\r\n🥾 Explora senderos escénicos, maravíllate con la majestuosidad del volcán y sumérgete en la serenidad de su laguna. 🚶‍♀️🌿🏞️\r\n\r\n⛺️ Disfruta de noches estrelladas, fogatas acogedoras y el sonido relajante de la naturaleza en nuestro camping. 🔥🌌', 'Guia, Cena Campestre Domingo, Desayuno Domingo, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Ticket y permisos de entrada, Fogata, Charla y Observación Astronómica.', 'monthly/TRCbvRi8YEWhatsApp Image 2023-07-05 at 10.28.14 AM (3).jpeg', 'monthly/7v4koCSl2SWhatsApp Image 2023-07-05 at 10.28.14 AM (3).jpeg', 1, 'Camping', 'Moderada', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Hola me ayudas con info del Quilotoa', '2023-08-05', '2023-08-06', NULL, NULL, NULL, '2023-07-05 12:49:16', NULL),
(26, 'PON A PRUEBA TU MENTE Y CUERPO', 'ALTAR - LAGUNA AMARILLA', '🌿 Únete a nosotros en esta aventura inolvidable donde exploraremos los senderos que nos llevarán hasta la majestuosa laguna. 🚶‍♀️🏞️\r\n⛺️ Relájate y desconecta en nuestro camping rodeado de un entorno natural impresionante, con noches estrelladas 🌄\r\nReserva ahora y prepárate para vivir momentos de conexión con la naturaleza ¡Te esperamos! 🏞️✨', 'Transporte desde Riobamba, Desayuno Sábado, Cena Sábado, Desayuno Domingo, Guia, Mula de Carga para Equipo de Camping, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico.', 'monthly/9BXT26jDu2WhatsApp Image 2023-07-05 at 10.28.14 AM (1).jpeg', 'monthly/0Y2QcHTAvKIMG_20220925_073021.jpg', 1, 'Camping', 'Moderada - Alta', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Hola me ayudas con info del Altar Laguna Amarilla', '2023-08-11', '2023-08-12', NULL, NULL, NULL, '2023-07-05 12:51:29', '2023-07-05 12:55:47'),
(27, 'CAMPING SOBRE LAS NUBES', 'PUÑAY', '🌄 ¡Descubre la magia de los atardeceres en el cerro Puñay en nuestro increíble camping! 🌅🏕️\r\n\r\n🌿 Únete a nosotros en esta aventura fascinante donde exploraremos los senderos del cerro y nos maravillaremos con sus paisajes impresionantes. 🚶‍♀️🌄', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogata, Charla Astronómica.', 'monthly/ppulxchG2GWhatsApp Image 2023-07-05 at 10.28.14 AM (4).jpeg', 'monthly/s9AXaORAXEmodelo para web (5).png', 1, 'Camping', 'Moderada', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Hola me ayudas con info del Puñay', '2023-08-11', '2023-08-12', NULL, NULL, NULL, '2023-07-05 12:59:13', NULL),
(28, 'CAMPING SOBRE LAS NUBES', 'PUÑAY', '🌄 ¡Descubre la magia de los atardeceres en el cerro Puñay en nuestro increíble camping! 🌅🏕️\r\n\r\n🌿 Únete a nosotros en esta aventura fascinante donde exploraremos los senderos del cerro y nos maravillaremos con sus paisajes impresionantes. 🚶‍♀️🌄', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogata, Charla Astronómica.', 'monthly/6a1tHwCRZvWhatsApp Image 2023-07-05 at 10.28.14 AM (4).jpeg', 'monthly/f7Q5qNnM6Cmodelo para web (5).png', 1, 'Camping', 'Moderada', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Hola me ayudas con info del Puñay', '2023-08-12', '2023-08-13', NULL, NULL, NULL, '2023-07-05 12:59:27', NULL),
(29, 'AGUAS TERMALES +', 'CARIHUAIRAZO LAGUNA CONGELADA', '🌿 Únete a nosotros en esta aventura épica de dos días donde exploraremos la mágica laguna congelada del Carihuairazo y nos sumergiremos en las aguas termales para revitalizarnos. ❄️🏞️\r\n\r\n⛺️ Disfruta de noches estrelladas, fogatas acogedoras y el sonido relajante de la naturaleza en nuestro camping. 🔥🌌', 'Transporte desde Riobamba, Desayuno Sábado, Cena Sábado, Desayuno Domingo, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Guianza, Costo de Ingreso al Carihuairazo, Costo de Ingreso a Aguas Termales.', 'monthly/ouWENmZivTWhatsApp Image 2023-07-05 at 10.28.14 AM (2).jpeg', 'monthly/zkTbhf9XycWhatsApp Image 2023-07-05 at 10.28.14 AM (2).jpeg', 1, 'Camping', 'Moderada', 70.00, 65.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Hola me ayudas con info de la laguna congelada', '2023-08-19', '2023-08-20', NULL, NULL, NULL, '2023-07-05 13:07:06', NULL),
(30, 'GARGANTA DE FUEGO', 'TUNGURAHUA', '🌋 ¡Embárcate en una aventura inolvidable a lo largo de nuestra ruta de 2 días y 1 noche al majestuoso Volcán Tungurahua! 🌄⛺️\r\n\r\n🌟 Únete a nosotros mientras exploramos los senderos escarpados del volcán y nos maravillamos con sus impresionantes paisajes. 🚶‍♀️🌿🌋\r\n⛺️ En la noche, descansa y recarga energías en el refugio, compartiendo historias y camaradería con otros aventureros. 🌌🔥', 'Transporte desde Baños, Cena Sábado, Desayuno Domingo, Guia, Casco , Descanso en Refugio, Sleeping Bag, Permisos de Ingreso al atractivo.', 'monthly/3Z5wXTCphumodelo para web (6).png', 'monthly/53gWG1RsQJmodelo para web (6).png', 1, 'Camping', 'Moderada - Alta', 99.00, 99.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Hola me ayudas con info del Tungurahua', '2023-08-19', '2023-08-20', NULL, NULL, NULL, '2023-07-05 13:23:20', NULL),
(31, 'CAMPING SOBRE LAS NUBES', 'PUÑAY', '🌄 ¡Descubre la magia de los atardeceres en el cerro Puñay en nuestro increíble camping! 🌅🏕️\r\n\r\n🌿 Únete a nosotros en esta aventura fascinante donde exploraremos los senderos del cerro y nos maravillaremos con sus paisajes impresionantes. 🚶‍♀️🌄\r\n\r\n✨ Disfruta de la paz y serenidad que solo el cerro Puñay puede ofrecer, y déjate cautivar por los mágicos atardeceres que pintan el cielo con colores vibrantes. 🌅🌌', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogara, Charla Astronómica.', 'monthly/9LACywM07nWhatsApp Image 2023-07-05 at 10.28.14 AM.jpeg', 'monthly/WIiewzZ12ZWhatsApp Image 2023-07-05 at 10.28.14 AM.jpeg', 1, 'Camping', 'Moderada', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Hola me ayudas con info del Puñay', '2023-08-26', '2023-08-27', NULL, NULL, NULL, '2023-07-05 13:27:39', NULL),
(32, 'PON A PRUEBA TU MENTE Y CUERPO', 'ALTAR - LAGUNA AMARILLA', '¡Ven y crea tu propia historia de camping, eligiendo entre el Cerro Puñay y el Volcán Altar en un viaje inolvidable de 2 días y 1 noche! 🌄🏞️\r\n📸 Ya sea que optes por el Cerro Puñay o el Volcán Altar, asegúrate de tener tu cámara lista para capturar momentos inolvidables. 📷🌿', 'Transporte desde Riobamba, Desayuno Sábado, Cena Sábado, Desayuno Domingo, Guía, Mula de Carga para Equipo de Camping, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico.', 'monthly/MwIlSGvsD7WhatsApp Image 2023-08-29 at 6.02.26 AM.jpeg', 'monthly/TbPIutvSwc20210328_080352.jpg', 1, 'Camping', 'Moderada - Alta', 75.00, 70.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Hola, Me gustaría información de la ruta al Altar', '2023-09-02', '2023-09-03', NULL, NULL, NULL, '2023-08-29 07:44:21', NULL),
(33, 'CAMPING SOBRE LAS NUBES', 'PUÑAY', '¡No pierdas la oportunidad de vivir esta experiencia única y reservar tu lugar en nuestro camping \"Sobre las Nubes\" en el Cerro Sagrado Puñay! 🌄⛺ Te aseguramos que será una aventura que recordarás por siempre 🤩.', 'Guía, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogata, Charla Astronómica.', 'monthly/bQ5hEASDlk3.png', 'monthly/kxkwhk79YDIMG-20210627-WA0010.jpg', 1, 'Camping', 'Moderada', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Hola me dan info del Puñay', '2023-09-09', '2023-09-10', NULL, NULL, NULL, '2023-09-05 08:40:26', NULL),
(34, 'AGUAS TERMALES', 'OJO DEL FANTASMA', '¿Te imaginas disfrutar de las maravillas naturales de la cordillera de los Andes, mientras te sumerges en las cálidas aguas termales? Únete a nosotros en nuestra aventura en las aguas termales en las faldas del Volcán Tungurahua, en Ecuador. 🤩🗻🏕️⛺', 'Permisos y costo de ingresos, box lounch, guía de ruta, transporte desde Riobamba', 'monthly/mqKgrecKZK4.png', 'monthly/0Q7iwprCvlmodelo para web.png', 1, 'Full Day', 'Facil', 25.00, 22.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Hola ayuda con info del ojo del fantasma full day', '2023-09-10', '2023-09-10', NULL, NULL, NULL, '2023-09-05 18:38:56', '2023-09-05 18:40:34'),
(35, 'GIRO 360', 'MORURCO', '¿Sientes la llamada de las alturas? 🗻💪 Elige nuestro trekking al Morurco y experimenta un emocionante giro de 360 grados en la cima. ¡Siente la adrenalina y contempla vistas impresionantes!', 'Permisos y costo de ingresos, box lounch, guía de ruta, transporte.', 'monthly/YnbfzJ3H6g4.png', 'monthly/FZPTWPTw5Mmodelo para web.png', 1, 'Full Day', 'Moderada', 45.00, 40.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Hola ayuda con info del Morurco 360', '2023-09-10', '2023-09-10', NULL, NULL, NULL, '2023-09-05 18:42:48', '2023-09-05 18:44:23'),
(36, 'LAGUNA CONGELADA', 'CARIHUAIRAZO', '❄️ ¡Prepárate para una experiencia inolvidable en el Nevado Carihuairazo! 🏞️\r\n\r\nEste Full Day te llevará a las alturas de la belleza natural. 🏔️ ¡Descubre la majestuosa Laguna Congelada y maravíllate con su deslumbrante paisaje invernal!\r\n\r\nTras esta aventura épica, recargaremos energías con un almuerzo en un lugar encantador, rodeado de la serenidad de la montaña. 🍽️🏔️', 'Permisos de ingreso, Guía de ruta, Transporte desde Riobamba, Almuerzo, Charla flora, fauna y leyendas del lugar, Fotografía durante el recorrido.', 'monthly/Tm5i3HjiCaseptiembre (2).png', 'monthly/Apzc65Bz8eIMG-20211128-WA0030.jpg', 1, 'Full Day', 'Moderada', 35.00, 30.00, 0.00, 0.00, 0.00, 0.00, '0997159098', 'Hola ayuda con info del Carihuairazo', '2023-09-17', '2023-09-17', NULL, NULL, NULL, '2023-09-05 18:56:34', '2023-09-06 01:18:02'),
(37, 'PON A PRUEBA TU MENTE Y CUERPO', 'ALTAR - LAGUNA AMARILLA', '¡Vive la aventura en el Altar! ⛺🏞️\r\n\r\nÚnete a nuestro camping en el Kapak Urku, nuestra aventura nos llevará a explorar sus senderos, pero el punto culminante será la visita a la deslumbrante Laguna Amarilla, una joya natural que te dejará sin aliento. 💎🏞️', 'Transporte desde Riobamba, Desayuno Sábado, Cena Sábado, Desayuno Domingo, Guia, Mula de Carga para Equipo de Camping, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico.', 'monthly/TsZRepnbIVWhatsApp Image 2023-09-27 at 6.24.04 PM.jpeg', 'monthly/0i7GHi80Xm20210228_072803.jpg', 1, 'Camping', 'Moderada - Alta', 75.00, 70.00, 0.00, 0.00, 0.00, 0.00, '093993786135', 'Por favor me ayudas con información del Altar, vi esta publicación en la web.', '2023-10-07', '2023-10-07', NULL, NULL, NULL, '2023-09-30 12:20:54', NULL),
(38, 'CAMPING SOBRE LAS NUBES', 'CERRO PUÑAY', '¡Vive una aventura única en el cerro Puñay con nuestro camping sobre las nubes! 🏕️🌤️🌄 Descubre paisajes mágicos, respira aire puro y admira vistas panorámicas impresionantes. ¡No te pierdas la oportunidad de acampar en la cima! Reserva tu lugar ahora. 🌟🌲☁️🏞️', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogata, Charla Astronómica.', 'monthly/dWtQ76KWCUWhatsApp Image 2023-09-28 at 4.56.09 PM.jpeg', 'monthly/gsBhgHkUWzIMG_20220522_181147.jpg', 1, 'Camping', 'Moderada - Alta', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '093993786135', 'Por favor me ayudas con información del Puñay, vi esta publicación en la web.', '2023-10-07', '2023-10-08', NULL, NULL, NULL, '2023-09-30 12:24:32', NULL),
(39, 'CAMPING SOBRE LAS NUBES', 'CERRO PUÑAY', '¡Vive una aventura única en el cerro Puñay con nuestro camping sobre las nubes! 🏕️🌤️🌄 Descubre paisajes mágicos, respira aire puro y admira vistas panorámicas impresionantes. ¡No te pierdas la oportunidad de acampar en la cima! Reserva tu lugar ahora. 🌟🌲☁️🏞️', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogata, Charla Astronómica.', 'monthly/NRLeXV4ojDWhatsApp Image 2023-09-28 at 4.56.09 PM.jpeg', 'monthly/UWsZOqD2msIMG_20220522_180834.jpg', 1, 'Camping', 'Moderada - Alta', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '093993786135', 'Por favor me ayudas con información del Puñay, vi esta publicación en la web.', '2023-10-08', '2023-10-09', NULL, NULL, NULL, '2023-09-30 12:27:53', NULL),
(40, 'LAGUNA CONGELADA', 'CARIHUAIRAZO', '❄️ Descubre la Magia de la Laguna Congelada del Carihuairazo ❄️🗓️ Únete a nuestra aventura de un día y vive una experiencia inolvidable en la Laguna Congelada del Carihuairazo. ⛰️❄️', 'Guia, Ticket de ingreso, Almuerzo en un lodge hermoso, Transporte dese Riobamba', 'monthly/aG6RtwmNXYWhatsApp Image 2023-09-28 at 4.56.09 PM (1).jpeg', 'monthly/IR3wcdwBRqWhatsApp Image 2023-09-28 at 4.56.09 PM (1).jpeg', 1, 'Full Day', 'Moderada', 35.00, 30.00, 0.00, 0.00, 0.00, 0.00, '093993786135', 'Por favor me ayudas con información del Carihuairazo, vi esta publicación en la web.', '2023-10-08', '2023-10-08', NULL, NULL, NULL, '2023-09-30 12:51:54', NULL),
(41, 'AGUAS TERMALES +', 'CARIHUAIRAZO LAGUNA CONGELADA', '🌄 ¡Embárcate en una aventura única de 2 días y 1 noche en nuestro camping! 🏕️\r\n\r\n🗻 En el primer día, descubre la mágica belleza de la laguna congelada del Carihuairazo, un espectáculo natural impresionante que te dejará sin aliento. ❄️🏞️\r\n\r\n💦 En el segundo día, sumérgete en las relajantes aguas termales del Chimborazo, donde podrás renovar cuerpo y mente mientras disfrutas de las vistas panorámicas de los majestuosos paisajes montañosos. 🌿🔥', 'Transporte desde Riobamba, Desayuno Sábado, Cena Sábado, Desayuno Domingo, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Guianza, Costo de Ingreso al Carihuairazo, Costo de Ingreso a Aguas Termales.', 'monthly/NyZY51t8s21698199559652.jpeg', 'monthly/7UnPSzcuRL1698199559652.jpeg', 1, 'Camping', 'Moderada - Alta', 70.00, 65.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Hola Me gustaría reservar un cupo para el Carihuairazo', '2023-10-28', '2023-10-29', NULL, NULL, NULL, '2023-10-24 21:06:53', NULL),
(42, 'PON A PRUEBA TU MENTE Y CUERPO', 'ALTAR - LAGUNA AMARILLA', '🏕️ ¡Aventureros, les invitamos a un camping en el Nevado El Altar! ⛺\r\nÚnete a nuestra expedición hacia la majestuosidad del Altar, uno de los nevados más impresionantes de Ecuador 🇪🇨. \r\nDurante dos días y una noche, podrás disfrutar de la belleza natural de la zona, acampando bajo las estrellas y rodeado de los paisajes andinos más impresionantes 🌄🌲.', 'Transporte desde Riobamba, Desayuno Sábado, Cena Sábado, Desayuno Domingo, Guia, Mula de Carga para Equipo de Camping, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico.', 'monthly/ezqqBwp5oncampingchimborazo_1698327945486.jpeg', 'monthly/t4wLGaluoNcampingchimborazo_1698327945486.jpeg', 1, 'Camping', 'Alta', 75.00, 70.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Por favor me ayudas con información del Altar, vi esta publicación en la web.', '2023-11-03', '2023-11-04', NULL, NULL, NULL, '2023-10-26 08:47:15', NULL),
(43, 'Camping Sobre Las Nubes', 'CERRO PUÑAY', '🌄⛺ ¡Camping sobre las Nubes en el Cerro Sagrado Puñay! 🌈✨ Vive una Noche Mágica en la Naturaleza 🌳🌙\r\n\r\n🗓️ Únete a esta aventura única y déjate sorprender por la belleza del Cerro Sagrado Puñay. ¡Una experiencia que elevará tu espíritu aventurero! 🌄⛺', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogara, Charla Astronómica.', 'monthly/bld0oVjm7ecamping puñay.jpeg', 'monthly/R8CK8QZDxucamping puñay.jpeg', 1, 'Camping', 'Moderada', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Hola, Me gustaría información de la ruta al Puñay', '2023-11-03', '2023-11-04', NULL, NULL, NULL, '2023-10-26 08:53:49', NULL),
(44, 'Camping Sobre Las Nubes', 'CERRO PUÑAY', '🌄⛺ ¡Camping sobre las Nubes en el Cerro Sagrado Puñay! 🌈✨ Vive una Noche Mágica en la Naturaleza 🌳🌙\r\n\r\n🗓️ Únete a esta aventura única y déjate sorprender por la belleza del Cerro Sagrado Puñay. ¡Una experiencia que elevará tu espíritu aventurero! 🌄⛺', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogara, Charla Astronómica.', 'monthly/xCwRd7HBixcamping puñay.jpeg', 'monthly/kLS081MOn5camping puñay.jpeg', 1, 'Camping', 'Moderada', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Hola, Me gustaría información de la ruta al Puñay', '2023-11-04', '2023-11-05', NULL, NULL, NULL, '2023-10-26 08:57:08', NULL),
(45, 'Camping Sobre Las Nubes', 'CERRO PUÑAY', '🌄⛺ ¡Camping sobre las Nubes en el Cerro Sagrado Puñay! 🌈✨ Vive una Noche Mágica en la Naturaleza 🌳🌙\r\n\r\n🗓️ Únete a esta aventura única y déjate sorprender por la belleza del Cerro Sagrado Puñay. ¡Una experiencia que elevará tu espíritu aventurero! 🌄⛺', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogara, Charla Astronómica.', 'monthly/oalSj5UF8scampingchimborazo_1700420003842.jpeg', 'monthly/4yMENDMZjPcampingchimborazo_1700420003842.jpeg', 1, 'Camping', 'Moderada', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Hola, Me gustaría información de la ruta al Puñay del 25 de noviembre', '2023-11-25', '2023-11-26', NULL, NULL, NULL, '2023-11-19 13:56:29', NULL),
(46, 'PON A PRUEBA TU MENTE Y CUERPO', 'ALTAR - LAGUNA AMARILLA', '🏕️ ¡Aventureros, les invitamos a un camping en el Nevado El Altar! ⛺\r\nÚnete a nuestra expedición hacia la majestuosidad del Altar, uno de los nevados más impresionantes de Ecuador 🇪🇨. \r\nDurante dos días y una noche, podrás disfrutar de la belleza natural de la zona, acampando bajo las estrellas y rodeado de los paisajes andinos más impresionantes 🌄🌲.', 'Transporte desde Riobamba, Desayuno Sábado, Cena Sábado, Desayuno Domingo, Guia, Mula de Carga para Equipo de Camping, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico.', 'monthly/8Qx37CaGRYcampingchimborazo_1700934118595.jpeg', 'monthly/kLyp2Twyoccampingchimborazo_1700934118595.jpeg', 1, 'Camping', 'Alta', 75.00, 70.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Por favor me ayudas con información del Altar, vi esta publicación en la web.', '2023-12-02', '2023-12-03', NULL, NULL, NULL, '2023-11-20 13:10:41', '2023-11-25 12:46:14'),
(47, 'Camping Sobre Las Nubes', 'CERRO PUÑAY', '🌄⛺ ¡Camping sobre las Nubes en el Cerro Sagrado Puñay! 🌈✨ Vive una Noche Mágica en la Naturaleza 🌳🌙\r\n\r\n🗓️ Únete a esta aventura única y déjate sorprender por la belleza del Cerro Sagrado Puñay. ¡Una experiencia que elevará tu espíritu aventurero! 🌄⛺', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogara, Charla Astronómica.', 'monthly/3RP7F79zPxcampingchimborazo_1700504081617.jpeg', 'monthly/ZXHUPLcCjbcampingchimborazo_1700504081617.jpeg', 1, 'Camping', 'Moderada', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Hola, Me gustaría información de la ruta al Puñay', '2023-12-02', '2023-12-03', NULL, NULL, NULL, '2023-11-20 13:16:05', NULL),
(48, 'LAGUNA CONGELADA', 'CARIHUAIRAZO', 'Si eres un amante de la naturaleza y de los paisajes impresionantes, este es el camping perfecto para ti. Te invitamos a unirte a nosotros en nuestra aventura en la laguna congelada del Nevado Carihuairazo, ubicada en la cordillera de los Andes en Ecuador.. 🤩🗻🏕️⛺', 'Guia, Cena Campestre Domingo, Desayuno Domingo, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Ticket y permisos de entrada, Fogata, Charla y Observación Astronómica.', 'monthly/ylNn8ltKd2campingchimborazo_1700934197236.jpeg', 'monthly/eB6JbaPrLccampingchimborazo_1700934197236.jpeg', 1, 'Full Day', 'Moderada', 35.00, 30.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Hola me ayudas con info del full day de el Carihuairazo, vi su publicación en su página web.', '2023-12-03', '2023-12-03', NULL, NULL, NULL, '2023-11-22 16:42:21', '2023-11-26 18:00:24'),
(49, 'VISITANDO EL CRATER DE UN VOLCÁN', 'QUILOTOA', '🏕️ ¡Descubre la magia del cráter del volcán Quilotoa en nuestro camping de dos días y una noche! 🌋⛺️\r\n\r\n🌄 Sumérgete en la belleza natural de este volcán extinto y disfruta de vistas impresionantes. 🌈🌌\r\n\r\n🥾 Explora senderos escénicos, admira la majestuosidad del cráter y conecta con la energía de la naturaleza. 🌿🌞\r\n\r\n✨ Vive una experiencia única en el corazón de los Andes, rodeado de paisajes cautivadores y tranquilidad absoluta. ¡No hay mejor manera de escapar de la rutina! 🏞️🌿\r\n\r\n¡Únete a nosotros en esta aventura inolvidable en el cráter del volcán Quilotoa! ¡Reserva ahora y vive una experiencia que te dejará sin aliento! 🌋', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogara, Charla Astronómica.', 'monthly/QhEdFqOq2Zcampingchimborazo_1701972448559 (2).jpeg', 'monthly/aXgM1x8QVecampingchimborazo_1701972448559 (2).jpeg', 1, 'Camping', 'Moderada - Facil', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Hola me gustaría reservar mi cupo para la ruta al Quilotoa', '2023-12-09', '2023-12-10', NULL, NULL, NULL, '2023-11-22 16:48:55', '2023-12-07 13:17:52'),
(50, 'Camping Sobre Las Nubes', 'CERRO PUÑAY', '🌄⛺ ¡Camping sobre las Nubes en el Cerro Sagrado Puñay! 🌈✨ Vive una Noche Mágica en la Naturaleza 🌳🌙\r\n\r\n🗓️ Únete a esta aventura única y déjate sorprender por la belleza del Cerro Sagrado Puñay. ¡Una experiencia que elevará tu espíritu aventurero! 🌄⛺', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogara, Charla Astronómica.', 'monthly/LsTzuIigrfcampingchimborazo_1701973290058.jpeg', 'monthly/aOOHbyDKxQcampingchimborazo_1701973290058.jpeg', 1, 'Camping', 'Moderada', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Hola, Me gustaría información de la ruta al Puñay del 24 de junio', '2023-12-09', '2023-12-10', NULL, NULL, NULL, '2023-11-22 16:54:00', '2023-12-07 13:22:31'),
(51, 'LAGUNA CONGELADA', 'CARIHUAIRAZO', '🌄 ¡Embárcate en una aventura única de 2 días y 1 noche en nuestro camping! 🏕️\r\n\r\n🗻 En el primer día, descubre la mágica belleza de la laguna congelada del Carihuairazo, un espectáculo natural impresionante que te dejará sin aliento. ❄️🏞️\r\n\r\n💦 En el segundo día, sumérgete en las relajantes aguas termales del Chimborazo, donde podrás renovar cuerpo y mente mientras disfrutas de las vistas panorámicas de los majestuosos paisajes montañosos. 🌿🔥', 'Transporte desde Riobamba, Desayuno Sábado, Cena Sábado, Desayuno Domingo, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Guianza, Costo de Ingreso al Carihuairazo, Costo de Ingreso a Aguas Termales.', 'monthly/9FfYcLGOWaWhatsApp-Image-2023-04-29-at-7.53.47-PM.jpg', 'monthly/GEseL4d2oyWhatsApp-Image-2023-04-29-at-7.53.47-PM.jpg', 1, 'Camping', 'Moderada - Alta', 70.00, 65.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Hola Me gustaría reservar un cupo para el Carihuairazo', '2023-12-16', '2023-12-17', NULL, NULL, NULL, '2023-11-22 17:08:50', NULL),
(52, 'UNA RUTA DIFERENTE', 'ALTAR CAMPAMENTO ITALIANO', '🏔️ ¡Descubre una ruta diferente y sumérgete en la belleza del Campamento Italiano en el Nevado Altar! 🌄🏕️\r\n\r\n🌿 Únete a nuestro camping de 2 días y 1 noche y adéntrate en un mundo de aventura y exploración. 🏞️🌌\r\n\r\n🥾 Exploraremos senderos fuera de lo común, rodeados de imponentes montañas y exuberante vegetación. 🏔️🌿', 'Carpa de media-alta montaña, Sleeping Bag, Aislante térmico, Permisos y costo de ingreso al atractivo, Cena sábado, Desayuno Domingo, Guia de Ruta, Observación y charla astronómica', 'monthly/qCv1TSKr6ucampingchimborazo_1701973361910.jpeg', 'monthly/At2P23WfVscampingchimborazo_1701973361910.jpeg', 1, 'Camping', 'Moderada - Alta', 50.00, 45.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Hola Me gustaria reservar un cipo para el campamento italiano', '2023-12-09', '2023-12-10', NULL, NULL, NULL, '2023-11-22 17:28:18', '2023-12-07 13:26:27'),
(53, 'Camping Sobre Las Nubes', 'CERRO PUÑAY', '🌄⛺ ¡Camping sobre las Nubes en el Cerro Sagrado Puñay! 🌈✨ Vive una Noche Mágica en la Naturaleza 🌳🌙\r\n\r\n🗓️ Únete a esta aventura única y déjate sorprender por la belleza del Cerro Sagrado Puñay. ¡Una experiencia que elevará tu espíritu aventurero! 🌄⛺', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogara, Charla Astronómica.', 'monthly/G3Rvt6uWCWcampingchimborazo_1700504081617.jpeg', 'monthly/cvSdX35y7Ccampingchimborazo_1700504081617.jpeg', 1, 'Camping', 'Moderada', 40.00, 35.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Hola, Me gustaría información de la ruta al Puñay del 24 de junio', '2023-12-23', '2023-12-24', NULL, NULL, NULL, '2023-11-22 17:31:25', NULL),
(54, 'PON A PRUEBA TU MENTE Y CUERPO', 'ALTAR - LAGUNA AMARILLA', '🏕️ ¡Aventureros, les invitamos a un camping en el Nevado El Altar! ⛺\r\nÚnete a nuestra expedición hacia la majestuosidad del Altar, uno de los nevados más impresionantes de Ecuador 🇪🇨. \r\nDurante dos días y una noche, podrás disfrutar de la belleza natural de la zona, acampando bajo las estrellas y rodeado de los paisajes andinos más impresionantes 🌄🌲.', 'Transporte desde Riobamba, Desayuno Sábado, Cena Sábado, Desayuno Domingo, Guia, Mula de Carga para Equipo de Camping, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico.', 'monthly/wHShIb2syB20066018_108476109811879_4762139092173455360_n-2424046105.jpg', 'monthly/QdIdWPwuqy20066018_108476109811879_4762139092173455360_n-2424046105.jpg', 1, 'Camping', 'Alta', 75.00, 70.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Por favor me ayudas con información del Altar, vi esta publicación en la web.', '2023-12-23', '2023-12-24', NULL, NULL, NULL, '2023-11-22 17:33:48', NULL),
(55, 'GARGANTA DE FUEGO', 'TUNGURAHUA', '¡🌋🥾Descubre la majestuosidad del Volcán Tungurahua con nuestro Trek King guiado! 🌄 .\r\nDurante dos días y una noche, podrás disfrutar de la belleza de los paisajes andinos y la naturaleza en su máxima expresión 🌿🌺.', 'Transporte desde Baños, Cena Sábado, Desayuno Domingo, Guía, Casco y Crampones, Descanso en Refugio, Sleeping Bag', 'monthly/eI97C1kfBatungurahua-volcano-ecuador-7-2281041816.jpg', 'monthly/zcbWOh0Ly5tungurahua-volcano-ecuador-7-2281041816.jpg', 1, 'Camping', 'Alta', 99.00, 90.00, 0.00, 0.00, 0.00, 0.00, '0961119670', 'Por favor me ayudas con información del Tungurahua, vi esta publicación en la web.', '2023-12-16', '2023-12-17', NULL, NULL, NULL, '2023-11-25 12:41:26', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monthly_tours_users`
--

CREATE TABLE `monthly_tours_users` (
  `monthly_tour_user_id` bigint(20) UNSIGNED NOT NULL,
  `monthly_tour_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `seats` int(11) NOT NULL,
  `coment` text NOT NULL,
  `img_voucher` text NOT NULL,
  `ammount_deposited` double(8,2) NOT NULL,
  `missing_ammount` double(8,2) NOT NULL,
  `messagge` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('06b091bb6a18ec0251b9444dc28d44c04961f3a5de01d3e23fe637831b5b7f2b004632eb9d50c74a', 1, 1, 'authToken', '[]', 0, '2023-10-24 20:54:27', '2023-10-24 20:54:27', '2023-11-24 20:54:27'),
('0bad1c37686a9dc7dc507fc9ea096cbb7f087f726f3e057e9508c5fa8132cdaa950b9aea1ee7524a', 1, 1, 'authToken', '[]', 0, '2023-04-17 19:17:55', '2023-04-17 19:17:55', '2023-05-17 19:17:55'),
('1199366d7fcdb707e3a9575d0337b6d115909596987d8dcf7698dd97e6aa77f2f1079c3dfc272a72', 5, 1, 'authToken', '[]', 0, '2023-06-26 09:40:30', '2023-06-26 09:40:30', '2023-07-26 09:40:30'),
('150b151311dcac1723a0e1200f970f772c26bfd757485e0e7bdcf5be18262ecb6f3eb829755f6ac1', 4, 1, 'authToken', '[]', 0, '2023-04-13 08:33:53', '2023-04-13 08:33:53', '2023-05-13 08:33:53'),
('1939bcfe9537e1cbdd91c955a8d69db1af435dc0f939e12bd9fae477aded29076fb9f081644f7e6c', 3, 1, 'authToken', '[]', 0, '2023-04-13 09:27:19', '2023-04-13 09:27:19', '2023-05-13 09:27:19'),
('2af0016891d86478b659f15be191e8d66aa9679d842de23801627f1e853631cd4fa3a5e9ba164e6f', 1, 1, 'authToken', '[]', 0, '2023-06-03 08:37:54', '2023-06-03 08:37:54', '2023-07-03 08:37:54'),
('2b174e60dbae6c98a7b890251eb6ef8ebea64a1f9177d0a5ed1629cf4a6770278e0319b61277da26', 1, 1, 'authToken', '[]', 0, '2023-07-13 11:05:42', '2023-07-13 11:05:42', '2023-08-13 11:05:42'),
('2e58953d8d4f6582a9f8ca3aaaacc0e1a9f91b8a65091f2cf3beeffefed94abb3b4d242d130fc8cd', 5, 1, 'authToken', '[]', 0, '2023-06-25 13:09:56', '2023-06-25 13:09:56', '2023-07-25 13:09:56'),
('2e593ba285bc5c74c62a6b753daee0e083f1301d38d4793c22eea41edc882164105148266829cd0f', 2, 1, 'authToken', '[]', 0, '2023-04-13 08:32:15', '2023-04-13 08:32:15', '2023-05-13 08:32:15'),
('3b229eb970bc1f806046c83e59544adbeecc0b9b7d8083da2d20cdf89b9faa335423d42d34ec64e2', 1, 1, 'authToken', '[]', 0, '2023-09-08 07:53:41', '2023-09-08 07:53:41', '2023-10-08 07:53:41'),
('3ffd8deda6f389234533983349574d4348f78686ace56446d749deb20e3ae1fb7bec9345404f72ed', 1, 1, 'authToken', '[]', 0, '2023-04-03 16:37:37', '2023-04-03 16:37:37', '2023-05-03 11:37:37'),
('46d4c4cb258c8fa8c4a6426b3fa316a58c612de1fc4b1df5469bda1b2865f55c6317e9b198fb555c', 1, 1, 'authToken', '[]', 0, '2023-05-18 00:29:28', '2023-05-18 00:29:28', '2023-06-18 00:29:28'),
('4e8121eba5ee3014eff5b07e469fa5ce38f8a45f0006fdd68e11e5eb61b14b397f84eb9e3342c450', 1, 1, 'authToken', '[]', 0, '2023-04-18 22:58:28', '2023-04-18 22:58:28', '2023-05-18 22:58:28'),
('5447573da9eff295afae690706e67900f0355151a2356fab3d2aded2d80762e7d4c043be417b85bb', 1, 1, 'authToken', '[]', 0, '2023-09-05 07:43:14', '2023-09-05 07:43:14', '2023-10-05 07:43:14'),
('5451aecc7346f80cf766dfae6fbd4571644ad7fac558653f9a0af34589e06230aa305f8a148740f5', 1, 1, 'authToken', '[]', 0, '2023-06-05 16:48:31', '2023-06-05 16:48:31', '2023-07-05 16:48:31'),
('71d1eef2c67f36ebe114c970c69a86cc3b3476bfb1b7082ad5dd26da119035389bbcca0597b467ca', 3, 1, 'authToken', '[]', 0, '2023-04-13 08:33:09', '2023-04-13 08:33:09', '2023-05-13 08:33:09'),
('730fba69a2e4949d0a3a6bf9c01bcd6d1269c97fb1cc7de7c3580ead6374e89b2ea4183287d2a38b', 4, 1, 'authToken', '[]', 0, '2023-04-13 10:21:14', '2023-04-13 10:21:14', '2023-05-13 10:21:14'),
('7bb4d7c2fad018af8596f3d80ac907d0f54cfa26e0a6f1520684a7353067d51b74bea807c21a2d03', 1, 1, 'authToken', '[]', 0, '2023-09-05 07:53:23', '2023-09-05 07:53:23', '2023-10-05 07:53:23'),
('7de1ff2a3bd3bc3f8c9bd795ffd309ea636c5fc7ca8b25b3dfbfda28aef287f97cef06d3acf362a2', 1, 1, 'authToken', '[]', 0, '2023-04-19 11:15:47', '2023-04-19 11:15:47', '2023-05-19 11:15:47'),
('7fac81276a15d00870e61d3458c3e477e1a4407f89c504c876c0f894131338d6ba10bb11375d032e', 1, 1, 'authToken', '[]', 0, '2023-04-13 18:22:17', '2023-04-13 18:22:17', '2023-05-13 18:22:17'),
('8efc452e3b0827bb8aa6db27ee7457ae0ac56531ba56c7a2c370f43cdb867afe9a2552769ebc1753', 1, 1, 'authToken', '[]', 0, '2023-08-29 07:40:02', '2023-08-29 07:40:02', '2023-09-29 07:40:02'),
('95feaf35ac5dc6a376cf41de865e8dbb00fbbe688f3ae3e55880831ef3adf5f3edaffe2b90551177', 1, 1, 'authToken', '[]', 0, '2023-06-22 12:46:25', '2023-06-22 12:46:25', '2023-07-22 12:46:25'),
('96e03ed76324f6b2e3f6328ec1c271ba4618a8f2cac6ee48448d595d81d950198127e8177abf7b68', 1, 1, 'authToken', '[]', 0, '2023-06-23 17:26:59', '2023-06-23 17:26:59', '2023-07-23 17:26:59'),
('9a028559e34fb2c3ed0565617c28097f08dcb24d2b76d185e685be558596a3f480423876d82a8af7', 1, 1, 'authToken', '[]', 0, '2023-11-22 09:55:53', '2023-11-22 09:55:53', '2023-12-22 09:55:53'),
('9c5e23800990a62a8e2a49b6673fb6529f6bc88431fb3ab3925c7bed93d7e6fa028cc6619f91369a', 5, 1, 'authToken', '[]', 0, '2023-06-25 16:52:07', '2023-06-25 16:52:07', '2023-07-25 16:52:07'),
('a79cd8f8d344919580282ac68002a84dabedfb8580c1880b7a2c9f48f80614e4cdaa7b331b2354dd', 4, 1, 'authToken', '[]', 0, '2023-04-13 08:34:08', '2023-04-13 08:34:08', '2023-05-13 08:34:08'),
('b708d6c55078352f20dcc13ede5377457cc23b51f81883dfb82afbd9ef253db8c305773817088499', 4, 1, 'authToken', '[]', 0, '2023-04-13 10:26:22', '2023-04-13 10:26:22', '2023-05-13 10:26:22'),
('bf2aa47d89bbb9d0a12bf7c856f32eb91ff9852248a18b603e9f7f40d6e02d3d16cfb61e4bb5793a', 1, 1, 'authToken', '[]', 0, '2023-07-05 12:38:31', '2023-07-05 12:38:31', '2023-08-05 12:38:31'),
('f27ec57eb6beaa44ecbb0af2676cfb7dd82e8ef988a23c4f434015b5aef1fa0313cb8e1cc941daee', 1, 1, 'authToken', '[]', 0, '2023-04-20 06:58:25', '2023-04-20 06:58:25', '2023-05-20 06:58:25'),
('f40d5a883a8cbc591d4264464036bd9d14164d89002db96753256659743b2ce22d86f1575c231faf', 5, 1, 'authToken', '[]', 0, '2023-10-24 20:59:27', '2023-10-24 20:59:27', '2023-11-24 20:59:27'),
('fa95f732c4da4eb435466acab6c5968eea64359bad796c56cf9e7ee36bb86b5fff7aca4f8c6dd986', 1, 1, 'authToken', '[]', 0, '2023-06-23 17:11:10', '2023-06-23 17:11:10', '2023-07-23 17:11:10'),
('fbc430e97c7287729f50ec19f224f11a8237282fe0e368871af43428634f78695a32aaa21586cd74', 1, 1, 'authToken', '[]', 0, '2023-07-04 15:02:20', '2023-07-04 15:02:20', '2023-08-04 15:02:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'uvvAmgfMQOedXoONNYDZ5VPUUZDdmr45JzOfxpIp', NULL, 'http://localhost', 1, 0, 0, '2023-04-03 16:37:11', '2023-04-03 16:37:11'),
(2, NULL, 'Laravel Password Grant Client', 'zAxprXc0lgvx0dr4smz4Z3zN5GDexrqg2Gf8FvXO', 'users', 'http://localhost', 0, 1, 0, '2023-04-03 16:37:11', '2023-04-03 16:37:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-04-03 16:37:11', '2023-04-03 16:37:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participants`
--

CREATE TABLE `participants` (
  `participant_id` bigint(20) UNSIGNED NOT NULL,
  `monthly_tour_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `seats` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `ammount_deposited` double(8,2) NOT NULL,
  `missing_amount` double(8,2) NOT NULL,
  `responsable` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tour_catalogues`
--

CREATE TABLE `tour_catalogues` (
  `tour_catalogues_id` bigint(20) UNSIGNED NOT NULL,
  `tour_name` varchar(255) NOT NULL,
  `tour_destiny` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `include` text NOT NULL,
  `cost_1` double(8,2) NOT NULL,
  `cost_2` double(8,2) NOT NULL,
  `cost_3` double(8,2) NOT NULL,
  `cost_4` double(8,2) NOT NULL,
  `img_1` varchar(255) NOT NULL,
  `img_2` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `type` varchar(255) NOT NULL,
  `dificulty` varchar(255) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `discount_description` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `messagge_for_contact` varchar(255) NOT NULL,
  `varchar_1` varchar(255) DEFAULT NULL,
  `varchar_2` varchar(255) DEFAULT NULL,
  `varchar_3` varchar(255) DEFAULT NULL,
  `last_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tour_catalogues`
--

INSERT INTO `tour_catalogues` (`tour_catalogues_id`, `tour_name`, `tour_destiny`, `description`, `include`, `cost_1`, `cost_2`, `cost_3`, `cost_4`, `img_1`, `img_2`, `state`, `type`, `dificulty`, `discount`, `discount_description`, `contact_phone`, `messagge_for_contact`, `varchar_1`, `varchar_2`, `varchar_3`, `last_user`, `created_at`, `updated_at`) VALUES
(1, 'PON A PRUEBA TU MENTE Y CUERPO', 'ALTAR - LAGUNA AMARILLA', '🏕️ ¿Quieres vivir una aventura inolvidable en medio de la naturaleza? ¡Te invitamos a nuestro camping en el Nevado El Altar y su hermosa Laguna Amarilla! ⛺.\r\nDesconecta del estrés de la ciudad y reconéctate con la naturaleza en una de las zonas más impresionantes de Ecuador. ¡Reserva ahora tu lugar en nuestro camping en el Nevado El Altar y su Laguna Amarilla! 🏞️🛍️', 'Transporte desde Riobamba, Desayuno Sábado, Cena Sábado, Desayuno Domingo, Guia, Mula de Carga para Equipo de Camping, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico.', 250.00, 130.00, 100.00, 75.00, 'catalogue/IPF20poxIaDiseño sin título (9).png', 'catalogue/dnEFKxpWviDiseño sin título (10).png', 1, 'Camping', 'Moderada - Alta', 0.00, 'Ninguno', '0961119670', 'Hola, me ayudan con informacion para el camping en el Altar vi esta publicación en la web', NULL, NULL, NULL, NULL, '2023-04-17 19:26:54', '2023-06-03 08:49:15'),
(2, 'CAMPING SOBRE LAS NUBES', 'CERRO PUÑAY', '¡Vive una aventura única en el cerro Puñay con nuestro camping sobre las nubes! 🏕️🌤️🌄 Descubre paisajes mágicos, respira aire puro y admira vistas panorámicas impresionantes. ¡No te pierdas la oportunidad de acampar en la cima! Reserva tu lugar ahora. 🌟🌲☁️🏞️', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogata, Charla Astronómica.', 100.00, 60.00, 45.00, 40.00, 'catalogue/rY9rd5maFrDiseño sin título (11).png', 'catalogue/NP2s69j6HpDiseño sin título (12).png', 1, 'Camping', 'Moderada', 0.00, 'Ninguno', '0997159098', 'Hola me gustaría informacion de la ruta de su catalogo hacia el Puñay', NULL, NULL, NULL, NULL, '2023-04-18 23:07:01', '2023-06-05 23:42:58'),
(3, 'GARGANTA DE FUEGO', 'TUNGURAHUA', '¡Únete a nosotros en una aventura inolvidable en el Volcán Tungurahua! 🌋🏞️ Disfruta de paisajes espectaculares y descansa en el refugio de montaña después de un día de exploración. 🏕️🌟 Este tour de 2 días te permitirá sumergirte en la naturaleza y admirar la majestuosidad del volcán. ¡No te lo pierdas! Reserva tu lugar ahora. 🙌🌄🌌', 'Transporte desde Baños, Cena Sábado, Desayuno Domingo, Estadía en el refugio, Sleeping, Casco, Crampones, Guia, Recuerdo de Ruta', 180.00, 99.00, 99.00, 99.00, 'catalogue/jLxa7SGRLHDiseño sin título (14).png', 'catalogue/aqPJGWjSjMDiseño sin título (13).png', 1, 'Camping', 'Alta', 0.00, '0', '0993786135', 'Hola me gustaría tener información para la ruta al Tungurahua. Vi esto en la web', NULL, NULL, NULL, NULL, '2023-04-19 11:23:38', '2023-06-03 08:57:11'),
(4, 'AGUAS TERMALES DEL CHIMBORAZO +', 'Laguna Congelada Carihuairazo', '¡Ven y disfruta de una experiencia única en los Andes ecuatorianos con nuestro tour de 2 días! 🌋🏞️🌡️ Sumérgete en las aguas termales del majestuoso Volcán Chimborazo y visita la impresionante Laguna Congelada del Carihuairazo. 🏊❄️ Después de un día lleno de aventuras, descansa en nuestro acogedor refugio de montaña rodeado de paisajes increíbles. 🏕️🌟 ¡No pierdas la oportunidad de vivir una experiencia única en la naturaleza! Reserva tu lugar ahora. 🙌🌄🌌', 'Transporte desde Riobamba, Desayuno Sábado, Box Lounch Sábado Desayuno, Cena Sábado, Desayuno Domingo, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Guianza, Costo de Ingreso al Carihuirazo, Costo de Ingreso a Aguas Termales.', 205.00, 123.00, 94.00, 70.00, 'catalogue/NgjCHnciN9Diseño sin título (15).png', 'catalogue/2E1xjpHK8EDiseño sin título (16).png', 1, 'Camping', 'Moderada', 0.00, '0', '0993786135', 'Hola me gustaría tener información para la ruta al Carihuairazo. Vi esto en la web', NULL, NULL, NULL, NULL, '2023-04-19 11:32:52', '2023-06-03 08:59:59'),
(5, 'VISITANDO EL CRATER DE UN VOLCÁN', 'QUILOTOA', '🏕️ ¡Descubre la magia del cráter del volcán Quilotoa en nuestro camping de dos días y una noche! 🌋⛺️\r\n\r\n🌄 Sumérgete en la belleza natural de este volcán extinto y disfruta de vistas impresionantes. 🌈🌌\r\n\r\n🥾 Explora senderos escénicos, admira la majestuosidad del cráter y conecta con la energía de la naturaleza. 🌿🌞\r\n\r\n✨ Vive una experiencia única en el corazón de los Andes, rodeado de paisajes cautivadores y tranquilidad absoluta. ¡No hay mejor manera de escapar de la rutina! 🏞️🌿\r\n\r\n¡Únete a nosotros en esta aventura inolvidable en el cráter del volcán Quilotoa! ¡Reserva ahora y vive una experiencia que te dejará sin aliento! 🌋', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogara, Charla Astronómica.', 97.00, 55.00, 41.00, 40.00, 'catalogue/u1GSKL1ySxDiseño sin título (17).png', 'catalogue/bQWiYuih3DDiseño sin título (19).png', 1, 'Camping', 'Moderada - Fácil', 0.00, 'Ninguna', '091119670', 'Hola me gustaría reservar mi cupo para la ruta al Quilotoa', NULL, NULL, NULL, NULL, '2023-06-03 09:13:50', NULL),
(6, 'AGUAS TERMALES +', 'CHIMBORAZO', '🌄 ¡Explora la majestuosidad del Nevado Chimborazo y sumérgete en las relajantes aguas termales! 🏔️🌊\r\n\r\n🥾 Únete a nuestro tour de un día y déjate sorprender por la imponente belleza de la montaña más alta de Ecuador. 🌟❄️\r\n\r\n🚶‍♀️ Recorreremos senderos impresionantes, maravillándonos con los paisajes de ensueño que nos rodean. 🏞️🌿\r\n\r\n💧 Después de una jornada de exploración, nos sumergiremos en las aguas termales para relajar cuerpo y mente. 🧖‍♀️💦\r\n\r\n¡Prepárate para una experiencia inolvidable en la cima de los Andes! 🗻✨', 'Transporte desde Riobamba, Guía, Desayuno Sábado, Box Lounch, Ingreso a Aguas Termales, Ingreso a reserva chimborazo, Visita Primer y segundo Refugio, Visita Condor Cocha, Canelazo Tradicional, Parádas fotográficas, Recuerdo de Ruta', 131.00, 75.00, 53.00, 42.00, 'catalogue/2nOWlA4IOVDiseño sin título (20).png', 'catalogue/vVzWVGAHWjDiseño sin título (21).png', 1, 'Camping', 'Moderada - Fácil', 0.00, 'Ninguna', '091119670', 'Hola me gustaría reservar mi cupo para la ruta al Quilotoa', NULL, NULL, NULL, NULL, '2023-06-03 09:29:25', NULL),
(7, 'CAMINANDO ENTRE MONTAÑAS', 'OJO DEL FANTASMA', '🏕️ ¡Vive una experiencia mágica en el Ojo del Fantasma, en las faldas del imponente Volcán Tungurahua! 👻🌋\r\n\r\n🌄 Únete a nuestro camping de dos días y una noche y adéntrate en un mundo lleno de misterio y encanto. 🌌🌿\r\n\r\n🌟 Disfruta de un entorno natural único, rodeado de exuberante vegetación y paisajes impresionantes. 🏞️🌿\r\n\r\n🏕️ Acampa bajo el cielo estrellado, mientras el Volcán Tungurahua custodia tus sueños. 🌠⛺️\r\n\r\n🔥 Comparte historias alrededor de la fogata, conecta con la naturaleza y crea recuerdos inolvidables. 🔥🌌\r\n\r\n¡No pierdas la oportunidad de vivir esta experiencia única en el Ojo del Fantasma! 🏕️✨', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogara, Charla Astronómica.', 119.00, 67.00, 49.00, 40.00, 'catalogue/MFUP3DoUScDiseño sin título (22).png', 'catalogue/oXPIKBT6LzDiseño sin título (23).png', 1, 'Camping', 'Moderada - Fácil', 0.00, 'Ninguna', '091119670', 'Hola me gustaría reservar mi cupo para la ruta al Ojo del Fantasma', NULL, NULL, NULL, NULL, '2023-06-03 09:37:24', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `external_id` varchar(255) DEFAULT NULL,
  `external_auth` varchar(255) DEFAULT NULL,
  `ci` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `cellphone` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `rol` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `external_id`, `external_auth`, `ci`, `name`, `last_name`, `country`, `city`, `cellphone`, `img`, `rol`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 'Administrador', 'Sistema', NULL, NULL, NULL, NULL, 'admin', 'adminsistema@gmail.com', NULL, '$2y$10$l7GOHEZeR0avHd8rxPfZUerUyYUjKzBZcKQttkYvGP04erOZY27pi', NULL, '2023-04-03 16:37:37', '2023-04-03 16:37:37'),
(2, NULL, NULL, NULL, 'Luis', 'Yumiseba', NULL, NULL, NULL, NULL, 'admin', 'luisyumiseba@gmail.com', NULL, '$2y$10$9i/yI16Lc6IGhdq0ebGg8.AhANbJhCiR5tDFU8fnb0BzLYzZwq1Kq', NULL, '2023-04-13 08:32:14', '2023-04-13 08:32:14'),
(3, NULL, NULL, NULL, 'Jhon', 'Santos', NULL, NULL, NULL, NULL, 'admin', 'jhonsantos@gmail.com', NULL, '$2y$10$/IquL/6jmEViRbKTevSPGe1tT5/zAm3oIXH9f.ljUl49AgYjl4LVK', NULL, '2023-04-13 08:33:09', '2023-04-13 08:33:09'),
(4, NULL, NULL, NULL, 'Darío', 'Janeta', NULL, NULL, NULL, NULL, 'admin', 'dariojaneta@gmail.com', NULL, '$2y$10$4vbBkz5b5lGq0ivX8POdq.nh5U8OZu5yU51MCvhmTyJehLS7T70Sq', NULL, '2023-04-13 08:33:53', '2023-04-13 08:33:53'),
(5, NULL, NULL, NULL, 'Darío', 'Janeta', NULL, NULL, NULL, NULL, 'admin', 'adminsistem@gmail.com', NULL, '$2y$10$UiFhuOzfFxtLOCPTihdSlu3aACNaXz680mfj0HEPFJIU7kIC/gcca', NULL, '2023-06-25 13:09:56', '2023-06-25 13:09:56');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`bank_accounts_id`);

--
-- Indices de la tabla `bank_accounts_tours`
--
ALTER TABLE `bank_accounts_tours`
  ADD PRIMARY KEY (`bank_account_tour_id`);

--
-- Indices de la tabla `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipment_id`);

--
-- Indices de la tabla `equipment_rents`
--
ALTER TABLE `equipment_rents`
  ADD PRIMARY KEY (`equipment_rent_id`);

--
-- Indices de la tabla `expenses_tours`
--
ALTER TABLE `expenses_tours`
  ADD PRIMARY KEY (`expense_tour_id`);

--
-- Indices de la tabla `exposition_tours`
--
ALTER TABLE `exposition_tours`
  ADD PRIMARY KEY (`exposition_tour_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indices de la tabla `incomes_tours`
--
ALTER TABLE `incomes_tours`
  ADD PRIMARY KEY (`income_tour_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `monthly_tours`
--
ALTER TABLE `monthly_tours`
  ADD PRIMARY KEY (`monthly_tour_id`);

--
-- Indices de la tabla `monthly_tours_users`
--
ALTER TABLE `monthly_tours_users`
  ADD PRIMARY KEY (`monthly_tour_user_id`);

--
-- Indices de la tabla `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indices de la tabla `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`participant_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `tour_catalogues`
--
ALTER TABLE `tour_catalogues`
  ADD PRIMARY KEY (`tour_catalogues_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `bank_accounts_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bank_accounts_tours`
--
ALTER TABLE `bank_accounts_tours`
  MODIFY `bank_account_tour_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `equipment_rents`
--
ALTER TABLE `equipment_rents`
  MODIFY `equipment_rent_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `expenses_tours`
--
ALTER TABLE `expenses_tours`
  MODIFY `expense_tour_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `exposition_tours`
--
ALTER TABLE `exposition_tours`
  MODIFY `exposition_tour_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galleries`
--
ALTER TABLE `galleries`
  MODIFY `gallery_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `incomes_tours`
--
ALTER TABLE `incomes_tours`
  MODIFY `income_tour_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `monthly_tours`
--
ALTER TABLE `monthly_tours`
  MODIFY `monthly_tour_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `monthly_tours_users`
--
ALTER TABLE `monthly_tours_users`
  MODIFY `monthly_tour_user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `participants`
--
ALTER TABLE `participants`
  MODIFY `participant_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tour_catalogues`
--
ALTER TABLE `tour_catalogues`
  MODIFY `tour_catalogues_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
