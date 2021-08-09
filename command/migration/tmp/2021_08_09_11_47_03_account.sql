# up
create table if not exists `account` (
    `id` bigint(20) unsigned not null,
    `version` int(11) not null,
    `create_time` datetime default null,
    `update_time` datetime default null,
    `delete_time` datetime default null,
    `name` varchar(30) default null,
    `email` varchar(1000) default null,
    `password` varchar(100) default null,
    `last_login_ip` varchar(15) default null,
    `is_admin` varchar(20) not null,
    primary key (`id`)
) engine=innodb default charset=utf8mb4;

# down
drop table `account`;
