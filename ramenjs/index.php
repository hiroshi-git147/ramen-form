<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ラーメン店アンケート</title>
<link rel ='stylesheet' href = 'style.css'>
</head>
<body>

<fieldset>
	<legend>ラーメン店アンケート</legend>
	
	<div class = "ramen-form">
		<h3><small>※</small>は必須項目です</h3>
		<p>
		  <label for = "your_name">お名前<small>※</small>：</label><br>
		  <input type = "text" name = "your_name" id = "your_name" size = "35" max_length = "10" placeholder = "ラーメン　太郎">
		</p>

		<p>性別：<br>
		  <input type = "radio" name = "gender" id = "gender" value = "男性">
		  <label for = "gender_male">男性</label>
		  <input type = "radio" name = "gender" id = "gender" value = "女性">
		  <label for = "gender_female">女性</label>
		</p>

		<p>年齢：<br>
		  <select name = "age">
		  	 <?php
		  	   for($i = 10; $i <= 60; $i++) {
		  	    echo "<option value = $i>$i</option>";
		  	   }
		  	 ?>
		  </select> 歳
		</p>
		
		<p>
		  <label for = "postal_code">郵便番号：</label><br>
		  <input type="text" name="postal_code" id = "postal_code" minlength="7" maxlength="8" pattern="\d*" >
		</p>
		
		<p>
		  <label for = "email">メールアドレス<small>※</small>：</label><br>
		  <input type="email" name="email" id = "email" size="30" maxlength="50" placeholder = "ramen@oishi.com">
		</p>
		
		<p>好きなラーメン：<br>
		  <select name = "favorite_ramen">
		  	 <?php
		  	   $ramen = ['醤油ラーメン', '味噌ラーメン', '豚骨ラーメン'];
		  	   for($i = 0; $i < count($ramen); $i++) {
		  	    echo "<option value = $ramen[$i]>$ramen[$i]</option>";
		  	   }
		  	 ?>
		  </select>
		</p>

		<p>ご好きなトッピング（複数選択可）:<br>
		  <input type = "checkbox" name = "topping[]" id = "chashu" value = "チャーシュ" >
		  <label for = "chashu">チャーシュ</label>
		  <input type = "checkbox" name = "topping[]" id = "negi" value = "ネギ" >
		  <label for = "negi">ネギ</label>
		  <input type = "checkbox" name = "topping[]" id = "nori" value = "ノリ" >
		  <label for = "nori">ノリ</label>
		</p>

	    <p>
	      <label for = "comments">ご意見・ご感想：</label><br>
		  <textarea id="comments" name="comments" rows="10" cols="60" placeholder = "ここに記入してください"></textarea>
		</p>
	</div>
	
	<div class = "btn">
	
	  <button id="modalOpen" class="button">送信</button>
	  <div id="easyModal" class="modal">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h1>入力確認</h1>
	        <span class="modalClose">×</span>
	      </div>
	      
	      <div class="modal-body">
	      <form action = "checked.php" method = "post">
			<?php
			  echo"<p>入力したデータを確認してください</p>";
			  $name = $_POST['your_name'];
			  $gender = $_POST['gender'];
			  $age = $_POST['age'];
			  $postal_code = $_POST['postal_code'];
			  $email = $_POST['email'];
			  $favorite_ramen = $_POST['favorite_ramen'];
			  $topping = $_POST['topping'];
			  $comments = $_POST['comments'];

			  echo '名前：',htmlspecialchars($name, ENT_QUOTES),'<br>';
			  echo '性別：',htmlspecialchars($gender, ENT_QUOTES),'<br>';
			  echo '年齢：',htmlspecialchars($age, ENT_QUOTES),'<br>';
			  echo '郵便番号：',htmlspecialchars($postal_code, ENT_QUOTES),'<br>';
			  echo 'メールアドレス：',htmlspecialchars($email, ENT_QUOTES),'<br>';
			  echo '一番好きなラーメン：',htmlspecialchars($favorite_ramen, ENT_QUOTES),'<br>';
			  echo '年齢：',htmlspecialchars($age, ENT_QUOTES),'<br>';
			  echo 'カテゴリー：<br>';
			  foreach($topping as $value) {
			    echo '・',htmlspecialchars($value, ENT_QUOTES),'<br>';
			  }
			  echo 'ご意見・ご感想：<br>',htmlspecialchars($comments, ENT_QUOTES),'<br>';
			?>
		  </div>
		  
		  <div class="modal-footer">
		    <p>
			  <input type = "submit" value = "確定">
			  <input type = "reset" value = "修正" onClick = "history.back()">
			</p>
		  </div>
		</div>
	  </div>
	</div>
	
	<script src="index.js"></script>
</fieldset>
</body>
</html>