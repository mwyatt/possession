create table `user` (
  `id` integer(10) unsigned not null auto_increment,
  `timeCreated` integer(10) unsigned,
  `email` varchar(255),
  `password` varchar(255),
  primary key (`id`)
) engine = InnoDB default charset = utf8;

create table `log` (
  `id` integer(10) unsigned not null auto_increment,
  `content` text,
  `timeCreated` integer(10) unsigned,
  primary key (`id`)
) engine = InnoDB default charset = utf8;

create table `possession` (
  `id` integer(10) unsigned not null auto_increment,
  `timeCreated` integer(10) unsigned,
  `name` varchar(255),
  `value` decimal(19, 4) unsigned,
  `possessionTypeId` integer(10) unsigned,
  `imageId` integer(10) unsigned,
  primary key (`id`)
) engine = InnoDB default charset = utf8;

create table `possessionType` (
  `id` integer(10) unsigned not null auto_increment,
  `name` varchar(255),
  primary key (`id`)
) engine = InnoDB default charset = utf8;

create table `possessionAttribute` (
  `id` integer(10) unsigned not null auto_increment,
  `name` varchar(255),
  primary key (`id`)
) engine = InnoDB default charset = utf8;

create table `possessionAttributeValue` (
  `id` integer(10) unsigned not null auto_increment,
  `possessionAttributeId` integer(10),
  `value` varchar(255),
  primary key (`id`)
) engine = InnoDB default charset = utf8;

create table `image` (
  `id` integer(10) unsigned not null auto_increment,
  `path` varchar(255),
  primary key (`id`)
) engine = InnoDB default charset = utf8;
