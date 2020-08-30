CREATE DATABASE IF NOT EXISTS db_uaitec DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci;

USE db_uaitec;

CREATE TABLE IF NOT EXISTS curso (
    codigo INT PRIMARY KEY AUTO_INCREMENT,
    nomeCurso VARCHAR(250) UNIQUE NOT NULL,
    instituicao VARCHAR(250) NOT NULL,
    cargaHoraria varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci;

INSERT INTO `curso`(`nomeCurso`, `instituicao`, `cargaHoraria`) 
VALUES 
('PHP 7 Completo','uaitec','50'),
('Java 13 Completo','uaitec','80'),
('Arduino Avançado','uaitec','75'),
('Banco de dados','uaitec','47'),
('Android Softblue','uaitec','64'),
('PHP 7 & MySQL','uaitec','50'),
('Java 13 & MySQL','uaitec','80'),
('WordPress Avançado','uaitec','75'),
('WordPress Básico','uaitec','47'),
('HTML, CSS e JavaScript','uaitec','64'),
('NodeJS','uaitec','50'),
('Java Web Completo','uaitec','80'),
('Arduino IOT','uaitec','75'),
('Arduino com Banco de Dados MySQL','uaitec','47'),
('Aruino e Android PIE','uaitec','64');

CREATE TABLE IF NOT EXISTS horario (
    codigo INT PRIMARY KEY AUTO_INCREMENT,
    horario VARCHAR(32) UNIQUE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci;
INSERT INTO `horario`(`horario`) 
VALUES 
('07:00 às 08:00 horas'),
('08:00 às 09:00 horas'),
('09:00 às 10:00 horas'),
('10:00 às 11:00 horas'),
('11:00 às 12:00 horas'),
('12:00 às 13:00 horas'),
('13:00 às 14:00 horas'),
('14:00 às 15:00 horas'),
('15:00 às 16:00 horas'),
('16:00 às 17:00 horas'),
('17:00 às 18:00 horas'),
('18:00 às 19:00 horas');

CREATE TABLE IF NOT EXISTS usuario (
    codigo INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(250) NOT NULL,
    cpf VARCHAR(16) UNIQUE NOT NULL,
    email VARCHAR(250) UNIQUE NOT NULL,
    login VARCHAR(32) NOT NULL,
    password VARCHAR(64) NOT NULL,
    isAdmin BOOLEAN NOT NULL DEFAULT false
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci;

INSERT INTO `usuario`(`nome`, `cpf`, `email`, `login`, `password`, `isAdmin`) 
VALUES 
('Cristiano Idelfonso da Silva','123.456.789.00','cristiano@admin1.com','Admin1','$2y$10$eUYpMffMIJUetClDMjTEvev2Oaf5pIQIvVe3D9m9kfPwgugEOTs76',1),
('Cristiano Idelfonso da Silva','987.654.321.00','cristiano@aluno1.com','Aluno1','$2y$10$a3c3CmL1Z9knOuK0NJpHjOH.LssiOx5f4jKMHinUxTvQoOaBlHrwC',0),
('Cristiano Idelfonso da Silva','231.456.789.00','cristiano@admin2.com','Admin2','$2y$10$eUYpMffMIJUetClDMjTEvev2Oaf5pIQIvVe3D9m9kfPwgugEOTs76',1),
('Cristiano Idelfonso da Silva','879.654.321.00','cristiano@aluno2.com','Aluno2','$2y$10$a3c3CmL1Z9knOuK0NJpHjOH.LssiOx5f4jKMHinUxTvQoOaBlHrwC',0),
('Cristiano Idelfonso da Silva','312.456.789.00','cristiano@admin3.com','Admin3','$2y$10$eUYpMffMIJUetClDMjTEvev2Oaf5pIQIvVe3D9m9kfPwgugEOTs76',1),
('Cristiano Idelfonso da Silva','798.654.321.00','cristiano@aluno3.com','Aluno3','$2y$10$a3c3CmL1Z9knOuK0NJpHjOH.LssiOx5f4jKMHinUxTvQoOaBlHrwC',0);

CREATE TABLE IF NOT EXISTS aluno(
    codigo INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(250) NOT NULL,
    dataNasc DATE NOT NULL,
    sexo ENUM('Masculino', 'Feminino'),
    raca ENUM('Branco','Pardo','Negro','Amarelo','Indígena','Outro'),
    cpf VARCHAR(16) NOT NULL UNIQUE,
    identidade VARCHAR(20),
    certNasc VARCHAR(250),
    naturalidade VARCHAR(250) NOT NULL DEFAULT 'Várzea da Palma - MG',
    escolaridade VARCHAR(250) NOT NULL,
    nomeMae VARCHAR(250) NOT NULL,
    nomePai VARCHAR(250),
    logradouro VARCHAR(250) NOT NULL,
    numero VARCHAR(8),
    bairro VARCHAR(250),
    cidade VARCHAR(250) NOT NULL,
    estado VARCHAR(2) NOT NULL,
    cep VARCHAR(16),
    telefone VARCHAR(32), 
    celular VARCHAR(32),
    trabalha ENUM('Sim','Não'),
    profissao VARCHAR(250) NOT NULL DEFAULT 'Estudante',
    curso VARCHAR(250),
    email VARCHAR(250) NOT NULL UNIQUE,
    senha VARCHAR(32) NOT NULL,
    horario VARCHAR(32),
    dataInicio DATE,
    dias VARCHAR(64),
    possuiPC ENUM('Sim','Não'),
    conhecInfor ENUM('Sem Conhecimento','Básico','Intermediário','Avançado'),
    necessidadeEspecial varchar(200) DEFAULT 'Não possui necessidade especial.',
    sala VARCHAR(64),
    responsavel VARCHAR(250),
    vinculo VARCHAR(32),
    cpfResponsavel VARCHAR(16),
    identidadeResponsavel VARCHAR(20),
    dataMatricula DATE,
    usuario VARCHAR(250) NOT NULL
)ENGINE INNODB DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS matricula (
    codigo INT PRIMARY KEY AUTO_INCREMENT,
    idAluno INT NOT NULL,
    idCurso INT NOT NULL,
    idUsuario INT NOT NULL,
    FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`codigo`),
    FOREIGN KEY (`idCurso`) REFERENCES `curso` (`codigo`),
    FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`codigo`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE utf8_unicode_ci;


