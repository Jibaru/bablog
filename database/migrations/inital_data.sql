INSERT INTO `roles` (`id`, `name`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'ADMINISTRADOR', 777, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(2, 'GENERAL', 755, '2020-03-18 05:00:00', '2020-03-18 05:00:00');

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ignacio Raúl', 'ignacioruedaboada@hotmail.com', 1, NULL, '$2y$10$WxY22RZzYx1Y91H5ib9CjOJ9A8dNQSVWzYpOqDmoFV1FtzABiJx9a', NULL, '2020-03-19 04:48:01', '2020-03-19 04:48:01'),
(2, 'Jorge Sánchez', 'jorgesanchez@gmail.com', 2, NULL, '$2y$10$hs.DFhsLj62Rtu5SGNu5au5/nahpmLXPpf980D6vjrpixRHlFjcw2', NULL, '2020-03-19 04:49:17', '2020-03-19 04:49:17');

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'TECNOLOGÍA', '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(2, 'DESARROLLO', '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(3, 'APRENDIZAJE', '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(4, 'OTRO', '2020-03-18 05:00:00', '2020-03-18 05:00:00');

INSERT INTO `posts` (`id`, `title`, `date_time`, `type`, `content`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'BIENVENIDO A MI WEB', '2020-03-18 00:00:00', 'CENTERED', 'Esto es una demo de un post.', 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(2, 'BIENVENIDO POR SEGUNDA VEZ', '2020-03-18 00:00:00', 'CENTERED', 'Esto es una segunda demo de un post.', 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00');


INSERT INTO `comments` (`id`, `content`, `date_time`, `thread`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'Esto es un primer comentario.', '2020-03-18 00:00:00', NULL, 1, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(2, 'Esto es un primer reply del primer comentario.', '2020-03-18 00:00:00', 1, 2, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(3, 'Esto es un segundo reply del primer comentario.', '2020-03-18 00:00:00', 1, 1, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00');

INSERT INTO `posts_views` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(2, 2, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(3, 1, 2, '2020-03-18 05:00:00', '2020-03-18 05:00:00');

INSERT INTO `posts_likes` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(2, 2, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00');

INSERT INTO `files` (`id`, `name`, `format`, `path`, `type`, `created_at`, `updated_at`) VALUES
(1, 'VALLE', 'PNG', 'https://pngimage.net/wp-content/uploads/2018/06/imagenes-de-paisajes-png.png', 'IMAGEN', '2020-03-18 05:00:00', '2020-03-18 05:00:00');

INSERT INTO `posts_images` (`id`, `file_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00');
