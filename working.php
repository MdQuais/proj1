<?php


function toBinary($data)
{
	$data= (string) $data;
	
	$length=strlen($data);
	
	$finalvalue='';
while($length--)
{
$finalvalue = str_pad(decbin(ord($length)),8,"0",STR_PAD_LEFT).$finalvalue;


}

return $finalvalue;
}	
	
	function convert__string($binary,$actual)
	{
		return $actual;
		
	}
	
	function convert_to_String($bin)
	{
		$text_array = explode("\r\n", chunk_split($bin, 8));
    $newstring = '';
    for ($n = 0; $n < count($text_array) - 1; $n++) {
        $newstring .= chr(base_convert($text_array[$n], 2, 10));
    }
    return $newstring;
		
		
	}
	

?>