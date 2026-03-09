CREATE TABLE tx_cvprofile_domain_model_profile (
    uid            INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    pid            INT(11) DEFAULT 0 NOT NULL,
    tstamp         INT(11) DEFAULT 0 NOT NULL,
    crdate         INT(11) DEFAULT 0 NOT NULL,
    hidden         TINYINT(4) DEFAULT 0 NOT NULL,
    deleted        TINYINT(4) DEFAULT 0 NOT NULL,

    name           VARCHAR(255) DEFAULT '' NOT NULL,
    title_prefix   VARCHAR(255) DEFAULT '' NOT NULL,
    tagline        TEXT,
    specialisation VARCHAR(255) DEFAULT '' NOT NULL,
    photo          INT(11) UNSIGNED DEFAULT 0 NOT NULL,
    show_degrees   TINYINT(4) DEFAULT 1 NOT NULL,

    degrees        INT(11) DEFAULT 0 NOT NULL,
    stations       INT(11) DEFAULT 0 NOT NULL,
    highlights     INT(11) DEFAULT 0 NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid)
);

CREATE TABLE tx_cvprofile_domain_model_degree (
    uid      INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    pid      INT(11) DEFAULT 0 NOT NULL,
    tstamp   INT(11) DEFAULT 0 NOT NULL,
    crdate   INT(11) DEFAULT 0 NOT NULL,
    profile  INT(11) DEFAULT 0 NOT NULL,
    sorting  INT(11) DEFAULT 0 NOT NULL,
    hidden   TINYINT(4) DEFAULT 0 NOT NULL,
    deleted  TINYINT(4) DEFAULT 0 NOT NULL,

    label    VARCHAR(255) DEFAULT '' NOT NULL,

    PRIMARY KEY (uid),
    KEY profile (profile)
);

CREATE TABLE tx_cvprofile_domain_model_station (
    uid         INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    pid         INT(11) DEFAULT 0 NOT NULL,
    tstamp      INT(11) DEFAULT 0 NOT NULL,
    crdate      INT(11) DEFAULT 0 NOT NULL,
    profile     INT(11) DEFAULT 0 NOT NULL,
    sorting     INT(11) DEFAULT 0 NOT NULL,
    hidden      TINYINT(4) DEFAULT 0 NOT NULL,
    deleted     TINYINT(4) DEFAULT 0 NOT NULL,

    period      VARCHAR(255) DEFAULT '' NOT NULL,
    institution VARCHAR(255) DEFAULT '' NOT NULL,
    role        VARCHAR(255) DEFAULT '' NOT NULL,
    description TEXT,

    PRIMARY KEY (uid),
    KEY profile (profile)
);

CREATE TABLE tx_cvprofile_domain_model_highlight (
    uid         INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    pid         INT(11) DEFAULT 0 NOT NULL,
    tstamp      INT(11) DEFAULT 0 NOT NULL,
    crdate      INT(11) DEFAULT 0 NOT NULL,
    profile     INT(11) DEFAULT 0 NOT NULL,
    sorting     INT(11) DEFAULT 0 NOT NULL,
    hidden      TINYINT(4) DEFAULT 0 NOT NULL,
    deleted     TINYINT(4) DEFAULT 0 NOT NULL,

    icon        VARCHAR(10) DEFAULT '' NOT NULL,
    headline    VARCHAR(255) DEFAULT '' NOT NULL,
    body        TEXT,
    stat_value  VARCHAR(20) DEFAULT '' NOT NULL,
    stat_suffix VARCHAR(10) DEFAULT '' NOT NULL,
    stat_label  VARCHAR(100) DEFAULT '' NOT NULL,

    PRIMARY KEY (uid),
    KEY profile (profile)
);
