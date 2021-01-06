CREATE TABLE pedido_item (
    id_pedido_item INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tamanho VARCHAR(200) NOT NULL,
    quantidade INT(10) NOT NULL,
    valor DECIMAL(6,2) NOT NULL,
    cliente VARCHAR(200) NOT NULL,
    pagamento VARCHAR(200) NOT NULL,
    hora_compra DATETIME
)

ALTER TABLE pedido_item ADD COLUMN produto_id INT(10) UNSIGNED;
ALTER TABLE pedido_item ADD FOREIGN KEY (produto_id) REFERENCES produtos (id_produto);