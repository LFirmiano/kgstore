-- CODIGO PARA MYSQL

CREATE TABLE estoque (
    id_estoque INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    produto VARCHAR(200) NOT NULL,
    unidade VARCHAR(200) NOT NULL,
    tamanho VARCHAR(200) NOT NULL,
    quantidade INT(10) NOT NULL
)
ALTER TABLE estoque ADD COLUMN produto_id INT(10) UNSIGNED;
ALTER TABLE estoque ADD FOREIGN KEY (produto_id) REFERENCES produtos (id_produto);