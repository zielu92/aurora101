CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `name` varchar(255) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `articles` (
                            `id` int(11) NOT NULL,
                            `user_id` int(11) NOT NULL,
                            `title` varchar(255) NOT NULL,
                            `body` text NOT NULL,
                            `status` int(2) NOT NULL DEFAULT(1),
                            `category_id` int(11) NOT NULL,
                            `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `articles`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `articles`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;