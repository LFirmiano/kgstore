-- CODIGO PARA MYSQL

CREATE TABLE caixa (
    id_caixa INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    valor DECIMAL(6,2) NOT NULL,
    data_caixa DATETIME NOT NULL
)