
create database bakery;

use bakery;

CREATE TABLE `paes` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `precounitario` decimal(4,2) NOT NULL,
  `qtde` int NOT NULL
);



INSERT INTO `paes` (`id`, `name`, `precounitario`, `qtde`)
VALUES (1, 'Pão Preto', 8.99, 3),
(2, 'Ciabatta', 9.69, 5),
(3, 'Brioche', 10.48, 8);



ALTER TABLE `paes`
  ADD PRIMARY KEY (`id`);



