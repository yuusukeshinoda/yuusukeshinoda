【オブジェクト指向２ 課題２ 駅の情報を入れたテーブルを作成した際のsql文】

//stationInfoテーブルを作成
mysql> create table stationInfo(stationID smallint zerofill primary key,stationName varchar(30));
Query OK, 0 rows affected (0.02 sec)

//stationInfoテーブルにレコードをinsert
mysql> insert into stationInfo values(1,'中野');
Query OK, 1 row affected (0.00 sec)
mysql> insert into stationInfo values(2,'落合');
Query OK, 1 row affected (0.00 sec)
mysql> insert into stationInfo values(3,'高田馬場');
Query OK, 1 row affected (0.00 sec)
mysql> insert into stationInfo values(4,'早稲田');
Query OK, 1 row affected (0.01 sec)
mysql> insert into stationInfo values(5,'神楽坂');
Query OK, 1 row affected (0.00 sec)
mysql> insert into stationInfo values(6,'飯田橋');
Query OK, 1 row affected (0.01 sec)

mysql> select * from stationInfo;
+-----------+--------------+
| stationID | stationName  |
+-----------+--------------+
|     00001 | 中野         |
|     00002 | 落合         |
|     00003 | 高田馬場     |
|     00004 | 早稲田       |
|     00005 | 神楽坂       |
|     00006 | 飯田橋       |
+-----------+--------------+
6 rows in set (0.00 sec)
