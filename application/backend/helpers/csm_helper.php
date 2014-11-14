<?php 


function password_generate($n)
{
  $symbol = array(
  'A','B','C','D','E','F',
  'G','H','I','J','K','L',
  'M','N','O','P','R','S',
  'T','U','V','X','Y','Z',
  '1','2','3','4','5','6',
  '7','8','9','0');

  $password="";

  for($i = 1; $i < $n; $i++)
      {
        $count=count($symbol);
        $index = rand(0,$count); 
        $password .= $symbol[$index];
      }

    $return['password'] = $password;
    $return['md5'] = md5($password);
    $return['hash'] = hash('sha512', $password. config_item('encryption_key'));
    
    return $return;
}



 ?>