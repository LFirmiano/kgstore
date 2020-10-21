-- CODIGO PARA MYSQL

CREATE TABLE pedido (
    id_pedido INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    qtd_pedidos_item INT(200) NOT NULL,
    valor_final INT(200) NOT NULL,
    cliente VARCHAR(200) NOT NULL,
    pagamento VARCHAR(200) NOT NULL,
    data DATETIME NOT NULL
)