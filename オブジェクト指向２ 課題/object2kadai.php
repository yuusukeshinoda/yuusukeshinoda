<?php


/*
課題3から6までは以下の行数に記載しています。

課題３...14,17,19行目
課題４...23,27,30,66,70,73行目
課題５...36,41,79,84行目
課題６...54,97行目
*/


//【課題３】抽象クラスbaseを作成
abstract class base{
	
	//【課題３】loadというprotectedな関数を用意
	abstract protected function load();
	//【課題３】　showというpublicな関数を用意
	abstract public function show();
}

//【課題４】抽象クラスbaseを継承して人の情報を扱うHumanクラスを作成
class Human extends base{
	private $pdo_object;
	
	//【課題４】privateな変数tableを用意
	private $table;
	
	//【課題４】コンストラクタでインスタンス生成時にPDOオブジェクトとテーブル名を受け取りprivateな変数に保持する。
	public function __construct($pdo_object,$tableName){
		$this -> pdo_object = $pdo_object;
		$this -> table = $tableName;
	}
	
	//【課題５】DBから全情報を取得するためのloadメソッドを作成
	private $sql;
	private $getQuery;
	private $result;
	public function load(){
		//【課題５】table変数を利用してデータを取得
		$this -> sql = "select * from $this->table";
		$this -> getQuery = $this -> pdo_object -> prepare($this -> sql);
		$this -> getQuery -> execute();
		$this -> result = $this -> getQuery -> fetchall(PDO::FETCH_ASSOC);
	}
	
	public function show_by_var_dump(){
		var_dump($this->result);
	}
	
	private $key;
	
	//【課題６】テーブルの情報を一覧で表示するためのshowメソッドを作成する
	public function show(){
		foreach($this->result as $value){
			foreach($value as $this->key => $value2){
			echo '['."$this->key".']'."$value2";
			echo '<br>';
			}
			echo '<br>';
		}
	}
}

//【課題４】抽象クラスbaseを継承して駅の情報を扱うStationクラスを作成
class Station extends base{
	private $pdo_object;
	
	//【課題４】privateな変数tableを用意
	private $table;
	
	//【課題４】コンストラクタでインスタンス生成時にPDOオブジェクトとテーブル名を受け取りprivateな変数に保持する。
	public function __construct($pdo_object,$tableName){
		$this -> pdo_object = $pdo_object;
		$this -> table = $tableName;
	}
	
	//【課題５】DBから全情報を取得するためのloadメソッドを作成
	private $sql;
	private $getQuery;
	private $result;
	public function load(){
		//【課題５】table変数を利用してデータを取得
		$this -> sql = "select * from $this->table";
		$this -> getQuery = $this -> pdo_object -> prepare($this -> sql);
		$this -> getQuery -> execute();
		$this -> result = $this -> getQuery -> fetchall(PDO::FETCH_ASSOC);
	}
	
	public function show_by_var_dump(){
		var_dump($this->result);
	}
	
	private $key;
	
	//【課題６】テーブルの情報を一覧で表示するためのshowメソッドを作成する
	public function show(){
		
		//データベースから取得した情報は二重配列になっているので二重のforeachで処理
		foreach($this->result as $value){
			
			//例えば「[stationID]00001：[stationName]中野」のように表示させたいので、if文で「：」をつけるかつけないかを場合分けする
			$i = 0;
			foreach($value as $this->key => $value2){
				if($i==0){
					echo '['."$this->key".']'."$value2".'：';
				}else{
					echo '['."$this->key".']'."$value2";
					}
					$i++;
			}
			echo '<br>';
		}
	}
}

//PDOオブジェクトを作成してデータベースに接続
try{
$pdo_object = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','yussuke','mofcarro');
}catch(PDOException $Exception){
	die('データベースへの接続エラー:' .$Exception->getMessage());
}

//【課題４】Human, Stationの各クラスのコンストラクタに、DBに作成したテーブルのテーブル名を渡す。また、PDOオブジェクトも同時に渡しておく。
$human = new Human($pdo_object,'humanInfo');
$station = new Station($pdo_object,'stationInfo');

//loadメソッドを実行
$human -> load();

//$human -> show_by_var_dump();

//loadメソッドを実行
$station -> load();

//$station -> show_by_var_dump();
echo '<br>';

//showメソッドを実行
$human -> show();
echo '<br>';

//showメソッドを実行
$station -> show();
echo '<br>';

?>