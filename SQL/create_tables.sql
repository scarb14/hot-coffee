-- coffee definition

CREATE TABLE `coffee` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


--coffee_ingredient definition

CREATE TABLE `coffee_ingredient` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `short_name` varchar(255) NOT NULL,
    `type_id` bigint(20) unsigned NOT NULL,
    PRIMARY KEY (`id`),
    KEY `coffee_ingredient_FK` (`type_id`),
    CONSTRAINT `coffee_ingredient_FK` FOREIGN KEY (`type_id`) REFERENCES `coffee_ingredient_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


-- coffee_ingredient_price definition

CREATE TABLE `coffee_ingredient_price` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `country_id` bigint(20) unsigned NOT NULL,
    `amount` decimal(10,2) NOT NULL,
    `ingredient_id` bigint(20) unsigned NOT NULL,
    `coffee_id` bigint(20) unsigned NOT NULL,
    PRIMARY KEY (`id`),
    KEY `coffee_ingredient_price_FK` (`country_id`),
    KEY `coffee_ingredient_price_FK_1` (`ingredient_id`),
    KEY `coffee_ingredient_price_FK_2` (`coffee_id`),
    CONSTRAINT `coffee_ingredient_price_FK` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
    CONSTRAINT `coffee_ingredient_price_FK_1` FOREIGN KEY (`ingredient_id`) REFERENCES `coffee_ingredient` (`id`),
    CONSTRAINT `coffee_ingredient_price_FK_2` FOREIGN KEY (`coffee_id`) REFERENCES `coffee` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;


-- coffee_ingredient_type definition

CREATE TABLE `coffee_ingredient_type` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


-- coffee_price definition

CREATE TABLE `coffee_price` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `country_id` bigint(20) unsigned NOT NULL,
    `amount` decimal(10,2) NOT NULL,
    `coffee_id` bigint(20) unsigned NOT NULL,
    PRIMARY KEY (`id`),
    KEY `coffee_price_FK` (`country_id`),
    KEY `coffee_price_FK_1` (`coffee_id`),
    CONSTRAINT `coffee_price_FK` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
    CONSTRAINT `coffee_price_FK_1` FOREIGN KEY (`coffee_id`) REFERENCES `coffee` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


-- coffee_tax definition

CREATE TABLE `coffee_tax` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `percent` decimal(10,2) NOT NULL,
    `country_id` bigint(20) unsigned NOT NULL,
    PRIMARY KEY (`id`),
    KEY `coffee_tax_FK` (`country_id`),
    CONSTRAINT `coffee_tax_FK` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


-- country definition
CREATE TABLE `country` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;