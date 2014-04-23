<?php
# SHORTS
# DIRECTORY SEPARATOR
define( 'DS', DIRECTORY_SEPARATOR );
# PATH SEPARATOR
define( 'PS', PATH_SEPARATOR );

# Absolute path to the WordPress directory.
if ( defined( 'ABSPATH' ) )
	exit( "Your current environment already uses the <code>ABSPATH</code> constant." );
define( 'ABSPATH', dirname( __FILE__ ).DS );


# LOCAL CONFIG #
# Error Reporting Level: Choose your taste
# ==================================
# PHP errors & log
error_reporting(
	E_ALL
	| E_CORE_ERROR
	| E_CORE_WARNING
	| E_COMPILE_ERROR
	| E_ERROR
	| E_PARSE
	| E_RECOVERABLE_ERROR
	| E_STRICT
	| E_USER_ERROR
	| E_USER_WARNING
	| E_WARNING
);
@ini_set( 'display_errors',          'On' );
@ini_set( 'log_errors',              'Off' );

# ==================================
# DB
define( 'DB_NAME',                  'vagrant.local' );
define( 'DB_USER',                  'root' );
define( 'DB_PASSWORD',              'root' );
//*
define( 'DB_HOST',                  'localhost' );
/*/
# MySQL sockets
define( 'DB_HOST',                  ':/var/lib/mysql/mysql.sock' );
/**/

global $table_prefix;
$table_prefix = 'dad_';

# Database Charset to use in creating database tables.
define( 'DB_CHARSET',             'utf8' );
# The Database Collate type. Don't change this if in doubt.
define( 'DB_COLLATE',             '' );

# ==================================
define( 'AUTOSAVE_INTERVAL',      3600 );  // autosave 1x per hour
define( 'EMPTY_TRASH_DAYS',       0 );     // zero days
define( 'WP_POST_REVISIONS',      false ); // no revisions
# Allows you to skip new bundles files like plugins and/or themes on upgrades.
# Skip wp-content when upgrading to a new WordPress version.
define( 'CORE_UPGRADE_SKIP_NEW_BUNDLED', true );
# Deactivates the cron function of WordPress.
define( 'DISABLE_WP_CRON',        false );
# Defines a period of time in which only one cronjob will be fired.
# time in seconds (Default: 60)
define( 'WP_CRON_LOCK_TIMEOUT',   60 );

# Defines a period of time in which only one mail request can be done.
# time in seconds (Default: 300)
define( 'WP_MAIL_INTERVAL',       300 );

# Allows you to change the maximum memory limit
# for some WordPress functions.
# Default: 256M
define( 'WP_MAX_MEMORY_LIMIT',    '256M' );
# Defines the memory limit for WordPress.
# Default: 32M, for Multisite 64M
defined( 'WP_MEMORY_LIMIT' ) OR define( 'WP_MEMORY_LIMIT', '128M' );
if (
	function_exists( 'memory_get_usage' )
	AND ( abs( (int) @ini_get( 'memory_limit' ) ) < abs( (int) WP_MEMORY_LIMIT ) )
)
	@ini_set( 'memory_limit', WP_MEMORY_LIMIT );

# Default THEME
define( 'WP_DEFAULT_THEME',       'default' );

# ==================================
# PATHES & URLs
define( 'WP_SITEURL',             'http://vagrant.local' );
define( 'WP_HOME',                WP_SITEURL );

define( 'WP_CONTENT_DIR_NAME',    'wp-content' );
define( 'WP_CONTENT_DIR',         ABSPATH.WP_CONTENT_DIR_NAME );
define( 'WP_CONTENT_URL',         WP_SITEURL.'/'.WP_CONTENT_DIR_NAME );

/*
# Only works if the dir is pre existing
# May depend on hoster settings as well
define( 'WP_TEMP_DIR',            WP_CONTENT_DIR.DS.'tmp' );
/**/

# ==================================
# UI LANGUAGE
define( 'WPLANG',                 'en_EN' );
# UI LANGUAGE DIR
define( 'WP_LANG_DIR',            WP_CONTENT_DIR.DS.'languages' );
# Old UI LANGUAGE DIR
define( 'LANGDIR',                WP_LANG_DIR );

# ==================================
# (De)activates the trash bin function for media.
# (Default: false)
define( 'MEDIA_TRASH',            false );

# Disallow theme and plugin edits via WordPress editor.
define( 'DISALLOW_FILE_EDIT',     false );
# Disallow the editing, updating, installing and deleting
# of plugins, themes and core files via WordPress Backend.
# Files in uploads are excepted. Handles the capability.
define( 'DISALLOW_FILE_MODS',     false );

# Disallow unfiltered_html for all users, even admins and super admins
define( 'DISALLOW_UNFILTERED_HTML', true );
# Allow uploads of filtered file types to users with administrator role
define( 'ALLOW_UNFILTERED_UPLOADS', true );

# Allows WordPress to override an image after
# editing - or to save the image as a copy.
define( 'IMAGE_EDIT_OVERWRITE',   false );

/*
# MU SETUP
$base = '/';
# Allows you to install Multisite in a subdirectory.
define( 'ALLOW_SUBDIRECTORY_INSTALL', true );
# Will be defined if Multisite is used.
define( 'MULTISITE',              true );
### Uncomment the lower part to INSTALL the network
### comment afterwards
# When defined the multisite function will be accessible (Tools → Network Setup).
define( 'WP_ALLOW_MULTISITE',     true );
# Defines if it's a subdomain install or not.
define( 'SUBDOMAIN_INSTALL',      true );
# Domain of the main site.
define( 'DOMAIN_CURRENT_SITE',    'vagrant.local' );
# Blog ID of the main site.
define( 'BLOG_ID_CURRENT_SITE',   1 );
# Network ID of the main site.
define( 'SITE_ID_CURRENT_SITE',   1 );
# Path to the main site.
define( 'PATH_CURRENT_SITE',      '/' );
/**/

/**
# MU: UPLOAD pathes. Can't get defined in here, as $wpdb isn't set.
# Path to the upload base dir, relative to ABSPATH.
# Default: wp-content/blogs.dir
define( 'UPLOADBLOGSDIR',         str_replace( ABSPATH, '', WP_CONTENT_DIR ).DS.'blogs.dir' );
# Path to site specific upload dir, relative to ABSPATH.
# Default: UPLOADBLOGSDIR/{blogid}/files/
define( 'UPLOADS',                UPLOADBLOGSDIR.DS.BLOG_ID_CURRENT_SITE.DS.'files' );
# Only gets set by core, when `UPLOADS` is not defined
# Default: WP_CONTENT_DIR . "/blogs.dir/{$wpdb->blogid}/files/"
define( 'BLOGUPLOADDIR',          WP_CONTENT_DIR.DS.'blogs.dir'.DS.BLOG_ID_CURRENT_SITE.DS.'files' );
/**/

# Default MU redirect location if site doesn't exist
# Defines an URL of a site on which WordPress should redirect,
# if registration is closed or a site doesn't exists.
# Values: %siteurl% for mainsite or custom URL
define( 'NOBLOGREDIRECT',         WP_SITEURL );

# (MU)PLUGIN PATH & URL
/*
define( 'WP_PLUGIN_DIR',          'C:'.DS.'xampp'.DS.'htdocs'.DS.'plugins.dev'.DS.'modules' );
define( 'WP_PLUGIN_URL',          'http://example.dev/modules' );
define( 'WPMU_PLUGIN_DIR',        'C:'.DS.'xampp'.DS.'htdocs'.DS.'plugins.dev'.DS.'mu-modules' );
define( 'WPMU_PLUGIN_URL',        'http://example.dev/mu-modules' );
/*/
define( 'WP_PLUGIN_DIR',          WP_CONTENT_DIR.DS.'plugins' );
define( 'WP_PLUGIN_URL',          WP_SITEURL.'/'.WP_CONTENT_DIR_NAME.'/plugins' );
define( 'WPMU_PLUGIN_DIR',        WP_CONTENT_DIR.DS.'mu-plugins' );
define( 'WPMU_PLUGIN_URL',        WP_SITEURL.'/'.WP_CONTENT_DIR_NAME.'/mu-plugins' );
/**/

# ==================================
# Maybe has to get the BLOG_ID_CURRENT_SITE added for MU setups
/**
define( 'CUSTOM_USER_TABLE',      "{$table_prefix}users" );
define( 'CUSTOM_USER_META_TABLE', "{$table_prefix}usermeta" );
/**/

# ==================================
# (De)activates support for X-Sendfile Header. (default: false)
define( 'WPMU_ACCEL_REDIRECT',    false );
# (De)activates support for X-Accel-Redirect Header. (default: false)
define( 'WPMU_SENDFILE',          false );

# Activates SSL for logins and in the backend.
define( 'FORCE_SSL_ADMIN',        false );

# Activates SSL for logins.
define( 'FORCE_SSL_LOGIN',        false );

// Gets all set inside wp-settings.php
/*
# All other constants will only get applied,
# if there's a custom COOKIEHASH
# Hash for generating cookie names.
define( 'COOKIEHASH',             md5( WP_SITEURL ) );
# Domain of the WordPress installation.
# Default: false or for Multisite with subdomains .domain of the main site
define( 'COOKIE_DOMAIN',          false );
# Path to WordPress root dir.
define( 'COOKIEPATH',             ABSPATH );
# Path of you site.
# Default: Site URL without http(s)://
define( 'SITECOOKIEPATH',         WP_SITEURL );
# Path to the plugins dir.
# Default: WP_PLUGIN_URL without http(s)://
define( 'PLUGINS_COOKIE_PATH',    WP_PLUGIN_URL );

# Cookie name for logins.
# Default: wordpress_logged_in_COOKIEHASH
define( 'LOGGED_IN_COOKIE',       'wordpress_logged_in_'.COOKIEHASH );
# Cookie name for the password.
# Default: wordpresspass_COOKIEHASH
define( 'PASS_COOKIE',            'wordpresspass_'.COOKIEHASH );
# Cookie name for the SSL authentication.
# Default: wordpress_sec_COOKIEHASH
define( 'SECURE_AUTH_COOKIE',     'wordpress_sec_'.COOKIEHASH );
# Cookie name for the test cookie.
# Default: wordpress_test_cookie
define( 'TEST_COOKIE',            'wordpress_test_cookie' );
# Cookie name for users.
# Default: wordpressuser_COOKIEHASH
define( 'USER_COOKIE',            'wordpressuser_'.COOKIEHASH );
/**/

# ==================================
# Static Caching drop-in
# Only throws an error for a missing file if WP_DEBUG is set to true
# Also checks for the existance for
# External object cache in: `WP_CONTENT_DIR.DS.'object-cache.php'`
if ( file_exists( WP_CONTENT_DIR.DS.'advanced-cache.php' ) )
	define( 'WP_CACHE', false );

# ==================================
# DEBUG
define( 'WP_DEBUG',               true );
// file: ~/WP_CONTENT_DIR/debug.log
define( 'WP_DEBUG_LOG',           false );
define( 'WP_DEBUG_DISPLAY',       true );
define( 'SAVEQUERIES',            true );
# DEBUG: MU
define( 'DIEONDBERROR',           true );
define( 'ERRORLOGFILE',           WP_CONTENT_DIR.DS.'logs'.DS.'mu_error.log' );

# PHP Error log location
@ini_set( 'error_log',            WP_CONTENT_DIR.DS.'logs'.DS.'php_error.log' );

# ==================================
# DB REPAIR
define( 'WP_ALLOW_REPAIR',        true );

# ==================================
# PERFORMANCE
define( 'COMPRESS_CSS',           true );

define( 'SCRIPT_DEBUG',           true );
define( 'COMPRESS_SCRIPTS',       true );
define( 'CONCATENATE_SCRIPTS',    true );

define( 'ENFORCE_GZIP',           false );

# ==================================
/*
# HTTP Proxies
# Adds Proxy support to the WordPress HTTP API
# Used for e.g. in Intranets
# Fixes Feeds as well
# Defines the proxy adresse.
define( 'WP_PROXY_HOST',          '127.0.84.1' );
# Defines the proxy port.
define( 'WP_PROXY_PORT',          '8080' );
# Defines the proxy username.
define( 'WP_PROXY_USERNAME',      'my_user_name' );
# Defines the proxy password.
define( 'WP_PROXY_PASSWORD',      'my_password' );
# Allows you to define some adresses which
# shouldn't be passed through a proxy.
# Core sets both www and non-www as bypass.
# get_option('siteurl') and localhost are bypassed by default.
# This can't get changed.
define( 'WP_PROXY_BYPASS_HOSTS',  'localhost, www.example.com' );
/**/

# ==================================

/*
# Allows you to block external request.
define( 'WP_HTTP_BLOCK_EXTERNAL', false );
# Whitelist hosts
# If WP_HTTP_BLOCK_EXTERNAL is defined you can add hosts
# which shouldn't be blocked.
define( 'WP_ACCESSIBLE_HOSTS',    'localhost, www.example.com' );
/**/

# ==================================
/*
# Values: IP Adresse, Domain and/or Port
define( 'FTP_HOST',               'ftp.example.com:21' );
# Defines the FTP username.
define( 'FTP_USER',               'username' );
# FTP password.
define( 'FTP_PASS',               '' );
# (De)activates SSH.
define( 'FTP_SSH',                true );
# (De)activates SSL.
define( 'FTP_SSL',                true );
# Defines a private key for SSH.
define( 'FTP_PRIKEY',             '' );
# Defines a public key for SSH.
define( 'FTP_PUBKEY',             '' );
/**/
# Forces the filesystem method
# "direct", "ssh", "ftpext", or "ftpsockets"
# For e.g.: Allow updates without FTP
define( 'FS_METHOD',             'direct' );
# Defines a timeout after a connection has been lost.
# time in seconds (Default: 30)
define( 'FS_TIMEOUT',             30 );

# Path to the WordPress root dir.
# Default: ABSPATH
define( 'FTP_BASE',               ABSPATH );
# Path to the /wp-content/ dir.
# Default: WP_CONTENT_DIR
define( 'FTP_CONTENT_DIR',        WP_CONTENT_DIR );
# Default: WP_LANG_DIR
define( 'FTP_LANG_DIR',           WP_LANG_DIR );
# Default: WP_PLUGIN_DIR
define( 'FTP_PLUGIN_DIR',         WP_PLUGIN_DIR );

# ==================================
# Authentication Unique Keys and Salts.
# https://api.wordpress.org/secret-key/1.1/salt/
define( 'AUTH_KEY',               '' );
define( 'AUTH_SALT',              '' );
define( 'LOGGED_IN_KEY',          '' );
define( 'LOGGED_IN_SALT',         '' );
define( 'NONCE_KEY',              '' );
define( 'NONCE_SALT',             '' );
define( 'SECURE_AUTH_KEY',        '' );
define( 'SECURE_AUTH_SALT',       '' );

# Fix include paths. Props: "toscho"
$old_incl_paths = explode( PS, get_include_path() );
if (
	! in_array( '.', $old_incl_paths )
	OR ! in_array( '..', $old_incl_paths )
	)
{
	# Append new pathes …
	$new_incl_paths[] = '.';
	$new_incl_paths[] = '..';
	# … and set them.
	@set_include_path( implode( PS, $new_incl_paths ).PS );
	unset( $new_incl_paths );
}
unset( $old_incl_paths );

# Sets up WordPress vars and included files.
require_once( ABSPATH.'wp-settings.php' );