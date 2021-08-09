# up
create table if not exists `ability` (
    `id` bigint(20) unsigned not null,
    `version` int(11) not null,
    `create_time` datetime default null,
    `update_time` datetime default null,
    `delete_time` datetime default null,
    `name` varchar(30) default null,
    `key` varchar(30) default null,
    `ability_group_id` bigint(20) unsigned not null,
    key `fk_ability_group_idx` (`ability_group_id`, `delete_time`),
    primary key (`id`)
) engine=innodb default charset=utf8mb4;

# down
drop table `ability`;
