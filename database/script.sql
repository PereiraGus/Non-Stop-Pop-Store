create database dbmusic
default character set utf8
default collate utf8_general_ci;

use dbmusic;

create table tbTipo(
codTip int primary key auto_increment,
nomeTip varchar(10) not null unique
)
default charset utf8;

create table tbArtista(
codArt int primary key auto_increment,
nomeArt varchar(50) not null,
fotoArt varchar(1000) default("https://tupl.cs.tufts.edu/images/blank-profile.png")
)
default charset utf8;

create table tbGenero(
codGen int primary key auto_increment,
nomeGen varchar(35) not null unique
)
default charset utf8;

create table tbAlbum(
codAlb int primary key auto_increment,
nomeAlb varchar(35) not null,
capaAlb varchar(225) not null,
lancAlb enum("Y","N") not null,
anoAlb int not null,
codTip int not null,
foreign key (codTip) references tbTipo (codTip)
)
default charset utf8;

create table tbMusica(
codMsc int primary key auto_increment,
nomeMsc varchar(50) not null,
codAlb int not null,
explMsc char(1) default ('N'),
foreign key (codAlb) references tbAlbum (codAlb)
)
default charset utf8;

create table tbAlbumGenero(
codAlb int not null,
codGen int not null,
foreign key (codAlb) references tbAlbum(codAlb),
foreign key (codGen) references tbGenero(codGen)
)
default charset utf8;

create table tbMusicaArtista(
codMsc int not null,
codArt int not null,
foreign key (codMsc) references tbMusica(codMsc),
foreign key (codArt) references tbArtista(codArt)
)
default charset utf8;

insert into tbTipo values
(default, "Album"),
(default, "Single"),
(default, "E.P."),
(default, "Coletânea"),
(default, "Outros");

insert into tbArtista values
(default, "Lady Gaga", "https://instagram.fcgh16-1.fna.fbcdn.net/v/t51.2885-19/s150x150/232991653_521012389162539_4719988238054866113_n.jpg?_nc_ht=instagram.fcgh16-1.fna.fbcdn.net&_nc_ohc=zI9ELRq-jLAAX8Zhr59&edm=ABfd0MgBAAAA&ccb=7-4&oh=3f0b6a4ef07a7e2cc3ae503a4f2beeed&oe=612991DD&_nc_sid=7bff83"),
(default, "Ariana Grande", "https://instagram.fcgh16-1.fna.fbcdn.net/v/t51.2885-19/s150x150/175978430_1099825510524416_7567923699457869436_n.jpg?_nc_ht=instagram.fcgh16-1.fna.fbcdn.net&_nc_ohc=WLiVB73jo9IAX9gKlIY&edm=ABfd0MgBAAAA&ccb=7-4&oh=a4c79a619ad12e0b8095f714755b9633&oe=6129CE07&_nc_sid=7bff83"),
(default, "Doja Cat", "https://i.scdn.co/image/ab6761610000f178727a2ac15afe659be999beba"),
(default, "Beyoncé", default),
(default, "Elton John", default),
(default, "Megan Thee Stallion", "https://www.nme.com/wp-content/uploads/2021/06/megan-thee-stallion-red-carpet-2021.jpg"),
(default, "Cardi B", default),
(default, "Olivia Rodrigo", "https://files.nsctotal.com.br/s3fs-public/styles/paragraph_image_style/public/graphql-upload-files/olivia%20rodrigo_5.jpg?cZiwfvlnG4gTGuV..jjDZGQIa43C_L5o&itok=4mTXz0lw"),
(default, "Taylor Swift", "https://lorena.r7.com/public/assets/img/postagens/post_2747.jpeg"),
(default, "The Weeknd", default),
(default, "Young Thug", default),
(default, "SZA", default),
(default, "Eve", default),
(default, "Gunna", default),
(default, "Tony Bennett", default),
(default, "Bebe Rexha", "https://instagram.fcgh16-1.fna.fbcdn.net/v/t51.2885-19/s150x150/206924972_845217559429023_2258300118101885378_n.jpg?_nc_ht=instagram.fcgh16-1.fna.fbcdn.net&_nc_ohc=gO_tmQkaOucAX9yVANM&tn=E035oiLX98aArQ0x&edm=ABfd0MgBAAAA&ccb=7-4&oh=26de91683d9aa8586621d940b15b5b9f&oe=6129A111&_nc_sid=7bff83"),
(default, "Nicki Minaj", default),
(default, "Jessie J", "https://instagram.fcgh16-1.fna.fbcdn.net/v/t51.2885-19/s150x150/198179066_1842556385918031_8526317391364691308_n.jpg?_nc_ht=instagram.fcgh16-1.fna.fbcdn.net&_nc_ohc=IORCkrKPbi4AX-59fc8&tn=E035oiLX98aArQ0x&edm=ABfd0MgBAAAA&ccb=7-4&oh=e357b59f97fd20175ca381ccb8f954fc&oe=6129A594&_nc_sid=7bff83"),
(default, "BLACKPINK", default),
(default, "Bon Iver", default),
(default, "Amy Winehouse", "https://instagram.fcgh16-1.fna.fbcdn.net/v/t51.2885-19/s150x150/88281145_197870218221130_131269310260707328_n.jpg?_nc_ht=instagram.fcgh16-1.fna.fbcdn.net&_nc_ohc=TfC_z_n9618AX8ECZ0f&edm=ABfd0MgBAAAA&ccb=7-4&oh=179bc950b2d7babf2e5fa1f9fbe4c438&oe=612A6C91&_nc_sid=7bff83"),
(default, "Spice Girls", "https://instagram.fcgh16-1.fna.fbcdn.net/v/t51.2885-19/s150x150/200296253_311228907152516_6566983255076990481_n.jpg?_nc_ht=instagram.fcgh16-1.fna.fbcdn.net&_nc_ohc=XGWhIWWVxuQAX9cE2q5&edm=ABfd0MgBAAAA&ccb=7-4&oh=fd3ccf11692b3ce4e441fe9948fc1c69&oe=612B029E&_nc_sid=7bff83");

insert into tbGenero values
(default, "Pop"),
(default, "Rock"),
(default, "Country"),
(default, "Rap"),
(default, "Funk"),
(default, "Clássica"),
(default, "Eurodance"),
(default, "Soul"),
(default, "R&B"),
(default, "Eletrônica"),
(default, "Hip Hop"),
(default, "House Music"),
(default, "Folk"),
(default, "Jazz");

insert into tbAlbum values
(default, "Planet Her", "https://upload.wikimedia.org/wikipedia/pt/thumb/1/16/Planet_Her_-_Doja_Cat.png/330px-Planet_Her_-_Doja_Cat.png", "Y", 2021, 1),
(default, "Chromatica", "https://upload.wikimedia.org/wikipedia/pt/5/5d/Lady_Gaga_-_Chromatica.png", "Y", 2020, 1),
(default, "SOUR", "https://upload.wikimedia.org/wikipedia/pt/7/71/Sour_-_Olivia_Rodrigo.png", "Y", 2021, 1),
(default, "folklore", "https://upload.wikimedia.org/wikipedia/pt/f/f8/Taylor_Swift_-_Folklore.png", "Y", 2020, 1),
(default, "Back to Black", "https://upload.wikimedia.org/wikipedia/pt/a/ac/Back_to_Black_%C3%A1lbum.jpg", "N", 2006, 1),
(default, "I Get A Kick Out Of You", "https://images.genius.com/15f89bf3e3b21c3956c60ad4e98121b8.1000x1000x1.jpg", "Y", 2021, 2),
(default, "Boss Bitch", "https://lastfm.freetls.fastly.net/i/u/770x0/4108ebf77eabb6264d19c03f5fd98d31.jpg", "N", 2020, 2),
(default, "Baby, I'm Jealous", "https://upload.wikimedia.org/wikipedia/pt/thumb/0/02/Bebe_Rexha_feat_Doja_Cat_-_Baby%2C_I%27m_Jealous.png/220px-Bebe_Rexha_feat_Doja_Cat_-_Baby%2C_I%27m_Jealous.png", "N", 2020, 2),
(default, "Bottom Bitch", "https://img.discogs.com/XutbJWKt_STMrsl94S1t7q998GE=/fit-in/600x600/filters:strip_icc():format(webp):mode_rgb():quality(90)/discogs-images/R-14242215-1570561555-5595.jpeg.jpg", "N", 2019, 2),
(default, "WAP", "https://upload.wikimedia.org/wikipedia/pt/e/e3/Cardi_B_part_Megan_Thee_Stallion_-_Wap.png", "N", 2020, 2),
(default, "Savage Remix", "https://lastfm.freetls.fastly.net/i/u/770x0/d545ef6e23e0dbbbed4e921bd6dab558.jpg#d545ef6e23e0dbbbed4e921bd6dab558", "N", 2020, 2),
(default, "Wannabe 25", "https://p2.trrsf.com/image/fget/cf/940/0/images.terra.com/2021/07/10/1788227411-spice-girls-2-umg-virgin-1.jpg", "N", 2021, 3),
(default, "Bang Bang", "https://upload.wikimedia.org/wikipedia/pt/0/0b/Capa_de_Bang_Bang.jpg", "N", 2014, 2),
(default, "34+35 Remix", "https://i.scdn.co/image/ab67616d0000b27343d04ae192008a5113862faf", "Y", 2021, 2);

insert into tbMusica values
(default, "Woman", 1, "Y"),
(default, "Naked", 1, "Y"),
(default, "Payday", 1, "Y"),
(default, "Get Into It", 1, "Y"),
(default, "Need To Know", 1, "Y"),
(default, "I Don't Do Drugs", 1, "Y"),
(default, "Love To Dream", 1, "Y"),
(default, "You Right", 1, "Y"),
(default, "Been Like This", 1, "Y"),
(default, "Options", 1, "Y"),
(default, "Ain't Shit", 1, "Y"),
(default, "Imagine", 1, "Y"),
(default, "Alone", 1, "Y"),
(default, "Kiss Me More", 1, "Y"),
(default, "Up And Down", 1, "Y"),
(default, "Tonight", 1, "Y"),
(default, "Why Why", 1, "Y"),
(default, "Chromatica I", 2, default),
(default, "Alice", 2, default),
(default, "Stupid Love", 2, default),
(default, "Rain On Me", 2, default),
(default, "Free Woman", 2, default),
(default, "Fun Tonight", 2, default),
(default, "Chromatica II", 2, default),
(default, "911", 2, default),
(default, "Plastic Doll", 2, default),
(default, "Sour Candy", 2, default),
(default, "Enigma", 2, default),
(default, "Replay", 2, default),
(default, "Chromatica III", 2, default),
(default, "Sine From Abone", 2, default),
(default, "1000 Doves", 2, default),
(default, "Babylon", 2, default),
(default, "brutal", 3, "Y"),
(default, "traitor", 3, default),
(default, "drivers license", 3, "Y"),
(default, "1 step forward, 3 steps back", 3, "Y"),
(default, "deja vu", 3, "Y"),
(default, "good 4 u", 3, "Y"),
(default, "enough for you", 3, default),
(default, "happier", 3, "Y"),
(default, "jealousy, jealousy", 3, default),
(default, "favorite crime", 3, default),
(default, "hope ur ok", 3, default),
(default, "the 1", 4, "Y"),
(default, "cardigan", 4, default),
(default, "the last great american dinasty", 4, "Y"),
(default, "exile", 4, default),
(default, "my tears ricochet", 4, default),
(default, "mirrorball", 4, default),
(default, "seven", 4, default),
(default, "august", 4, default),
(default, "this is me trying", 4, default),
(default, "illicit affairs", 4, default),
(default, "invisible string", 4, default),
(default, "mad woman", 4, "Y"),
(default, "epiphany", 4, default),
(default, "betty", 4, "Y"),
(default, "peace", 4, "Y"),
(default, "hoax", 4, default),
(default, "Rehab", 5, default),
(default, "You Know I'm No Good", 5, default),
(default, "Me & Mr Jones", 5, "Y"),
(default, "Just Friends", 5, "Y"),
(default, "Back To Black", 5, "Y"),
(default, "Love Is A Losing Game", 5, default),
(default, "Tears Dry On Their Own", 5, "Y"),
(default, "Wake Up Alone", 5, default),
(default, "Some Unholy War", 5, default),
(default, "He Can Only Hold Her", 5, default),
(default, "Addicted", 5, default),
(default, "Valerie", 5, default),
(default, "I Get A Kick Out Of You", 6, default),
(default, "Boss Bitch", 7, default),
(default, "Baby, I'm Jealous", 8, default),
(default, "Bottom Bitch", 9, "Y"),
(default, "WAP", 10, "Y"),
(default, "Savage Remix", 11, "Y"),
(default, "Wannabe 25", 12, default),
(default, "Bang Bang", 13, default),
(default, "34+35 Remix", 14, "Y");


insert into tbAlbumGenero values
(1, 1),
(1, 8),
(1, 5),
(1, 11),
(2, 1),
(2, 10),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(4, 3),
(4, 13),
(5, 8),
(6,6),
(6, 14),
(7, 12),
(8, 1),
(8, 4),
(8, 9),
(9, 11),
(10, 11),
(11, 11),
(12, 1),
(12, 2),
(12, 7),
(13, 1),
(14, 11);

insert into tbMusicaArtista values
(1, 3),
(2, 3),
(3, 3),
(3, 11),
(4, 3),
(5, 3),
(6, 3),
(6, 2),
(7, 3),
(8, 3),
(8, 10),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(14, 12),
(15, 3),
(16, 3),
(16, 13),
(17, 3),
(17, 14),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(21, 2),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(27, 19),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(31, 5),
(32, 1),
(33, 1),
(34, 8),
(35, 8),
(36, 8),
(37, 8),
(38, 8),
(39, 8),
(40, 8),
(41, 8),
(42, 8),
(43, 8),
(44, 8),
(45, 9),
(46, 9),
(47, 9),
(48, 9),
(48, 20),
(49, 9),
(50, 9),
(51, 9),
(52, 9),
(53, 9),
(54, 9),
(55, 9),
(56, 9),
(57, 9),
(58, 9),
(59, 9),
(60, 9),
(61, 21),
(62, 21),
(63, 21),
(64, 21),
(65, 21),
(66, 21),
(67, 21),
(68, 21),
(69, 21),
(70, 21),
(71, 21),
(72, 21),
(73, 1),
(73, 15),
(74, 3),
(75, 16),
(75, 3),
(76, 3),
(77, 7),
(77, 6),
(78, 6),
(79, 22),
(80, 18),
(80, 2),
(80, 17),
(81, 2),
(81, 3),
(81, 6);

/*Informações sobre todas as músicas (artista principal apenas)*/
create view allSongs as
select m.codMsc as "Código", m.nomeMsc as "Música", art.nomeArt as "Artista", alb.codAlb as "CodAlb", alb.nomeAlb as "Álbum", 
tp.nomeTip as "Tipo do álbum", alb.capaAlb as "Capa", m.explMsc as "Explícita"
from ((((tbmusica as m 
	inner join tbmusicaartista as ma on m.codMsc = ma.codMsc)
    inner join tbartista as art on art.codArt = ma.codArt)
    inner join tbalbum as alb on alb.codAlb = m.codAlb)
    inner join tbtipo as tp on alb.codTip = tp.codTip)
    group by m.codMsc;
    
/*Informações dos álbuns e singles*/
create view allAlbums as
select alb.codAlb as "Código", alb.nomeAlb as "Álbum", sum(if (m.codAlb = alb.codAlb, 1, 1)) as "Número de músicas",
alb.capaAlb as "Capa", art.fotoArt as "Foto do artista", art.nomeArt as "Artista", gen.nomeGen as "Gênero", tp.nomeTip as "Tipo do álbum",
alb.anoAlb as "Ano", alb.lancAlb
from ((((((tbalbum as alb
	inner join tbmusica as m on alb.codAlb = m.codAlb)
    inner join tbmusicaartista as ma on m.codMsc = ma.codMsc)
    inner join tbartista as art on ma.codArt = art.codArt)
    inner join tbtipo as tp on alb.codTip = tp.codTip)
    inner join tbalbumgenero as ag on alb.codAlb = ag.codAlb)
    inner join tbgenero as gen on ag.codGen = gen.codGen)
    group by m.codAlb;
    
/*Achar número de músicas de um artista através do nome*/
create view countSongsPerArtist as
select art.codArt as "Código do artista", art.nomeArt as "Artista", count(m.codMsc) as "Número de músicas"
from ((tbartista as art
	inner join tbmusicaartista as ma on art.codArt = ma.codArt)
    inner join tbmusica as m on ma.codMsc = m.codMsc)
    where (art.nomeArt = "Lady Gaga");
    
/*Ver todas as músicas de um artista*/
create view allSongsPerArtist as
select msc.codMsc as "Código da música", msc.nomeMsc as "Músicas do artista", alb.nomeAlb as "Álbum"
from (((tbmusica as msc
	inner join tbalbum as alb on msc.codAlb = alb.codAlb)
    inner join tbmusicaartista as ma on msc.codMsc = ma.codMsc)
    inner join tbartista as art on ma.codArt = art.codArt)
    where (art.nomeArt = "Ariana Grande");

/*Ver quantos artistas participaram numa música (ordenados por importância)*/
delimiter $$
create procedure allArtistsPerSong(vCodMsc int)
begin

select art.codArt as "CódigoArt", art.nomeArt as "Artista", m.codMsc as "CódigoMsc", m.nomeMsc as "NomeMsc"
from ((tbartista as art
	inner join tbmusicaartista as ma on art.codArt = ma.codArt)
    inner join tbmusica as m on ma.codMsc = m.codMsc)
    where (m.codMsc = vCodMsc);
end;
$$

select count(*) from allArtistsPerSong;
    
call allArtistsPerSong(75);
call allArtistsPerSong(80);

    
create view allGenres as
select gen.nomeGen as "Gênero"
from tbgenero as gen
order by gen.codGen;
    
select * from allSongs;

select * from allAlbums;
    
select *from countSongsPerArtist;

select * from allSongsPerArtist;

select * from allGenres;
    
/*
drop database dbmusic

use dbmusic
*/

/*create user "main"@"localhost" identified with mysql_native_password by "Negocios1.";*/
grant all privileges on dbmusic.* to "main"@"localhost" with grant option;

create table tbuser(
codUser int primary key auto_increment,
nomeUser varchar(100) not null,
iconUser varchar(500) default("https://cambodiaict.net/wp-content/uploads/2019/12/computer-icons-user-profile-google-account-photos-icon-account.jpg"),
emailUser varchar(100) not null,
telUser char (14),
senhaUser varchar(20) not null,
adminUser boolean not null
) default charset  utf8;

insert into tbuser values 
(default, "NonStopPop", "https://static.wikia.nocookie.net/gta/images/7/70/Non-stop-pop.png/revision/latest?cb=20150212115927&path-prefix=pt",
	"non.stop@store.com", "(83)82366-5271", "fergieglamorous", 1),
(default, "PearGus", "https://i.pinimg.com/originals/38/2a/a8/382aa8bf7089677811ee654a17635db4.jpg", "gustavo.oito@hotmail.com",  null,
	"13062005", 0),
(default, "Lahri", "https://i.redd.it/ztufjdppq8r11.jpg", "larisonoda@gmail.com", "(49)56693-0918", "kda", 0),
(default, "Lithitwo", "https://i.imgur.com/t5KJ4ti.png", "thaterin@hotmail.com",  null, "paia", 0),
(default, "LetKitKat", "https://i.redd.it/yodvogu2u8161.png", "let.resina@outlook.com", null, "rainhadbatalha", 0),
(default, "XeeNi", "https://ddragon.leagueoflegends.com/cdn/11.18.1/img/spell/KalistaW.png", "tavel.taveora@gmail.com",  null, "muhaha", 0);

create view Usuários as
select codUser, nomeUser as "Usuário", iconUser as "Foto", emailUser as "Email", telUser as "Telefone", senhaUser as "Senha", 
adminUser as "Nível de acesso" from tbuser;

select * from Usuários;
/* drop database dbmusic;






