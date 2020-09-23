-- O CÓDIGO PRECISA SER ALTERADO PARA MYSQL!
-- NÃO RODAR NO BANCO AINDA

-- Table: public.tamunidades

CREATE TABLE public.tamunidades
(
    id integer NOT NULL DEFAULT nextval('teste_id_seq'::regclass),
    tamanho character varying(200) COLLATE pg_catalog."default",
	subcat character varying(200) COLLATE pg_catalog."default",
    CONSTRAINT tamunidades_pkey PRIMARY KEY (id)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.tamunidades
    OWNER to postgres;

INSERT INTO public.tamunidades(tamanho, subcat)
	VALUES ('37/38', 'Unidades Calçados');
INSERT INTO public.tamunidades(tamanho, subcat)
	VALUES ('38/39', 'Unidades Calçados');

INSERT INTO public.tamunidades(tamanho, subcat)
	VALUES ('36', 'Unidades Roupas Inferiores');
INSERT INTO public.tamunidades(tamanho, subcat)
	VALUES ('42', 'Unidades Roupas Inferiores');

INSERT INTO public.tamunidades(tamanho, subcat)
	VALUES ('P', 'Unidades Básicas');
INSERT INTO public.tamunidades(tamanho, subcat)
	VALUES ('M', 'Unidades Básicas');

INSERT INTO public.tamunidades(tamanho, subcat)
	VALUES ('Tamanho Único', 'Unidade Única');