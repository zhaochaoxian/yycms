<?php
$str = "family";
$strin = "我的祖国";
echo strlen($str)."</br>";     //单位字节：返回长度6个字节，不受编码影响
echo strlen($strin)."</br>";//单位字节：返回长度8个字节，gbk编码下一个汉字2个字节，utf-8编码下一个汉字3个字节（如果utf-8编码格式下返回12），
echo mb_strlen($str)."</br>";  //单位个数：返回6个，不受编码影响
echo mb_strlen($strin);//单位个数：返回4个，不受编码影响
