【オブジェクト指向２ 課題１ 人の情報を入れたテーブルを作成した際のsql文】

//humanテーブルを作成
mysql> create table human(id bigint unsigned auto_increment primary key,name varchar(50),age tinyint unsigned,address varchar(155));
Query OK, 0 rows affected (0.05 sec)

//humanテーブルをhumanInfoテーブルに改名
mysql> alter table human rename to humanInfo;
Query OK, 0 rows affected (0.02 sec)

//humanInfoテーブルにレコードをinsert
mysql> insert into humanInfo values(1,'山田',40,'東京都');
Query OK, 1 row affected (0.01 sec)
mysql> insert into human values(2,'田中',29,'山梨県');
Query OK, 1 row affected (0.00 sec)
mysql> insert into human values(3,'島田',20,'大阪府');
Query OK, 1 row affected (0.00 sec)
mysql> insert into human values(4,'山口',43,'北海道');
Query OK, 1 row affected (0.00 sec)
mysql> insert into human values(5,'新井',26,'福岡県');
Query OK, 1 row affected (0.00 sec)

mysql> select * from humanInfo;
+----+--------+------+-----------+
| id | name   | age  | address   |
+----+--------+------+-----------+
|  1 | 山田   |   40 | 東京都    |
|  2 | 田中   |   29 | 山梨県    |
|  3 | 島田   |   20 | 大阪府    |
|  4 | 山口   |   43 | 北海道    |
|  5 | 新井   |   26 | 福岡県    |
+----+--------+------+-----------+
5 rows in set (0.00 sec)
