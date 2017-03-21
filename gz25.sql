create database gz25;

-- 创建用户表
create table shop_user(
	id int unsigned primary key auto_increment,
	username varchar(50) not null unique,
	pwd char(32) not null comment 'md5的加密',
	role tinyint not null default 1 comment '1:普通会员 2:管理员',
	status tinyint not null default 1 comment '1:正常 2:禁用',
	sex tinyint not null default 2 comment '0:女 1:男 2:保密 3:妖 4:gay 5:兽',
	phone char(11),
	pic varchar(255),
	qq varchar(15),
	addtime int not null default 0
)engine=innodb default charset=utf8;

-- 插入测试数据
insert into shop_user(username, pwd, role, addtime) values('admin', md5('123'), 2, unix_timestamp());


-- 创建分类表
create table shop_type(
	id int unsigned primary key auto_increment,
	name varchar(255) not null,
	pid int unsigned not null default 0,
	path varchar(255) not null default '0,'
)engine=innodb default charset=utf8;

-- 创建商品表
create table shop_goods(
	id int unsigned primary key auto_increment,
	tid int unsigned not null,
	name varchar(255) not null,
	price decimal(10,2) unsigned not null default 0,
	pic varchar(255) not null,
	des text,
	status tinyint not null default 1 comment '1:在售中 2:已下架',
	store int unsigned not null default 0,
	addtime int not null default 0,
	clicknum int unsigned not null default 0,
	buynum int unsigned not null default 0,
	index name(name)
)engine=innodb default charset=utf8;

-- 创建地址表
create table shop_address(
	id int unsigned primary key auto_increment,
	uid int unsigned not null,
	address varchar(255) not null,
	phone char(11) not null,
	name varchar(50) not null,
	code char(6)，
)engine=innodb default charset=utf8;

-- 创建订单表
create table shop_orders(
	id int unsigned primary key auto_increment,
	uid int unsigned not null,
	aid int unsigned not null,
	total decimal(12,2) unsigned not null,
	addtime int not null default 0,
	status tinyint not null default 1
)engine=innodb default charset=utf8;

-- 创建订单详情表
create table shop_detail(
	id int unsigned primary key auto_increment,
	oid int unsigned not null,
	gid int unsigned not null,
	num int unsigned not null default 1
)engine=innodb default charset=utf8;

-- 创建评价表
create table shop_appraise(
	id int unsigned primary key auto_increment,
	oid int unsigned not null,
	pic varchar(255) not null,
	name varchar(255) not null,
	des text,
	status tinyint not null default 1 comment '1:满意 2:不满意'
)engine=innodb default charset=utf8;
















