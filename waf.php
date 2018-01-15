<?php
function curl_get($durl){  
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$durl);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_BINARYTRANSFER,true);  
$r=curl_exec($ch);
curl_close($ch);
return $r;
}

if(isset($_POST['action']) && $_POST['action'] == 'Submit') {
//print '<pre>';

$url = $_POST["ip"];
$http = "http://";
$a[0] = "/?cmd.exe";
$a[1] = "/?index&&dir";
$a[2] = "/?waf=%3Cscript%3Ehello%3C/script%3E";
$a[3] = "/?page1=../../../../../../etc/passwd";
$a[4] = "/?page2=http://bbs.xiaomi.cn/forum.php";
$a[5]  = "/?password_new=password&password_conf=password&Change=Change";
$a[6]  = "/?id=a UNION SELECT 1,2;-- -&Submit=Submit";
$a[7]  = "/?id=1 AND sleep 3&Submit=Submit";

for($i=0;$i<8;$i++){
$b[$i]=$http.$url.$a[$i];
$c[$i]=curl_get($b[$i]);
print_r($b[$i]); 
print_r($c[$i]); 
}

    
//print '</pre>';
} 
else {
?>
<div style="text-align:center;" style="margin:0px auto">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <br><br>WAF Protect IP:  <input type="text" name="ip"><br><br>
    <input type="submit" name="action" value="Submit">
</form>
</div>
<?php
}
?>