-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: dw2sisacademico
-- ------------------------------------------------------
-- Server version	5.7.17-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `tipo` enum('medico','paciente','proprietario') not null,
  `cpf` varchar(11) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fornecedores` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(150) DEFAULT NULL,
    `telefone` varchar(12) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(150) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `fornecedor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`fornecedor_id`) REFERENCES fornecedores(id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE `pedidos` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `data` datetime,
    `funcionario_id` int(11) DEFAULT NULL,
    `proprietario_id` int(11) DEFAULT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`funcionario_id`) REFERENCES funcionarios(id),
    FOREIGN KEY (`proprietario_id`) REFERENCES proprietarios(id)
);

--
-- Table structure for table `produtos_pedidos`
--

DROP TABLE IF EXISTS `produtos_pedidos`;
CREATE TABLE `produtos_pedidos` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `produto_id` int(11) NOT NULL,
    `pedido_id` int(11) NOT NULL,
    `quantidade` int(11),
    `preco_produto` double,
    `total` double,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`produto_id`) REFERENCES produtos(id),
    FOREIGN KEY (`pedido_id`) REFERENCES pedidos(id)
);

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-05 14:58:47
