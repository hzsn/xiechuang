<?php
defined('BASEPATH') OR exit('No direct script access allowed');

-- database name :hzxcsydb
-- mysql user:hzxc

-- -- 创建管理员账号
-- create user hzxcsyadmin;
-- -- 设置密码
-- use mysql;
-- update user set password=password(密码) where user = 'hzxcsyadmin';
-- -- 创建数据库
-- create database hzxcsydb;
-- --更改权限
-- grant all on hzxcsydb.* to 'hzxcsyadmin'@'%';
-- flush privileges;

-- -- 创建普通账号
-- create user hzxc;
-- -- 设置密码
-- use mysql;
-- update user set password=password(密码) where user = 'hzxc';
-- --更改权限
-- grant all on hzxcsydb.* to 'hzxc'@'%';
-- flush privileges;


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
 
-- 用户表
-- create table IF NOT EXISTS xc_user(
-- id int(3) not null primary key auto_increment comment '主键',
-- username	varchar(16) NOT null comment '用户名',
-- useremail	varchar(64) NOT null comment '用户邮箱',
-- password	varchar(64) NOT null comment '密码',
-- avatar		varchar(256) NOT null default '/static/img/logo-small.png' comment '头像',
-- create_time TIMESTAMP not null default now() comment '创建id的时间',
-- create_user	varchar(32) not null default 'admin' comment '创建者',
-- status int(2) not null default 0 comment '显示的状态, 0表示显示，非0表示不显示'
-- );
-- insert into xc_user(username, useremail, password) values('admin', 'admin@hzxcsy.com.cn', password('hzxc'));
-- 中心库表
-- create table IF NOT EXISTS xc_cangku(
-- id int(3) not null primary key auto_increment comment '主键',
-- name varchar(16) NOT null default '杭州协创实业有限公司' comment '中心库名称',
-- address varchar(128) NOT null comment '中心库地址',
-- phone varchar(64) comment '联系电话',
-- email varchar(64) comment '联系邮箱',
-- create_time TIMESTAMP not null default now() comment '创建id的时间',
-- create_user	varchar(32) not null default 'admin' comment '创建者',
-- status int(2) not null default 0 comment '显示的状态, 0表示显示，非0表示不显示'
-- );

-- insert into xc_cangku(address, phone, email) values('浙江省杭州市拱墅区花园岗路113号金通国际大厦A座9F', '400-827-3666', 'xiechuang@hzxc.com');

-- 协创员工相册组表
-- create table IF NOT EXISTS xc_galley_group(
-- id int(3) not null primary key auto_increment comment '主键',
-- cover_img_path varchar(128) not null comment '图集封面',
-- name varchar(16) NOT null default '协创相册' comment '协创相册',
-- img_path JSON NOT null comment '相册图片路径(以数组形式)',
-- create_time TIMESTAMP not null default now() comment '创建id的时间',
-- create_user	varchar(32) not null default 'admin' comment '创建者',
-- status int(2) not null default 0 comment '显示的状态, 0表示显示，非0表示不显示'
-- );

-- 协创员工相册表
-- create table IF NOT EXISTS xc_galley(
-- id int(3) not null primary key auto_increment comment '主键',
-- img_src varchar(256) NOT null  comment '相册item的路径',
-- img_small_src varchar(256) NOT null  comment '相册item缩略图的路径',
-- create_time TIMESTAMP not null default now() comment '创建id的时间',
-- create_user	varchar(32) not null default 'admin' comment '创建者',
-- status int(2) not null default 0 comment '显示的状态, 0表示显示，非0表示不显示',
-- group_id int(3) FOREIGN KEY REFERENCES xc_galley_group(id)
-- );

-- 人才招聘表
-- create table IF NOT EXISTS xc_job(
-- id int(8) not null primary key auto_increment comment '主键',
-- name varchar(16) NOT null comment '职位名称',
-- address varchar(32) NOT null comment '工作地点',
-- recruit_count	int(3)	NOT null default 0 comment '招聘人数',
-- ability	text NOT null comment '岗位职能',
-- requirement text NOT null comment '职位要求',
-- remark	text comment '备注',
-- create_time TIMESTAMP not null default now() comment '创建id的时间',
-- create_user	varchar(32) not null default 'admin' comment '创建者',
-- status int(2) not null default 0 comment '显示的状态, 0表示显示，非0表示不显示'
-- );


-- (select id, title, create_time, -1 as sorts from xc_article where id < 1 and status = 0 order by id desc limit 1)
-- union all
-- (select id, title,create_time, 1 as sorts from xc_article where id > 1 and status = 0 order by id limit 1);




