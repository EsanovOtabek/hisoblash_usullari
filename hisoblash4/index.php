<?
$result="";
if(!empty($_POST)){
	foreach ($_POST as $key => $value) {
		$$key=$value;
	}

	require_once 'hisobla.php';

	$result = ChatsF($px,$qx,$fx,$c1,$c,$d1,$d);

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Hisoblash 2-topshiriq. </title>
	<style>
    *{
  box-sizing: border-box;
}

#hisoblash {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#hisoblash td, #hisoblash th {
  border: 1px solid #ddd;
  padding: 8px;
}

#hisoblash tr:nth-child(even){background-color: #f2f2f2;}

#hisoblash tr:hover {background-color: #ddd;}

#hisoblash th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

input[type=text], select {
  width: 23%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 23%;
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

footer{
    background: #111;
    height: auto;
    width: 100%;
    padding-top: 40px;
    color: #04AA6D;
}
.footer-content{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
}

.footer-content h4{
    font-size: 2.1rem;
    font-weight: 500;
    text-transform: capitalize;
    line-height: 3rem;
}
  </style>
</head>
<body>

	<br><hr>
	<marquee> <h2>Hisoblash usullari topshiriq</h2> </marquee>
	<hr><br>
	<div class="div">
		<form action="" method="POST">
			<input type="text" name="px" placeholder="p(x)" required>
			<input type="text" name="qx" placeholder="q(x)" required>
			<input type="text" name="fx" placeholder="f(x)" required>
			<input type="text" name="c1" placeholder="c1" required>
			<input type="text" name="c" placeholder="c" required>
			<input type="text" name="d1" placeholder="d1" required>
			<input type="text" name="d" placeholder="d" required>
			<input type="submit" name="" value="hisoblash">
		</form>
	</div>

	<br><hr><br>
	
	<div class="div">
		<table id="hisoblash">
			<tr>
			    <th><i>i<i></th>
			    <th><i>xi<i></th>
			    <th><i>p(xi)<i></th>
			    <th><i>q(xi)<i></th>
			    <th><i>f(xi)<i></th>
			    <th><i>u(i)<i></th>
			    <th><i>v(i)<i></th>
			    <th><i>y(i)<i></th>
			  </tr>
		<? print_r($result);?>
		</table>
	</div>
	<br>
	<hr>
	<br>

	<footer>
		<div class="footer-content">
		     <h4>&copy; Code by Esanov Otabek;</h4>
		</div>

	</footer>
</body>
</html>
