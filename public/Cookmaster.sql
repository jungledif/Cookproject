CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nickname` varchar(255),
  `password` varchar(255),
  `created_at` datetime,
  `avatar_user` varchar(255)
);

CREATE TABLE `post` (
  `id` int PRIMARY KEY,
  `title` varchar(255),
  `preparation` text,
  `ingredients` text,
  `descriptive` text,
  `recipe_img` varchar(255),
  `cooktime` varchar(255),
  `servings` varchar(255),
  `created_at` datetime,
  `user_id` int
);

ALTER TABLE `users` ADD FOREIGN KEY (`id`) REFERENCES `post` (`user_id`);
