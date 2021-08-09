# 账号角色关系  
账号角色关系




### 关联关系  


与账号角色关系相关的类图:  
```mermaid
classDiagram
entity ..> JsonSerializable
entity ..> Serializable
account_role --> entity
account_role "*" <--* "1" account : account  
account_role "*" <--* "1" role : role  
account_role : +id  
account_role : +create_time  
account_role : +update_time  
account_role : +delete_time  
account_role : +account_id  
account_role : +role_id  
```






相关的 `E-R` 图:  
```mermaid
erDiagram
    account_role }|--|| account : account  
    account_role }|--|| role : role  
    account_role {
        id id  
        datetime create_time  
        datetime update_time  
        datetime delete_time  
        id account_id  
        id role_id  
    }
```




### 实体属性

这里是指账号角色关系在编码过程中可以被直接调用的属性，其中 `必要` 是指在账号角色关系创建时，是否必须要有的属性，可选属性可在创建账号角色关系后再赋值。  
**属性表:**   

|属性键名|数据类型|必要|名称|描述|
|----|----|----|----|----|
|id|id|无需|主键|主键会自动生成，无需赋值|
|create_time|datetime|无需|创建时间|会自动生成，无需赋值|
|update_time|datetime|无需|更新时间|会自动更新，无需赋值，创建时与 `create_time` 一致|
|delete_time|datetime|无需|删除时间|会自动维护，无需赋值|
|account|[account](entity/account.md)|必传|关联关系|账号角色关系所属的账号|
|account_id|id|无需|外键|账号角色关系所属的账号，此处为账号的`id`|
|role|[role](entity/role.md)|必传|关联关系|账号角色关系所属的角色|
|role_id|id|无需|外键|账号角色关系所属的角色，此处为角色的`id`|




### 常量




