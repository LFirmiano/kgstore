CREATE TABLE troca (
    id_troca INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    produto_antigo_id INT(10) UNSIGNED,
    produto_novo_id INT(10) UNSIGNED,
    quantidade_antiga_trocada INT(10),
    quantidade_nova_trocada INT(10),
    valor_diferenca DECIMAL(6,2) NOT NULL,
    data_troca DATETIME
)


ALTER TABLE troca ADD FOREIGN KEY (produto_antigo_id) REFERENCES produtos (id_produto);
ALTER TABLE troca ADD FOREIGN KEY (produto_novo_id) REFERENCES produtos (id_produto);