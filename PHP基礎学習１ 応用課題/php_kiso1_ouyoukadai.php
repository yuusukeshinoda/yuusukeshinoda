<?php 

//【①商品種別の配列を作成し、foreach文で配列の値をすべて表示。】
$goods_category_array = array(1=>"雑貨",2=>"生鮮食品",3=>"その他");
echo "商品種別一覧".'<br>';
foreach($goods_category_array as $key => $value){
	echo $key.'：'.$value.'<br>';
}

//クエリストリングで商品種別の配列におけるインデックスを渡して変数に格納。そのインデックスを用いて特定の商品種別を表示
$index = $_GET['goods_category'];
echo '<br>';
echo '商品種別：'.$goods_category_array[$index].'<br>';

$total_amount = $_GET['total_amount'];
echo '総額：'.$total_amount.'円<br>';
$number = $_GET['number'];
echo '個数：'.$number.'個<br>';

//【②総額と個数から１個あたりの値段を算出して表示】
$price = $total_amount / $number;
echo '商品一個あたりの値段：'.$price.'円<br>';

//【③3000円以上購入で4%、5000円以上購入で5%のポイントを付与するように設定。購入額に応じたポイントを表示】
if(3000<=$total_amount && $total_amount<5000){
	$point = $total_amount * 0.04;
	echo $point.'ポイント付与しました。<br>';
}elseif(5000<=$total_amount){
	$point = $total_amount * 0.05;
	echo $point.'ポイント付与しました。<br>';
}

?>