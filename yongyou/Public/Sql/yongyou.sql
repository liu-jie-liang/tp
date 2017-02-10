create database if not exists `yongyou` default character set = utf8;

create table if not exists `privilege` (
  `id` int unsigned not null auto_increment,
  `name` varchar(20) not null comment '权限名称',
  primary key (`id`)
) engine = innodb, default character set = utf8, comment '权限表';

create table if not exists `role` (
  `id` int unsigned not null auto_increment,
  `name` varchar(20) not null comment '角色名称',
  primary key (`id`)
) engine = innodb, default character set = utf8, comment '角色表';

create table if not exists `department` (
  `id` int unsigned not null auto_increment,
  `name` varchar(20) not null comment '部门名称',
  primary key (`id`)
) engine = innodb, default character set = utf8, comment '部门表';

create table if not exists `user` (
  `id` bigint(3) unsigned zerofill not null auto_increment comment '编号',
  `name` char(4) not null comment '姓名',
  `pass` char(32) binary not null comment '口令',
  `salt` char(4) not null comment '4位小写字母',
  `department` int unsigned not null comment '所属部门，对应department表id',
  `role` int unsigned not null comment '角色，对应role表id',
  `privilege` varchar(2000) not null default '' comment '权限，对应privilege表id',
  primary key using btree (`id` desc) comment ''
) engine = innodb, default character set = utf8, comment '用户表', delay_key_write = 1
  partition by range (id)
  (
    partition p0 values less than (1000000),
    partition p1 values less than (2000000),
    partition p2 values less than (3000000),
    partition p4 values less than maxvalue
);

alter table `user` drop column `privilege`;
alter table `role` add column `privilege` varchar(2000) not null default '' comment '权限，对应privilege表id';

insert into `department` (`name`) values ('财务部');
insert into `role` (`name`) values ('账套主管'), ('总账会计');
insert into `role` (`name`) values ('超级管理员');
alter table `user` modify column `name` char(5) not null comment '姓名';
insert into `user` (`name`, `pass`, `salt`, `department`, `role`) values ('admin', '', '', 0,
  (select `id` from `role` where `name` = '超级管理员'));

create table if not exists `lang` (
  `id` int unsigned not null auto_increment ,
  `name` varchar(10) not null ,
  primary key (`id`),
  unique key (`name`)
)engine = innodb, default character set = utf8, comment '语言';

alter table `department` add index (`name`);
alter table `role` add index (`name`);
alter table `privilege` add index (`name`);

alter table `department` drop index `name`;
alter table `role` drop index `name`;
alter table `privilege` drop index `name`;

alter table `department` add unique index (`name`);
alter table `role` add unique index (`name`);
alter table `privilege` add unique index (`name`);

alter table `lang` add column `code` varchar (20) not null;
insert into `lang` (`name`, `code`) values ('简体中文', 'zh_CN');
alter table `lang` add unique index (`code`);

alter table `user` add column `default` tinyint(1) unsigned not null default 0 after `salt`;
alter table `lang` add column `default` tinyint(1) unsigned not null default 0;
alter table `department` add column `default` tinyint(1) unsigned not null default 0;
alter table `department` drop column `default`;
update `user` set `default` = 1 where `name` = 'admin';
update `lang` set `default` = 1 where `name` = '简体中文';

alter table `user` add column `addtime` int unsigned not null default current_timestamp() comment '入库时间';

create table if not exists `owner` (
  `id` bigint unsigned not null auto_increment ,
  `username` char (15) binary not null comment '用户名',
  `email` char (40) not null comment '邮箱',
  `password` char (32) not null comment '密码',
  `salt` char (4) not null comment '4位小写字母',
  primary key (`id` desc),
  unique key (`username`),
  unique key (`email`)
);

create table if not exists `book` (
  `id` bigint unsigned not null auto_increment ,
  `book_no` smallint (3) unsigned zerofill not null comment '账套号',
  `owner`
  `company` bigint unsigned not null comment '公司编号',
  `industry` tinyint unsigned not null comment '行业性质',
  `account_manager` bigint unsigned not null comment '账套主管',
  `description` tinytext comment '基础信息',
  primary key (`id` desc)

);

create table if not exists `company` (
  `id` bigint unsigned not null auto_increment ,
  `name` varchar (20) not null comment '单位名称',
  `short_name` varchar (20) not null comment '单位简称',
  `address` varchar (100) not null comment '单位地址',
  `representive` char (5) not null comment '法人代表',
  `postcode` char (6) not null comment '邮政编码',
  `tax_number` char (15) not null comment '企业税号',
  `type` smallint unsigned not null comment '企业类型',
);

create table if not exists `industry` (
  `id` tinyint unsigned not null auto_increment ,
  `name` varchar (15) not null ,
  primary key (`id`),
  unique key (`name`)
) engine = innodb, default character set = utf8, comment '行业性质';

create table if not exists `company_type` (
  `id` smallint unsigned not null auto_increment ,
  `name` varchar (10) not null ,
  primary key (`id`),
  unique key (`name`)
) engine = innodb, default character set = utf8, comment '企业类型';
