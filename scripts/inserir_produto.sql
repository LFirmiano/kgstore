-- O CÓDIGO PRECISA SER ALTERADO PARA MYSQL!
-- NÃO RODAR NO BANCO AINDA

-- Table: public.produtos

CREATE TABLE public.produtos
(
    id_produto integer NOT NULL DEFAULT nextval('teste_id_seq'::regclass),
    produto character varying(200) COLLATE pg_catalog."default",
	categoria character varying(200) COLLATE pg_catalog."default",
	fornecedor character varying(200) COLLATE pg_catalog."default",
	valor real,
    CONSTRAINT produtos_pkey PRIMARY KEY (id_produto)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.produtos
    OWNER to postgres;