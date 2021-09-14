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
-- Dados para tabela de `produtos`
--

INSERT INTO `produtos` (`produto_cat`, `produto_marca`, `produto_titulo`, `produto_preco`, `produto_desc`, `produto_imagem`, `produto_keywords`, `produto_id`) VALUES
(1, 2, 'Dell core i5', 65000, 'A Good one to consider once.', 'dell_7460_i5-7200u.gif', 'lappy, dell,core i5,Laptop', 17),
(3, 4, 'Samsung J7', 8999, 'Android Phone.', 'source.gif', 'android,mobile,samsung', 18),
(2, 8, 'Nikkon Camera', 125000, 'More clear and vivid pictures are waiting for you.', 'nikon_1555_d7200_dslr_camera_with_1127272.jpg', 'camera,nikkon,dslr', 19),
(1, 5, 'Sony Ultrabook', 55000, 'Sony Laptop', 'download (2).jpeg', 'lappy, sony,laptop', 20),
(1, 1, 'HP Pavilion', 65000, 'HP Laptop.', 'HP_Hybridth.gif', 'lappy,hp,notebook,laptop', 21),
(3, 4, 'Samsung Galaxy II', 11999, 'Android phone with decent specs.', 'micromax-canvas-4-plus-a315(1).jpg', 'mobile, android, phone, samsung,', 26);