CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `tipo` enum('medico','paciente','secretario','proprietario') not null,
  `cpf` varchar(11) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO usuarios(id,nome,tipo,cpf,senha) VALUES(1,"Administrador","proprietario","12345678910","123");