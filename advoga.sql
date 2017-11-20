-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Nov-2017 às 13:15
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advoga`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `advogados`
--

CREATE TABLE `advogados` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oab` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `advogados`
--

INSERT INTO `advogados` (`id`, `nome`, `oab`, `uf`, `telefone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Advogado 1', '1', '1', '1', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `andamentos`
--

CREATE TABLE `andamentos` (
  `processo_id` int(10) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `andamentos`
--

INSERT INTO `andamentos` (`processo_id`, `data`, `status_id`, `created_at`, `updated_at`) VALUES
(1, '2017-11-18', 2, '2017-11-18 22:16:52', '2017-11-18 22:16:52'),
(1, '2017-11-19', 1, '2017-11-19 00:21:33', '2017-11-19 00:21:33'),
(2, '2017-11-18', 3, '2017-11-19 00:40:23', '2017-11-19 00:40:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `corretores`
--

CREATE TABLE `corretores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comissao` decimal(8,2) NOT NULL,
  `banco` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agencia` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conta` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escritorios`
--

CREATE TABLE `escritorios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2017_10_30_173829_create_produtos_table', 1),
(25, '2017_11_10_235017_create_advogados_table', 1),
(26, '2017_11_11_193657_create_escritorios_table', 1),
(27, '2017_11_11_193754_create_corretores_table', 1),
(28, '2017_11_11_193843_create_requerentes_table', 1),
(29, '2017_11_11_193911_create_status_table', 1),
(30, '2017_11_11_193938_create_processos_table', 1),
(31, '2017_11_15_140607_create_andamentos_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `processos`
--

CREATE TABLE `processos` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_requerente` int(11) NOT NULL,
  `cod_advogado` int(11) NOT NULL,
  `comarca` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vara` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `camara` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_acid` datetime NOT NULL,
  `local_acid` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_veiculo_acid` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo_acid` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_boletim_acid` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dp_acid` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesao_hosp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_hosp` datetime NOT NULL,
  `local_hosp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sala_hosp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_aud` datetime NOT NULL,
  `local_aud` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sala_aud` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_condenação_aud` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `processos`
--

INSERT INTO `processos` (`id`, `numero`, `cod_requerente`, `cod_advogado`, `comarca`, `vara`, `camara`, `data_acid`, `local_acid`, `tipo_veiculo_acid`, `modelo_acid`, `numero_boletim_acid`, `dp_acid`, `lesao_hosp`, `data_hosp`, `local_hosp`, `sala_hosp`, `data_aud`, `local_aud`, `sala_aud`, `valor_condenação_aud`, `created_at`, `updated_at`) VALUES
(1, '111', 1, 1, '1', '1', '1', '2017-11-17 23:36:37', '1', '1', '1', '1', '1', '1', '2017-11-17 23:36:37', '11', '1', '2017-11-17 23:36:37', '1', '1', 1.00, '2017-11-18 01:38:56', '2017-11-18 01:38:56'),
(2, '222', 1, 1, '2', '2', '2', '2017-11-18 22:39:19', '2', '2', '2', '2', '2', '2', '2017-11-18 22:39:19', '2', '2', '2017-11-18 22:39:19', '2', '2', 2.00, '2017-11-19 00:39:57', '2017-11-19 00:39:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('eletronicos','moveis','limpeza','banho') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `helder10` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `requerentes`
--

CREATE TABLE `requerentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacionalidade` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_civil` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profissao` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banco` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agencia` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conta` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `requerentes`
--

INSERT INTO `requerentes` (`id`, `nome`, `sexo`, `nacionalidade`, `estado_civil`, `profissao`, `rg`, `cpf`, `endereco`, `bairro`, `cidade`, `uf`, `cep`, `telefone`, `email`, `banco`, `agencia`, `conta`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 'Requerente 1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2017-11-18 01:36:09', '2017-11-18 01:36:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 'statu 1', NULL, NULL),
(2, 'Status 2', '2017-11-18 16:06:02', '2017-11-18 16:06:02'),
(3, 'Status 3', '2017-11-18 19:21:31', '2017-11-18 19:21:31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Helder Alves', 'helder.acs@gmail.com', '$2y$10$.D/S4fELjsgJmjbM/l2AceoO5w19AHfn1A/wMFo/rFj6fSo5zPFRa', 'Lo9EBZgLx2PDX5631EGsZr3771dpO0mctTjaTUUq3Q80hLWAMpJ24HsLzls4', '2017-11-18 01:35:21', '2017-11-18 01:35:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advogados`
--
ALTER TABLE `advogados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `andamentos`
--
ALTER TABLE `andamentos`
  ADD PRIMARY KEY (`processo_id`,`data`),
  ADD KEY `andamentos_status_id_foreign` (`status_id`);

--
-- Indexes for table `corretores`
--
ALTER TABLE `corretores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escritorios`
--
ALTER TABLE `escritorios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `processos`
--
ALTER TABLE `processos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requerentes`
--
ALTER TABLE `requerentes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advogados`
--
ALTER TABLE `advogados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `corretores`
--
ALTER TABLE `corretores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `escritorios`
--
ALTER TABLE `escritorios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `processos`
--
ALTER TABLE `processos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `requerentes`
--
ALTER TABLE `requerentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `andamentos`
--
ALTER TABLE `andamentos`
  ADD CONSTRAINT `andamentos_processo_id_foreign` FOREIGN KEY (`processo_id`) REFERENCES `processos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `andamentos_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
