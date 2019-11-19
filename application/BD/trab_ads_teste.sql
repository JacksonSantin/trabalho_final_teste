--
-- Estrutura da tabela `login_cad`
--

-- Nome BD: trab_ads_teste

CREATE TABLE `login_cad` (
  `usuario_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO login_cad (usuario_id, email, senha) VALUES (1, 'jackson@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');
-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `tipo_uso` varchar(60) NOT NULL,
  `autor` varchar(250) NOT NULL,
  `editora` varchar(150) NOT NULL,
  `descricao` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO livro (id, titulo, tipo_uso, autor, editora, descricao) VALUES (1, 'Título1', 'Local', 'Autor1', 'Editora1', 'Livro de Suspense');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `login_cad`
--
ALTER TABLE `login_cad`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `login_cad`
--
ALTER TABLE `login_cad`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
