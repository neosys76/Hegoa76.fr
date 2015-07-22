
CREATE TYPE etat_joueur AS ENUM (
    'offline',
    'online',
    'exclus'
);


CREATE TYPE occupant_case AS ENUM (
    'village',
    'marché',
    'campement'
);


CREATE TYPE type_compte AS ENUM (
    'base',
    'premium',
    'gold'
);



CREATE SEQUENCE seq_actualite_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


CREATE TABLE "ACTUALITE" (
    actualite_id bigint DEFAULT nextval('seq_actualite_id'::regclass) NOT NULL,
    type character varying(8),
    libelle character varying(1024),
    date_creation date
);


CREATE SEQUENCE seq_avatar_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


CREATE TABLE "AVATAR" (
    avatar_id numeric DEFAULT nextval('seq_avatar_id'::regclass) NOT NULL,
    avatar_nom character varying(20) NOT NULL,
    date_creation timestamp without time zone DEFAULT now(),
    niveau_agressivite numeric DEFAULT 0,
    niveau_efficacite numeric DEFAULT 0,
    niveau_commerce numeric DEFAULT 0,
    niveau_escroquerie numeric DEFAULT 0,
    compte_id numeric NOT NULL,
    race character varying(20),
    niveau numeric DEFAULT 0,
    numero_image integer,
    derniere_position point,
    derniere_connexion timestamp without time zone
);


CREATE SEQUENCE seq_case_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


CREATE TABLE "CASE" (
    id bigint DEFAULT nextval('seq_case_id'::regclass) NOT NULL,
    coord point NOT NULL,
    occupee_par occupant_case,
    occupant_id integer,
    nom_terrain character varying(20)
);

COMMENT ON TABLE "CASE" IS 'Table des cases occupées';


CREATE SEQUENCE seq_compte_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


CREATE TABLE "COMPTE" (
    compte_id numeric DEFAULT nextval('seq_compte_id'::regclass) NOT NULL,
    nom character varying(30),
    prenom character varying(30),
    password character varying(32) NOT NULL,
    email character varying(255) NOT NULL,
    date_inscription date DEFAULT now(),
    confirmation boolean NOT NULL,
    ville character varying(50),
    pays character varying(200),
    date_anniv date,
    presentation character varying(2048),
    statut etat_joueur,
    type_compte type_compte DEFAULT 'base'::type_compte NOT NULL
);


COMMENT ON COLUMN "COMPTE".password IS '20 character max';

COMMENT ON COLUMN "COMPTE".confirmation IS 'TRUE ou FALSE';

COMMENT ON COLUMN "COMPTE".statut IS 'état du joueur (offline, online, exclus)';

CREATE SEQUENCE seq_newsletter_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


CREATE TABLE "NEWSLETTER" (
    email character varying(255) NOT NULL,
    newsletter_id numeric DEFAULT nextval('seq_newsletter_id'::regclass)
);


CREATE TABLE "RACE" (
    race_nom character varying(20) NOT NULL,
    taux_natalite numeric DEFAULT 0 NOT NULL,
    vitalite_unite numeric DEFAULT 0 NOT NULL,
    batiments character varying(200),
    sorts character varying(200)
);


COMMENT ON COLUMN "RACE".taux_natalite IS 'taux de natalité (en %)';

COMMENT ON COLUMN "RACE".vitalite_unite IS 'points de vie par être';


COMMENT ON COLUMN "RACE".batiments IS 'liste des batiments possible pour chaque type de race (la liste est a monter, et le datatype doit etre cree en fonction)';


COMMENT ON COLUMN "RACE".sorts IS 'liste des sorts possible en fonction de chaque race. Le datatype de la colonne devra etre fonction du nombre de sort possible (comme lst_building)';


CREATE TABLE "TERRAIN" (
    nom character varying(20) NOT NULL,
    taille_minimale integer NOT NULL,
    taille_maximale integer NOT NULL,
    taille_moyenne integer NOT NULL,
    defense_minimale integer NOT NULL,
    defense_maximale integer NOT NULL,
    defense_moyenne integer NOT NULL,
    couleur character varying(10) NOT NULL
);

COMMENT ON TABLE "TERRAIN" IS 'Définition des propriétés des terrains';


COMMENT ON COLUMN "TERRAIN".couleur IS 'couleur associée au terrain, pour le définir à partir d''une image';


CREATE SEQUENCE seq_village_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


CREATE TABLE "VILLAGE" (
    village_id bigint DEFAULT nextval('seq_village_id'::regclass) NOT NULL,
    nom_village character varying(20) NOT NULL,
    taille_village numeric DEFAULT 0 NOT NULL,
    niveau_defense numeric DEFAULT 0 NOT NULL,
    niveau_fer numeric DEFAULT 0 NOT NULL,
    niveau_bois numeric DEFAULT 0 NOT NULL,
    niveau_cyniam numeric DEFAULT 0 NOT NULL,
    "case" point DEFAULT point(((-1))::double precision, ((-1))::double precision) NOT NULL,
    avatar_iden numeric NOT NULL,
    valeur_mana numeric,
    paysans numeric,
    guerriers_cac numeric,
    guerriers_dist numeric,
    mages numeric,
    chariots_guerre numeric,
    chariots_transport numeric,
    invocations character varying(200),
    date_creation timestamp without time zone
);

COMMENT ON COLUMN "VILLAGE".invocations IS 'liste d''invocations, séparées par des virgules';

INSERT INTO "ACTUALITE" VALUES (3, 'PEOPLE', 'Equipe : Sam est le Game Designer', '2014-12-06');
INSERT INTO "ACTUALITE" VALUES (4, 'PEOPLE', 'Equipe : Chris est le WebDesigner', '2014-12-06');
INSERT INTO "ACTUALITE" VALUES (5, 'PEOPLE', 'Equipe : Olivier est l''Illustrateur', '2014-12-06');
INSERT INTO "ACTUALITE" VALUES (8, 'NEWS', 'Soutenez-nous et venez poster vos commentaires sur <a href="http://forum.hegoa.eu" target="_blank">le forum Hegoa</a>', '2014-12-06');
INSERT INTO "ACTUALITE" VALUES (2, 'BUSINESS', 'Libertribes recrute des b&eacute;n&eacute;voles : <br/>

 - des d&eacute;veloppeurs (PHP)<br />

 - des webdesigners (CSS)<br />

<br />

 - des traducteurs en Anglais<br />

 - des traducteurs en Allemand<br />

 - des traducteurs en Espagnol<br />

<br />

 - des math&eacute;maticiens<br />

<br />

 - des community manager<br />

<br />

 - des sp&eacute;cialistes en r&eacute;f&eacute;rencement naturel<br />

<br />', '2014-12-05');
INSERT INTO "ACTUALITE" VALUES (1, 'NEWS', 'La tribus Libertribes, Les tribus d''H&eacute;goa est en "hacking session" (projet port&eacute; par uniquement deux personnes et pas une grosse &eacute;quipe) au startup week-end de Rouen.

', '2014-12-05');
INSERT INTO "ACTUALITE" VALUES (7, 'NEWS', 'Soutenez-nous venez vous inscrire &agrave <a Href="index.php?page=newsletter">notre newsletter</a> pour connaitre la date d''officielle de la sortie de la version "Beta".', '2014-12-06');
INSERT INTO "ACTUALITE" VALUES (9, 'NEWS', 'Participez &agrave; l''aventure en nous sponsorisant le projet Hegoa sur <a href="http://www.kisskissbankbank.com/hegoa-eu"><u>KissKissBankBank</u></a>', '2014-12-12');
INSERT INTO "ACTUALITE" VALUES (6, 'PEOPLE', 'Equipe : Dominique est le Chef de projet et D&eacute;veloppeur s&eacute;nior', '2015-04-08');
INSERT INTO "ACTUALITE" VALUES (10, 'NEWS', 'Vous souhaitez nous contacter directement : <b>neosys[@]tuxfamily.org</b>', '2014-12-10');

INSERT INTO "RACE" VALUES ('bunsif', 0, 0, '', '');
INSERT INTO "RACE" VALUES ('sulmis', 0, 0, '', '');
INSERT INTO "RACE" VALUES ('nimhsiné', 0, 0, '', '');
INSERT INTO "RACE" VALUES ('humain', 0, 0, '', '');

INSERT INTO "TERRAIN" VALUES ('eau', 0, 0, 0, 0, 0, 0, '#0000ff');
INSERT INTO "TERRAIN" VALUES ('marais', 70, 120, 90, 2, 0, 1, '#01484e');
INSERT INTO "TERRAIN" VALUES ('montagne', 70, 120, 100, 4, 0, 3, '#000000');
INSERT INTO "TERRAIN" VALUES ('jungle', 90, 200, 120, 2, -1, 1, '#0d4603');
INSERT INTO "TERRAIN" VALUES ('colline', 80, 150, 120, 2, 0, 1, '#777777');
INSERT INTO "TERRAIN" VALUES ('foret', 80, 150, 120, 2, -1, 1, '#1e6312');
INSERT INTO "TERRAIN" VALUES ('steppe', 110, 200, 150, 2, -2, 0, '#9cbc47');
INSERT INTO "TERRAIN" VALUES ('toundra', 130, 220, 180, 2, -2, 0, '#707443');
INSERT INTO "TERRAIN" VALUES ('prairie', 150, 250, 200, 1, -1, 0, '#56a04a');
INSERT INTO "TERRAIN" VALUES ('desert', 170, 300, 200, 2, -2, 1, '#fff000');
INSERT INTO "TERRAIN" VALUES ('glace', 170, 300, 200, 4, 0, 3, '#ffffff');
INSERT INTO "TERRAIN" VALUES ('littoral', 200, 350, 250, 3, 0, 2, '#ff9c00');
INSERT INTO "TERRAIN" VALUES ('plaine', 200, 350, 250, 2, 0, 1, '#935e20');

ALTER TABLE ONLY "ACTUALITE"
    ADD CONSTRAINT "ACTUALITE_NO_ACTU_key" UNIQUE (actualite_id);


ALTER TABLE ONLY "AVATAR"
    ADD CONSTRAINT "AVATAR_pkey" PRIMARY KEY (avatar_id);

ALTER TABLE ONLY "CASE"
    ADD CONSTRAINT "CASE_pkey" PRIMARY KEY (id);

ALTER TABLE ONLY "COMPTE"
    ADD CONSTRAINT "COMPTE_email_key" UNIQUE (email);


ALTER TABLE ONLY "COMPTE"
    ADD CONSTRAINT "COMPTE_pkey" PRIMARY KEY (compte_id);


ALTER TABLE ONLY "RACE"
    ADD CONSTRAINT "RACE_pkey" PRIMARY KEY (race_nom);


ALTER TABLE ONLY "TERRAIN"
    ADD CONSTRAINT "TERRAIN_pkey" PRIMARY KEY (nom);

ALTER TABLE ONLY "VILLAGE"
    ADD CONSTRAINT "VILLAGE_pkey" PRIMARY KEY (village_id);

ALTER TABLE ONLY "AVATAR"
    ADD CONSTRAINT "AVATAR_compte_id_fkey" FOREIGN KEY (compte_id) REFERENCES "COMPTE"(compte_id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE ONLY "AVATAR"
    ADD CONSTRAINT "AVATAR_race_fkey" FOREIGN KEY (race) REFERENCES "RACE"(race_nom) ON UPDATE CASCADE ON DELETE CASCADE;


ALTER TABLE ONLY "CASE"
    ADD CONSTRAINT "CASE_nom_terrain_fkey" FOREIGN KEY (nom_terrain) REFERENCES "TERRAIN"(nom) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE ONLY "VILLAGE"
    ADD CONSTRAINT "VILLAGE_avatar_iden_fkey" FOREIGN KEY (avatar_iden) REFERENCES "AVATAR"(avatar_id) ON UPDATE CASCADE ON DELETE CASCADE;
