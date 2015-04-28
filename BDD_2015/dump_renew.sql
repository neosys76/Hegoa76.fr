--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: libertribes; Type: SCHEMA; Schema: -; Owner: libertribes_neosys
--

CREATE SCHEMA libertribes;


ALTER SCHEMA libertribes OWNER TO libertribes_neosys;

--
-- Name: SCHEMA libertribes; Type: COMMENT; Schema: -; Owner: libertribes_neosys
--

COMMENT ON SCHEMA libertribes IS 'Principal schema owner';


SET search_path = libertribes, pg_catalog;

--
-- Name: seq_account_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_account_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_account_id OWNER TO libertribes_neosys;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: ACCOUNT; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "ACCOUNT" (
    account_id numeric DEFAULT nextval('seq_account_id'::regclass) NOT NULL,
    lastname character varying(30),
    firstname character varying(30),
    password character varying(32) NOT NULL,
    email character varying(255) NOT NULL,
    date_inscription date DEFAULT now(),
    confirmation boolean NOT NULL,
    status character varying(20) NOT NULL,
    ville character varying(50),
    pays character(2),
    date_anniv date,
    presentation character varying(2048)
);


ALTER TABLE libertribes."ACCOUNT" OWNER TO libertribes_neosys;

--
-- Name: COLUMN "ACCOUNT".password; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "ACCOUNT".password IS '20 character max';


--
-- Name: COLUMN "ACCOUNT".confirmation; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "ACCOUNT".confirmation IS '0 if account not confirm , 1 if account is confirm';


--
-- Name: COLUMN "ACCOUNT".status; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "ACCOUNT".status IS 'player status (offline /  online / exclude)';


--
-- Name: seq_actualite_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_actualite_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_actualite_id OWNER TO libertribes_neosys;

--
-- Name: ACTUALITE; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "ACTUALITE" (
    actualite_id bigint DEFAULT nextval('seq_actualite_id'::regclass) NOT NULL,
    type character varying(8),
    libelle character varying(1024),
    date_creation date
);


ALTER TABLE libertribes."ACTUALITE" OWNER TO libertribes_neosys;

--
-- Name: seq_bunsif_armor_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_bunsif_armor_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_bunsif_armor_id OWNER TO libertribes_neosys;

--
-- Name: ARMOR_BUNSIF; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "ARMOR_BUNSIF" (
    armor_id numeric DEFAULT nextval('seq_bunsif_armor_id'::regclass) NOT NULL,
    armor_name character varying(20) NOT NULL,
    level_min numeric DEFAULT 0 NOT NULL,
    level_max numeric DEFAULT 0 NOT NULL,
    cover_hand boolean,
    cover_harm boolean,
    cover_leg boolean,
    cover_neck boolean,
    cover_head boolean,
    hand_artefact boolean,
    harm_artefact boolean,
    leg_artefact boolean,
    body_artefact boolean,
    head_artefact boolean,
    care_bonus numeric NOT NULL,
    magic_bonus numeric NOT NULL,
    f_live_unit_bonus numeric NOT NULL,
    f_meca_unit_bonus numeric,
    prod_iron_bonus numeric NOT NULL,
    prod_wood_bonus numeric NOT NULL,
    prod_cyniam_bonus numeric NOT NULL,
    prod_mana_bonus numeric NOT NULL,
    attac_bonus numeric NOT NULL,
    def_bonus numeric NOT NULL,
    "H_NAME" character varying(20) NOT NULL
);


ALTER TABLE libertribes."ARMOR_BUNSIF" OWNER TO libertribes_neosys;

--
-- Name: seq_human_armor_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_human_armor_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_human_armor_id OWNER TO libertribes_neosys;

--
-- Name: ARMOR_HUMAN; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "ARMOR_HUMAN" (
    armor_id numeric DEFAULT nextval('seq_human_armor_id'::regclass) NOT NULL,
    armor_name character varying(20) NOT NULL,
    level_min numeric DEFAULT 0 NOT NULL,
    level_max numeric DEFAULT 0 NOT NULL,
    cover_hand boolean,
    cover_harm boolean,
    cover_leg boolean,
    cover_neck boolean,
    cover_head boolean,
    hand_artefact boolean,
    harm_artefact boolean,
    leg_artefact boolean,
    body_artefact boolean,
    head_artefact boolean,
    care_bonus numeric NOT NULL,
    magic_bonus numeric NOT NULL,
    f_live_unit_bonus numeric NOT NULL,
    f_meca_unit_bonus numeric,
    prod_iron_bonus numeric NOT NULL,
    prod_wood_bonus numeric NOT NULL,
    prod_cyniam_bonus numeric NOT NULL,
    prod_mana_bonus numeric NOT NULL,
    attac_bonus numeric NOT NULL,
    def_bonus numeric NOT NULL,
    "H_NAME" character varying(20) NOT NULL
);


ALTER TABLE libertribes."ARMOR_HUMAN" OWNER TO libertribes_neosys;

--
-- Name: seq_nhymsine_armor_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_nhymsine_armor_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_nhymsine_armor_id OWNER TO libertribes_neosys;

--
-- Name: ARMOR_NHYMSINE; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "ARMOR_NHYMSINE" (
    armor_id numeric DEFAULT nextval('seq_nhymsine_armor_id'::regclass) NOT NULL,
    armor_name character varying(20) NOT NULL,
    level_min numeric DEFAULT 0 NOT NULL,
    level_max numeric DEFAULT 0 NOT NULL,
    cover_hand boolean,
    cover_harm boolean,
    cover_leg boolean,
    cover_neck boolean,
    cover_head boolean,
    hand_artefact boolean,
    harm_artefact boolean,
    leg_artefact boolean,
    body_artefact boolean,
    head_artefact boolean,
    care_bonus numeric NOT NULL,
    magic_bonus numeric NOT NULL,
    f_live_unit_bonus numeric NOT NULL,
    f_meca_unit_bonus numeric,
    prod_iron_bonus numeric NOT NULL,
    prod_wood_bonus numeric NOT NULL,
    prod_cyniam_bonus numeric NOT NULL,
    prod_mana_bonus numeric NOT NULL,
    attac_bonus numeric NOT NULL,
    def_bonus numeric NOT NULL,
    "H_NAME" character varying(20) NOT NULL
);


ALTER TABLE libertribes."ARMOR_NHYMSINE" OWNER TO libertribes_neosys;

--
-- Name: seq_sulmis_armor_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_sulmis_armor_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_sulmis_armor_id OWNER TO libertribes_neosys;

--
-- Name: ARMOR_SULMIS; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "ARMOR_SULMIS" (
    armor_id numeric DEFAULT nextval('seq_sulmis_armor_id'::regclass) NOT NULL,
    armor_name character varying(20) NOT NULL,
    level_min numeric DEFAULT 0 NOT NULL,
    level_max numeric DEFAULT 0 NOT NULL,
    cover_hand boolean,
    cover_harm boolean,
    cover_leg boolean,
    cover_neck boolean,
    cover_head boolean,
    hand_artefact boolean,
    harm_artefact boolean,
    leg_artefact boolean,
    body_artefact boolean,
    head_artefact boolean,
    care_bonus numeric NOT NULL,
    magic_bonus numeric NOT NULL,
    f_live_unit_bonus numeric NOT NULL,
    f_meca_unit_bonus numeric,
    prod_iron_bonus numeric NOT NULL,
    prod_wood_bonus numeric NOT NULL,
    prod_cyniam_bonus numeric NOT NULL,
    prod_mana_bonus numeric NOT NULL,
    attac_bonus numeric NOT NULL,
    def_bonus numeric NOT NULL,
    "H_NAME" character varying(20) NOT NULL
);


ALTER TABLE libertribes."ARMOR_SULMIS" OWNER TO libertribes_neosys;

--
-- Name: seq_bunsif_artefact_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_bunsif_artefact_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_bunsif_artefact_id OWNER TO libertribes_neosys;

--
-- Name: ARTEFACT_BUNSIF; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "ARTEFACT_BUNSIF" (
    artefact_id numeric DEFAULT nextval('seq_bunsif_artefact_id'::regclass) NOT NULL,
    artefact_name character varying(20) NOT NULL,
    artefact_type character varying(20) NOT NULL,
    min_level numeric NOT NULL,
    max_level numeric NOT NULL,
    soin_bonus numeric DEFAULT 0,
    magic_bonus numeric,
    unit_live_bonus numeric DEFAULT 0,
    unit_meca_bonus numeric DEFAULT 0,
    prod_bonus numeric DEFAULT 0,
    attack_bonus numeric DEFAULT 0,
    def_work_bonus numeric DEFAULT 0,
    live_elapsed numeric,
    "H_NAME" character varying(20) NOT NULL
);


ALTER TABLE libertribes."ARTEFACT_BUNSIF" OWNER TO libertribes_neosys;

--
-- Name: seq_human_artefact_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_human_artefact_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_human_artefact_id OWNER TO libertribes_neosys;

--
-- Name: ARTEFACT_HUM; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "ARTEFACT_HUM" (
    artefact_id numeric DEFAULT nextval('seq_human_artefact_id'::regclass) NOT NULL,
    artefact_name character varying(20) NOT NULL,
    artefact_type character varying(20) NOT NULL,
    min_level numeric NOT NULL,
    max_level numeric NOT NULL,
    soin_bonus numeric DEFAULT 0,
    magic_bonus numeric,
    unit_live_bonus numeric DEFAULT 0,
    unit_meca_bonus numeric DEFAULT 0,
    prod_bonus numeric DEFAULT 0,
    attack_bonus numeric DEFAULT 0,
    def_work_bonus numeric DEFAULT 0,
    live_elapsed numeric,
    "H_NAME" character varying(20) NOT NULL
);


ALTER TABLE libertribes."ARTEFACT_HUM" OWNER TO libertribes_neosys;

--
-- Name: seq_nhymsine_artefact_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_nhymsine_artefact_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_nhymsine_artefact_id OWNER TO libertribes_neosys;

--
-- Name: ARTEFACT_NHYMSINE; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "ARTEFACT_NHYMSINE" (
    artefact_id numeric DEFAULT nextval('seq_nhymsine_artefact_id'::regclass) NOT NULL,
    artefact_name character varying(20) NOT NULL,
    artefact_type character varying(20) NOT NULL,
    min_level numeric NOT NULL,
    max_level numeric NOT NULL,
    soin_bonus numeric DEFAULT 0,
    magic_bonus numeric,
    unit_live_bonus numeric DEFAULT 0,
    unit_meca_bonus numeric DEFAULT 0,
    prod_bonus numeric DEFAULT 0,
    attack_bonus numeric DEFAULT 0,
    def_work_bonus numeric DEFAULT 0,
    live_elapsed numeric,
    "H_NAME" character varying(20) NOT NULL
);


ALTER TABLE libertribes."ARTEFACT_NHYMSINE" OWNER TO libertribes_neosys;

--
-- Name: seq_sulmis_artefact_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_sulmis_artefact_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_sulmis_artefact_id OWNER TO libertribes_neosys;

--
-- Name: ARTEFACT_SULMIS; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "ARTEFACT_SULMIS" (
    artefact_id numeric DEFAULT nextval('seq_sulmis_artefact_id'::regclass) NOT NULL,
    artefact_name character varying(20) NOT NULL,
    artefact_type character varying(20) NOT NULL,
    min_level numeric NOT NULL,
    max_level numeric NOT NULL,
    soin_bonus numeric DEFAULT 0,
    magic_bonus numeric,
    unit_live_bonus numeric DEFAULT 0,
    unit_meca_bonus numeric DEFAULT 0,
    prod_bonus numeric DEFAULT 0,
    attack_bonus numeric DEFAULT 0,
    def_work_bonus numeric DEFAULT 0,
    live_elapsed numeric,
    "H_NAME" character varying(20) NOT NULL
);


ALTER TABLE libertribes."ARTEFACT_SULMIS" OWNER TO libertribes_neosys;

--
-- Name: seq_avatar_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_avatar_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_avatar_id OWNER TO libertribes_neosys;

--
-- Name: AVATAR; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "AVATAR" (
    avatar_name character varying(20) NOT NULL,
    world_name character varying(20),
    politic_regim character varying(20),
    avatar_age numeric DEFAULT 0,
    player_fil_hypo character varying(20),
    player_fil_cert numeric,
    level_agressivite numeric DEFAULT 0,
    level_efficacite numeric DEFAULT 0,
    level_commerce numeric DEFAULT 0,
    level_escroquerie numeric DEFAULT 0,
    account_id numeric NOT NULL,
    player_fil_typ character varying(20),
    coord_first_town point,
    avatar_life bigint DEFAULT 0,
    last_connexion date,
    race_name character varying(20),
    level numeric DEFAULT 0,
    avatar_id numeric DEFAULT nextval('seq_avatar_id'::regclass)
);


ALTER TABLE libertribes."AVATAR" OWNER TO libertribes_neosys;

--
-- Name: COLUMN "AVATAR".politic_regim; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "AVATAR".politic_regim IS 'regime politique';


--
-- Name: COLUMN "AVATAR".player_fil_hypo; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "AVATAR".player_fil_hypo IS 'filiation joueur hypothetique';


--
-- Name: COLUMN "AVATAR".player_fil_cert; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "AVATAR".player_fil_cert IS 'filiation jouer certifié';


--
-- Name: COLUMN "AVATAR".level_agressivite; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "AVATAR".level_agressivite IS 'level agressivite (maxi a fixer)calculé regulierement et valeur fixe à un instant T';


--
-- Name: COLUMN "AVATAR".level_efficacite; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "AVATAR".level_efficacite IS 'level efficatité (maxi à fixer)calculé regulierement et valeur fixe à un instant T';


--
-- Name: COLUMN "AVATAR".level_commerce; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "AVATAR".level_commerce IS 'level commerce (maxi a fixer)calculé regulierement et valeur fixe à un instant T';


--
-- Name: COLUMN "AVATAR".level_escroquerie; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "AVATAR".level_escroquerie IS 'level escroqueriecalculé regulierement et valeur fixe à un instant T';


--
-- Name: COLUMN "AVATAR".player_fil_typ; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "AVATAR".player_fil_typ IS 'type de "parenté" (pere / mere / fils /fille)';


--
-- Name: COLUMN "AVATAR".avatar_life; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "AVATAR".avatar_life IS 'duree de vie de l''avatar';


--
-- Name: COLUMN "AVATAR".last_connexion; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "AVATAR".last_connexion IS 'derniere connexion - type date';


--
-- Name: BDC; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "BDC" (
    bdc_id bigint NOT NULL,
    nbr_bois bigint,
    nbr_fer bigint,
    nbr_cyniam bigint,
    nbr_cases bigint,
    nbr_unites bigint,
    date_expir_bdc date,
    signe_bdc character varying(50) NOT NULL,
    signature_buyer character varying(20) NOT NULL,
    signature_vendor character varying(20) NOT NULL,
    buyer_name character varying(50) NOT NULL,
    offre_id bigint NOT NULL,
    prix_conseil_offre_total bigint NOT NULL,
    date_emission date NOT NULL,
    town_name character varying(20) NOT NULL,
    vendor_name character varying(50) NOT NULL
);


ALTER TABLE libertribes."BDC" OWNER TO libertribes_neosys;

--
-- Name: EMPLACEMENT_MARCHE_GUILDE; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "EMPLACEMENT_MARCHE_GUILDE" (
    emplacement_id bigint NOT NULL,
    emplacement_name character varying(50),
    cur_level bigint NOT NULL,
    prix_emplacement bigint NOT NULL,
    percent_taxe bigint NOT NULL,
    locataire_name character varying(50),
    prix_loyer bigint NOT NULL,
    duree_location bigint NOT NULL,
    guilde_name character varying(20) NOT NULL
);


ALTER TABLE libertribes."EMPLACEMENT_MARCHE_GUILDE" OWNER TO libertribes_neosys;

--
-- Name: COLUMN "EMPLACEMENT_MARCHE_GUILDE".duree_location; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "EMPLACEMENT_MARCHE_GUILDE".duree_location IS 'en jour';


--
-- Name: EMPLACEMENT_MARCHE_JOUEUR; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "EMPLACEMENT_MARCHE_JOUEUR" (
    emplacement_id bigint NOT NULL,
    emplacement_name character varying(50),
    cur_level bigint NOT NULL,
    prix_emplacement bigint NOT NULL,
    percent_taxe bigint NOT NULL,
    locataire_name character varying(50),
    prix_loyer bigint NOT NULL,
    duree_location bigint NOT NULL,
    proprio_name character varying(20) NOT NULL
);


ALTER TABLE libertribes."EMPLACEMENT_MARCHE_JOUEUR" OWNER TO libertribes_neosys;

--
-- Name: COLUMN "EMPLACEMENT_MARCHE_JOUEUR".duree_location; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "EMPLACEMENT_MARCHE_JOUEUR".duree_location IS 'en jour';


--
-- Name: GUILDE; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "GUILDE" (
    guilde_name character varying(20) NOT NULL,
    membre_name character varying,
    date_creation_guilde date NOT NULL,
    date_fermeture_guilde date,
    fondator_name character varying(20) NOT NULL
);


ALTER TABLE libertribes."GUILDE" OWNER TO libertribes_neosys;

--
-- Name: GUILDE_MEMBRE; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "GUILDE_MEMBRE" (
    statut character varying(50),
    membre_name character varying(20) NOT NULL,
    guilde_name character varying(20) NOT NULL
);


ALTER TABLE libertribes."GUILDE_MEMBRE" OWNER TO libertribes_neosys;

--
-- Name: H_BUNSIF; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "H_BUNSIF" (
    "H_NAME" character varying(20) NOT NULL,
    "H_RACE" character varying(20) NOT NULL,
    level numeric DEFAULT 0 NOT NULL,
    next_level numeric,
    attac_bonus numeric DEFAULT 0 NOT NULL,
    next_exp numeric,
    nbr_brac numeric DEFAULT 0 NOT NULL,
    nbr_leg numeric DEFAULT 0 NOT NULL,
    nbr_nklace numeric DEFAULT 0 NOT NULL,
    nbr_crown numeric DEFAULT 0 NOT NULL,
    nbr_armor numeric DEFAULT 0 NOT NULL,
    def_bonus numeric DEFAULT 0 NOT NULL,
    "WORK_NAME3" character varying(20) NOT NULL,
    "WORK_NAME2" character varying(20) NOT NULL,
    "WORK_NAME" character varying(20) NOT NULL
);


ALTER TABLE libertribes."H_BUNSIF" OWNER TO libertribes_neosys;

--
-- Name: COLUMN "H_BUNSIF".nbr_brac; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_BUNSIF".nbr_brac IS 'max 6';


--
-- Name: COLUMN "H_BUNSIF".nbr_leg; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_BUNSIF".nbr_leg IS 'max 2';


--
-- Name: COLUMN "H_BUNSIF".nbr_nklace; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_BUNSIF".nbr_nklace IS 'max 5';


--
-- Name: COLUMN "H_BUNSIF".nbr_crown; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_BUNSIF".nbr_crown IS 'max 1';


--
-- Name: COLUMN "H_BUNSIF".nbr_armor; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_BUNSIF".nbr_armor IS 'max 1';


--
-- Name: H_HUMAN; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "H_HUMAN" (
    "H_NAME" character varying(20) NOT NULL,
    "H_RACE" character varying(20) NOT NULL,
    level numeric DEFAULT 0 NOT NULL,
    next_level numeric,
    attac_bonus numeric NOT NULL,
    next_exp numeric,
    nbr_ring numeric DEFAULT 0 NOT NULL,
    nbr_brac numeric DEFAULT 0 NOT NULL,
    nbr_leg numeric DEFAULT 0 NOT NULL,
    nbr_nklace numeric DEFAULT 0 NOT NULL,
    nbr_crown numeric DEFAULT 0 NOT NULL,
    nbr_armor numeric DEFAULT 0 NOT NULL,
    "WORK_NAME" character varying(20) NOT NULL,
    "WORK_NAME2" character varying(20) NOT NULL,
    "WORK_NAME3" character varying(20) NOT NULL,
    def_bonus numeric NOT NULL
);


ALTER TABLE libertribes."H_HUMAN" OWNER TO libertribes_neosys;

--
-- Name: COLUMN "H_HUMAN".nbr_ring; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_HUMAN".nbr_ring IS 'max 20';


--
-- Name: COLUMN "H_HUMAN".nbr_brac; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_HUMAN".nbr_brac IS 'max 4';


--
-- Name: COLUMN "H_HUMAN".nbr_leg; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_HUMAN".nbr_leg IS 'max 2';


--
-- Name: COLUMN "H_HUMAN".nbr_nklace; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_HUMAN".nbr_nklace IS 'max 3';


--
-- Name: COLUMN "H_HUMAN".nbr_crown; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_HUMAN".nbr_crown IS 'max 1';


--
-- Name: COLUMN "H_HUMAN".nbr_armor; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_HUMAN".nbr_armor IS 'max 1';


--
-- Name: H_NHYMSINE; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "H_NHYMSINE" (
    "H_NAME" character varying(20) NOT NULL,
    "H_RACE" character varying(20) NOT NULL,
    level numeric DEFAULT 0 NOT NULL,
    next_level numeric,
    attac_bonus numeric DEFAULT 0 NOT NULL,
    next_exp numeric,
    nbr_ring numeric DEFAULT 10 NOT NULL,
    nbr_brac numeric DEFAULT 0 NOT NULL,
    nbr_crown numeric DEFAULT 0 NOT NULL,
    nbr_armor numeric DEFAULT 0 NOT NULL,
    def_bonus numeric DEFAULT 0 NOT NULL,
    "WORK_NAME3" character varying(20) NOT NULL,
    "WORK_NAME2" character varying(20) NOT NULL,
    "WORK_NAME" character varying(20) NOT NULL
);


ALTER TABLE libertribes."H_NHYMSINE" OWNER TO libertribes_neosys;

--
-- Name: COLUMN "H_NHYMSINE".nbr_ring; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_NHYMSINE".nbr_ring IS 'Max : random à la creation';


--
-- Name: COLUMN "H_NHYMSINE".nbr_brac; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_NHYMSINE".nbr_brac IS 'max 4';


--
-- Name: COLUMN "H_NHYMSINE".nbr_crown; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_NHYMSINE".nbr_crown IS 'max 1';


--
-- Name: COLUMN "H_NHYMSINE".nbr_armor; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_NHYMSINE".nbr_armor IS 'max 1';


--
-- Name: H_SULMIS; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "H_SULMIS" (
    "H_NAME" character varying(20) NOT NULL,
    "H_RACE" character varying(20) NOT NULL,
    level numeric DEFAULT 0 NOT NULL,
    next_level numeric,
    attac_bonus numeric NOT NULL,
    next_exp numeric,
    nbr_ring numeric DEFAULT 0 NOT NULL,
    nbr_brac numeric DEFAULT 0 NOT NULL,
    nbr_leg numeric DEFAULT 0 NOT NULL,
    nbr_nklace numeric DEFAULT 0 NOT NULL,
    nbr_crown numeric DEFAULT 0 NOT NULL,
    nbr_armor numeric DEFAULT 0 NOT NULL,
    def_bonus numeric NOT NULL,
    nbr_slenis numeric DEFAULT 0 NOT NULL,
    "WORK_NAME" character varying(20) NOT NULL,
    "WORK_NAME2" character varying(20) NOT NULL,
    "WORK_NAME3" character varying(20) NOT NULL
);


ALTER TABLE libertribes."H_SULMIS" OWNER TO libertribes_neosys;

--
-- Name: COLUMN "H_SULMIS".nbr_ring; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_SULMIS".nbr_ring IS 'max 18';


--
-- Name: COLUMN "H_SULMIS".nbr_brac; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_SULMIS".nbr_brac IS 'max 4';


--
-- Name: COLUMN "H_SULMIS".nbr_leg; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_SULMIS".nbr_leg IS 'max 2';


--
-- Name: COLUMN "H_SULMIS".nbr_nklace; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_SULMIS".nbr_nklace IS 'max 3';


--
-- Name: COLUMN "H_SULMIS".nbr_crown; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_SULMIS".nbr_crown IS 'max 1';


--
-- Name: COLUMN "H_SULMIS".nbr_armor; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_SULMIS".nbr_armor IS 'max 1';


--
-- Name: COLUMN "H_SULMIS".nbr_slenis; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "H_SULMIS".nbr_slenis IS 'max 1';


--
-- Name: INDEX_AVATAR; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "INDEX_AVATAR" (
    index_id bigint NOT NULL,
    avatar_name character varying(20) NOT NULL,
    percent_aggress bigint NOT NULL,
    percent_effic bigint NOT NULL,
    percent_comm bigint NOT NULL,
    percent_escroc bigint NOT NULL
);


ALTER TABLE libertribes."INDEX_AVATAR" OWNER TO libertribes_neosys;

--
-- Name: INDEX_MARCHE; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "INDEX_MARCHE" (
    index_id bigint NOT NULL,
    index_bois bigint NOT NULL,
    index_fer bigint NOT NULL,
    index_cyniam bigint NOT NULL,
    index_cases bigint NOT NULL,
    index_unites bigint NOT NULL,
    bdc_online_bois bigint NOT NULL,
    bdc_online_fer bigint NOT NULL,
    bdc_online_cyniam bigint NOT NULL,
    bdc_online_cases bigint NOT NULL,
    bdc_online_unites bigint NOT NULL,
    bdc_valid_bois bigint NOT NULL,
    bdc_valid_fer bigint NOT NULL,
    bdc_valid_cyniam bigint NOT NULL,
    bdc_valid_cases bigint NOT NULL,
    bdc_valid_unites bigint NOT NULL
);


ALTER TABLE libertribes."INDEX_MARCHE" OWNER TO libertribes_neosys;

--
-- Name: MAGIC; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "MAGIC" (
    magic_name character varying(20) NOT NULL,
    mana_cost numeric NOT NULL,
    time_cost numeric NOT NULL,
    nbr_mage_cost numeric NOT NULL,
    categorie character varying(20),
    cur_effect numeric,
    cur_level numeric,
    next_level numeric NOT NULL,
    next_effect numeric NOT NULL
);


ALTER TABLE libertribes."MAGIC" OWNER TO libertribes_neosys;

--
-- Name: seq_message_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_message_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_message_id OWNER TO libertribes_neosys;

--
-- Name: MESSAGE; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "MESSAGE" (
    message_id numeric DEFAULT nextval('seq_message_id'::regclass) NOT NULL,
    account_id numeric NOT NULL,
    type numeric,
    object character varying(50),
    message character varying(1024),
    date_envoi date,
    is_read smallint DEFAULT 0,
    is_delete smallint DEFAULT 0
);


ALTER TABLE libertribes."MESSAGE" OWNER TO libertribes_neosys;

--
-- Name: seq_newsletter_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_newsletter_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_newsletter_id OWNER TO libertribes_neosys;

--
-- Name: NEWSLETTER; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "NEWSLETTER" (
    email character varying(255) NOT NULL,
    newsletter_id numeric DEFAULT nextval('seq_newsletter_id'::regclass)
);


ALTER TABLE libertribes."NEWSLETTER" OWNER TO libertribes_neosys;

--
-- Name: seq_obj_bunsif_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_obj_bunsif_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_obj_bunsif_id OWNER TO libertribes_neosys;

--
-- Name: OBJECT_BUNSIF; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "OBJECT_BUNSIF" (
    object_id numeric DEFAULT nextval('seq_obj_bunsif_id'::regclass) NOT NULL,
    object_name character varying(20) NOT NULL,
    object_type numeric,
    iron_cost numeric NOT NULL,
    wood_cost numeric NOT NULL,
    cyniam_cost numeric NOT NULL,
    time_cost numeric NOT NULL,
    attack_bonus numeric NOT NULL,
    def_bonus numeric NOT NULL,
    magic_bonus numeric NOT NULL,
    time_bonus numeric NOT NULL,
    effect_attack numeric NOT NULL,
    effect_defense numeric NOT NULL,
    effect_medic numeric NOT NULL,
    effect_magic numeric NOT NULL,
    effect_form_unit numeric NOT NULL,
    effect_prod_iron numeric NOT NULL,
    effect_prod_wood numeric NOT NULL,
    effect_prod_cyniam numeric NOT NULL,
    effect_prod_mana numeric NOT NULL,
    effect_prod_work numeric NOT NULL,
    "H_NAME" character varying(20) NOT NULL
);


ALTER TABLE libertribes."OBJECT_BUNSIF" OWNER TO libertribes_neosys;

--
-- Name: seq_obj_human_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_obj_human_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_obj_human_id OWNER TO libertribes_neosys;

--
-- Name: OBJECT_HUMAN; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "OBJECT_HUMAN" (
    object_id numeric DEFAULT nextval('seq_obj_human_id'::regclass) NOT NULL,
    object_name character varying(20) NOT NULL,
    object_type numeric,
    iron_cost numeric NOT NULL,
    wood_cost numeric NOT NULL,
    cyniam_cost numeric NOT NULL,
    time_cost numeric NOT NULL,
    attack_bonus numeric NOT NULL,
    def_bonus numeric NOT NULL,
    magic_bonus numeric NOT NULL,
    time_bonus numeric NOT NULL,
    effect_attack numeric NOT NULL,
    effect_defense numeric NOT NULL,
    effect_medic numeric NOT NULL,
    effect_magic numeric NOT NULL,
    effect_form_unit numeric NOT NULL,
    effect_prod_iron numeric NOT NULL,
    effect_prod_wood numeric NOT NULL,
    effect_prod_cyniam numeric NOT NULL,
    effect_prod_mana numeric NOT NULL,
    effect_prod_work numeric NOT NULL,
    "H_NAME" character varying(20) NOT NULL
);


ALTER TABLE libertribes."OBJECT_HUMAN" OWNER TO libertribes_neosys;

--
-- Name: seq_obj_nhymsine_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_obj_nhymsine_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_obj_nhymsine_id OWNER TO libertribes_neosys;

--
-- Name: OBJECT_NHYMSINE; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "OBJECT_NHYMSINE" (
    object_id numeric DEFAULT nextval('seq_obj_nhymsine_id'::regclass) NOT NULL,
    object_name character varying(20) NOT NULL,
    object_type numeric,
    iron_cost numeric NOT NULL,
    wood_cost numeric NOT NULL,
    cyniam_cost numeric NOT NULL,
    time_cost numeric NOT NULL,
    attack_bonus numeric NOT NULL,
    def_bonus numeric NOT NULL,
    magic_bonus numeric NOT NULL,
    time_bonus numeric NOT NULL,
    effect_attack numeric NOT NULL,
    effect_defense numeric NOT NULL,
    effect_medic numeric NOT NULL,
    effect_magic numeric NOT NULL,
    effect_form_unit numeric NOT NULL,
    effect_prod_iron numeric NOT NULL,
    effect_prod_wood numeric NOT NULL,
    effect_prod_cyniam numeric NOT NULL,
    effect_prod_mana numeric NOT NULL,
    effect_prod_work numeric NOT NULL,
    "H_NAME" character varying(20) NOT NULL
);


ALTER TABLE libertribes."OBJECT_NHYMSINE" OWNER TO libertribes_neosys;

--
-- Name: seq_obj_sulmis_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_obj_sulmis_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_obj_sulmis_id OWNER TO libertribes_neosys;

--
-- Name: OBJECT_SULMIS; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "OBJECT_SULMIS" (
    object_id numeric DEFAULT nextval('seq_obj_sulmis_id'::regclass) NOT NULL,
    object_name character varying(20) NOT NULL,
    object_type numeric,
    iron_cost numeric NOT NULL,
    wood_cost numeric NOT NULL,
    cyniam_cost numeric NOT NULL,
    time_cost numeric NOT NULL,
    attack_bonus numeric NOT NULL,
    def_bonus numeric NOT NULL,
    magic_bonus numeric NOT NULL,
    time_bonus numeric NOT NULL,
    effect_attack numeric NOT NULL,
    effect_defense numeric NOT NULL,
    effect_medic numeric NOT NULL,
    effect_magic numeric NOT NULL,
    effect_form_unit numeric NOT NULL,
    effect_prod_iron numeric NOT NULL,
    effect_prod_wood numeric NOT NULL,
    effect_prod_cyniam numeric NOT NULL,
    effect_prod_mana numeric NOT NULL,
    effect_prod_work numeric NOT NULL,
    "H_NAME" character varying(20) NOT NULL
);


ALTER TABLE libertribes."OBJECT_SULMIS" OWNER TO libertribes_neosys;

--
-- Name: OFFRE; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "OFFRE" (
    offre_id bigint NOT NULL,
    offre_annonce character varying(500) NOT NULL,
    prix_conseil_offre_total bigint NOT NULL,
    date_emission date NOT NULL,
    avatar_name character varying(20) NOT NULL,
    bdc_id bigint NOT NULL,
    signe_bdc character varying(50) NOT NULL
);


ALTER TABLE libertribes."OFFRE" OWNER TO libertribes_neosys;

--
-- Name: seq_quete_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_quete_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_quete_id OWNER TO libertribes_neosys;

--
-- Name: QUETE; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "QUETE" (
    quete_id numeric DEFAULT nextval('seq_quete_id'::regclass) NOT NULL,
    account_id numeric NOT NULL,
    titre character varying(50),
    coord_x smallint DEFAULT 0,
    coord_y smallint DEFAULT 0,
    recompense character varying(50),
    is_read smallint DEFAULT 0,
    type character varying(7) DEFAULT 'current'::character varying
);


ALTER TABLE libertribes."QUETE" OWNER TO libertribes_neosys;

--
-- Name: RACE; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "RACE" (
    race_name character varying(20) NOT NULL,
    tx_spawn numeric,
    lst_building character varying(20) NOT NULL,
    lst_sorts character varying(20) NOT NULL
);


ALTER TABLE libertribes."RACE" OWNER TO libertribes_neosys;

--
-- Name: COLUMN "RACE".tx_spawn; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "RACE".tx_spawn IS 'taux de natalité (en %)';


--
-- Name: COLUMN "RACE".lst_building; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "RACE".lst_building IS 'liste des batiments possible pour chaque type de race (la liste est a monter, et le datatype doit etre cree en fonction)';


--
-- Name: COLUMN "RACE".lst_sorts; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "RACE".lst_sorts IS 'liste des sorts possible en fonction de chaque race. Le datatype de la colonne devra etre fonction du nombre de sort possible (comme lst_building)';


--
-- Name: seq_science_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_science_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_science_id OWNER TO libertribes_neosys;

--
-- Name: SCIENCES; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "SCIENCES" (
    science_id numeric DEFAULT nextval('seq_science_id'::regclass) NOT NULL,
    science_name character varying(20) NOT NULL,
    iron_cost numeric NOT NULL,
    wood_cost numeric NOT NULL,
    cyniam_cost numeric NOT NULL,
    time_cost numeric NOT NULL,
    effect_acq numeric NOT NULL,
    cur_level numeric,
    next_level numeric,
    next_effect numeric,
    cost_next_level numeric,
    race_name character varying(20) NOT NULL
);


ALTER TABLE libertribes."SCIENCES" OWNER TO libertribes_neosys;

--
-- Name: COLUMN "SCIENCES".effect_acq; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "SCIENCES".effect_acq IS 'effet acquis';


--
-- Name: SORTS; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "SORTS" (
    sort_name character varying(20) NOT NULL,
    support character varying(20) NOT NULL,
    cyniam_cost numeric NOT NULL,
    mana_cost numeric NOT NULL,
    time_cost numeric NOT NULL,
    mage_cost numeric NOT NULL,
    cur_level numeric,
    next_level numeric,
    cur_effect numeric,
    next_effect numeric,
    type character varying(20) NOT NULL,
    time_elapsed numeric NOT NULL,
    magic_name character varying(20) NOT NULL
);


ALTER TABLE libertribes."SORTS" OWNER TO libertribes_neosys;

--
-- Name: TOWN; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "TOWN" (
    town_name character varying(20) NOT NULL,
    town_size numeric NOT NULL,
    defense_bonus numeric DEFAULT 0 NOT NULL,
    eat_bonus numeric DEFAULT 0 NOT NULL,
    iron_bonus numeric DEFAULT 0 NOT NULL,
    wood_bonus numeric DEFAULT 0 NOT NULL,
    cyniam_bonus numeric DEFAULT 0 NOT NULL,
    coord point
);


ALTER TABLE libertribes."TOWN" OWNER TO libertribes_neosys;

--
-- Name: TRAVEL; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "TRAVEL" (
    unit_list character varying(20),
    time_travel numeric NOT NULL,
    eat_conso numeric NOT NULL,
    travel_name character varying(20) NOT NULL,
    effect numeric NOT NULL,
    capacity numeric NOT NULL,
    case_end_occup boolean NOT NULL,
    type_travel character varying(20) NOT NULL,
    begin_coord point,
    end_coord point
);


ALTER TABLE libertribes."TRAVEL" OWNER TO libertribes_neosys;

--
-- Name: TYPE_TRAVEL; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "TYPE_TRAVEL" (
    type_travel character varying(20) NOT NULL
);


ALTER TABLE libertribes."TYPE_TRAVEL" OWNER TO libertribes_neosys;

--
-- Name: seq_unit_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_unit_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_unit_id OWNER TO libertribes_neosys;

--
-- Name: UNIT; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "UNIT" (
    unit_id numeric DEFAULT nextval('seq_unit_id'::regclass) NOT NULL,
    unit_level numeric NOT NULL,
    next_level numeric NOT NULL,
    time_from_cost numeric NOT NULL,
    eat_cost numeric NOT NULL,
    "attac_bonus_CAC" numeric NOT NULL,
    "attac_bonus_DIST" numeric NOT NULL,
    "attac_bonus_MAGIC" numeric NOT NULL,
    "def_bonus_CAC" numeric NOT NULL,
    "def_bonus_DIST" numeric NOT NULL,
    "def_bonus_MAGIC" numeric NOT NULL,
    cur_life numeric NOT NULL,
    max_life numeric NOT NULL,
    cur_exp numeric NOT NULL,
    speed numeric NOT NULL,
    quantity_transport numeric NOT NULL,
    unit_type character varying(20) NOT NULL
);


ALTER TABLE libertribes."UNIT" OWNER TO libertribes_neosys;

--
-- Name: COLUMN "UNIT".unit_type; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "UNIT".unit_type IS 'vivante / non vivante / invocation ...';


--
-- Name: UNIT_TYPE; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "UNIT_TYPE" (
    unit_name character varying(20) NOT NULL
);


ALTER TABLE libertribes."UNIT_TYPE" OWNER TO libertribes_neosys;

--
-- Name: COLUMN "UNIT_TYPE".unit_name; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "UNIT_TYPE".unit_name IS 'liste des unites : vivante / non vivante / invocation / heros ...';


--
-- Name: WORK; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "WORK" (
    "WORK_NAME" character varying(20) NOT NULL
);


ALTER TABLE libertribes."WORK" OWNER TO libertribes_neosys;

--
-- Name: WORLD; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "WORLD" (
    world_name character varying(20) NOT NULL,
    count_slots numeric(30,6) NOT NULL
);


ALTER TABLE libertribes."WORLD" OWNER TO libertribes_neosys;

--
-- Name: seq_worldslot_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_worldslot_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libertribes.seq_worldslot_id OWNER TO libertribes_neosys;

--
-- Name: WORLDSLOT; Type: TABLE; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

CREATE TABLE "WORLDSLOT" (
    wslot_id numeric DEFAULT nextval('seq_worldslot_id'::regclass) NOT NULL,
    slot_name character varying(20) NOT NULL,
    slot_state character varying(20) NOT NULL,
    world_name character varying(20) NOT NULL,
    terrain character varying(20),
    climate numeric NOT NULL,
    hydrometric numeric NOT NULL,
    vegetation numeric NOT NULL,
    tuile numeric,
    size_case numeric NOT NULL,
    defense_bonus numeric,
    eat_bonus numeric,
    coord point NOT NULL
);


ALTER TABLE libertribes."WORLDSLOT" OWNER TO libertribes_neosys;

--
-- Name: COLUMN "WORLDSLOT".tuile; Type: COMMENT; Schema: libertribes; Owner: libertribes_neosys
--

COMMENT ON COLUMN "WORLDSLOT".tuile IS 'besoin info';


--
-- Name: seq_offre_id; Type: SEQUENCE; Schema: libertribes; Owner: libertribes_neosys
--

CREATE SEQUENCE seq_offre_id
    START WITH 1
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 25000
    CACHE 1;


ALTER TABLE libertribes.seq_offre_id OWNER TO libertribes_neosys;

--
-- Data for Name: ACCOUNT; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--

INSERT INTO "ACCOUNT" VALUES (1, NULL, NULL, 'Seraphin76', 'kasuya.chris@hotmail.fr', '2014-06-11', false, 'offline', NULL, NULL, NULL, NULL);
INSERT INTO "ACCOUNT" VALUES (2, NULL, NULL, 'Subsystem0', 'subsystem0@hotmail.fr', '2014-07-15', false, 'offline', NULL, NULL, NULL, NULL);
INSERT INTO "ACCOUNT" VALUES (3, NULL, NULL, 'Subsystem0', 'projetmmo@gmail.com', '2014-07-17', false, 'offline', NULL, NULL, NULL, NULL);
INSERT INTO "ACCOUNT" VALUES (4, NULL, NULL, 'M0Eg?1?', 'd.dehareng@gmail.com', '2014-07-29', false, 'offline', NULL, NULL, NULL, NULL);
INSERT INTO "ACCOUNT" VALUES (5, NULL, NULL, 'mar777ko', 'okram7@live.fr', '2014-08-10', false, 'offline', NULL, NULL, NULL, NULL);
INSERT INTO "ACCOUNT" VALUES (6, NULL, NULL, 'mypasslt', 'designly.creation@gmail.com', '2014-08-11', false, 'offline', NULL, NULL, NULL, NULL);
INSERT INTO "ACCOUNT" VALUES (7, NULL, NULL, 'mypass', 'olivier.prima@gmail.com', '2014-09-27', false, 'offline', NULL, NULL, NULL, NULL);

--
-- Data for Name: ACTUALITE; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--

INSERT INTO "ACTUALITE" VALUES (3, 'PEOPLE', 'Equipe : Sam est le Game Designer', '2014-12-06');
INSERT INTO "ACTUALITE" VALUES (4, 'PEOPLE', 'Equipe : Chris est le WebDesigner', '2014-12-06');
INSERT INTO "ACTUALITE" VALUES (5, 'PEOPLE', 'Equipe : Olivier est l''Illustrateur', '2014-12-06');
INSERT INTO "ACTUALITE" VALUES (6, 'PEOPLE', 'Equipe : Donatien est le Chef de projet et D&eacute;veloppeur s&eacute;nior', '2014-12-06');
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
INSERT INTO "ACTUALITE" VALUES (10, 'NEWS', 'Vous souhaitez nous contacter directement : <b>contact[@]hegoa.eu</b>', '2014-12-10');


--
-- Data for Name: ARMOR_BUNSIF; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: ARMOR_HUMAN; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: ARMOR_NHYMSINE; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: ARMOR_SULMIS; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: ARTEFACT_BUNSIF; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: ARTEFACT_HUM; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: ARTEFACT_NHYMSINE; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: ARTEFACT_SULMIS; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: AVATAR; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--

INSERT INTO "AVATAR" VALUES ('greaa', NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, 2, NULL, NULL, 0, NULL, 'humain', 0, 1);
INSERT INTO "AVATAR" VALUES ('nawak', NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, 3, NULL, NULL, 0, NULL, 'nhymsine', 0, 2);
INSERT INTO "AVATAR" VALUES ('Seraphin', NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, 1, NULL, NULL, 0, NULL, 'nimhsine', 0, 3);
INSERT INTO "AVATAR" VALUES ('Test XY', NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, 7, NULL, NULL, 0, NULL, 'bunsif', 0, 4);
INSERT INTO "AVATAR" VALUES ('lulu', NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, 1, NULL, NULL, 0, NULL, NULL, 0, 5);


--
-- Data for Name: BDC; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: EMPLACEMENT_MARCHE_GUILDE; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: EMPLACEMENT_MARCHE_JOUEUR; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: GUILDE; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: GUILDE_MEMBRE; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: H_BUNSIF; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: H_HUMAN; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: H_NHYMSINE; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: H_SULMIS; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: INDEX_AVATAR; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: INDEX_MARCHE; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--


--
-- Data for Name: MAGIC; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--

--
-- Data for Name: MESSAGE; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--


--
-- Data for Name: NEWSLETTER; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--

INSERT INTO "NEWSLETTER" VALUES ('d.dehareng@gmail.com', 1);
INSERT INTO "NEWSLETTER" VALUES ('projetmmo@gmail.com', 2);
INSERT INTO "NEWSLETTER" VALUES ('kasuya.chris@hotmail.fr', 3);
INSERT INTO "NEWSLETTER" VALUES ('subsystem0@hotmail.fr', 3);
INSERT INTO "NEWSLETTER" VALUES ('lcourcelle@orange.fr', 5);
INSERT INTO "NEWSLETTER" VALUES ('projetmmo@gmail;com', 6);
INSERT INTO "NEWSLETTER" VALUES ('manu.capron@gmail.com', 7);
INSERT INTO "NEWSLETTER" VALUES ('okram7@live.fr', 8);
INSERT INTO "NEWSLETTER" VALUES ('FromontJimmy@hotmail.fr', 9);


--
-- Data for Name: OBJECT_BUNSIF; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: OBJECT_HUMAN; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: OBJECT_NHYMSINE; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: OBJECT_SULMIS; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: OFFRE; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: QUETE; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--


--
-- Data for Name: RACE; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--

INSERT INTO "RACE" VALUES ('bunsif', 0, '', '');
INSERT INTO "RACE" VALUES ('human', 0, '', '');
INSERT INTO "RACE" VALUES ('nhymsine', 0, '', '');
INSERT INTO "RACE" VALUES ('sulmis', 0, '', '');


--
-- Data for Name: SCIENCES; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: SORTS; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: TOWN; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: TRAVEL; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: TYPE_TRAVEL; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: UNIT; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: UNIT_TYPE; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: WORK; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: WORLD; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Data for Name: WORLDSLOT; Type: TABLE DATA; Schema: libertribes; Owner: libertribes_neosys
--



--
-- Name: seq_account_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_account_id', 7, true);


--
-- Name: seq_actualite_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_actualite_id', 10, true);


--
-- Name: seq_avatar_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_avatar_id', 5, true);


--
-- Name: seq_bunsif_armor_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_bunsif_armor_id', 1, false);


--
-- Name: seq_bunsif_artefact_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_bunsif_artefact_id', 1, false);


--
-- Name: seq_human_armor_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_human_armor_id', 1, false);


--
-- Name: seq_human_artefact_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_human_artefact_id', 1, false);


--
-- Name: seq_message_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_message_id', 1, true);


--
-- Name: seq_newsletter_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_newsletter_id', 9, true);


--
-- Name: seq_nhymsine_armor_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_nhymsine_armor_id', 1, false);


--
-- Name: seq_nhymsine_artefact_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_nhymsine_artefact_id', 1, false);


--
-- Name: seq_obj_bunsif_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_obj_bunsif_id', 1, false);


--
-- Name: seq_obj_human_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_obj_human_id', 1, false);


--
-- Name: seq_obj_nhymsine_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_obj_nhymsine_id', 1, false);


--
-- Name: seq_obj_sulmis_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_obj_sulmis_id', 1, false);


--
-- Name: seq_offre_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_offre_id', 1, false);


--
-- Name: seq_quete_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_quete_id', 1, true);


--
-- Name: seq_science_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_science_id', 1, false);


--
-- Name: seq_sulmis_armor_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_sulmis_armor_id', 1, false);


--
-- Name: seq_sulmis_artefact_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_sulmis_artefact_id', 1, false);


--
-- Name: seq_unit_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_unit_id', 1, false);


--
-- Name: seq_worldslot_id; Type: SEQUENCE SET; Schema: libertribes; Owner: libertribes_neosys
--

SELECT pg_catalog.setval('seq_worldslot_id', 1, true);


--
-- Name: ACTUALITE_NO_ACTU_key; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "ACTUALITE"
    ADD CONSTRAINT "ACTUALITE_NO_ACTU_key" UNIQUE (actualite_id);


--
-- Name: MESSAGE_pkey; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "MESSAGE"
    ADD CONSTRAINT "MESSAGE_pkey" PRIMARY KEY (message_id);


--
-- Name: OBJECT_BUNSIF_NAME; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "OBJECT_BUNSIF"
    ADD CONSTRAINT "OBJECT_BUNSIF_NAME" UNIQUE (object_name);


--
-- Name: OBJECT_HUMAN_NAME; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "OBJECT_HUMAN"
    ADD CONSTRAINT "OBJECT_HUMAN_NAME" UNIQUE (object_name);


--
-- Name: OBJECT_NHYMSINE_NAME; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "OBJECT_NHYMSINE"
    ADD CONSTRAINT "OBJECT_NHYMSINE_NAME" UNIQUE (object_name);


--
-- Name: OBJECT_SULMIS_NAME; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "OBJECT_SULMIS"
    ADD CONSTRAINT "OBJECT_SULMIS_NAME" UNIQUE (object_name);


--
-- Name: PK_ARMOR_ID; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "ARMOR_BUNSIF"
    ADD CONSTRAINT "PK_ARMOR_ID" PRIMARY KEY (armor_id);


--
-- Name: PK_ARMOR_ID_HUMAN; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "ARMOR_HUMAN"
    ADD CONSTRAINT "PK_ARMOR_ID_HUMAN" PRIMARY KEY (armor_id);


--
-- Name: PK_ARMOR_ID_NHYMSINE; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "ARMOR_NHYMSINE"
    ADD CONSTRAINT "PK_ARMOR_ID_NHYMSINE" PRIMARY KEY (armor_id);


--
-- Name: PK_ARMOR_ID_SULMIS; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "ARMOR_SULMIS"
    ADD CONSTRAINT "PK_ARMOR_ID_SULMIS" PRIMARY KEY (armor_id);


--
-- Name: PK_ARTEFACT_ID; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "ARTEFACT_BUNSIF"
    ADD CONSTRAINT "PK_ARTEFACT_ID" PRIMARY KEY (artefact_id);


--
-- Name: PK_ARTEFACT_ID_NHYMSINE; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "ARTEFACT_NHYMSINE"
    ADD CONSTRAINT "PK_ARTEFACT_ID_NHYMSINE" PRIMARY KEY (artefact_id);


--
-- Name: PK_ARTEFACT_ID_SULMIS; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "ARTEFACT_SULMIS"
    ADD CONSTRAINT "PK_ARTEFACT_ID_SULMIS" PRIMARY KEY (artefact_id);


--
-- Name: PK_AVATAR_NAME; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "AVATAR"
    ADD CONSTRAINT "PK_AVATAR_NAME" PRIMARY KEY (avatar_name);


--
-- Name: PK_BDC_ID; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "BDC"
    ADD CONSTRAINT "PK_BDC_ID" PRIMARY KEY (bdc_id, signe_bdc);


--
-- Name: PK_GUILDE_NAME; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "GUILDE"
    ADD CONSTRAINT "PK_GUILDE_NAME" PRIMARY KEY (guilde_name);


--
-- Name: PK_H_NAME; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "H_BUNSIF"
    ADD CONSTRAINT "PK_H_NAME" PRIMARY KEY ("H_NAME");


--
-- Name: PK_H_NAME_HUMAN; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "H_HUMAN"
    ADD CONSTRAINT "PK_H_NAME_HUMAN" PRIMARY KEY ("H_NAME");


--
-- Name: PK_H_NAME_NHYMSINE; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "H_NHYMSINE"
    ADD CONSTRAINT "PK_H_NAME_NHYMSINE" PRIMARY KEY ("H_NAME");


--
-- Name: PK_H_NAME_SULMIS; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "H_SULMIS"
    ADD CONSTRAINT "PK_H_NAME_SULMIS" PRIMARY KEY ("H_NAME");


--
-- Name: PK_INDEX_ID; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "INDEX_AVATAR"
    ADD CONSTRAINT "PK_INDEX_ID" PRIMARY KEY (index_id);


--
-- Name: PK_Index_id; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "INDEX_MARCHE"
    ADD CONSTRAINT "PK_Index_id" PRIMARY KEY (index_id);


--
-- Name: PK_MAGIC_NAME; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "MAGIC"
    ADD CONSTRAINT "PK_MAGIC_NAME" PRIMARY KEY (magic_name);


--
-- Name: PK_OBJECT_BUNSIF_ID; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "OBJECT_BUNSIF"
    ADD CONSTRAINT "PK_OBJECT_BUNSIF_ID" PRIMARY KEY (object_id);


--
-- Name: PK_OBJECT_HUMAN_ID; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "OBJECT_HUMAN"
    ADD CONSTRAINT "PK_OBJECT_HUMAN_ID" PRIMARY KEY (object_id);


--
-- Name: PK_OBJECT_NHYMSINE_ID; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "OBJECT_NHYMSINE"
    ADD CONSTRAINT "PK_OBJECT_NHYMSINE_ID" PRIMARY KEY (object_id);


--
-- Name: PK_OBJECT_SULMIS_ID; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "OBJECT_SULMIS"
    ADD CONSTRAINT "PK_OBJECT_SULMIS_ID" PRIMARY KEY (object_id);


--
-- Name: PK_SCIENCE_ID; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "SCIENCES"
    ADD CONSTRAINT "PK_SCIENCE_ID" PRIMARY KEY (science_id);


--
-- Name: PK_SLOTID; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "WORLDSLOT"
    ADD CONSTRAINT "PK_SLOTID" PRIMARY KEY (wslot_id);


--
-- Name: PK_SORT_NAME; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "SORTS"
    ADD CONSTRAINT "PK_SORT_NAME" PRIMARY KEY (sort_name);


--
-- Name: PK_TYP_TRAVEL; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "TYPE_TRAVEL"
    ADD CONSTRAINT "PK_TYP_TRAVEL" PRIMARY KEY (type_travel);


--
-- Name: PK_UNIT_ID; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "UNIT"
    ADD CONSTRAINT "PK_UNIT_ID" PRIMARY KEY (unit_id);


--
-- Name: PK_UNIT_NAME; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "UNIT_TYPE"
    ADD CONSTRAINT "PK_UNIT_NAME" PRIMARY KEY (unit_name);


--
-- Name: PK_WORK_NAME; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "WORK"
    ADD CONSTRAINT "PK_WORK_NAME" PRIMARY KEY ("WORK_NAME");


--
-- Name: PK_WORLD_NAME; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "WORLD"
    ADD CONSTRAINT "PK_WORLD_NAME" PRIMARY KEY (world_name);


--
-- Name: PK_account_id; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "ACCOUNT"
    ADD CONSTRAINT "PK_account_id" PRIMARY KEY (account_id);


--
-- Name: PK_artefact_id; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "ARTEFACT_HUM"
    ADD CONSTRAINT "PK_artefact_id" PRIMARY KEY (artefact_id);


--
-- Name: PK_offre_id; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "OFFRE"
    ADD CONSTRAINT "PK_offre_id" PRIMARY KEY (offre_id, prix_conseil_offre_total, date_emission);


--
-- Name: PK_race_name; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "RACE"
    ADD CONSTRAINT "PK_race_name" PRIMARY KEY (race_name);


--
-- Name: PK_town_name; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "TOWN"
    ADD CONSTRAINT "PK_town_name" PRIMARY KEY (town_name);


--
-- Name: QUETE_pkey; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "QUETE"
    ADD CONSTRAINT "QUETE_pkey" PRIMARY KEY (quete_id);


--
-- Name: email; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "ACCOUNT"
    ADD CONSTRAINT email UNIQUE (email);


--
-- Name: pk_emplacement_ID; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "EMPLACEMENT_MARCHE_GUILDE"
    ADD CONSTRAINT "pk_emplacement_ID" PRIMARY KEY (emplacement_id);


--
-- Name: pk_emplacement_ID_joueur; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "EMPLACEMENT_MARCHE_JOUEUR"
    ADD CONSTRAINT "pk_emplacement_ID_joueur" PRIMARY KEY (emplacement_id);


--
-- Name: pk_membre_name; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "GUILDE_MEMBRE"
    ADD CONSTRAINT pk_membre_name PRIMARY KEY (membre_name);


--
-- Name: science_name; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "SCIENCES"
    ADD CONSTRAINT science_name UNIQUE (science_name);


--
-- Name: world_name; Type: CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys; Tablespace: 
--

ALTER TABLE ONLY "WORLD"
    ADD CONSTRAINT world_name UNIQUE (world_name);


--
-- Name: AVATAR_NAME; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "OFFRE"
    ADD CONSTRAINT "AVATAR_NAME" FOREIGN KEY (avatar_name) REFERENCES "AVATAR"(avatar_name);


--
-- Name: FK_ACCOUNT_ID; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "AVATAR"
    ADD CONSTRAINT "FK_ACCOUNT_ID" FOREIGN KEY (account_id) REFERENCES "ACCOUNT"(account_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_Avatar; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "INDEX_AVATAR"
    ADD CONSTRAINT "FK_Avatar" FOREIGN KEY (avatar_name) REFERENCES "AVATAR"(avatar_name);


--
-- Name: FK_BDC; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "OFFRE"
    ADD CONSTRAINT "FK_BDC" FOREIGN KEY (bdc_id, signe_bdc) REFERENCES "BDC"(bdc_id, signe_bdc);


--
-- Name: FK_Guilde_name; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "GUILDE_MEMBRE"
    ADD CONSTRAINT "FK_Guilde_name" FOREIGN KEY (guilde_name) REFERENCES "GUILDE"(guilde_name);


--
-- Name: FK_H_NAME_BUNSIF; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "ARMOR_BUNSIF"
    ADD CONSTRAINT "FK_H_NAME_BUNSIF" FOREIGN KEY ("H_NAME") REFERENCES "H_BUNSIF"("H_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_H_NAME_BUNSIF_ARTEFACT; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "ARTEFACT_BUNSIF"
    ADD CONSTRAINT "FK_H_NAME_BUNSIF_ARTEFACT" FOREIGN KEY ("H_NAME") REFERENCES "H_BUNSIF"("H_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_H_NAME_HUMAN; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "ARMOR_HUMAN"
    ADD CONSTRAINT "FK_H_NAME_HUMAN" FOREIGN KEY ("H_NAME") REFERENCES "H_HUMAN"("H_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_H_NAME_HUMAN_ARTEFACT; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "ARTEFACT_HUM"
    ADD CONSTRAINT "FK_H_NAME_HUMAN_ARTEFACT" FOREIGN KEY ("H_NAME") REFERENCES "H_HUMAN"("H_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_H_NAME_NHYMSINE; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "ARMOR_NHYMSINE"
    ADD CONSTRAINT "FK_H_NAME_NHYMSINE" FOREIGN KEY ("H_NAME") REFERENCES "H_NHYMSINE"("H_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_H_NAME_NHYMSINE_ARTEFACT; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "ARTEFACT_NHYMSINE"
    ADD CONSTRAINT "FK_H_NAME_NHYMSINE_ARTEFACT" FOREIGN KEY ("H_NAME") REFERENCES "H_NHYMSINE"("H_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_H_NAME_OBJ_BUNSIF; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "OBJECT_BUNSIF"
    ADD CONSTRAINT "FK_H_NAME_OBJ_BUNSIF" FOREIGN KEY ("H_NAME") REFERENCES "H_BUNSIF"("H_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_H_NAME_OBJ_HUMAN; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "OBJECT_HUMAN"
    ADD CONSTRAINT "FK_H_NAME_OBJ_HUMAN" FOREIGN KEY ("H_NAME") REFERENCES "H_HUMAN"("H_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_H_NAME_OBJ_NHYMSINE; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "OBJECT_NHYMSINE"
    ADD CONSTRAINT "FK_H_NAME_OBJ_NHYMSINE" FOREIGN KEY ("H_NAME") REFERENCES "H_NHYMSINE"("H_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_H_NAME_OBJ_SULMIS; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "OBJECT_SULMIS"
    ADD CONSTRAINT "FK_H_NAME_OBJ_SULMIS" FOREIGN KEY ("H_NAME") REFERENCES "H_SULMIS"("H_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_H_NAME_SULMIS; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "ARMOR_SULMIS"
    ADD CONSTRAINT "FK_H_NAME_SULMIS" FOREIGN KEY ("H_NAME") REFERENCES "H_SULMIS"("H_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_H_NAME_SULMIS_ARTEFACT; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "ARTEFACT_SULMIS"
    ADD CONSTRAINT "FK_H_NAME_SULMIS_ARTEFACT" FOREIGN KEY ("H_NAME") REFERENCES "H_SULMIS"("H_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_MAGIC_NAME; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "SORTS"
    ADD CONSTRAINT "FK_MAGIC_NAME" FOREIGN KEY (magic_name) REFERENCES "MAGIC"(magic_name) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_OFFRE_ID; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "BDC"
    ADD CONSTRAINT "FK_OFFRE_ID" FOREIGN KEY (offre_id, prix_conseil_offre_total, date_emission) REFERENCES "OFFRE"(offre_id, prix_conseil_offre_total, date_emission);


--
-- Name: FK_RACE_NAME; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "SCIENCES"
    ADD CONSTRAINT "FK_RACE_NAME" FOREIGN KEY (race_name) REFERENCES "RACE"(race_name) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_TOWN; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "BDC"
    ADD CONSTRAINT "FK_TOWN" FOREIGN KEY (town_name) REFERENCES "TOWN"(town_name);


--
-- Name: FK_TYPE_TRAVEL; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "TRAVEL"
    ADD CONSTRAINT "FK_TYPE_TRAVEL" FOREIGN KEY (type_travel) REFERENCES "TYPE_TRAVEL"(type_travel) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_UNIT_TYPE; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "UNIT"
    ADD CONSTRAINT "FK_UNIT_TYPE" FOREIGN KEY (unit_type) REFERENCES "UNIT_TYPE"(unit_name) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_Vendor_name; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "BDC"
    ADD CONSTRAINT "FK_Vendor_name" FOREIGN KEY (vendor_name) REFERENCES "AVATAR"(avatar_name) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_WORK_NAME_1; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "H_BUNSIF"
    ADD CONSTRAINT "FK_WORK_NAME_1" FOREIGN KEY ("WORK_NAME") REFERENCES "WORK"("WORK_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_WORK_NAME_10; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "H_SULMIS"
    ADD CONSTRAINT "FK_WORK_NAME_10" FOREIGN KEY ("WORK_NAME") REFERENCES "WORK"("WORK_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_WORK_NAME_11; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "H_SULMIS"
    ADD CONSTRAINT "FK_WORK_NAME_11" FOREIGN KEY ("WORK_NAME2") REFERENCES "WORK"("WORK_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_WORK_NAME_12; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "H_SULMIS"
    ADD CONSTRAINT "FK_WORK_NAME_12" FOREIGN KEY ("WORK_NAME3") REFERENCES "WORK"("WORK_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_WORK_NAME_2; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "H_BUNSIF"
    ADD CONSTRAINT "FK_WORK_NAME_2" FOREIGN KEY ("WORK_NAME2") REFERENCES "WORK"("WORK_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_WORK_NAME_3; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "H_BUNSIF"
    ADD CONSTRAINT "FK_WORK_NAME_3" FOREIGN KEY ("WORK_NAME3") REFERENCES "WORK"("WORK_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_WORK_NAME_4; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "H_HUMAN"
    ADD CONSTRAINT "FK_WORK_NAME_4" FOREIGN KEY ("WORK_NAME") REFERENCES "WORK"("WORK_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_WORK_NAME_5; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "H_HUMAN"
    ADD CONSTRAINT "FK_WORK_NAME_5" FOREIGN KEY ("WORK_NAME2") REFERENCES "WORK"("WORK_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_WORK_NAME_6; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "H_HUMAN"
    ADD CONSTRAINT "FK_WORK_NAME_6" FOREIGN KEY ("WORK_NAME3") REFERENCES "WORK"("WORK_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_WORK_NAME_7; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "H_NHYMSINE"
    ADD CONSTRAINT "FK_WORK_NAME_7" FOREIGN KEY ("WORK_NAME") REFERENCES "WORK"("WORK_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_WORK_NAME_8; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "H_NHYMSINE"
    ADD CONSTRAINT "FK_WORK_NAME_8" FOREIGN KEY ("WORK_NAME2") REFERENCES "WORK"("WORK_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_WORK_NAME_9; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "H_NHYMSINE"
    ADD CONSTRAINT "FK_WORK_NAME_9" FOREIGN KEY ("WORK_NAME3") REFERENCES "WORK"("WORK_NAME") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_WORLD_NAME; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "WORLDSLOT"
    ADD CONSTRAINT "FK_WORLD_NAME" FOREIGN KEY (world_name) REFERENCES "WORLD"(world_name) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_avatar_name; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "GUILDE_MEMBRE"
    ADD CONSTRAINT "FK_avatar_name" FOREIGN KEY (membre_name) REFERENCES "AVATAR"(avatar_name);


--
-- Name: FK_buyer_name; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "BDC"
    ADD CONSTRAINT "FK_buyer_name" FOREIGN KEY (buyer_name) REFERENCES "AVATAR"(avatar_name) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_fondator_name; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "GUILDE"
    ADD CONSTRAINT "FK_fondator_name" FOREIGN KEY (fondator_name) REFERENCES "AVATAR"(avatar_name) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FK_guilde_name; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "EMPLACEMENT_MARCHE_GUILDE"
    ADD CONSTRAINT "FK_guilde_name" FOREIGN KEY (guilde_name) REFERENCES "GUILDE"(guilde_name);


--
-- Name: FK_locataire_name; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "EMPLACEMENT_MARCHE_GUILDE"
    ADD CONSTRAINT "FK_locataire_name" FOREIGN KEY (locataire_name) REFERENCES "AVATAR"(avatar_name);


--
-- Name: FK_locataire_name; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "EMPLACEMENT_MARCHE_JOUEUR"
    ADD CONSTRAINT "FK_locataire_name" FOREIGN KEY (locataire_name) REFERENCES "AVATAR"(avatar_name);


--
-- Name: FK_membre_name; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "GUILDE"
    ADD CONSTRAINT "FK_membre_name" FOREIGN KEY (membre_name) REFERENCES "GUILDE_MEMBRE"(membre_name);


--
-- Name: FK_proprio_name; Type: FK CONSTRAINT; Schema: libertribes; Owner: libertribes_neosys
--

ALTER TABLE ONLY "EMPLACEMENT_MARCHE_JOUEUR"
    ADD CONSTRAINT "FK_proprio_name" FOREIGN KEY (proprio_name) REFERENCES "AVATAR"(avatar_name);


--
-- PostgreSQL database dump complete
--

