<?php
include_once "config.php";
//set content type to text/json
if(!headers_sent())
        header("Content-type: text/json");

//check if method is post otherwise reject request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(["code"=>100,"message"=>"Method not allowed"]);
        exit;
}

//get all required variables from $_POST
$request = isset($_POST["request"])?$_POST["request"]:null;
$song = isset($_POST["song"])?$_POST["song"]:null;
$ch = isset($_POST["ch"])?$_POST["ch"]:null;

//check if all variables are present or not
if(empty($request) || empty($song) || empty($ch) || !is_numeric($ch)){
	echo json_encode(["code"=>101,"message"=>"Invalid parameter to start radio"]);
        exit;
}
//sanatize song name
$clean_song=str_replace(";","lol",$song);
$clean_song = '"'. "uploads/".$clean_song .'"';
//start command for playing song
$cmdStart ='sudo screen -A -m -d -S pifmrds '.$config["radio"].' -freq '.$ch.' -audio '.$clean_song;
//stop command for stopping already playing song
$cmdStop = "ps -ef | grep -i 'pifmrds' | awk '{print $2}' | sudo xargs kill";

//execute request based on request type
if($request=="start"){
	//stop song first
	$kill = shell_exec($cmdStop);
	//start playing song
	$output = shell_exec($cmdStart);
	//send response
	echo json_encode(["code"=>1,"message"=>"Started playing","kill"=>$kill,"start"=>$output,"cmdStart"=>$cmdStart]);
}else if($request=="stop"){
	//stop song first
	$kill = shell_exec($cmdStop);
	//send response
	echo json_encode(["code"=>1,"message"=>"Stopped playing","kill"=>$kill]);
}else{
	//send response
	echo json_encode(["code"=>103,"message"=>"Invalid request"]);
}