Тестовое задание Nasa
===============================
1. Скопировать дистрибьютив в папку на web сервере
2. создать необходимые таблицы в базе:
    
    База данных: `yiinasa`
    ----------------------------------

    CREATE TABLE IF NOT EXISTS `migration` (
      `version` varchar(180) NOT NULL,
      `apply_time` int(11) DEFAULT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    
    
    CREATE TABLE IF NOT EXISTS `tbl_post` (
      `id` int(10) NOT NULL AUTO_INCREMENT,
      `title` varchar(255) NOT NULL,
      `description` varchar(255) NOT NULL,
      `pub_date` datetime NOT NULL,
      `up_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `img` varchar(255) NOT NULL,
      `link_to_nasa` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

    CREATE TABLE IF NOT EXISTS `user` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
      `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
      `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
      `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
      `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
      `status` smallint(6) NOT NULL DEFAULT '10',
      `created_at` int(11) NOT NULL,
      `updated_at` int(11) NOT NULL,
      PRIMARY KEY (`id`),
      UNIQUE KEY `username` (`username`),
      UNIQUE KEY `email` (`email`),
      UNIQUE KEY `password_reset_token` (`password_reset_token`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


3. Настроить доступ к базе для yii и парсера
    yii:
     `./common/config/main.php`
     `./common/config/main-local.php`
    парсер:
     `./upload-content/mysqli.php`

4. скрипт парсер находится `./upload-content/upload.php`

5. необходимо воспользоваться composer и скачать все недостающие зависимости
   для этого в консоли выполнить:   `php composer.phar update`


