-- CODIGO PARA MYSQL

CREATE TABLE movimentacao_caixa (
    id_mov_caixa INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    valor DECIMAL(6,2) NOT NULL,
    obs VARCHAR(200) NOT NULL,
    tipo VARCHAR(200) NOT NULL,
    data_caixa DATETIME NOT NULL
)