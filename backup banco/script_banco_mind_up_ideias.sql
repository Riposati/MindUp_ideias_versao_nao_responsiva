/* feito por Gustavo Riposati */

/*create database mind_up_teste;

use mind_up_teste;*/


/* drop tables aqui */

/*drop table usuario;*/
/*drop table ideias;*/
/*drop table avaliacoes;*/


/* Create tables aqui */
create table ideias
(
	id_ideia integer auto_increment,
	ideia varchar(5000),
    frase_ideia varchar(200),
    id_usuario integer,
    primary key(id_ideia,id_usuario)
);

create table usuario
(
	id_usuario integer primary key auto_increment,
	nome varchar(500),
    telefone varchar(200),
    email varchar(500)
);

create table avaliacoes(
	id_avaliacao integer auto_increment,
	id_usuario integer,
    id_ideia integer,
    primary key(id_avaliacao,id_usuario,id_ideia)
);

/*  foreign keys aqui */

alter table ideias add constraint fk_ideias_usuario
foreign key ideias(id_usuario) references usuario(id_usuario);

alter table avaliacoes add constraint fk_avaliacoes_usuario
foreign key avaliacoes(id_usuario) references usuario(id_usuario);

alter table avaliacoes add constraint fk_avaliacoes_ideias
foreign key avaliacoes(id_ideia) references ideias(id_ideia);

/* inserts aqui  */

insert into usuario (id_usuario, nome,telefone , email) values(1,'Gustavo Riposati','(34)9659-9328','guriposa@gmail.com');

insert into ideias (id_ideia, ideia, frase_ideia, id_usuario) values(1,'um teste maneiro 2 ','teste 2 ',1);

insert into avaliacoes (id_avaliacao, id_usuario, id_ideia) values(2,1,1);


/* selects aqui */

select * from ideias;

select * from usuario;

select * from avaliacoes;

select nome,frase_ideia,ideia
from usuario,ideias,avaliacoes
where avaliacoes.id_usuario = usuario.id_usuario and avaliacoes.id_ideia = ideias.id_ideia;


/* Deletes aqui */ 

delete from avaliacoes where id_avaliacao = 2;
