<?php 

class PQF
{
	public $px;
	public $qx;
	public $fx;

	public function p($x){
		$s="return ".$this->px.";";
		$s=$this->usd_rep($s);
		return eval($s);
	}

	public function q($x){
		$s="return ".$this->qx.";";
		$s=$this->usd_rep($s);
		return eval($s);
	}

	public function f($x){
		$s="return ".$this->fx.";";
		$s=$this->usd_rep($s);
		return eval($s);
	}

	public function usd_rep($str){
		$str = str_replace('x', '$x', $str);
		$str = str_replace('e$xp', 'exp', $str);
		return $str;
	}

	public function printer($x,$p,$q,$f,$u,$v,$y)
	{
		$str ="";
		for ($i=0; $i <= 10 ; $i++) { 
			$str .= "
			<tr>
				<td>$i</td>
			    <td>$x[$i]</td>
			    <td>$p[$i]</td>
			    <td>$q[$i]</td>
			    <td>$f[$i]</td>
			    <td>$u[$i]</td>
			    <td>$v[$i]</td>
			    <td>$y[$i]</td>
		    <tr>";
		}
		return $str;
	}
}






function ChatsF($px, $qx, $fx, $c1,$c,$d1,$d)
{
	$a=0;
	$b=1;
	$c2=0;
	$d2=0;
	$n=10;

	$pqf=new PQF;
	$pqf->px = $px;
	$pqf->qx = $qx;
	$pqf->fx = $fx;

	$c1 = floatval($c1);
	$c = floatval($c);
	$d1 = floatval($d1);
	$d = floatval($d);

	$x = []; $p = []; $q = []; $f = [];  // xi p(xi) q(xi) f(xi) masivlari

	$h=($b - $a)/$n; // qadam uzunligi

	$y=[];

	$y[$n]=$d/$d1;

	for($i=0;$i<=$n;$i++){
		$x[$i] = $i*$h;
		$p[$i] = $pqf -> p($x[$i]);
		$q[$i] = $pqf -> q($x[$i]);
		$f[$i] = $pqf -> f($x[$i]);
	}


	$u = [];
	$v = [];
	$u[0] = -$c * $h / (-$c1 * $h +$c2);
	$v[0] = -$c2 / (-$c1 * $h +$c2);

	for ($i=1; $i < $n; $i++) { 
		$g = (1-0.5 * $p[$i] * $h);

		$u[$i] = (-$f[$i] * $h * $h + $g * $u[$i-1])/
				 (-$q[$i] * $h * $h + 2 -$g * $v[$i-1]);

		$v[$i] = (1 + 0.5 * $p[$i] * $h)/
				 (-$q[$i] * $h * $h + 2 -$g * $v[$i-1]);
	}
	$u[$n] = $y[$n];
	$v[$n] = 0;	

	for ($i=$n-1; $i >=0; $i--) { 
		$y[$i] = $u[$i] + $v[$i] * $y[$i+1];
	}

	return $pqf->printer($x,$p,$q,$f,$u,$v,$y);

}
