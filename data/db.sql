-- database name :hzxcsydb
-- mysql user:hzxc

-- -- 导航条表
-- create table if not exists xc_navbar (
-- id int(4)	not null primary key auto_increment comment '主键',
-- name	varchar(10) not null comment '导航名称',
-- pid int(4) not null default 0 comment '父级id, 若是一级则父级id为0,若是二级则此id是父级id',
-- url	varchar(256) not null default '/' comment '链接',
-- rel varchar(32) not null default '/index' comment '标识当前链接，以便高亮导航菜单',
-- create_time TIMESTAMP not null default now() comment '创建id的时间',
-- create_user	varchar(32) not null default 'admin' comment '创建者',
-- status int(2) not null default 0 comment '显示的状态, 0表示显示，非0表示不显示'
-- );

-- 一级目录
-- insert into xc_navbar(name, url) values('首页', '/');
-- insert into xc_navbar(name, url, rel, target) values('官网商城', 'http://carsociety.cn/', 'http://carsociety.cn/', '_blank');
-- insert into xc_navbar(name, url,rel) values('企业动态', '/news', '/news');
-- insert into xc_navbar(name, url,rel) values('关于协创', '/aboutxc', '/aboutxc');
-- insert into xc_navbar(name, url,rel) values('联系我们', '/contact', '/contact');

-- 二级目录
-- insert into xc_navbar(name, pid, url, rel) values('最新动态', 3, '/news', '/news');
-- insert into xc_navbar(name, pid, url, rel) values('行业动态', 3, '/news/other', '/news');
-- insert into xc_navbar(name, pid, url, rel) values('员工风采', 3, '/news/employee', '/news');
-- insert into xc_navbar(name, pid, url, rel) values('公司简介', 4, '/aboutxc', '/aboutxc');
-- insert into xc_navbar(name, pid, url, rel) values('团队介绍', 4, '/aboutxc/team', '/aboutxc');
-- insert into xc_navbar(name, pid, url, rel) values('合作伙伴', 5, '/contact/cooperator', '/contact');
-- insert into xc_navbar(name, pid, url, rel) values('诚招英才', 5, '/contact/joinus', '/contact');

-- -- 合作伙伴表
-- create table IF NOT EXISTS xc_cooperator (
-- id int(4)	not null primary key auto_increment comment '主键',
-- name	varchar(10) not null comment '合作伙伴名称',
-- img_path	varchar(128) not null default 'cooperator_default_img.png' comment '合作伙伴图片路径',
-- url varchar(128) comment '链接',
-- create_time TIMESTAMP not null default now() comment '创建id的时间',
-- create_user	varchar(32) not null default 'admin' comment '创建者',
-- status int(2) not null default 0 comment '显示的状态, 0表示显示，非0表示不显示'
-- );

-- insert into xc_cooperator(name, img_path,url) values('海马汽车','logo-haima.png','http://www.haima.com/');
-- insert into xc_cooperator(name, img_path,url) values('奇瑞汽车','logo-qirui.png','http://www.chery.cn/');
-- insert into xc_cooperator(name, img_path,url) values('长安铃木','logo-changanlingmu.png','http://www.changansuzuki.com/');
-- insert into xc_cooperator(name, img_path,url) values('天津一汽','logo-tianjinyiqi.png','http://m.tjyqxs.com/');
-- insert into xc_cooperator(name, img_path,url) values('北汽幻速','logo-beiqihuansu.png','http://www.baic-hs.com/');
-- insert into xc_cooperator(name, img_path,url) values('福田汽车','logo-futian.png','http://www.foton.com.cn/');
-- insert into xc_cooperator(name, img_path,url) values('东风','logo-dongfeng.png','http://www.dfmc.com.cn/');

-- -- 轮播数据表
-- create table IF NOT EXISTS xc_carousel (
-- id int(4)	not null primary key auto_increment comment '主键',
-- img_path	varchar(128) not null default 'carousel_default_img.png' comment '轮播图片路径',
-- url varchar(128) comment '链接',
-- item_desc	varchar(32) comment '轮播描述',
-- create_time TIMESTAMP not null default now() comment '创建id的时间',
-- create_user	varchar(32) not null default 'admin' comment '创建者',
-- status int(2) not null default 0 comment '显示的状态, 0表示显示，非0表示不显示'
-- );

-- insert into xc_carousel(img_path) values('/static/img/DSC_6545.JPG');
-- insert into xc_carousel(img_path) values('/static/img/DSC_6549_meitu_1.jpg');
-- insert into xc_carousel(img_path) values('/static/img/DSC_6546.JPG');
-- insert into xc_carousel(img_path) values('/static/img/DSC_6547.JPG');
-- -- 文章表
-- create table IF NOT EXISTS xc_article (
-- id int(11)	not null primary key auto_increment comment '主键',
-- title varchar(128) NOT null comment '文章标题',
-- contant text NOT null comment '文章内容',
-- pv int(11) NOT null default 0,
-- create_time TIMESTAMP not null default now() comment '创建id的时间',
-- create_user	varchar(32) not null default 'admin' comment '创建者',
-- status int(2) not null default 0 comment '显示的状态, 0表示显示，非0表示不显示'
-- );

-- 分类表
-- create table IF NOT EXISTS xc_category(
-- id int(3) not null primary key auto_increment comment '主键',
-- name varchar(16) NOT null default '公司咨询',
-- create_time TIMESTAMP not null default now() comment '创建id的时间',
-- create_user	varchar(32) not null default 'admin' comment '创建者',
-- status int(2) not null default 0 comment '显示的状态, 0表示显示，非0表示不显示'
-- );
-- insert into xc_category(name) values('公司咨询');
-- alter table xc_article add column cato_id int(4);
-- alter table xc_article add CONSTRAINT article_cato_fk foreign key(cato_id) REFERENCES xc_category(id);

-- 中心库表
create table IF NOT EXISTS xc_cangku(
id int(3) not null primary key auto_increment comment '主键',
name varchar(16) NOT null default '杭州协创实业有限公司' comment '中心库名称',
address varchar(128) NOT null comment '中心库地址',
phone varchar(64) comment '联系电话',
email varchar(64) comment '联系邮箱',
create_time TIMESTAMP not null default now() comment '创建id的时间',
create_user	varchar(32) not null default 'admin' comment '创建者',
status int(2) not null default 0 comment '显示的状态, 0表示显示，非0表示不显示'
);

insert into xc_cangku(address, phone, email) values('浙江省杭州市拱墅区花园岗路113号金通国际大厦A座9F', '400-827-3666', 'xiechuang@hzxc.com');

-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;
-- insert into xc_article(title, summary, contant) select title,summary, contant from xc_article where id = 1;

-- update xc_article set create_time = '2016-12-12 14:53:01' where id = 1;
-- update xc_article set create_time = '2016-12-12 14:53:02' where id = 2;
-- update xc_article set create_time = '2016-12-12 14:53:03' where id = 3;
-- update xc_article set create_time = '2016-12-12 14:53:04' where id = 4;
-- update xc_article set create_time = '2016-12-12 14:53:05' where id = 5;
-- update xc_article set create_time = '2016-12-12 14:53:06' where id = 6;
-- update xc_article set create_time = '2016-12-12 14:53:07' where id = 7;
-- update xc_article set create_time = '2016-12-12 14:53:08' where id = 8;
-- update xc_article set create_time = '2016-12-12 14:53:09' where id = 9;
-- update xc_article set create_time = '2016-12-12 14:53:10' where id = 10;
-- update xc_article set create_time = '2016-12-12 14:53:11' where id = 11;
-- update xc_article set create_time = '2016-12-12 14:53:12' where id = 12;
-- update xc_article set create_time = '2016-12-12 14:53:13' where id = 13;
-- update xc_article set create_time = '2016-12-12 14:53:14' where id = 14;
-- update xc_article set create_time = '2016-12-12 14:53:15' where id = 15;
-- update xc_article set create_time = '2016-12-12 14:53:16' where id = 16;
-- update xc_article set create_time = '2016-12-12 14:53:17' where id = 17;
-- update xc_article set create_time = '2016-12-12 14:53:18' where id = 18;
-- update xc_article set create_time = '2016-12-12 14:53:19' where id = 19;
-- update xc_article set create_time = '2016-12-12 14:53:20' where id = 20;
-- update xc_article set create_time = '2016-12-12 14:53:21' where id = 21;
-- update xc_article set create_time = '2016-12-12 14:53:22' where id = 22;
-- update xc_article set create_time = '2016-12-12 14:53:23' where id = 23;
-- update xc_article set create_time = '2016-12-12 14:53:24' where id = 24;
-- update xc_article set create_time = '2016-12-12 14:53:25' where id = 25;
-- update xc_article set create_time = '2016-12-12 14:53:26' where id = 26;
-- update xc_article set create_time = '2016-12-12 14:53:27' where id = 27;
-- update xc_article set create_time = '2016-12-12 14:53:28' where id = 28;
-- update xc_article set create_time = '2016-12-12 14:53:29' where id = 29;
-- update xc_article set create_time = '2016-12-12 14:53:30' where id = 30;
-- update xc_article set create_time = '2016-12-12 14:53:31' where id = 31;
-- update xc_article set create_time = '2016-12-12 14:53:32' where id = 32;
-- update xc_article set create_time = '2016-12-12 14:53:33' where id = 33;
-- update xc_article set create_time = '2016-12-12 14:53:34' where id = 34;
-- update xc_article set create_time = '2016-12-12 14:53:35' where id = 35;
-- update xc_article set create_time = '2016-12-12 14:53:36' where id = 36;
-- update xc_article set create_time = '2016-12-12 14:53:37' where id = 37;
-- update xc_article set create_time = '2016-12-12 14:53:38' where id = 38;
-- update xc_article set create_time = '2016-12-12 14:53:39' where id = 39;
-- update xc_article set create_time = '2016-12-12 14:53:40' where id = 40;
-- update xc_article set create_time = '2016-12-12 14:53:41' where id = 41;
-- update xc_article set create_time = '2016-12-12 14:53:42' where id = 42;
-- update xc_article set create_time = '2016-12-12 14:53:43' where id = 43;
-- update xc_article set create_time = '2016-12-12 14:53:44' where id = 44;

-- (select id, title, create_time, -1 as sorts from xc_article where id < 1 and status = 0 order by id desc limit 1)
-- union all
-- (select id, title,create_time, 1 as sorts from xc_article where id > 1 and status = 0 order by id limit 1);




