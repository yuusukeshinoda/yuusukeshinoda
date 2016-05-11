<?php
//映画が作られるまでをオブジェクト指向する。
//オブジェクト指向１の基礎課題3と4を9,10,12,19,29行目に書いています。

class Human{
	protected $name;
	
	//【基礎課題3】 パブリックな二つの変数
	public $age;
	public $birthday;
	
	//【基礎課題3】 2つの変数に値を設定するパブリックな関数
	public function setHuman($n,$a,$bd){
		$this->name = $n;
		$this->age = $a;
		$this->birthday = $bd;
	}
	
	//【基礎課題3】2つの変数の中身をechoするパブリックな関数
	public function showHumanInfo(){
		echo '年齢：'.$this->age.'<br>';
		echo '誕生日：'.$this->birthday.'<br>';
	}
}

//Humanクラスを継承したDirectorクラスを定義
class Director extends Human{
	
	//【基礎課題4】2つの変数の中身をクリアするパブリックな関数
	public function clearVariable(){
		$this->age = 0;
		$this->birthday = null;
	}
	private $actor;
	private $cameraman;
	
	//コンストラクタを設定。このクラスがインスタンス化された段階でactorインスタンスとcameramanインスタンスをprivateフィールドに格納する
	public function __construct($actor,$cameraman){
		$this->actor = $actor;
		$this->cameraman = $cameraman;
	}
	
	//監督名を表示するメソッド
	public function showDirectorName($directorName){
		$this->name = $directorName;
		echo '監督：'."$this->name".'<br>';
	}
	
	private $title;
	public function setTitle($t){
		$this->title = $t;
		echo "作品名：「 $this->title 」".'<br>';
	}
	
	private $cast;
	public function doCasting($castArray){
		
		//配列でもらった引数をimplodeしてcastフィールドに格納して表示
		$this->cast = implode(",",$castArray);
		echo "出演者：$this->cast".'<br>';
	}
	
	public function write(){
		echo '脚本を書く'.'<br>';
	}
	
	//actorインスタンスを呼び出してその中のメソッドを実行させるメソッド
	public function instructActor(){
		$this->actor -> doAct();
	}
	
	//cameramanインスタンスを呼び出してその中のメソッドを実行させるメソッド
	public function instructCameraman(){
		$this->cameraman -> takeShot();
	}
}

//俳優クラスを定義
class Actor extends Human{
	public function doAct(){
		echo '俳優が演技をする'.'<br>';
	}
}

//カメラマンクラスを定義
class Cameraman extends Human{
	public function takeShot(){
		echo 'カメラマンが撮影する'.'<br>';
	}
}

$human = new Human();

//ActorクラスとCameramanクラスをインスタンス化
$actor = new Actor();
$cameraman = new Cameraman();

//directorクラスをインスタンス化。その際にdirectorクラスのコンストラクタにactorインスタンスとcameramanインスタンスを渡す
$director = new Director($actor,$cameraman);

//作品にタイトルをつけるメソッド
$director->setTitle("映画");

//監督名を表示するメソッド
$director->showDirectorName("松本");

//脚本を書くメソッド
$director->write();

//キャスティングメソッド(キャストは複数必要なので配列で渡す)
$director->doCasting(array('田中','山田','橋本'));

//俳優に指示を出すメソッド
$director->instructActor();

//カメラマンに指示を出すメソッド
$director->instructCameraman();



?>