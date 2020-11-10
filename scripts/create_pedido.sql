-- CODIGO PARA MYSQL

CREATE TABLE pedido (
    id_pedido INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    qtd_pedidos_item INT(200) NOT NULL,
    valor_final DECIMAL(6,2) NOT NULL,
    cliente VARCHAR(200) NOT NULL,
    pagamento VARCHAR(200) NOT NULL,
    desconto INT(100) NOT NULL,
    parcelas VARCHAR(100) NOT NULL,
    observacao VARCHAR(1000),
    data DATETIME NOT NULL
)