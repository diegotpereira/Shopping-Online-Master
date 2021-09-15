--
-- Estrutura da tabela para `produtos
--

CREATE TABLE `produtos` (
  `produto_cat` int(100) NOT NULL,
  `produto_marca` int(100) NOT NULL,
  `produto_titulo` varchar(255) NOT NULL,
  `produto_preco` int(100) NOT NULL,
  `produto_desc` text NOT NULL,
  `produto_imagem` text NOT NULL,
  `produto_keywords` text NOT NULL,
  `produto_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`produto_id`),
  ADD UNIQUE KEY `produto_id` (`produto_id`);

--
-- AUTO_INCREMENT para tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `produto_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;


--
-- Dados para tabela de `produtos`
--

INSERT INTO `produtos` (`produto_cat`, `produto_marca`, `produto_titulo`, `produto_preco`, `produto_desc`, `produto_imagem`, `produto_keywords`, `produto_id`) VALUES
(1, 2, 'Dell core i5', 65000, 'A Good one to consider once.', 'dell_7460_i5-7200u.gif', 'lappy, dell,core i5,Laptop', 17),
(3, 4, 'Samsung J7', 8999, 'Android Phone.', 'source.gif', 'android,mobile,samsung', 18),
(2, 8, 'Nikkon Camera', 125000, 'More clear and vivid pictures are waiting for you.', 'nikon_1555_d7200_dslr_camera_with_1127272.jpg', 'camera,nikkon,dslr', 19),
(1, 5, 'Sony Ultrabook', 55000, 'Sony Laptop', 'download (2).jpeg', 'lappy, sony,laptop', 20),
(1, 1, 'HP Pavilion', 65000, 'HP Laptop.', 'HP_Hybridth.gif', 'lappy,hp,notebook,laptop', 21),
(3, 4, 'Samsung Galaxy II', 11999, 'Android phone with decent specs.', 'micromax-canvas-4-plus-a315(1).jpg', 'mobile, android, phone, samsung,', 26);

----------------- Categorias --------------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `cat_id` int(100) NOT NULL,
  `cat_titulo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para a tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_id`);

--
-- AUTO_INCREMENT para tabela `produtos`
--
ALTER TABLE `categorias`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


--
-- Dados para tabela `categorias`
--

INSERT INTO `categorias` (`cat_id`, `cat_titulo`) VALUES
(1, 'Laptops'),
(2, 'Cameras'),
(3, 'Mobiles'),
(4, 'Computers'),
(5, 'ipods'),
(6, 'iphones');



------------------------------ Marcas -------------------------------------

--
-- Estrutura da tabela para `marcas`
--

CREATE TABLE `marcas` (
  `marca_id` int(100) NOT NULL,
  `marca_titulo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dados para tabelas `marcas`
--

INSERT INTO `marcas` (`marca_id`, `marca_titulo`) VALUES
(1, 'HP'),
(2, 'DELL'),
(3, 'LG'),
(4, 'Samsung'),
(5, 'Sony'),
(6, 'Toshiba'),
(7, 'iPhone'),
(8, 'Nikkon');


--
-- Índices para tabelas `marcas`
--
  ALTER TABLE `marcas`
    ADD PRIMARY KEY (`marca_id`);

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `marcas`
  MODIFY `marca_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;


--
-- Estrutura da tabela para o `carrinho de compras`
--

CREATE TABLE `carrinho` (
  `p_id` int(10) NOT NULL,
  `qtd` int(10) NOT NULL,
  `ip_add` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`p_id`);


--
-- Dados para a tabela `carrinho
--

INSERT INTO `carrinho` (`p_id`, `qtd`, `ip_add`) VALUES
(18, 1, '::1');