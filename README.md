# osma2

## Create the db using database.sql and create a user:
INSERT INTO `users` (`id`, `email`, `password`, `name`, `uuid`, `lastUpdate`) VALUES (NULL, 'test@asd.com', MD5('password'), 'Test User', '', current_timestamp())
