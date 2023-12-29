-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-12-2023 a las 20:11:57
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `camping_backup`
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
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `categories_id` bigint(20) UNSIGNED NOT NULL,
  `Description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`categories_id`, `Description`, `created_at`, `updated_at`) VALUES
(1, 'Carpas', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(2, 'Sleepings', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(3, 'Aislantes', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(4, 'Equipos de Cocina', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(5, 'Iluminación', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(6, 'Ropa y Calzado', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(7, 'Herramientas y Cuchillos', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(8, 'Equipo de Senderismo', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(9, 'Seguridad y Primeros Auxilios', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(10, 'Electrónica', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(11, 'Refrigerios', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(12, 'Desayuno', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(13, 'Merienda', '2023-12-29 18:36:48', '2023-12-29 18:36:48');

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
  `inventories_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cost` double(8,2) DEFAULT NULL,
  `img_1` varchar(255) DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `discount_description` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `messagge_for_contact` varchar(255) DEFAULT NULL,
  `cch_points` double(8,2) DEFAULT NULL,
  `varchar_1` varchar(255) DEFAULT NULL,
  `varchar_2` varchar(255) DEFAULT NULL,
  `varchar_3` varchar(255) DEFAULT NULL,
  `last_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Estructura de tabla para la tabla `inventories`
--

CREATE TABLE `inventories` (
  `inventories_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock` double(8,2) DEFAULT NULL,
  `inWarehouse` double(8,2) DEFAULT NULL,
  `withoutWarehouse` double(8,2) DEFAULT NULL,
  `Observation` text DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `varchar2` text DEFAULT NULL,
  `varchar3` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listas`
--

CREATE TABLE `listas` (
  `list_id` bigint(20) UNSIGNED NOT NULL,
  `monthly_tour_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `Description` text DEFAULT NULL,
  `varchar1` text DEFAULT NULL,
  `int1` int(11) DEFAULT NULL,
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
(12, '2022_06_14_074120_create_incomes_tours_table', 1),
(13, '2022_06_14_074200_create_expenses_tours_table', 1),
(14, '2022_06_14_074238_create_bank_accounts_table', 1),
(15, '2022_06_14_074306_create_bank_accounts_tours_table', 1),
(16, '2022_09_18_201603_create_tour_catalogues_table', 1),
(17, '2022_10_11_221452_create_equipment_table', 1),
(18, '2023_01_08_191159_create_equipment_rents_table', 1),
(19, '2023_03_22_154149_create_galleries_table', 1),
(20, '2023_06_27_151131_create_passenger_list_monthly_tours_table', 1),
(21, '2023_06_27_151622_create_passenger_lists_table', 1),
(22, '2023_06_30_193810_create_passengers_table', 1),
(23, '2023_09_09_064759_create_listas_table', 1),
(24, '2023_09_10_184656_create_categories_table', 1),
(25, '2023_09_10_184738_create_products_table', 1),
(26, '2023_09_10_184812_create_inventories_table', 1),
(27, '2023_09_10_190020_create_warehouses_table', 1),
(28, '2023_09_10_190040_create_product_warehouses_table', 1),
(29, '2023_09_10_191436_create_suppliers_table', 1),
(30, '2023_09_16_064402_create_statuses_table', 1),
(31, '2023_11_15_171614_create_produts_list_warehouses_table', 1),
(32, '2023_11_17_111401_create_request_products_to_warehouses_table', 1),
(33, '2023_11_20_170946_create_request_complete_products_table', 1);

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
  `discount` double(8,2) DEFAULT NULL,
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
(1, NULL, 'Laravel Personal Access Client', 'gSUFQ7acNtpEh4WKWK1r6iVKNz8DyjQ3NgJLPkHf', NULL, 'http://localhost', 1, 0, 0, '2023-12-29 18:32:55', '2023-12-29 18:32:55'),
(2, NULL, 'Laravel Password Grant Client', '2yUi1uzrK75oTfqfukIkC4uvjxKu1Ixvp4I5zteD', 'users', 'http://localhost', 0, 1, 0, '2023-12-29 18:32:55', '2023-12-29 18:32:55');

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
(1, 1, '2023-12-29 18:32:55', '2023-12-29 18:32:55');

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
-- Estructura de tabla para la tabla `passengers`
--

CREATE TABLE `passengers` (
  `passenger_id` bigint(20) UNSIGNED NOT NULL,
  `ci` text NOT NULL,
  `name` text NOT NULL,
  `phone` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `correo` text DEFAULT NULL,
  `age` text DEFAULT NULL,
  `born_date` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `passenger_lists`
--

CREATE TABLE `passenger_lists` (
  `passenger_lists_id` bigint(20) UNSIGNED NOT NULL,
  `list_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `seat` int(11) DEFAULT NULL,
  `unit_cost` double(8,2) DEFAULT NULL,
  `total_cost` double(8,2) DEFAULT NULL,
  `collected` double(8,2) DEFAULT NULL,
  `bus_extra` double(8,2) DEFAULT NULL,
  `to_collect` double(8,2) DEFAULT NULL,
  `bank` text DEFAULT NULL,
  `responsable` text DEFAULT NULL,
  `meeting_point` text DEFAULT NULL,
  `observation` text DEFAULT NULL,
  `passenger_type` varchar(255) DEFAULT NULL,
  `id_passenger_group_leader` int(11) DEFAULT NULL,
  `img_cmp_1` varchar(255) DEFAULT NULL,
  `img_cmp_2` varchar(255) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `passenger_list_monthly_tours`
--

CREATE TABLE `passenger_list_monthly_tours` (
  `passenger_list_monthly_tours` bigint(20) UNSIGNED NOT NULL,
  `list_id` int(11) NOT NULL,
  `monthly_tour_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
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
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `buying_price` double(8,2) DEFAULT NULL,
  `min_selling_price` double(8,2) DEFAULT NULL,
  `selling_price` double(8,2) DEFAULT NULL,
  `rent_price` double(8,2) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `img` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_warehouses`
--

CREATE TABLE `product_warehouses` (
  `product_warehouses_id` bigint(20) UNSIGNED NOT NULL,
  `inventories_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_status_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `observation` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produts_list_warehouses`
--

CREATE TABLE `produts_list_warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request_complete_products`
--

CREATE TABLE `request_complete_products` (
  `request_complete_products_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `status_request` text DEFAULT NULL,
  `status_acquisition` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request_products_to_warehouses`
--

CREATE TABLE `request_products_to_warehouses` (
  `request_products_to_warehouses_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity_products` int(11) NOT NULL,
  `request_complete_products_id` int(11) NOT NULL,
  `product_warehouses_id` int(11) NOT NULL,
  `status` text DEFAULT NULL,
  `unit_price` double(8,2) DEFAULT NULL,
  `total_price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `statuses`
--

CREATE TABLE `statuses` (
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `category_status` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `statuses`
--

INSERT INTO `statuses` (`status_id`, `description`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Nuevo', 'Productos', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(2, 'Bueno', 'Productos', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(3, 'Regular', 'Productos', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(4, 'Malo Funcional', 'Productos', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(5, 'Malo No funcional', 'Productos', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(6, 'No paga nada', 'Pagos de Pasajeros', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(7, 'Pagado Todo', 'Pagos de Pasajeros', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(8, 'Pago Parcial', 'Pagos de Pasajeros', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(9, 'No Aplica - Acompañante', 'Pagos de Pasajeros', '2023-12-29 18:36:48', '2023-12-29 18:36:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suppliers`
--

CREATE TABLE `suppliers` (
  `suppliers_id` bigint(20) UNSIGNED NOT NULL,
  `name_store` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `owner` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `suppliers`
--

INSERT INTO `suppliers` (`suppliers_id`, `name_store`, `phone`, `address`, `owner`, `created_at`, `updated_at`) VALUES
(1, 'Comercial Guacho', '0963124578', 'Riobamba Olmedo y la que cruza', 'Sra Guacho', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(2, 'Titan', '9999999', 'Parque Industrial', 'Gerente titan', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(3, 'Constante', '0963124578', 'Ibarra - Olmedo y la que cruza', 'Diego Constante', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(4, 'Kapak Urku', '0963124578', 'Riobamba - Coliseo', 'Mayor', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(5, 'Dicosavi', '0963124578', 'Riobamba - Guayaquil y 5 de junio', 'Mayor', '2023-12-29 18:36:48', '2023-12-29 18:36:48');

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
(1, 'PON A PRUEBA TU MENTE Y CUERPO', 'ALTAR - LAGUNA AMARILLA', '🏕️ ¿Quieres vivir una aventura inolvidable en medio de la naturaleza? ¡Te invitamos a nuestro camping en el Nevado El Altar y su hermosa Laguna Amarilla! ⛺.\r\nDesconecta del estrés de la ciudad y reconéctate con la naturaleza en una de las zonas más impresionantes de Ecuador. ¡Reserva ahora tu lugar en nuestro camping en el Nevado El Altar y su Laguna Amarilla! 🏞️🛍️', 'Transporte desde Riobamba, Desayuno Sábado, Cena Sábado, Desayuno Domingo, Guia, Mula de Carga para Equipo de Camping, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico.', 250.00, 130.00, 100.00, 75.00, 'catalogue/IPF20poxIaDiseño sin título (9).png', 'catalogue/dnEFKxpWviDiseño sin título (10).png', 1, 'Camping', 'Moderada - Alta', 0.00, 'Ninguno', '0961119670', 'Hola, me ayudan con informacion para el camping en el Altar vi esta publicación en la web', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'CAMPING SOBRE LAS NUBES', 'CERRO PUÑAY', '¡Vive una aventura única en el cerro Puñay con nuestro camping sobre las nubes! 🏕️🌤️🌄 Descubre paisajes mágicos, respira aire puro y admira vistas panorámicas impresionantes. ¡No te pierdas la oportunidad de acampar en la cima! Reserva tu lugar ahora. 🌟🌲☁️🏞️', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogata, Charla Astronómica.', 100.00, 60.00, 45.00, 40.00, 'catalogue/rY9rd5maFrDiseño sin título (11).png', 'catalogue/NP2s69j6HpDiseño sin título (12).png', 1, 'Camping', 'Moderada', 0.00, 'Ninguno', '0997159098', 'Hola me gustaría informacion de la ruta de su catalogo hacia el Puñay', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'GARGANTA DE FUEGO', 'TUNGURAHUA', '¡Únete a nosotros en una aventura inolvidable en el Volcán Tungurahua! 🌋🏞️ Disfruta de paisajes espectaculares y descansa en el refugio de montaña después de un día de exploración. 🏕️🌟 Este tour de 2 días te permitirá sumergirte en la naturaleza y admirar la majestuosidad del volcán. ¡No te lo pierdas! Reserva tu lugar ahora. 🙌🌄🌌', 'Transporte desde Baños, Cena Sábado, Desayuno Domingo, Estadía en el refugio, Sleeping, Casco, Crampones, Guia, Recuerdo de Ruta', 180.00, 99.00, 99.00, 99.00, 'catalogue/jLxa7SGRLHDiseño sin título (14).png', 'catalogue/aqPJGWjSjMDiseño sin título (13).png', 1, 'Camping', 'Alta', 0.00, '0', '0993786135', 'Hola me gustaría tener información para la ruta al Tungurahua. Vi esto en la web', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'AGUAS TERMALES DEL CHIMBORAZO +', 'Laguna Congelada Carihuairazo', '¡Ven y disfruta de una experiencia única en los Andes ecuatorianos con nuestro tour de 2 días! 🌋🏞️🌡️ Sumérgete en las aguas termales del majestuoso Volcán Chimborazo y visita la impresionante Laguna Congelada del Carihuairazo. 🏊❄️ Después de un día lleno de aventuras, descansa en nuestro acogedor refugio de montaña rodeado de paisajes increíbles. 🏕️🌟 ¡No pierdas la oportunidad de vivir una experiencia única en la naturaleza! Reserva tu lugar ahora. 🙌🌄🌌', 'Transporte desde Riobamba, Desayuno Sábado, Box Lounch Sábado Desayuno, Cena Sábado, Desayuno Domingo, Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Guianza, Costo de Ingreso al Carihuirazo, Costo de Ingreso a Aguas Termales.', 205.00, 123.00, 94.00, 70.00, 'catalogue/NgjCHnciN9Diseño sin título (15).png', 'catalogue/2E1xjpHK8EDiseño sin título (16).png', 1, 'Camping', 'Moderada', 0.00, '0', '0993786135', 'Hola me gustaría tener información para la ruta al Carihuairazo. Vi esto en la web', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'VISITANDO EL CRATER DE UN VOLCÁN', 'QUILOTOA', '🏕️ ¡Descubre la magia del cráter del volcán Quilotoa en nuestro camping de dos días y una noche! 🌋⛺️\r\n\r\n🌄 Sumérgete en la belleza natural de este volcán extinto y disfruta de vistas impresionantes. 🌈🌌\r\n\r\n🥾 Explora senderos escénicos, admira la majestuosidad del cráter y conecta con la energía de la naturaleza. 🌿🌞\r\n\r\n✨ Vive una experiencia única en el corazón de los Andes, rodeado de paisajes cautivadores y tranquilidad absoluta. ¡No hay mejor manera de escapar de la rutina! 🏞️🌿\r\n\r\n¡Únete a nosotros en esta aventura inolvidable en el cráter del volcán Quilotoa! ¡Reserva ahora y vive una experiencia que te dejará sin aliento! 🌋', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogara, Charla Astronómica.', 97.00, 55.00, 41.00, 40.00, 'catalogue/u1GSKL1ySxDiseño sin título (17).png', 'catalogue/bQWiYuih3DDiseño sin título (19).png', 1, 'Camping', 'Moderada - Fácil', 0.00, 'Ninguna', '091119670', 'Hola me gustaría reservar mi cupo para la ruta al Quilotoa', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'AGUAS TERMALES +', 'CHIMBORAZO', '🌄 ¡Explora la majestuosidad del Nevado Chimborazo y sumérgete en las relajantes aguas termales! 🏔️🌊\r\n\r\n🥾 Únete a nuestro tour de un día y déjate sorprender por la imponente belleza de la montaña más alta de Ecuador. 🌟❄️\r\n\r\n🚶‍♀️ Recorreremos senderos impresionantes, maravillándonos con los paisajes de ensueño que nos rodean. 🏞️🌿\r\n\r\n💧 Después de una jornada de exploración, nos sumergiremos en las aguas termales para relajar cuerpo y mente. 🧖‍♀️💦\r\n\r\n¡Prepárate para una experiencia inolvidable en la cima de los Andes! 🗻✨', 'Transporte desde Riobamba, Guía, Desayuno Sábado, Box Lounch, Ingreso a Aguas Termales, Ingreso a reserva chimborazo, Visita Primer y segundo Refugio, Visita Condor Cocha, Canelazo Tradicional, Parádas fotográficas, Recuerdo de Ruta', 131.00, 75.00, 53.00, 42.00, 'catalogue/2nOWlA4IOVDiseño sin título (20).png', 'catalogue/vVzWVGAHWjDiseño sin título (21).png', 1, 'Camping', 'Moderada - Fácil', 0.00, 'Ninguna', '091119670', 'Hola me gustaría reservar mi cupo para la ruta al Quilotoa', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'CAMINANDO ENTRE MONTAÑAS', 'OJO DEL FANTASMA', '🏕️ ¡Vive una experiencia mágica en el Ojo del Fantasma, en las faldas del imponente Volcán Tungurahua! 👻🌋\r\n\r\n🌄 Únete a nuestro camping de dos días y una noche y adéntrate en un mundo lleno de misterio y encanto. 🌌🌿\r\n\r\n🌟 Disfruta de un entorno natural único, rodeado de exuberante vegetación y paisajes impresionantes. 🏞️🌿\r\n\r\n🏕️ Acampa bajo el cielo estrellado, mientras el Volcán Tungurahua custodia tus sueños. 🌠⛺️\r\n\r\n🔥 Comparte historias alrededor de la fogata, conecta con la naturaleza y crea recuerdos inolvidables. 🔥🌌\r\n\r\n¡No pierdas la oportunidad de vivir esta experiencia única en el Ojo del Fantasma! 🏕️✨', 'Guia, Ticket de ingreso, Cena Sábado, Desayuno Domingo,  Carpa de Media-Alta montaña, Sleeping Bag, Aislante Térmico, Fogara, Charla Astronómica.', 119.00, 67.00, 49.00, 40.00, 'catalogue/MFUP3DoUScDiseño sin título (22).png', 'catalogue/oXPIKBT6LzDiseño sin título (23).png', 1, 'Camping', 'Moderada - Fácil', 0.00, 'Ninguna', '091119670', 'Hola me gustaría reservar mi cupo para la ruta al Ojo del Fantasma', NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, NULL, NULL, NULL, 'Administrador', 'Sistema', NULL, NULL, NULL, NULL, 'admin', 'adminsistema@gmail.com', NULL, '$2y$10$iy6ZrJ2Cg4/I6aA/q51kmeIDw5Qm81Nr8rrunikOQoe5uiJC9VQ3u', NULL, '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(2, NULL, NULL, NULL, 'Darío', 'Janeta', NULL, NULL, NULL, NULL, 'guide', 'dariojaneta@gmail.com', NULL, '$2y$10$DFne9mnkcWWbMY1a/W1p5u.jNoEWdefV70fMzegUXV8ghm1TkbdHO', NULL, '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(3, NULL, NULL, NULL, 'Luis', 'Yumiseba', NULL, NULL, NULL, NULL, 'guide', 'luisyumiseba@gmail.com', NULL, '$2y$10$5.So7IeFiEjqG51IgG9Sv.AA9qNG/mxa2j8NH.O/Dw215yhdaMJaG', NULL, '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(4, NULL, NULL, NULL, 'John', 'Santos', NULL, NULL, NULL, NULL, 'guide', 'johnsantos@gmail.com', NULL, '$2y$10$aXUmmFSz5ofOb5oU4kN.2OF89.Igk7ZfW.pNwbw0e1vWeZKbIJ/uK', NULL, '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(5, NULL, NULL, NULL, 'María', 'Paca', NULL, NULL, NULL, NULL, 'shopkeeper', 'mariapaca@gmail.com', NULL, '$2y$10$gKq1vREynnooeQLfxd0s8uKRjvh.4zPdJ.S560EX9wMvLpdVKtH8y', NULL, '2023-12-29 18:36:48', '2023-12-29 18:36:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `warehouses`
--

CREATE TABLE `warehouses` (
  `warehouse_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `observation` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `warehouses`
--

INSERT INTO `warehouses` (`warehouse_id`, `description`, `address`, `phone`, `observation`, `created_at`, `updated_at`) VALUES
(1, 'General', 'Oficina CCH', '0961119670', 'Aquí están las cosas para alquilar y vender', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(2, 'Bodega Dario', 'Tierra Nueva', '0961119670', '', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(3, 'Bodega Jhon', 'Mercado la esperanza', '0997159098', '', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(4, 'Bodega Luis', 'Complejo la Panadería', '0993786135', 'Bodega casa Luchin', '2023-12-29 18:36:48', '2023-12-29 18:36:48'),
(5, 'Bodega Alimentación', 'Redondel del Libro', '0995300403', 'Mamá Darío - María Paca', '2023-12-29 18:36:48', '2023-12-29 18:36:48');

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
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

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
-- Indices de la tabla `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`inventories_id`);

--
-- Indices de la tabla `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`list_id`);

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
-- Indices de la tabla `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`passenger_id`),
  ADD UNIQUE KEY `passengers_ci_unique` (`ci`) USING HASH;

--
-- Indices de la tabla `passenger_lists`
--
ALTER TABLE `passenger_lists`
  ADD PRIMARY KEY (`passenger_lists_id`);

--
-- Indices de la tabla `passenger_list_monthly_tours`
--
ALTER TABLE `passenger_list_monthly_tours`
  ADD PRIMARY KEY (`passenger_list_monthly_tours`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indices de la tabla `product_warehouses`
--
ALTER TABLE `product_warehouses`
  ADD PRIMARY KEY (`product_warehouses_id`);

--
-- Indices de la tabla `produts_list_warehouses`
--
ALTER TABLE `produts_list_warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `request_complete_products`
--
ALTER TABLE `request_complete_products`
  ADD PRIMARY KEY (`request_complete_products_id`);

--
-- Indices de la tabla `request_products_to_warehouses`
--
ALTER TABLE `request_products_to_warehouses`
  ADD PRIMARY KEY (`request_products_to_warehouses_id`);

--
-- Indices de la tabla `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`status_id`);

--
-- Indices de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`suppliers_id`);

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
-- Indices de la tabla `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`warehouse_id`);

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
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `equipment_rents`
--
ALTER TABLE `equipment_rents`
  MODIFY `equipment_rent_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `inventories`
--
ALTER TABLE `inventories`
  MODIFY `inventories_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `listas`
--
ALTER TABLE `listas`
  MODIFY `list_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `monthly_tours`
--
ALTER TABLE `monthly_tours`
  MODIFY `monthly_tour_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `passengers`
--
ALTER TABLE `passengers`
  MODIFY `passenger_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `passenger_lists`
--
ALTER TABLE `passenger_lists`
  MODIFY `passenger_lists_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `passenger_list_monthly_tours`
--
ALTER TABLE `passenger_list_monthly_tours`
  MODIFY `passenger_list_monthly_tours` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product_warehouses`
--
ALTER TABLE `product_warehouses`
  MODIFY `product_warehouses_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `produts_list_warehouses`
--
ALTER TABLE `produts_list_warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `request_complete_products`
--
ALTER TABLE `request_complete_products`
  MODIFY `request_complete_products_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `request_products_to_warehouses`
--
ALTER TABLE `request_products_to_warehouses`
  MODIFY `request_products_to_warehouses_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `statuses`
--
ALTER TABLE `statuses`
  MODIFY `status_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `suppliers_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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

--
-- AUTO_INCREMENT de la tabla `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `warehouse_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
