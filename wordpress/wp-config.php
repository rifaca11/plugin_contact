<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'plugin' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'G uHf+3xnXO4ll5H_3msm[TVccb=zJ}VNzcbW84V/Dc_bz:etA3[cq6GW^+Cvnjs' );
define( 'SECURE_AUTH_KEY',  'i*Z;F(]QF-!9%D2=VZE&ufZ5y{{2p4kIHrl Zp+=c}S{Hgb`+%r.|ZM)7SrbQ:GN' );
define( 'LOGGED_IN_KEY',    ']t!:a_ )9,H#.Q43w_N:&c4G]C/wK/a}{5Ll>87=z+!{2[A?;N^$/m[=J[_Ql2lk' );
define( 'NONCE_KEY',        '3H/E]Ks3*c<_#`bl,{R5Vn<H=FL6rp06)Br`SGaEp)].V[&)w;Z=>zY,ecuRL)dh' );
define( 'AUTH_SALT',        'B=l@u<J@e$glt}b/y[~p$ [cZ~mw/l:x;g<9ob[P3n9Wu#do;O]%i4Zp6azz45Ha' );
define( 'SECURE_AUTH_SALT', '3h;do8h>Jq{a[nV(zzcT+4KCRVTZgmxL}{6S2{`hoSjL:O;D#9 9#U(8$K(6=o=O' );
define( 'LOGGED_IN_SALT',   '<f).*oy8pfb%;V:60 o!zNvEJfq+-LnkGOl__Z&C{b]E`j3X]vG>.*pU};QywEU=' );
define( 'NONCE_SALT',       'oL_Bx>gd`8V(5<y`R]Auj|zQ>*]9/X0M]6fb[z:Qu@oN<K-cGQ[x1c6@3?_*%M04' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
