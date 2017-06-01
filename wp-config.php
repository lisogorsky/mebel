<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'a201885_1');

/** Имя пользователя MySQL */
define('DB_USER', 'a201885_1');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'okFrU39nfr');

/** Имя сервера MySQL */
define('DB_HOST', 'a201885.mysql.mchost.ru');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '9u@8db3X3x}=Dg/7YXry2211aW U/dm1nk5J__8,@#tAn?i*/d7;)ageAumJp6;3');
define('SECURE_AUTH_KEY',  '4ieenr?b&P~D>@H!6CR<TqCJxg?Ox`HIG33oM1P=XbHURCX{ZC Sx>f~p5A<^nIQ');
define('LOGGED_IN_KEY',    '_kTrU..zvMCSh25[f;1gp+SOl1,F>pKn2[&}kWZoY1Gtb{2u::k/>*XB<_:z6dXr');
define('NONCE_KEY',        '1.@hZ,8kk~/k}m$9vo3l+ui5F$@7X/9_8}L<D=fZ@!tFc.5x?#dcOcqp_YFR)eAv');
define('AUTH_SALT',        'oPSID)Z,6n=UW*@ho`Q,gxu 8+{l6EDk^X!U`d[4mwefR#4D1*Q87[gy_qGhYzv+');
define('SECURE_AUTH_SALT', '^Ow K5&qX=r=Y)LJm<@z,qHJg/yk&[%m7EJF%JEFfr@ezRi6.74j58LH-oLyfT]1');
define('LOGGED_IN_SALT',   'i9Uf<5.-D?z|=jFU<2-jo@58&Cm!frw`LjN~h1;S=1;,#22@MJ(&-fVF|+:H[=x6');
define('NONCE_SALT',       '|7jS>ipj%qI_>,wTfDbLV$/]O}lqqaP<w*L~6vFlawv9CWAt6y*B^cO|Vd]6?JYl');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'p22eb_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
