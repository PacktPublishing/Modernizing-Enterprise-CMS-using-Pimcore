CREATE TABLE IF NOT EXISTS `bundle_number_sequence_generator_register` (
  `register` VARCHAR(50) NOT NULL,
  `counter` BIGINT(12) NULL DEFAULT 0,
  PRIMARY KEY (`register`))
  COLLATE='utf8_general_ci'
  ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `bundle_number_sequence_generator_randomregister` (
    `range` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
    `code` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
    PRIMARY KEY (`range`,`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
