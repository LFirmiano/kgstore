CREATE TABLE pedido_item (
    id_pedido_item INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    produto VARCHAR(200) NOT NULL,
    tamanho VARCHAR(200) NOT NULL,
    quantidade INT(10) NOT NULL,
    valor INT(100) NOT NULL,
    cliente VARCHAR(200) NOT NULL,
    pagamento VARCHAR(200) NOT NULL,
    desconto INT(100) NOT NULL,
    hora_compra DATETIME
)