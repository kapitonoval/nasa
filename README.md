Тестовое задание Nasa
===============================
1. Скопировать дистрибьютив в папку на web сервере
2. создать необходимые таблицы в базе:
    --
    -- База данных: `yiinasa`
    --

    -- --------------------------------------------------------

    --
    -- Структура таблицы `migration`
    --

    CREATE TABLE IF NOT EXISTS `migration` (
      `version` varchar(180) NOT NULL,
      `apply_time` int(11) DEFAULT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    --
    -- Дамп данных таблицы `migration`
    --

    INSERT INTO `migration` (`version`, `apply_time`) VALUES
    ('m000000_000000_base', 1459973572),
    ('m130524_201442_init', 1459973575);

    -- --------------------------------------------------------

    --
    -- Структура таблицы `tbl_post`
    --

    CREATE TABLE IF NOT EXISTS `tbl_post` (
      `id` int(10) NOT NULL,
      `title` varchar(255) NOT NULL,
      `description` varchar(255) NOT NULL,
      `pub_date` datetime NOT NULL,
      `up_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `img` varchar(255) NOT NULL,
      `link_to_nasa` varchar(255) NOT NULL
    ) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

    --
    -- Структура таблицы `user`
    --

    CREATE TABLE IF NOT EXISTS `user` (
      `id` int(11) NOT NULL,
      `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
      `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
      `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
      `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
      `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
      `status` smallint(6) NOT NULL DEFAULT '10',
      `created_at` int(11) NOT NULL,
      `updated_at` int(11) NOT NULL
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

    --
    -- Индексы сохранённых таблиц
    --

    --
    -- Индексы таблицы `migration`
    --
    ALTER TABLE `migration`
      ADD PRIMARY KEY (`version`);

    --
    -- Индексы таблицы `tbl_post`
    --
    ALTER TABLE `tbl_post`
      ADD PRIMARY KEY (`id`);

    --
    -- Индексы таблицы `user`
    --
    ALTER TABLE `user`
      ADD PRIMARY KEY (`id`),
      ADD UNIQUE KEY `username` (`username`),
      ADD UNIQUE KEY `email` (`email`),
      ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

    --
    -- AUTO_INCREMENT для сохранённых таблиц
    --

    --
    -- AUTO_INCREMENT для таблицы `tbl_post`
    --
    ALTER TABLE `tbl_post`
      MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
    --
    -- AUTO_INCREMENT для таблицы `user`
    --
    ALTER TABLE `user`
      MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;


3. Настроить доступ к базе для yii и парсера
    yii:
     ./common/config/main.php
     ./common/config/main-local.php
    парсер:
     ./upload-content/mysqli.php

4. скрипт парсер находится ./upload-content/upload.php

5. необходимо воспользоваться composer и скачать все недостающие зависимости
   для этого в консоли выполнить:   php composer.phar update
```
