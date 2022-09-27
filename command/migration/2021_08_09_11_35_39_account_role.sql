# up
create table if not exists `account_role` (
    `id` bigint(20) unsigned not null,
    `version` int(11) not null,
    `create_time` datetime default null,
    `update_time` datetime default null,
    `delete_time` datetime default null,
    `account_id` bigint(20) unsigned not null,
    `role_id` bigint(20) unsigned not null,
    key `fk_account_id` (`account_id`, `delete_time`),
    key `fk_role_idx` (`role_id`, `delete_time`),
    primary key (`id`)
) engine=innodb default charset=utf8mb4;

# down
drop table `account_role`;
