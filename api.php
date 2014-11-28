<?php
/**
*@desc 课表api
*@param $classID $type
*@return (json)$class (jsonp)$callback
*
*/
// init 
// mysqli function
require './config.php';

function connect()
{
	$mysqli = new mysqli();
        $mysqli->connect($config['db_host'],$config['db_user'],$config['db_pswd'],$config['db_name']);  
	if(isset($mysqli->connect_errno)){
		return $error = "fail to connect ErrMsg:".$mysqli->connect_error;
	}else{
		$mysqli->query('SET NAMES UTF8');
		return $mysqli;
	}

}

function getClassValue($mysqli,$classID)
{	
	$sql = "SELECT course FROM class WHERE cid = '$classID' AND term = 
'$config[term]'";
	$rs = $mysqli->query($sql);
	if($rs){
		$row = $rs->fetch_row();
		$classValue = $row;
		return $classValue;
	}else{
		return $error="fail get data from database";
	}
}



//redis

require '../api_ecjtu_net/predis-0.8/autoload.php';
$redis = new Predis\Client();
$redis->rpush('class:api:count',time());


// get classID and return type
$classID = isset($_GET['classID'])?$_GET['classID']:isset($_POST['classID'])?$_POST['classID']:false;

$type = isset($_GET['callback'])?'jsonp':isset($_POST['type'])?$_POST['type']:'json';

//return json function
function response($type,$content,$error)
{
	$content = array('content'=>$content,'error'=>$error);
	$reback = json_encode($content,JSON_FORCE_OBJECT);
	if($type == 'jsonp'){
		$reback = 'callback('.$reback.')';
	}
	return $reback;
}



// init over progress start
// preg match function

function pregMatch($string)
{
	 $pattern="/<td><div align=\"center\"><font size=\"2\">(.*?)<\/font><\/div><\/td>/";
         preg_match_all($pattern, $string, $matches);
         if(preg_last_error() == PREG_NO_ERROR){
         	for ($i=0; $i <40 ; $i++) {
                        //$matches[1][$i]=str_replace("&nbsp;","无课",$matches[1][$i]);
                	if($matches[1][$i] == "&nbsp;") $matches[1][$i] = "休息～！";
                }
		$result = array();
		for($i=0;$i<40;$i+8){
			$mod = $i%8;
			if($mod==0) continue ;
			else array_push($result[$mod],$matches[1][$i]);
		}
		return $result;
                       
        }else{
		return $result = "preg_match error";
	} 
}

if($classID){
	$classID = is_numeric($classID)?substr($classID,0,12):false;
	if($classID){
		$mysqli = connect();
		if(is_object($mysqli)){
			$classValue = getClassValue($mysqli,$classID);  
               	 	if(is_array($classValue)){
				$class = pregMatch($classValue[0]);
				if(is_array($class)){
					echo response($type,$class);
				}else{
					$error = $class;
					echo response($type,"err",$error);
				}
			}else{
				$error = $classValue;
				echo response($type,"err",$error);	
			}
		}else{
			$error = $mysqli;
			echo response($type,"err",$error);
		}		
	}
}





?>
