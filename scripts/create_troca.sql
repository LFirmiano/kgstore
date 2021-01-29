CREATE TABLE troca (
    id_troca INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    valor_diferenca DECIMAL(6,2) NOT NULL,
    data_troca DATETIME,
    produto_antigo_id INT(10) UNSIGNED,
    tamanho_antigo_trocado VARCHAR(200),
    quantidade_antiga_trocada INT(10),
    pedido_id INT(10) UNSIGNED
);

CREATE TABLE registrotroca (
    id_troca INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    produto_novo_id INT(10) UNSIGNED,
    tamanho_novo_trocado VARCHAR(200),
    quantidade_nova_trocada INT(10),
    troca_id INT(10) UNSIGNED
);

ALTER TABLE troca ADD FOREIGN KEY (produto_antigo_id) REFERENCES produtos (id_produto);
ALTER TABLE troca ADD FOREIGN KEY (pedido_id) REFERENCES pedido (id_pedido);
ALTER TABLE registrotroca ADD FOREIGN KEY (produto_novo_id) REFERENCES produtos (id_produto);
ALTER TABLE registrotroca ADD FOREIGN KEY (troca_id) REFERENCES troca (id_troca);