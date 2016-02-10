--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: libertribes; Type: SCHEMA; Schema: -; Owner: hegoa
--

CREATE SCHEMA libertribes;


ALTER SCHEMA libertribes OWNER TO hegoa;

--
-- Name: SCHEMA libertribes; Type: COMMENT; Schema: -; Owner: hegoa
--

COMMENT ON SCHEMA libertribes IS 'Principal schema owner';


SET search_path = libertribes, pg_catalog;

--
-- Name: change_case; Type: TYPE; Schema: libertribes; Owner: hegoa
--

CREATE TYPE change_case AS ENUM (
    'ajout',
    'suppression'
);


ALTER TYPE change_case OWNER TO hegoa;

--
-- Name: etat_joueur; Type: TYPE; Schema: libertribes; Owner: hegoa
--

CREATE TYPE etat_joueur AS ENUM (
    'offline',
    'online',
    'exclus'
);


ALTER TYPE etat_joueur OWNER TO hegoa;

--
-- Name: occupant_case; Type: TYPE; Schema: libertribes; Owner: hegoa
--

CREATE TYPE occupant_case AS ENUM (
    'village',
    'marché',
    'campement'
);


ALTER TYPE occupant_case OWNER TO hegoa;

--
-- Name: type_compte; Type: TYPE; Schema: libertribes; Owner: hegoa
--

CREATE TYPE type_compte AS ENUM (
    'base',
    'premium',
    'gold'
);


ALTER TYPE type_compte OWNER TO hegoa;

--
-- Name: seq_actualite_id; Type: SEQUENCE; Schema: libertribes; Owner: hegoa
--

CREATE SEQUENCE seq_actualite_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seq_actualite_id OWNER TO hegoa;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: ACTUALITE; Type: TABLE; Schema: libertribes; Owner: hegoa; Tablespace: 
--

CREATE TABLE "ACTUALITE" (
    actualite_id bigint DEFAULT nextval('seq_actualite_id'::regclass) NOT NULL,
    type character varying(8),
    libelle character varying(1024),
    date_creation date
);


ALTER TABLE "ACTUALITE" OWNER TO hegoa;

--
-- Name: seq_avatar_id; Type: SEQUENCE; Schema: libertribes; Owner: hegoa
--

CREATE SEQUENCE seq_avatar_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seq_avatar_id OWNER TO hegoa;

--
-- Name: AVATAR; Type: TABLE; Schema: libertribes; Owner: hegoa; Tablespace: 
--

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
    derniere_connexion timestamp without time zone,
    histoire text,
    statut etat_joueur DEFAULT 'offline'::etat_joueur NOT NULL
);


ALTER TABLE "AVATAR" OWNER TO hegoa;

--
-- Name: seq_case_id; Type: SEQUENCE; Schema: libertribes; Owner: hegoa
--

CREATE SEQUENCE seq_case_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seq_case_id OWNER TO hegoa;

--
-- Name: CASE; Type: TABLE; Schema: libertribes; Owner: hegoa; Tablespace: 
--

CREATE TABLE "CASE" (
    id bigint DEFAULT nextval('seq_case_id'::regclass) NOT NULL,
    coord point NOT NULL,
    occupee_par occupant_case,
    occupant_id integer,
    nom_terrain character varying(20),
    panneau character varying(3),
    svg character varying(3) DEFAULT '1-1'::character varying
);


ALTER TABLE "CASE" OWNER TO hegoa;

--
-- Name: TABLE "CASE"; Type: COMMENT; Schema: libertribes; Owner: hegoa
--

COMMENT ON TABLE "CASE" IS 'Table des cases occupées';


--
-- Name: COLUMN "CASE".occupant_id; Type: COMMENT; Schema: libertribes; Owner: hegoa
--

COMMENT ON COLUMN "CASE".occupant_id IS 'l''identifiant sera celui d''un avatar ou d''un village selon la valeur de occupee_par';


--
-- Name: CASES_TIMING; Type: TABLE; Schema: libertribes; Owner: hegoa; Tablespace: 
--

CREATE TABLE "CASES_TIMING" (
    temps_changement integer NOT NULL,
    case_id integer,
    type_changement change_case DEFAULT 'ajout'::change_case NOT NULL,
    svg_cree boolean DEFAULT false NOT NULL
);


ALTER TABLE "CASES_TIMING" OWNER TO hegoa;

--
-- Name: COLUMN "CASES_TIMING".svg_cree; Type: COMMENT; Schema: libertribes; Owner: hegoa
--

COMMENT ON COLUMN "CASES_TIMING".svg_cree IS 'pour indiquer si ce changement a déjà été répercuté dans un fichier svg, associé à la variable svg dans table CASE';


--
-- Name: seq_compte_id; Type: SEQUENCE; Schema: libertribes; Owner: hegoa
--

CREATE SEQUENCE seq_compte_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seq_compte_id OWNER TO hegoa;

--
-- Name: COMPTE; Type: TABLE; Schema: libertribes; Owner: hegoa; Tablespace: 
--

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
    type_compte type_compte DEFAULT 'base'::type_compte NOT NULL,
    nombre_des smallint DEFAULT 1 NOT NULL
);


ALTER TABLE "COMPTE" OWNER TO hegoa;

--
-- Name: COLUMN "COMPTE".password; Type: COMMENT; Schema: libertribes; Owner: hegoa
--

COMMENT ON COLUMN "COMPTE".password IS '20 character max';


--
-- Name: COLUMN "COMPTE".confirmation; Type: COMMENT; Schema: libertribes; Owner: hegoa
--

COMMENT ON COLUMN "COMPTE".confirmation IS 'TRUE ou FALSE';


--
-- Name: COLUMN "COMPTE".statut; Type: COMMENT; Schema: libertribes; Owner: hegoa
--

COMMENT ON COLUMN "COMPTE".statut IS 'état du joueur (offline, online, exclus)';


--
-- Name: seq_newsletter_id; Type: SEQUENCE; Schema: libertribes; Owner: hegoa
--

CREATE SEQUENCE seq_newsletter_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seq_newsletter_id OWNER TO hegoa;

--
-- Name: NEWSLETTER; Type: TABLE; Schema: libertribes; Owner: hegoa; Tablespace: 
--

CREATE TABLE "NEWSLETTER" (
    email character varying(255) NOT NULL,
    newsletter_id numeric DEFAULT nextval('seq_newsletter_id'::regclass) NOT NULL
);


ALTER TABLE "NEWSLETTER" OWNER TO hegoa;

--
-- Name: RACE; Type: TABLE; Schema: libertribes; Owner: hegoa; Tablespace: 
--

CREATE TABLE "RACE" (
    race_nom character varying(20) NOT NULL,
    taux_natalite numeric DEFAULT 0 NOT NULL,
    vitalite_unite numeric DEFAULT 0 NOT NULL,
    batiments character varying(200),
    sorts character varying(200)
);


ALTER TABLE "RACE" OWNER TO hegoa;

--
-- Name: COLUMN "RACE".taux_natalite; Type: COMMENT; Schema: libertribes; Owner: hegoa
--

COMMENT ON COLUMN "RACE".taux_natalite IS 'taux de natalité (en %)';


--
-- Name: COLUMN "RACE".vitalite_unite; Type: COMMENT; Schema: libertribes; Owner: hegoa
--

COMMENT ON COLUMN "RACE".vitalite_unite IS 'points de vie par être';


--
-- Name: COLUMN "RACE".batiments; Type: COMMENT; Schema: libertribes; Owner: hegoa
--

COMMENT ON COLUMN "RACE".batiments IS 'liste des batiments possible pour chaque type de race (la liste est a monter, et le datatype doit etre cree en fonction)';


--
-- Name: COLUMN "RACE".sorts; Type: COMMENT; Schema: libertribes; Owner: hegoa
--

COMMENT ON COLUMN "RACE".sorts IS 'liste des sorts possible en fonction de chaque race. Le datatype de la colonne devra etre fonction du nombre de sort possible (comme lst_building)';


--
-- Name: RAYON; Type: TABLE; Schema: libertribes; Owner: hegoa; Tablespace: 
--

CREATE TABLE "RAYON" (
    centre point NOT NULL,
    rayon numeric NOT NULL
);


ALTER TABLE "RAYON" OWNER TO hegoa;

--
-- Name: TABLE "RAYON"; Type: COMMENT; Schema: libertribes; Owner: hegoa
--

COMMENT ON TABLE "RAYON" IS 'La table contient la case de référence pour le calcul du rayon de confinement de colonisation, ainsi que la valeur actuelle du rayon (en px)';


--
-- Name: TERRAIN; Type: TABLE; Schema: libertribes; Owner: hegoa; Tablespace: 
--

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


ALTER TABLE "TERRAIN" OWNER TO hegoa;

--
-- Name: TABLE "TERRAIN"; Type: COMMENT; Schema: libertribes; Owner: hegoa
--

COMMENT ON TABLE "TERRAIN" IS 'Définition des propriétés des terrains';


--
-- Name: COLUMN "TERRAIN".couleur; Type: COMMENT; Schema: libertribes; Owner: hegoa
--

COMMENT ON COLUMN "TERRAIN".couleur IS 'couleur associée au terrain, pour le définir à partir d''une image';


--
-- Name: seq_village_id; Type: SEQUENCE; Schema: libertribes; Owner: hegoa
--

CREATE SEQUENCE seq_village_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seq_village_id OWNER TO hegoa;

--
-- Name: VILLAGE; Type: TABLE; Schema: libertribes; Owner: hegoa; Tablespace: 
--

CREATE TABLE "VILLAGE" (
    village_id bigint DEFAULT nextval('seq_village_id'::regclass) NOT NULL,
    nom_village character varying(20) DEFAULT 'ND'::character varying NOT NULL,
    taille_village numeric DEFAULT 0 NOT NULL,
    niveau_defense numeric DEFAULT 0 NOT NULL,
    niveau_fer numeric DEFAULT 0 NOT NULL,
    niveau_bois numeric DEFAULT 0 NOT NULL,
    niveau_cyniam numeric DEFAULT 0 NOT NULL,
    avatar_iden numeric NOT NULL,
    valeur_mana numeric,
    paysans numeric,
    guerriers_cac numeric,
    guerriers_dist numeric,
    mages numeric,
    chariots_guerre numeric,
    chariots_transport numeric,
    invocations character varying(200),
    date_creation timestamp without time zone,
    casa bigint NOT NULL
);


ALTER TABLE "VILLAGE" OWNER TO hegoa;

--
-- Name: COLUMN "VILLAGE".invocations; Type: COMMENT; Schema: libertribes; Owner: hegoa
--

COMMENT ON COLUMN "VILLAGE".invocations IS 'liste d''invocations, séparées par des virgules';


--
-- Name: seq_casessvg_id; Type: SEQUENCE; Schema: libertribes; Owner: hegoa
--

CREATE SEQUENCE seq_casessvg_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seq_casessvg_id OWNER TO hegoa;

--
-- Name: seq_message_id; Type: SEQUENCE; Schema: libertribes; Owner: hegoa
--

CREATE SEQUENCE seq_message_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seq_message_id OWNER TO hegoa;

--
-- Name: ACTUALITE_NO_ACTU_key; Type: CONSTRAINT; Schema: libertribes; Owner: hegoa; Tablespace: 
--

ALTER TABLE ONLY "ACTUALITE"
    ADD CONSTRAINT "ACTUALITE_NO_ACTU_key" UNIQUE (actualite_id);


--
-- Name: AVATAR_pkey; Type: CONSTRAINT; Schema: libertribes; Owner: hegoa; Tablespace: 
--

ALTER TABLE ONLY "AVATAR"
    ADD CONSTRAINT "AVATAR_pkey" PRIMARY KEY (avatar_id);


--
-- Name: CASES_TIMING_pkey; Type: CONSTRAINT; Schema: libertribes; Owner: hegoa; Tablespace: 
--

ALTER TABLE ONLY "CASES_TIMING"
    ADD CONSTRAINT "CASES_TIMING_pkey" PRIMARY KEY (temps_changement);


--
-- Name: CASE_pkey; Type: CONSTRAINT; Schema: libertribes; Owner: hegoa; Tablespace: 
--

ALTER TABLE ONLY "CASE"
    ADD CONSTRAINT "CASE_pkey" PRIMARY KEY (id);


--
-- Name: COMPTE_email_key; Type: CONSTRAINT; Schema: libertribes; Owner: hegoa; Tablespace: 
--

ALTER TABLE ONLY "COMPTE"
    ADD CONSTRAINT "COMPTE_email_key" UNIQUE (email);


--
-- Name: COMPTE_pkey; Type: CONSTRAINT; Schema: libertribes; Owner: hegoa; Tablespace: 
--

ALTER TABLE ONLY "COMPTE"
    ADD CONSTRAINT "COMPTE_pkey" PRIMARY KEY (compte_id);


--
-- Name: NEWSLETTER_pkey; Type: CONSTRAINT; Schema: libertribes; Owner: hegoa; Tablespace: 
--

ALTER TABLE ONLY "NEWSLETTER"
    ADD CONSTRAINT "NEWSLETTER_pkey" PRIMARY KEY (newsletter_id);


--
-- Name: RACE_pkey; Type: CONSTRAINT; Schema: libertribes; Owner: hegoa; Tablespace: 
--

ALTER TABLE ONLY "RACE"
    ADD CONSTRAINT "RACE_pkey" PRIMARY KEY (race_nom);


--
-- Name: TERRAIN_pkey; Type: CONSTRAINT; Schema: libertribes; Owner: hegoa; Tablespace: 
--

ALTER TABLE ONLY "TERRAIN"
    ADD CONSTRAINT "TERRAIN_pkey" PRIMARY KEY (nom);


--
-- Name: VILLAGE_pkey; Type: CONSTRAINT; Schema: libertribes; Owner: hegoa; Tablespace: 
--

ALTER TABLE ONLY "VILLAGE"
    ADD CONSTRAINT "VILLAGE_pkey" PRIMARY KEY (village_id);


--
-- Name: AVATAR_compte_id_fkey; Type: FK CONSTRAINT; Schema: libertribes; Owner: hegoa
--

ALTER TABLE ONLY "AVATAR"
    ADD CONSTRAINT "AVATAR_compte_id_fkey" FOREIGN KEY (compte_id) REFERENCES "COMPTE"(compte_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: AVATAR_race_fkey; Type: FK CONSTRAINT; Schema: libertribes; Owner: hegoa
--

ALTER TABLE ONLY "AVATAR"
    ADD CONSTRAINT "AVATAR_race_fkey" FOREIGN KEY (race) REFERENCES "RACE"(race_nom) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: CASES_TIMING_case_id_fkey; Type: FK CONSTRAINT; Schema: libertribes; Owner: hegoa
--

ALTER TABLE ONLY "CASES_TIMING"
    ADD CONSTRAINT "CASES_TIMING_case_id_fkey" FOREIGN KEY (case_id) REFERENCES "CASE"(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: CASE_nom_terrain_fkey; Type: FK CONSTRAINT; Schema: libertribes; Owner: hegoa
--

ALTER TABLE ONLY "CASE"
    ADD CONSTRAINT "CASE_nom_terrain_fkey" FOREIGN KEY (nom_terrain) REFERENCES "TERRAIN"(nom) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: VILLAGE_avatar_iden_fkey; Type: FK CONSTRAINT; Schema: libertribes; Owner: hegoa
--

ALTER TABLE ONLY "VILLAGE"
    ADD CONSTRAINT "VILLAGE_avatar_iden_fkey" FOREIGN KEY (avatar_iden) REFERENCES "AVATAR"(avatar_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: VILLAGE_casa_fkey; Type: FK CONSTRAINT; Schema: libertribes; Owner: hegoa
--

ALTER TABLE ONLY "VILLAGE"
    ADD CONSTRAINT "VILLAGE_casa_fkey" FOREIGN KEY (casa) REFERENCES "CASE"(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

