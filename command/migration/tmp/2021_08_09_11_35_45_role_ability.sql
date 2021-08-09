# up
create table if not exists `role_ability` (
    `id` bigint(20) unsigned not null,
    `version` int(11) not null,
    `create_time` datetime default null,
    `update_time` datetime default null,
    `delete_time` datetime default null,
    `role_id` bigint(20) unsigned not null,
    `ability_id` bigint(20) unsigned not null,
    key `fk_role_idx` (`role_id`, `delete_time`),
    key `fk_ability_idx` (`ability_id`, `delete_time`),
    primary key (`id`)
) engine=innodb default charset=utf8mb4;

# down
drop table `role_ability`;
