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
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


-- coffee_ingredient_price definition

CREATE TABLE `coffee_ingredient_price` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `country_id` bigint(20) unsigned NOT NULL,
    `amount` decimal(10,2) NOT NULL,
    `ingredient_id` bigint(20) unsigned NOT NULL,
    `coffee_id` bigint(20) unsigned NOT NULL,
    PRIMARY KEY (`id`)
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
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


-- coffee_tax definition

CREATE TABLE `coffee_tax` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `percent` decimal(10,2) NOT NULL,
    `country_id` bigint(20) unsigned NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


-- country definition
CREATE TABLE `country` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;