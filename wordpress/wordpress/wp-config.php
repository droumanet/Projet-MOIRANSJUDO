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
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'Obituary' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '33445148' );

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
define( 'AUTH_KEY',         'ozKBX9@x.{2V+yLrZ0)gN]9`KM_$)&J=5RfFAYm@X@MQ<YE3:j9vZ#~=.Vff:V23' );
define( 'SECURE_AUTH_KEY',  '_3 66&WWm)=J?H?!^uBpZ,|2x!tUxLcTmB8PJdX) :$8;G mFtIldjc}WeMn}:o^' );
define( 'LOGGED_IN_KEY',    'jb>=E1DO_R]/oQ&JW!^M/7CkFP(~9P%!Ob8Q?F+Z)$|GJ[SqN7;[[JvtTHo<a;+r' );
define( 'NONCE_KEY',        '=#SG<!~.%@A8{*!&eAwF%2W|RSr*9I]E*iIlSg]@o$)yz97jZHh{x+}d,mrVb&Jk' );
define( 'AUTH_SALT',        'HB79sMbnz}N|)u1I>_`ahC?sZ8A?4[:t%4kUbn9ARYYVaUYo0(.khKbek2B1HYt,' );
define( 'SECURE_AUTH_SALT', ']TN^6_VwPC5iO|hQg]%vU `G&;XanD1)7(qhNzF}4{oTxG6b!%jnFD/$-m]GAl@5' );
define( 'LOGGED_IN_SALT',   'F>&avzI%na2Kd.^kgk8zm?p#,Y*W=6;k[=y1C*e 9w}-fm5 _xm6NC*t<n#gt%F&' );
define( 'NONCE_SALT',       '/+_=Z0M`>VNzYnkRk}i36FuSKuJuJs?2$F2C7$T?:7:AssCg!?Y8!@Bt&#6U.CnB' );
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
 * Il est fortemment recommandé que les développeurs d’extensions et
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
