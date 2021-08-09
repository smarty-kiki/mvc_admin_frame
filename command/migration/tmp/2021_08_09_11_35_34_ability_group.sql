# up
create table if not exists `ability_group` (
    `id` bigint(20) unsigned not null,
    `version` int(11) not null,
    `create_time` datetime default null,
    `update_time` datetime default null,
    `delete_time` datetime default null,
    `name` varchar(30) default null,
    primary key (`id`)
) engine=innodb default charset=utf8mb4;

# down
drop table `ability_group`;
