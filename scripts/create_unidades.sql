-- CODIGO PARA MYSQL

CREATE TABLE tamunidades (
	id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tamanho VARCHAR(200) NOT NULL,
    subcat VARCHAR(200) NOT NULL
)

INSERT INTO tamunidades(tamanho, subcat)
	VALUES ('37-38', 'Unidades Calçados');
INSERT INTO tamunidades(tamanho, subcat)
	VALUES ('38-39', 'Unidades Calçados')

INSERT INTO tamunidades(tamanho, subcat)
	VALUES ('36', 'Unidades Roupas Inferiores');
INSERT INTO tamunidades(tamanho, subcat)
	VALUES ('42', 'Unidades Roupas Inferiores')

INSERT INTO tamunidades(tamanho, subcat)
	VALUES ('P', 'Unidades Básicas');
INSERT INTO tamunidades(tamanho, subcat)
	VALUES ('M', 'Unidades Básicas')

INSERT INTO tamunidades(tamanho, subcat)
	VALUES ('TamanhoUnico', 'Unidade Única')