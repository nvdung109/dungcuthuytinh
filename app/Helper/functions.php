<?php
function remove_magic_quote($string){
	$string	= str_replace("\'", "'", $string);
	$string	= str_replace('\"', '"', $string);
	$string	= str_replace('\&quot;', "&quot;", $string);
	$string	= str_replace("\\\\", "\\", $string);
	$string	= str_replace("<script>", "", $string);
	$string	= str_replace('</script>', "", $string);
	return $string;
}
function id_encode($id)
{
	$hashids = new \Hashids\Hashids();
	$id = $hashids->encode($id);

	return $id;
}

function id_decode($id)
{
	$hashids = new \Hashids\Hashids();
	$numbers = $hashids->decode($id);

	return $numbers;
}

if (!function_exists('config_path')) {
		/**
		 * Get the configuration path.
		 *
		 * @param  string $path
		 * @return string
		 */
		function config_path($path = '')
		{
			 return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
		}
 }

 function cleanKeywordSearch($string)
 {
	$string = removeHTML($string);
	$string = convertToUnicode($string);
	$string = strval($string);
	$string = str_replace(array(chr(9), chr(10), chr(13)), "", $string);
	$string = mb_strtolower($string, "UTF-8");
	$array_bad_word = array("?", "^", ",", ";", "*", "(", ")", "|", "!", "\\", "@");
	$string = str_replace($array_bad_word, " ", $string);
	$string = str_replace("  ", " ", $string);
	$string = str_replace("  ", " ", $string);
	$string = str_replace("  ", " ", $string);
	$string = str_replace("  ", " ", $string);
	$string = str_replace("  ", " ", $string);
	$string = str_replace("  ", " ", $string);
	$string = str_replace("  ", " ", $string);
	$string = str_replace("  ", " ", $string);
	$string = replaceSphinxMQ($string);

	return trim($string);
}

/**
 * removeAccent()
 *
 * @param mixed $mystring
 * @return
 */
function removeAccent($mystring)
{
	$marTViet = array(
				// Chữ thường
		"à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă", "ằ", "ắ", "ặ", "ẳ", "ẵ",
		"è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ",
		"ì", "í", "ị", "ỉ", "ĩ",
		"ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ", "ờ", "ớ", "ợ", "ở", "ỡ",
		"ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ",
		"ỳ", "ý", "ỵ", "ỷ", "ỹ",
		"đ", "Đ", "'",
				// Chữ hoa
		"À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă", "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ",
		"È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ",
		"Ì", "Í", "Ị", "Ỉ", "Ĩ",
		"Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ", "Ờ", "Ớ", "Ợ", "Ở", "Ỡ",
		"Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ",
		"Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ",
		"Đ", "Đ", "'",
 );
	$marKoDau = array(
				/// Chữ thường
		"a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a",
		"e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e",
		"i", "i", "i", "i", "i",
		"o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o",
		"u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u",
		"y", "y", "y", "y", "y",
		"d", "D", "",
				//Chữ hoa
		"A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A",
		"E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E",
		"I", "I", "I", "I", "I",
		"O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O",
		"U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U",
		"Y", "Y", "Y", "Y", "Y",
		"D", "D", "",
 );

	return str_replace($marTViet, $marKoDau, $mystring);
}

/**
 * removeHTML()
 *
 * @param mixed $string
 * @return
 */
function removeHTML($string)
{
	$string = preg_replace('/<script.*?\>.*?<\/script>/si', ' ', $string);
	$string = preg_replace('/<style.*?\>.*?<\/style>/si', ' ', $string);
	$string = preg_replace('/<.*?\>/si', ' ', $string);
	$string = str_replace('&nbsp;', ' ', $string);

	return $string;
}

/**
 * removeLink()
 *
 * @param mixed $string
 * @return
 */
function removeLink($string)
{
	$string = preg_replace('/<a.*?\>/si', '', $string);
	$string = preg_replace('/<\/a>/si', '', $string);

	return $string;
}

function removeLink_2($string){
	$string	= preg_replace('#<a[^>]*?href="((?![^>]*https://www.youtube.com/|http://www.vatgia.com|http://vatgia.com|https://www.vatgia.com|https://vatgia.com|//www.vatgia.com).*)"[^>]*?>(.*)</a>#Uis', '$2', $string);
	return $string;
}

function removeLinkFaqError($string = '') {
	return preg_replace('#<a[^>]*?href="([^>]*http://www.vatgia.com|http://vatgia.com|https://www.vatgia.com|https://vatgia.com|//www.vatgia.com)/+hoidap/+\d+/+\d+/+.*\.(com|vn|net|co|mobi|eu|info|kr|cc)"[^>]*?>(.*)</a>#Uis', '$3', $string);
}

function replaceMQ($str){
		$str = str_replace("\'", "'", $str);
		$str = str_replace("'", "''", $str);
		$str = str_replace("\\", "", $str);
		return $str;
}

function convertToUnicode($string)
{
	$trans = array("á" => "á", "à" => "à", "ả" => "ả", "ã" => "ã", "ạ" => "ạ", "ă" => "ă", "ắ" => "ắ",
		"ằ" => "ằ", "ẳ" => "ẳ", "ẵ" => "ẵ", "ặ" => "ặ", "â" => "â", "ấ" => "ấ", "ầ" => "ầ", "ẩ" => "ẩ",
		"ậ" => "ậ", "ẫ" => "ẫ", "ó" => "ó", "ò" => "ò", "ỏ" => "ỏ", "õ" => "õ", "ọ" => "ọ", "ô" => "ô",
		"ố" => "ố", "ồ" => "ồ", "ổ" => "ổ", "ỗ" => "ỗ", "ộ" => "ộ", "ơ" => "ơ", "ớ" => "ớ", "ờ" => "ờ",
		"ở" => "ở", "ỡ" => "ỡ", "ợ" => "ợ", "ú" => "ú", "ù" => "ù", "ủ" => "ủ", "ũ" => "ũ", "ụ" => "ụ",
		"ư" => "ư", "ứ" => "ứ", "ừ" => "ừ", "ử" => "ử", "ự" => "ự", "ữ" => "ữ", "é" => "é", "è" => "è",
		"ẻ" => "ẻ", "ẽ" => "ẽ", "ẹ" => "ẹ", "ê" => "ê", "ế" => "ế", "ề" => "ề", "ể" => "ể", "ễ" => "ễ",
		"ệ" => "ệ", "í" => "í", "ì" => "ì", "ỉ" => "ỉ", "ĩ" => "ĩ", "ị" => "ị", "ý" => "ý", "ỳ" => "ỳ",
		"ỷ" => "ỷ", "ỹ" => "ỹ", "ỵ" => "ỵ", "đ" => "đ", "Á" => "Á", "À" => "À", "Ả" => "Ả", "Ã" => "Ã",
		"Ạ" => "Ạ", "Ă" => "Ă", "Ắ" => "Ắ", "Ằ" => "Ằ", "Ẳ" => "Ẳ", "Ẵ" => "Ẵ", "Ặ" => "Ặ", "Â" => "Â",
		"Ấ" => "Ấ", "Ầ" => "Ầ", "Ẩ" => "Ẩ", "Ậ" => "Ậ", "Ẫ" => "Ẫ", "Ó" => "Ó", "Ò" => "Ò", "Ỏ" => "Ỏ",
		"Õ" => "Õ", "Ọ" => "Ọ", "Ô" => "Ô", "Ố" => "Ố", "Ồ" => "Ồ", "Ổ" => "Ổ", "Ỗ" => "Ỗ", "Ộ" => "Ộ",
		"Ơ" => "Ơ", "Ớ" => "Ớ", "Ờ" => "Ờ", "Ở" => "Ở", "Ỡ" => "Ỡ", "Ợ" => "Ợ", "Ú" => "Ú", "Ù" => "Ù",
		"Ủ" => "Ủ", "Ũ" => "Ũ", "Ụ" => "Ụ", "Ư" => "Ư", "Ứ" => "Ứ", "Ừ" => "Ừ", "Ử" => "Ử", "Ữ" => "Ữ",
		"Ự" => "Ự", "É" => "É", "È" => "È", "Ẻ" => "Ẻ", "Ẽ" => "Ẽ", "Ẹ" => "Ẹ", "Ê" => "Ê", "Ế" => "Ế",
		"Ề" => "Ề", "Ể" => "Ể", "Ễ" => "Ễ", "Ệ" => "Ệ", "Í" => "Í", "Ì" => "Ì", "Ỉ" => "Ỉ", "Ĩ" => "Ĩ",
		"Ị" => "Ị", "Ý" => "Ý", "Ỳ" => "Ỳ", "Ỷ" => "Ỷ", "Ỹ" => "Ỹ", "Ỵ" => "Ỵ", "Đ" => "Đ",
		"&#225;" => "á", "&#224;" => "à", "&#7843;" => "ả", "&#227;" => "ã", "&#7841;" => "ạ", "&#259;" => "ă",
		"&#7855;" => "ắ", "&#7857;" => "ằ", "&#7859;" => "ẳ", "&#7861;" => "ẵ", "&#7863;" => "ặ", "&#226;" => "â",
		"&#7845;" => "ấ", "&#7847;" => "ầ", "&#7849;" => "ẩ", "&#7853;" => "ậ", "&#7851;" => "ẫ", "&#243;" => "ó",
		"&#242;" => "ò", "&#7887;" => "ỏ", "&#245;" => "õ", "&#7885;" => "ọ", "&#244;" => "ô", "&#7889;" => "ố",
		"&#7891;" => "ồ", "&#7893;" => "ổ", "&#7895;" => "ỗ", "&#7897;" => "ộ", "&#417;" => "ơ", "&#7899;" => "ớ",
		"&#7901;" => "ờ", "&#7903;" => "ở", "&#7905;" => "ỡ", "&#7907;" => "ợ", "&#250;" => "ú", "&#249;" => "ù",
		"&#7911;" => "ủ", "&#361;" => "ũ", "&#7909;" => "ụ", "&#432;" => "ư", "&#7913;" => "ứ", "&#7915;" => "ừ",
		"&#7917;" => "ử", "&#7921;" => "ự", "&#7919;" => "ữ", "&#233;" => "é", "&#232;" => "è", "&#7867;" => "ẻ",
		"&#7869;" => "ẽ", "&#7865;" => "ẹ", "&#234;" => "ê", "&#7871;" => "ế", "&#7873;" => "ề", "&#7875;" => "ể",
		"&#7877;" => "ễ", "&#7879;" => "ệ", "&#237;" => "í", "&#236;" => "ì", "&#7881;" => "ỉ", "&#297;" => "ĩ",
		"&#7883;" => "ị", "&#253;" => "ý", "&#7923;" => "ỳ", "&#7927;" => "ỷ", "&#7929;" => "ỹ", "&#7925;" => "ỵ",
		"&#273;" => "đ", "&#193;" => "Á", "&#192;" => "À", "&#7842;" => "Ả", "&#195;" => "Ã", "&#7840;" => "Ạ",
		"&#258;" => "Ă", "&#7854;" => "Ắ", "&#7856;" => "Ằ", "&#7858;" => "Ẳ", "&#7860;" => "Ẵ", "&#7862;" => "Ặ",
		"&#194;" => "Â", "&#7844;" => "Ấ", "&#7846;" => "Ầ", "&#7848;" => "Ẩ", "&#7852;" => "Ậ", "&#7850;" => "Ẫ",
		"&#211;" => "Ó", "&#210;" => "Ò", "&#7886;" => "Ỏ", "&#213;" => "Õ", "&#7884;" => "Ọ", "&#212;" => "Ô",
		"&#7888;" => "Ố", "&#7890;" => "Ồ", "&#7892;" => "Ổ", "&#7894;" => "Ỗ", "&#7896;" => "Ộ", "&#416;" => "Ơ",
		"&#7898;" => "Ớ", "&#7900;" => "Ờ", "&#7902;" => "Ở", "&#7904;" => "Ỡ", "&#7906;" => "Ợ", "&#218;" => "Ú",
		"&#217;" => "Ù", "&#7910;" => "Ủ", "&#360;" => "Ũ", "&#7908;" => "Ụ", "&#431;" => "Ư", "&#7912;" => "Ứ",
		"&#7914;" => "Ừ", "&#7916;" => "Ử", "&#7918;" => "Ữ", "&#7920;" => "Ự", "&#201;" => "É", "&#200;" => "È",
		"&#7866;" => "Ẻ", "&#7868;" => "Ẽ", "&#7864;" => "Ẹ", "&#202;" => "Ê", "&#7870;" => "Ế", "&#7872;" => "Ề",
		"&#7874;" => "Ể", "&#7876;" => "Ễ", "&#7878;" => "Ệ", "&#205;" => "Í", "&#204;" => "Ì", "&#7880;" => "Ỉ",
		"&#296;" => "Ĩ", "&#7882;" => "Ị", "&#221;" => "Ý", "&#7922;" => "Ỳ", "&#7926;" => "Ỷ", "&#7928;" => "Ỹ",
		"&#7924;" => "Ỵ", "&#272;" => "Đ"
 );
$string = strtr($string, $trans);
$string = mb_convert_encoding($string, "UTF-8", "UTF-8");

return $string;
}

/**
 * Debug function
 */
function _debug($data)
{

	echo '<pre style="background: #000; color: #fff; width: 100%; overflow: auto">';
	echo '<div>Your IP: ' . @$_SERVER['REMOTE_ADDR'] . '</div>';

	$debug_backtrace = debug_backtrace();
		// $debug = array_shift($debug_backtrace);

	foreach ($debug_backtrace as $info) {
		if (isset($info['line'])) {
			echo '<div>Line: ' . $info['line'] . '->' . $info['file'] . '</div>';
	 }
}

if (is_array($data) || is_object($data)) {
 print_r($data);
} else {
 var_dump($data);
}
echo '</pre>';
}


function base64url_encode($data)
{
	return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function base64url_decode($data)
{
	return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}

function replace_double_char($string, $char = " ")
{
	$i = 0;
	$max = 10;
	if ($char == "") return $string;
	while (mb_strpos($string, $char . $char, 0, "UTF-8") !== false) {
		$i++;
		$string = str_replace($char . $char, $char, $string);
		if ($i >= $max) break;
 }
 return trim($string);
}

### Generate Link Function ###
function generate_type_url($nCat, $iCat, $full = false)
{
	$nCat = replace_rewrite_url($nCat, "-");
	$link = "/" . $iCat . "/" . $nCat . ".html";
	if ($full) $link = config('app.url') . $link;
	return $link;
}
function generate_type_ssg_url($nCat, $iCat, $full = false)
{
	$nCat = replace_rewrite_url($nCat, "-");
	$link = "/so-sanh/" . $iCat . "/" . $nCat . ".html";
	// if ($full) $link = config('app.url') . $link;
	return $link;
}

function generate_detail_url($module, $nCat, $nData, $iData)
{
	$nCat = replace_rewrite_url($nCat, "-");
	$nData = replace_rewrite_url($nData, "-");
	$link = "/";
	switch ($module) {
		case "product"    :
		$link = "/" . $nCat . "/" . $nData;
		break;
		case "news"        :
		$link = "/news/" . $nData . "-id" . $iData;
		break;
		case "static"    :
		$link = "/" . $nData;
		break;
 }
 return $link;
}

function generateURL_article_category($cat_name_rewrite, $cat_child_name_rewrite = ""){
		//global $array_url_rewrite_replace;
	$array_url_rewrite_replace = array("/","-",",","&","?","#","'",'"',"@","\\","~","(",")",".",";","*","  ","‘","’",'“','”',"%","$","^","!",":");

	$cat_name_rewrite = str_replace($array_url_rewrite_replace," ",trim($cat_name_rewrite));
	$cat_name_rewrite = str_replace("  "," ",trim($cat_name_rewrite));
	$cat_name_rewrite = str_replace(" ","-",trim($cat_name_rewrite));
	$cat_name_rewrite = str_replace("--","-",trim($cat_name_rewrite));

	$cat_name_rewrite = urlencode(remove_accent_url(mb_strtolower($cat_name_rewrite,"UTF-8")));

	$artLink = "/tu-van/" . $cat_name_rewrite;

	if($cat_child_name_rewrite != ""){
		$cat_child_name_rewrite = str_replace($array_url_rewrite_replace," ",trim($cat_child_name_rewrite));
		$cat_child_name_rewrite = str_replace("  "," ",trim($cat_child_name_rewrite));
		$cat_child_name_rewrite = str_replace(" ","-",trim($cat_child_name_rewrite));
		$cat_child_name_rewrite = str_replace("--","-",trim($cat_child_name_rewrite));

		$cat_child_name_rewrite = urlencode(remove_accent_url(mb_strtolower($cat_child_name_rewrite,"UTF-8")));

		$artLink = "/tu-van/" . $cat_name_rewrite . "/" . $cat_child_name_rewrite;
 }

 return $artLink;
}
function generateURL_article_detail($iData, $nDataRewrite){

	$array_url_rewrite_replace = array("/","-",",","&","?","#","'",'"',"@","\\","~","(",")",".",";","*","  ","‘","’",'“','”',"%","$","^","!",":");

	$nDataRewrite = str_replace($array_url_rewrite_replace," ",trim($nDataRewrite));
	$nDataRewrite = str_replace("  "," ",trim($nDataRewrite));
	$nDataRewrite = str_replace(" ","-",trim($nDataRewrite));
	$nDataRewrite = str_replace("--","-",trim($nDataRewrite));

	$nDataRewrite = urlencode(remove_accent_url(mb_strtolower($nDataRewrite,"UTF-8")));

	$artLink = "/tu-van/" . $nDataRewrite . "-id" . $iData;

	return $artLink;
}
function generateURL_article_tag($nDataRewrite){

	$array_url_rewrite_replace = array("/","-",",","&","?","#","'",'"',"@","\\","~","(",")",".",";","*","  ","‘","’",'“','”',"%","$","^","!",":");

	$nDataRewrite = str_replace($array_url_rewrite_replace," ",trim($nDataRewrite));
	$nDataRewrite = str_replace("  "," ",trim($nDataRewrite));
	$nDataRewrite = str_replace(" ","-",trim($nDataRewrite));
	$nDataRewrite = str_replace("--","-",trim($nDataRewrite));

	$nDataRewrite = urlencode(remove_accent_url(mb_strtolower($nDataRewrite,"UTF-8")));

	$artLink = "/tu-van/" . $nDataRewrite . ".tag";

	return $artLink;
}
function replace_rewrite_url($string, $rc = "-", $urlencode = 1)
{
	$string = mb_strtolower($string, "UTF-8");
	$string = removeAccent($string);
	$string = str_replace(".", "", $string);
	$string = preg_replace('/[^A-Za-z0-9]+/', ' ', $string);
	$string = replace_double_char($string);
	$string = str_replace(" ", $rc, $string);
	$string = replace_double_char($string, $rc);
	if ($urlencode == 1) $string = urlencode($string);
	return $string;
}

function getKeywordTagFromJson($json, $limit=20){
	$arrReturn  = array();
	$arrData    = json_decode(base64_url_decode($json), true);
	$i          = 0;
	if(!is_array($arrData))
		return [];

 foreach($arrData as $key => $value){
		$i++;
		$link       = ($value["link"] == "" ? "/home/" . str_replace(array("/", "%2F"), "+", urlencode($value["keyword"])) . ".spvg" : $value["link"]);
		$arrReturn[$key]    = array("keyword" => $value["keyword"], "link" => $link);
		if($i >= $limit) break;
 }
 return $arrReturn;
}

/**
Base64 để hiển thị trên URL để tránh lỗi
*/
function base64_url_encode($input){
	return strtr(base64_encode($input), '+/=', '_,-');
}

function base64_url_decode($input) {
	return base64_decode(strtr($input, '_,-', '+/='));
}

function splitPhoneNumber($string){

	$str_tmp = str_replace(array(" - ", " . "), " / ", $string);
	$str_tmp = preg_replace('/\s/', '', $str_tmp);

	$pattern    = '/(\d{6,}(?!\d)|(?<!\d)\d{6,}|(\(|\d|\.|-|,|\)){6,})/';

	preg_match_all($pattern, $str_tmp, $match);
		//print_r($match[0]);

		$result = array();// Mang luu lai ket qua tra ve
		foreach($match[0] as $key => $value){
			 $result[$key]["socu"]   = removeCharPhoneNumber($value);
			 $result[$key]["somoi"]  = preg_replace('/\D/', '', $value);
		}

		return $result;

 }

 function removeCharPhoneNumber($string){

	$length     = mb_strlen($string, "UTF-8");

	$start_char = 0;
		//Remove các ký tự ko phải số ở đầu
	for($i=0; $i<$length; $i++){
		$char   = mb_substr($string, $i, 1, "UTF-8");
		if(($char == "(") || (is_numeric($char))) break;
		$start_char = $i+1;
	 }

	 $end_char   = $length;
			//Remove các ký tự ko phải số ở cuối
	 for($i=$length; $i>=0; $i--){
			$char   = mb_substr($string, $i-1, 1, "UTF-8");
			if(is_numeric($char)) break;
			$end_char   = $i-1;
	 }
			//Cắt chuỗi
	 $string     = mb_substr($string, $start_char, ($end_char - $start_char), "UTF-8");

 return $string;

}

function convert_to_unicode($string){
	$array_string = array(
		 "à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ",
		 "è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ",
		 "ì","í","ị","ỉ","ĩ",
		 "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ",
		 "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
		 "ỳ","ý","ỵ","ỷ","ỹ",
		 "đ",
		 "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ",
		 "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
		 "Ì","Í","Ị","Ỉ","Ĩ",
		 "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
		 "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
		 "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
		 "Đ");

	$array_replace  = array(
		 "à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ",
		 "è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ",
		 "ì","í","ị","ỉ","ĩ",
		 "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ",
		 "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
		 "ỳ","ý","ỵ","ỷ","ỹ",
		 "đ",
		 "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ",
		 "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
		 "Ì","Í","Ị","Ỉ","Ĩ",
		 "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
		 "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
		 "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
		 "Đ");

	return str_replace($array_string, $array_replace, $string);
}

function replace_double_space($string, $char=" "){
	$i      = 0;
	$max    = 10;
	if($char == "") return $string;
	while(mb_strpos($string, $char.$char, 0, "UTF-8") !== false){
		$i++;
		$string = str_replace($char.$char, $char, $string);
		if($i >= $max) break;
 }
 return trim($string);
}

function check_email_address($email) {
	//First, we check that there's one @ symbol, and that the lengths are right
	if(!@preg_match("^[^@]{1,64}@[^@]{1,255}$", $email)){
			//Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
			return false;
	}
	//Split it into sections to make life easier
	$email_array = explode("@", $email);
	$local_array = explode(".", $email_array[0]);
	for($i = 0; $i < sizeof($local_array); $i++){
			if(!preg_match("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])){
					return false;
			}
	}
	if(!preg_match("^\[?[0-9\.]+\]?$", $email_array[1])){
	//Check if domain is IP. If not, it should be valid domain name
			$domain_array = explode(".", $email_array[1]);
			if(sizeof($domain_array) < 2){
					return false; // Not enough parts to domain
			}
			for($i = 0; $i < sizeof($domain_array); $i++){
					if (!preg_match("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])){
							return false;
					}
			}
	}
	return true;
}

/**
 * Format LoginPhon
 *
 * Đưa hết về dạng 09xxxxxxxx hoặc 01xxxxxxxxx hoặc 08xxxxxxxx
 */
function formatLoginPhone($phone)
{

		$phone = str_replace('+84', '0', $phone);

		$phone = preg_replace("/[^A-Za-z0-9 ]/", '', $phone);


		//Check xem có bắt đầu bằng số 0?
		if (substr($phone, 0, 1) == '0') {
				//09 thì là 10 số --- 01 thì là 11 số
				if (
						(substr($phone, 0, 2) == '09' && strlen($phone) == 10)
						|| (substr($phone, 0, 2) == '01' && strlen($phone) == 11)
						|| (substr($phone, 0, 2) == '08' && strlen($phone) == 10)
				) {
						return $phone;
				}
		}
		return false;
}

/**
 * Ham check loginname xem co ky tu khong cho phep khong
 * return true neu thoa man dieu kien
 */
function checkLoginNameSafe($loginname){
	if($loginname == "") return false;
	if(preg_match("/[^a-zA-Z0-9_]/", $loginname) != 0){
			return false;
	}else{
			return true;
	}
}

// Đổi ngày ra Hôm nay, Hôm qua....
function today_yesterday_v2($intTime, $type=0){
 // dd($intTime, date('dmY', $intTime));
	$compare_time   =  time() - $intTime;

	$today    = getdate();
	$yesterday  = getdate(strtotime("yesterday"));
	$ct     = getdate($compare_time);

	if($type == 0){
		// Nếu thời gian nhỏ hơn 10h thì show kiểu "10 giờ 30 phút" trước
		if($compare_time / 3600 <= 24*30) return generateDuration($compare_time, 3, "1 phút") . " trước";
	}

	// Kiểm tra so với hôm nay
	if($today["mday"]==$ct["mday"] && $today["month"]==$ct["month"] && $today["year"]==$ct["year"]) return "Hôm nay, lúc " . date("H:i", $compare_time);
	if($yesterday["mday"]==$ct["mday"] && $yesterday["month"]==$ct["month"] && $yesterday["year"]==$ct["year"]) return "Hôm qua, lúc " . date("H:i",$compare_time);
	// Nếu không trùng thì return lại
	return date("d/m/Y - H:i", $intTime);
}

function generateDuration($int_time, $type=4, $default="", $limit_param=0, $time=array()){
	$strReturn  = "";
	$arrTime    = array (86400  => "ngày",
								3600  => "giờ",
								60    => "phút",
								1   => "giây",
								);
	if(is_array($time) && count($time) > 0) $arrTime  = $time;
	$i = 0;
	$j  = 0;
	foreach($arrTime as $key => $value){
		$i++;
		if($int_time >= $key){
			$j++;
			$strReturn .= " " . format_number(intval($int_time/$key)) . " " . $value;
			$int_time = $int_time % $key;
			if($limit_param > 0 && $j >= $limit_param) break;
		}
		if($i >= $type) break;
	}
	if($strReturn == "") $strReturn = $default;
	return trim($strReturn);
}

function generateDurationShort($int_time, $default="1 phút"){
	$strReturn  = $default;
	$arrTime    = array (
		31536000 => "năm",
		86400  => "ngày",
		3600  => "giờ",
		60    => "phút",
	);
	foreach($arrTime as $key => $value){
		if($int_time >= $key){
			$strReturn = format_number(intval($int_time/$key)) . " " . $value;
			return $strReturn;
		}
	}
	return $strReturn;
}

function format_number($number, $num_decimal=2, $edit=0){

	$sep    = ($edit == 0 ? array(",", ".") : array(".", ""));
	$stt    = -1;
	$return = number_format( floatval($number), $num_decimal, $sep[0], $sep[1]);
	for($i=$num_decimal; $i>0; $i--){
		$stt++;
		if(intval(substr($return, -$i, $i)) == 0){
			$return = number_format( floatval($number), $stt, $sep[0], $sep[1]);
			break;
		}
	}
	return $return;
}

function convert_utf82utf8($str = '',  $removeAccent = 0){
	 $new_str = '';
	 $marTViet=array(
		// Chữ thường
		"à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ",
		"è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ",
		"ì","í","ị","ỉ","ĩ",
		"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ",
		"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
		"ỳ","ý","ỵ","ỷ","ỹ",
		"đ","Đ",
		"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ",
		"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
		"Ì","Í","Ị","Ỉ","Ĩ",
		"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
		"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
		"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
		"Đ","Đ"
		);
	$arrTohop   = array( 0 => 'à', 1 => 'á', 2 => 'ạ', 3 => 'ả', 4 => 'ã', 5 => 'â', 6 => 'ầ', 7 => 'ấ', 8 => 'ậ', 9 => 'ẩ', 10 => 'ẫ', 11 => 'ă', 12 => 'ằ', 13 => 'ắ', 14 => 'ặ', 15 => 'ẳ', 16 => 'ẵ', 17 => 'è', 18 => 'é', 19 => 'ẹ', 20 => 'ẻ', 21 => 'ẽ', 22 => 'ê', 23 => 'ề', 24 => 'ế', 25 => 'ệ', 26 => 'ể', 27 => 'ễ', 28 => 'ì', 29 => 'í', 30 => 'ị', 31 => 'ỉ', 32 => 'ĩ', 33 => 'ò', 34 => 'ó', 35 => 'ọ', 36 => 'ỏ', 37 => 'õ', 38 => 'ô', 39 => 'ồ', 40 => 'ố', 41 => 'ộ', 42 => 'ổ', 43 => 'ỗ', 44 => 'ơ', 45 => 'ờ', 46 => 'ớ', 47 => 'ợ', 48 => 'ở', 49 => 'ỡ', 50 => 'ù', 51 => 'ú', 52 => 'ụ', 53 => 'ủ', 54 => 'ũ', 55 => 'ư', 56 => 'ừ', 57 => 'ứ', 58 => 'ự', 59 => 'ử', 60 => 'ữ', 61 => 'ỳ', 62 => 'ý', 63 => 'ỵ', 64 => 'ỷ', 65 => 'ỹ', 66 => 'đ', 67 => 'Đ', 68 => 'À', 69 => 'Á', 70 => 'Ạ', 71 => 'Ả', 72 => 'Ã', 73 => 'Â', 74 => 'Ầ', 75 => 'Ấ', 76 => 'Ậ', 77 => 'Ẩ', 78 => 'Ẫ', 79 => 'Ă', 80 => 'Ằ', 81 => 'Ắ', 82 => 'Ặ', 83 => 'Ẳ', 84 => 'Ẵ', 85 => 'È', 86 => 'É', 87 => 'Ẹ', 88 => 'Ẻ', 89 => 'Ẽ', 90 => 'Ê', 91 => 'Ề', 92 => 'Ế', 93 => 'Ệ', 94 => 'Ể', 95 => 'Ễ', 96 => 'Ì', 97 => 'Í', 98 => 'Ị', 99 => 'Ỉ', 100 => 'Ĩ', 101 => 'Ò', 102 => 'Ó', 103 => 'Ọ', 104 => 'Ỏ', 105 => 'Õ', 106 => 'Ô', 107 => 'Ồ', 108 => 'Ố', 109 => 'Ộ', 110 => 'Ổ', 111 => 'Ỗ', 112 => 'Ơ', 113 => 'Ờ', 114 => 'Ớ', 115 => 'Ợ', 116 => 'Ở', 117 => 'Ỡ', 118 => 'Ù', 119 => 'Ú', 120 => 'Ụ', 121 => 'Ủ', 122 => 'Ũ', 123 => 'Ư', 124 => 'Ừ', 125 => 'Ứ', 126 => 'Ự', 127 => 'Ử', 128 => 'Ữ', 129 => 'Ỳ', 130 => 'Ý', 131 => 'Ỵ', 132 => 'Ỷ', 133 => 'Ỹ', 134 => 'Đ', 135 => 'Đ' );
	 if($str != ''){
			$new_str = str_replace($arrTohop, $marTViet, $str);
	 }

	 if($removeAccent == 1){
			$new_str = strtolower(removeAccent($new_str));
	 }

	 return $new_str;
}
/**
 * ham lay so ngay trong thang
*/
function days_in_month($month, $year) {
	 return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
}
/**
 * Convert string to time
*/
function convertDateTime($strDate = "", $strTime = ""){
	 //Break string and create array date time
	 $strDate			= str_replace("/", "-", $strDate);
	 $strDateArray	= explode("-", $strDate);
	 $countDateArr	= count($strDateArray);
	 $strTime			= str_replace("-", ":", $strTime);
	 $strTimeArray	= explode(":", $strTime);
	 $countTimeArr	= count($strTimeArray);
	 //Get Current date time
	 $today			= getdate();
	 $day				= $today["mday"];
	 $mon				= $today["mon"];
	 $year				= $today["year"];
	 $hour				= $today["hours"];
	 $min				= $today["minutes"];
	 $sec				= $today["seconds"];
	 //Get date array
	 switch($countDateArr){
			case 2:
				 $day		= intval($strDateArray[0]);
				 $mon		= intval($strDateArray[1]);
				 break;
			case $countDateArr >= 3:
				 $day		= intval($strDateArray[0]);
				 $mon		= intval($strDateArray[1]);
				 $year 	= intval($strDateArray[2]);
				 break;
	 }
	 //Get time array
	 switch($countTimeArr){
			case 2:
				 $hour		= intval($strTimeArray[0]);
				 $min		= intval($strTimeArray[1]);
				 break;
			case $countTimeArr >= 3:
				 $hour		= intval($strTimeArray[0]);
				 $min		= intval($strTimeArray[1]);
				 $sec		= intval($strTimeArray[2]);
				 break;
	 }
	 //Return date time integer
	 if(@mktime($hour, $min, $sec, $mon, $day, $year) == -1) return $today[0];
	 else return mktime($hour, $min, $sec, $mon, $day, $year);

}

/**
Kiểm tra xem IP có phải VN hay ko
*/
function check_is_VN_IP($ip){
	$array_VN_ip = array("203.119.8.0/22",
						"203.119.72.0/22",
						"203.119.60.0/22",
						"203.119.36.0/22",
						"117.122.124.0/22",
						"203.119.68.0/22",
						"203.119.44.0/22",
						"203.119.64.0/22",
						"203.119.58.0/23",
						"202.47.142.0/24",
						"42.96.6.0/24",
						"42.96.8.0/24",
						"203.162.0.0/16",
						"203.210.128.0/17",
						"221.132.0.0/18",
						"203.113.128.0/18",
						"220.231.64.0/18",
						"125.234.0.0/15",
						"117.0.0.0/13",
						"115.72.0.0/13",
						"27.64.0.0/12",
						"171.224.0.0/11",
						"116.96.0.0/12",
						"125.212.128.0/17",
						"125.214.0.0/18",
						"203.190.160.0/20",
						"117.103.192.0/18",
						"203.160.0.0/23",
						"222.252.0.0/14",
						"123.16.0.0/12",
						"113.160.0.0/11",
						"14.160.0.0/11",
						"14.224.0.0/11",
						"221.132.30.0/23",
						"221.132.32.0/21",
						"221.133.0.0/19",
						"221.121.0.0/18",
						"116.118.0.0/17",
						"180.93.0.0/16",
						"112.197.0.0/16",
						"27.2.0.0/15",
						"112.78.0.0/20",
						"125.253.112.0/20",
						"103.249.100.0/22",
						"45.117.164.0/22",
						"202.151.160.0/21",
						"210.86.224.0/21",
						"119.17.192.0/19",
						"119.15.160.0/20",
						"101.96.64.0/18",
						"202.151.168.0/21",
						"210.86.232.0/21",
						"119.17.224.0/19",
						"119.15.176.0/20",
						"101.53.0.0/18",
						"14.0.16.0/20",
						"103.229.40.0/22",
						"180.148.0.0/21",
						"103.17.88.0/22",
						"45.118.136.0/22",
						"203.128.240.0/21",
						"103.238.68.0/22",
						"202.60.104.0/21",
						"103.238.72.0/22",
						"113.52.32.0/19",
						"49.246.128.0/18",
						"49.246.192.0/19",
						"210.245.0.0/17",
						"58.186.0.0/15",
						"118.68.0.0/14",
						"113.22.0.0/16",
						"113.23.0.0/17",
						"183.80.0.0/16",
						"183.81.0.0/17",
						"1.52.0.0/14",
						"42.112.0.0/13",
						"202.43.108.0/22",
						"103.20.144.0/22",
						"183.91.0.0/19",
						"101.99.0.0/18",
						"203.205.0.0/18",
						"103.9.196.0/22",
						"113.20.96.0/19",
						"61.28.224.0 /19",
						"111.91.232.0/22",
						"103.19.164.0/22",
						"103.23.144.0/22",
						"45.118.140.0/22",
						"103.227.216.0/22",
						"202.6.96.0/23",
						"202.6.2.0/24",
						"202.78.224.0/21",
						"116.193.64.0/20",
						"120.72.96.0/19",
						"120.72.80.0/21",
						"210.2.64.0/18 ",
						"203.77.178.0/24",
						"202.134.16.0/22",
						"122.201.8.0/21",
						"118.102.0.0/21",
						"120.138.64.0/20",
						"49.213.64.0/18 ",
						"203.99.248.0/22",
						"202.172.4.0/23",
						"203.170.26.0/23",
						"103.7.36.0/22",
						"202.87.212.0/22",
						"202.160.124.0/23",
						"203.191.8.0/21",
						"116.68.128.0/21",
						"103.31.120.0/22",
						"119.18.184.0/21",
						"118.107.64.0/18 ",
						"103.227.112.0/22",
						"202.191.56.0/22",
						"103.226.248.0/22",
						"120.50.184.0/21",
						"203.176.160.0/21 ",
						"182.161.80.0/20 ",
						"203.189.28.0/22",
						"115.84.176.0/21",
						"210.211.96.0/19",
						"103.1.208.0/22",
						"45.117.160.0/22",
						"112.137.128.0/20",
						"112.213.80.0/20",
						"103.7.40.0/22",
						"45.117.168.0/22",
						"203.201.56.0/22",
						"110.35.72.0/21",
						"110.44.184.0/21",
						"202.130.36.0/23",
						"203.34.144.0/24",
						"180.148.128.0/20",
						"111.65.240.0/20 ",
						"103.250.24.0/22",
						"203.161.178.0/24",
						"202.4.168.0/24",
						"202.134.54.0/24",
						"183.90.160.0/21",
						"202.4.176.0/24",
						"175.106.0.0/22",
						"202.124.204.0/24",
						"27.0.12.0/22",
						"103.1.236.0/22",
						"202.58.245.0/24",
						"203.79.28.0/24",
						"182.236.112.0/22",
						"202.55.132.0/22",
						"182.237.20.0/22",
						"112.109.88.0/21",
						"103.235.208.0/22",
						"202.9.80.0/24",
						"202.9.79.0/24",
						"202.9.84.0/24",
						"27.118.16.0/20",
						"103.245.148.0/22",
						"202.52.39.0/24",
						"202.59.238.0/23",
						"202.59.252.0/23",
						"122.102.112.0/22",
						"202.74.56.0/24",
						"202.74.58.0/23",
						"49.156.52.0/22",
						"103.225.236.0/22",
						"103.53.228.0/22",
						"202.94.88.0/23",
						"116.212.32.0/19",
						"202.0.79.0/24",
						"202.37.86.0/23",
						"103.252.0.0/22",
						"202.44.137.0/24",
						"203.8.172.0/24",
						"203.8.127.0/24",
						"203.191.48.0/21",
						"119.18.128.0/20 ",
						"110.35.64.0/21 ",
						"183.91.160.0/19",
						"223.27.104.0/21",
						"103.1.200.0/22",
						"103.3.244.0/22",
						"103.3.248.0/22",
						"103.246.104.0/24",
						"113.61.108.0/22",
						"101.96.12.0/22",
						"103.3.252.0/22",
						"103.10.88.0/22",
						"103.228.20.0/22",
						"103.4.128.0/22",
						"103.10.212.0/22",
						"103.246.220.0/22",
						"45.119.84.0/22",
						"103.5.30.0/23",
						"103.5.208.0/22",
						"103.5.204.0/22",
						"103.11.172.0/22",
						"103.23.156.0/22",
						"103.57.208.0/22",
						"45.117.176.0/22",
						"103.28.36.0/22",
						"45.117.80.0/22",
						"103.28.136.0/22",
						"103.24.244.0/22",
						"103.28.172.0/22",
						"112.72.64.0/18",
						"103.7.196.0/24",
						"103.53.252.0/22",
						"103.7.177.0/24",
						"103.7.172.0/24",
						"103.8.13.0/24",
						"103.9.80.0/22",
						"103.2.220.0/22",
						"103.9.84.0/22",
						"103.9.0.0/22",
						"103.9.76.0/22",
						"103.9.4.0/22",
						"103.9.200.0/22",
						"103.9.212.0/22",
						"103.234.36.0/22",
						"103.9.204.0/22",
						"103.13.76.0/22",
						"103.12.104.0/22",
						"115.146.120.0/21",
						"124.158.0.0/21",
						"103.21.148.0/22",
						"115.165.160.0/21",
						"124.158.8.0/21",
						"103.20.148.0/22",
						"45.118.148.0/22",
						"103.15.48.0/22",
						"103.235.212.0/22",
						"103.21.120.0/22",
						"103.30.36.0/22",
						"103.31.124.0/22",
						"103.18.176.0/22",
						"103.17.236.0/22",
						"103.19.96.0/22",
						"103.19.220.0/22",
						"103.16.0.0/22",
						"103.248.160.0/22",
						"103.248.164.0/22",
						"103.249.20.0/22",
						"103.27.60.0/22",
						"103.27.64.0/22",
						"103.26.252.0/22",
						"103.27.236.0/22 ",
						"45.119.80.0/22",
						"202.92.4.0/22",
						"103.57.220.0/22",
						"103.241.248.0/22",
						"103.242.52.0/22",
						"103.243.216.0/22",
						"103.18.4.0/22",
						"103.243.104.0/22",
						"103.253.88.0/22",
						"103.254.40.0/22",
						"103.254.16.0/22",
						"103.254.12.0/22",
						"45.117.172.0/22",
						"103.254.216.0/22 ",
						"45.119.108.0/22",
						"103.255.84.0/22 ",
						"45.119.76.0/22",
						"103.255.236.0/22",
						"103.224.168.0/22",
						"103.226.108.0/22",
						"103.252.252.0/22",
						"103.245.244.0/22",
						"180.214.236.0/22",
						"103.245.248.0/22",
						"103.245.252.0/22",
						"103.229.192.0/22",
						"103.231.148.0/22",
						"103.232.60.0/22",
						"103.232.56.0/22",
						"103.232.52.0/22",
						"103.232.120.0/22",
						"103.233.48.0/22",
						"103.237.60.0/22",
						"103.237.96.0/22",
						"103.237.64.0/22",
						"103.237.148.0/22",
						"103.237.144.0/22",
						"45.118.144.0/22",
						"103.238.208.0/22",
						"103.238.80.0/22",
						"47.117.156.0/22",
						"103.238.76.0/22",
						"103.238.212.0/22 ",
						"45.117.76.0/22",
						" 103.239.32.0/22",
						"103.239.120.0/22",
						"45.119.240.0/22",
						"103.239.116.0/22",
						"103.37.32.0/22",
						"103.37.28.0/22",
						"103.38.136.0/22",
						"103.39.92.0/22",
						"103.39.96.0/22",
						"103.10.88.0/22",
						"103.42.56.0/22",
						"103.45.228.0/22",
						"103.45.236.0/22",
						"103.45.232.0/22",
						"103.47.192.0/22",
						"103.48.76.0/22",
						"103.48.84.0/22",
						"103.48.80.0/22",
						"103.48.188.0/22",
						"103.48.192.0/22",
						"45.119.212.0/22",
						"103.52.92.0/22",
						"103.53.88.0/22",
						"103.53.168.0/22",
						"103.54.252.0/22",
						"103.54.248.0/22",
						"103.56.168.0/22",
						"103.56.156.0/22",
						"103.56.160.0/22",
						"103.56.164.0/22",
						"103.57.104.0/22",
						"103.57.112.0/22",
						"103.60.16.0/22",
						"45.119.216.0/22",
						);
	// Loop toàn bộ IP Vietnam
	foreach ($array_VN_ip as $key => $value){
		// Nếu match thì return true luôn
		if (ip_in_range($ip, $value)) return true;
	}
	return false;
}

// ip_in_range
// Network ranges can be specified as:
// 1. CIDR format:         1.2.3/24  OR  1.2.3.4/255.255.255.0
function ip_in_range($ip, $range) {
	if (strpos($range, '/') !== false) {
	 // $range is in IP/NETMASK format
	 list($range, $netmask) = explode('/', $range, 2);
	 if (strpos($netmask, '.') !== false) {
		// $netmask is a 255.255.0.0 format
		$netmask    = str_replace('*', '0', $netmask);
		$netmask_dec  = ip2long($netmask);
		return ( (ip2long($ip) & $netmask_dec) == (ip2long($range) & $netmask_dec) );
	 } else {
		// $netmask is a CIDR size block
		// fix the range argument
		$x = explode('.', $range);
		while(count($x)<4) $x[] = '0';
		list($a,$b,$c,$d) = $x;
		$range    = sprintf("%u.%u.%u.%u", empty($a)?'0':$a, empty($b)?'0':$b,empty($c)?'0':$c,empty($d)?'0':$d);
		$range_dec  = ip2long($range);
		$ip_dec     = ip2long($ip);

		# Strategy 1 - Create the netmask with 'netmask' 1s and then fill it to 32 with 0s
		#$netmask_dec = bindec(str_pad('', $netmask, '1') . str_pad('', 32-$netmask, '0'));

		# Strategy 2 - Use math to create it
		$wildcard_dec = pow(2, (32- intval($netmask))) - 1;
		$netmask_dec = ~ $wildcard_dec;

		return (($ip_dec & $netmask_dec) == ($range_dec & $netmask_dec));
	 }
	}
	return false;
}

function cut_string2($str, $length, $char="..."){
	//Nếu chuỗi cần cắt nhỏ hơn $length thì return luôn
	$strlen	= mb_strlen($str, "UTF-8");
	if($strlen <= $length) return $str;

	//Cắt chiều dài chuỗi $str tới đoạn cần lấy
	$substr	= mb_substr($str, 0, $length, "UTF-8");
	if(mb_substr($str, $length, 1, "UTF-8") == " ") return $substr . $char;

	//Xác định dấu " " cuối cùng trong chuỗi $substr vừa cắt
	$strPoint= mb_strrpos($substr, " ", $length);

	//Return string
	if($strPoint < $length - 20) return $substr . $char;
	else return mb_substr($substr, 0, $strPoint, "UTF-8") . $char;
}

function replace_fck($string, $type=0){
	$array_fck	= array ("&Agrave;", "&Aacute;", "&Acirc;", "&Atilde;", "&Egrave;", "&Eacute;", "&Ecirc;", "&Igrave;", "&Iacute;", "&Icirc;",
								"&Iuml;", "&ETH;", "&Ograve;", "&Oacute;", "&Ocirc;", "&Otilde;", "&Ugrave;", "&Uacute;", "&Yacute;", "&agrave;",
								"&aacute;", "&acirc;", "&atilde;", "&egrave;", "&eacute;", "&ecirc;", "&igrave;", "&iacute;", "&ograve;", "&oacute;",
								"&ocirc;", "&otilde;", "&ugrave;", "&uacute;", "&ucirc;", "&yacute;",
								);
	$array_text	= array ("À", "Á", "Â", "Ã", "È", "É", "Ê", "Ì", "Í", "Î",
								"Ï", "Ð", "Ò", "Ó", "Ô", "Õ", "Ù", "Ú", "Ý", "à",
								"á", "â", "ã", "è", "é", "ê", "ì", "í", "ò", "ó",
								"ô", "õ", "ù", "ú", "û", "ý",
								);
	if($type == 1) $string = str_replace($array_fck, $array_text, $string);
	else $string = str_replace($array_text, $array_fck, $string);
	return $string;
}

function htmlspecialbo($str){
	$arrDenied	= array('<', '>', '"');
	$arrReplace	= array('&lt;', '&gt;', '&quot;');
	$str = str_replace($arrDenied, $arrReplace, $str);
	return $str;
}

function convertUrlGallery($string) {
	$string = strval($string);
	if (empty($string)) return '';
	if (preg_match_all('/(https?:)?\/+g.vatgia.vn\/gallery_img\/\d+\/([^"]+)/si', $string, $match)) {
		foreach ($match[0] as $key => $value) {
			if (isset($match[2][$key])) {
				if (preg_match('/^medium_/', $match[2][$key])) {
					$pic_name = str_replace('medium_', '', $match[2][$key]);
					$url = pictureProductThumb($pic_name, 200);
				} elseif (preg_match('/^small_/', $match[2][$key])) {
					$pic_name = str_replace('small_', '', $match[2][$key]);
					$url = pictureProductThumb($pic_name, 80);
				} else {
					$url = pictureProductThumb($match[2][$key]);
				}
				$string = str_replace($value, $url, $string);
			}

		}
	}
	return $string;
}

function convertImageProtoco($data) {
	$str    = array("src=\"http://g.vatgia.vn", "src=\"http://p.vatgia.vn", "src=\"http://www.vatgia.com", "src=\"http://vatgia.com", "src=\"https://vatgia.com", "src=\"https://www.vatgia.com", "href=\"http://www.vatgia.com", "href=\"http://vatgia.com", "href=\"https://vatgia.com", "href=\"https://www.vatgia.com");
	$strRep = array("src=\"//g.vatgia.vn", "src=\"//p.vatgia.vn", "src=\"//vatgia.com", "src=\"//vatgia.com", "src=\"//vatgia.com", "src=\"//vatgia.com", "href=\"//www.vatgia.com", "href=\"//www.vatgia.com", "href=\"//www.vatgia.com", "href=\"//www.vatgia.com");
	$data   = str_replace($str,$strRep, $data);
	return $data;
}

function convertSrcImageProtoco($data) {
	$str    = array("src=\"http://");
	$strRep = array("src=\"//");
	$data   = str_replace($str,$strRep, $data);
	return $data;
}

function convertListToArray($string, $return_null_array = false, $df_null_value = 0){
	// Bẻ $string để intval lại
	$arrTemp	= explode(",", $string);
	$array_id	= array();
	foreach($arrTemp as $key => $value) $array_id[] = intval($value);

	//Nếu ra array rỗng và !$return_null_array không cho trả lại array rỗng thì gán cho giá trị trả về 1 phần tử df
	if(count($array_id) == 0 && !$return_null_array) $array_id = array($df_null_value);
	return $array_id;
}

function convertArrayToList($array_input, $key="", $limit=0){
	$string_return	= "0";
	$arrTemp			= array();
	$i					= 0;
	foreach($array_input as $k => $v){
		$i++;
		if($key === true) $arrTemp[]	= intval($k);
		elseif($key == "") $arrTemp[]	= intval($v);
		else $arrTemp[]	= intval(@$v[trim($key)]);
		if($limit > 0 && $i >= $limit) break;
	}
	//Loại bỏ phần tử trùng
	$arrTemp	= array_unique($arrTemp);
	if(count($arrTemp) > 0) $string_return = implode(",", $arrTemp);
	return $string_return;
}

/**
 * Check content is type xml
 * @param  string  $content [description]
 * @return boolean          [description]
 */
function isValidXml($content){
    $content = trim($content);
    if (empty($content)) {
        return false;
    }
    if (stripos($content, '<!DOCTYPE html>') !== false) {
        return false;
    }

    libxml_use_internal_errors(true);
    simplexml_load_string($content);
    $errors = libxml_get_errors();
    libxml_clear_errors();

    return empty($errors);
}

function generate_name($filename, $prefix = ""){
	$name = "";
	for($i=0; $i<3; $i++){
		$name .= chr(rand(97, 122));
	}
	$today= getdate();
	if($prefix == "") $name .= $today[0];
	else $name = $prefix . $name . $today[0];
	$ext	= substr($filename, (strrpos($filename, ".") + 1));
	return $name . "." . $ext;
}

function ipUser(){
	$ip = ip2long(@$_SERVER['REMOTE_ADDR']);
	// Bản 64bit hàm ip2long sẽ luôn > 0
	if ($ip < 0) {
		$ip	= 0;
	}
	return (int)$ip;
}

function mbUcfirst($string, $encoding)
{
    $strlen = mb_strlen($string, $encoding);
    $firstChar = mb_substr($string, 0, 1, $encoding);
    $then = mb_substr($string, 1, $strlen - 1, $encoding);
    return mb_strtoupper($firstChar, $encoding) . $then;
}

function formatBaseText($str){
	return replaceMQ(convertToUnicode(removeHTML(htmlspecialbo($str))));
}

function checkData($arrField = array(), $data = array())
{
	$arrReturn 	=	array();
	foreach($arrField as $key => $value)
	{
		if(count($value) < 1)
			continue;

		$value 	=	array_values($value);
		$temp 	=	isset($data[$key]) ? $data[$key] : @$value[1];
		switch($value[0])
		{
			case 	'str'	:
				$temp	=	convert_utf82utf8(strval($temp));
				break;
			case 	'int' :
				$temp	=	(int)$temp;
				break;
			case 	'flo' :
				$temp	=	floatval($temp);
				break;
			case 	'dbl' :
				$temp	=	doubleval($temp);
				break;
			case 	'arr'	:
				$temp	=	is_array($temp) ? $temp : array();
				break;
			case 	'arrint'	:
				if(is_numeric($temp) && $temp > 0)
					$temp 	=	array(intval($temp));
				else
				{
					$temp	=	is_array($temp) ? $temp : array();
					$temp =	array_map('intval', $temp);
				}
				break;
		}

		$arrReturn[$key]	=	$temp;
	}

	return $arrReturn;
}

function bigIntval($value) {
	$value = trim($value);
	if (ctype_digit($value)) {
		return $value;
	}
	$value = preg_replace("/[^0-9](.*)$/", '', $value);
	if (ctype_digit($value)) {
		return $value;
	}
	return 0;
}

//Loại bỏ các ký tự \' và \"
function removeMagicQuote($string){
	$string	= str_replace("\'", "'", $string);
	$string	= str_replace('\"', '"', $string);
	$string	= str_replace('\&quot;', "&quot;", $string);
	$string	= str_replace("\\\\", "\\", $string);
	$string	= str_replace("<script>", "", $string);
	$string	= str_replace('</script>', "", $string);
	return $string;
}

function convert_result_set_2_list($query, $id_field, $default_value=0, $type=2){
	if(count($query) > 0){
		$return		= '';
		$arrCheck	= [];
		foreach ($query as $key => $row) {
			$value	= false;
			switch($type){
				case 1: if($row[$id_field] > 0) $value	= $row[$id_field]; break;
				case 2:
					if(isset($arrCheck[$row[$id_field]])) continue 2;
					$arrCheck[$row[$id_field]]	= true;
					if($row[$id_field] > 0) $value	= $row[$id_field];
					break;
				default: $value	= $row[$id_field]; break;
			}
			// Nếu lấy đc $value thì nối vào $return
			if($value !== false){
				if($return != "") $return	.= ",";
				$return	.= $value;
			}
		}
		if($return == "") $return	= $default_value;
		return $return;
	}else {
		return $default_value;
	}
}

function convertListToListId($string, $do_not_get_zero_value=0, $limit=0){
	// Bẻ $string để intval lại
	$arrTemp	= explode(",", $string);
	$list_id	= "";
	$i			= 0;
	$arrCheck	= [];
	foreach($arrTemp as $key => $value){
		$i++;
		$value	= intval($value);
		if($do_not_get_zero_value == 1 && $value <= 0) continue;
		if(isset($arrCheck[$value])) continue;
		$arrCheck[$value]	= 1;
		$list_id .= "," . $value;
		if($limit > 0 && $i >= $limit) break;
	}
	// Remove dấu , đầu tiên
	if(strlen($list_id) > 0) $list_id = substr($list_id, 1);
	else $list_id	= 0;
	return $list_id;
}

function getURL($serverName=0, $scriptName=0, $fileName=1, $queryString=1, $varDenied='', $varAllowed='', $option = array()){
	// Option
	$opts	= array("sort" => 0);
	if(is_array($option) && count($option) > 0) $opts	= $option + $opts;

	// $arrQueryString
	$arrQueryString = array();

	$url	 = '';
	$slash = '/';
	if($scriptName != 0)$slash	= "";
	if($serverName != 0){
		if(isset($_SERVER['SERVER_NAME']))	$url .= getProtoco() . $_SERVER['SERVER_NAME'];
		if(isset($_SERVER['SERVER_PORT']) && @$_SERVER['SERVER_PORT'] != 80 && @$_SERVER['SERVER_PORT'] != 443)	$url .= ":" . $_SERVER['SERVER_PORT'];
		$url .= $slash;
	}
	if($scriptName != 0){
		if(isset($_SERVER['SCRIPT_NAME']))	$url .= substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);
	}
	if($fileName	!= 0){
		if(isset($_SERVER['SCRIPT_NAME']))	$url .= substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);
	}

	$url_query_string = '';
	if($queryString != 0){
		if($queryString == 1) $url_query_string .= '?';
		//Kiểu phục vụ đặc biệt cho class generate_listudv_left
		if($queryString == 2){
			//Loại bỏ u_name và trên URL
			$varDenied .= "|u_name|view|record_id|iPro|type|iRev";
		}
		if($varDenied != '' || $varAllowed != ''){
			$arrVarDenied	= explode('|', $varDenied);
			$arrVarAllowed	= explode('|', $varAllowed);
			reset($_GET);
			while(list($k, $v) = each($_GET)){
				if(array_search($k, $arrVarDenied) === false && ($varAllowed == "" || array_search($k, $arrVarAllowed) !== false)){
					$arrQueryString[$k] = $v;
				}
			}
		}
		else{
			reset($_GET);
			while(list($k, $v) = each($_GET)){
				$arrQueryString[$k] = $v;
			}
		}

		// Sort querystring theo param a -> z, cẩn thận khi sửa hàm ksort này vì ảnh hưởng đến link của website
		if($opts['sort'] == 1) ksort($arrQueryString);

		$i = 0;
		foreach($arrQueryString as $k => $v){
			$i++;
			if($i > 1) $url_query_string .= "&";
			$url_query_string .= $k . '=' . @urlencode($v);
		}

		//Loại \" -> ", \' => ', \\ =? \
		$url_query_string = str_replace(urlencode('\"'), urlencode('"'), $url_query_string);
		$url_query_string = str_replace(urlencode("\'"), urlencode("'"), $url_query_string);
		$url_query_string = str_replace(urlencode("\\\\"), urlencode("\\"), $url_query_string);
	}

	$url		= strval($url . $url_query_string);
	$arrStr	= array('"', "detailrw.php", "typerw.php", ".php?&");
	$arrRep	= array('&quot;', "typerw.php", "type.php", ".php?");
	$url		= str_replace($arrStr, $arrRep, $url);

	return $url;
}

function removeTitle($string,$keyReplace = "/"){
	$string	=	removeAccent($string);
	$string 	=  trim(preg_replace("/[^A-Za-z0-9]/i"," ",$string)); // khong dau
	$string 	=  str_replace(" ","-",$string);
	$string	=	str_replace("--","-",$string);
	$string	=	str_replace("--","-",$string);
	$string	=	str_replace("--","-",$string);
	$string	=	str_replace("--","-",$string);
	$string	=	str_replace("--","-",$string);
	$string	=	str_replace("--","-",$string);
	$string	=	str_replace("--","-",$string);
	$string	=	str_replace($keyReplace,"-",$string);
	return strtolower($string);
}

function transformer_item(&$item, \League\Fractal\TransformerAbstract $transformer, $includes = [], $meta = [])
{
	$manager	= new \League\Fractal\Manager();
	$manager->setSerializer(new App\Helper\Transformer\DataArraySerializer());
	$resource	= new \League\Fractal\Resource\Item($item, $transformer);
	if(is_array($includes)){
		foreach($includes as $key => $value){
			if(trim($value) == '') unset($includes[$key]);
		}
	}

	if ($includes) {
		$manager->parseIncludes($includes);
	}

	if ($meta) {
		$resource->setMeta($meta);
	}

	$vars	= $manager->createData($resource)->toArray();

	return $vars;
}

function transformer_collection(&$items, \League\Fractal\TransformerAbstract $transformer, $includes = [], $meta = []){
	$manager	= new \League\Fractal\Manager();
	$manager->setSerializer(new App\Helper\Transformers\DataArraySerializer());
	$resource	= new \League\Fractal\Resource\Collection($items, $transformer);

	if(is_array($includes)){
		foreach($includes as $key => $value)
		{
			if(trim($value) == '') unset($includes[$key]);
		}
	}
	if ($includes) {
		$manager->parseIncludes($includes);
	}

	if ($meta) {
		$resource->setMeta($meta);
	}

	$vars	= $manager->createData($resource)->toArray();

 return $vars;
}

function transformer_collection_paginator(&$items, \League\Fractal\TransformerAbstract $transformer, \League\Fractal\Pagination\PaginatorInterface $paginator, $includes = [], $meta = []){
	$manager	= new \League\Fractal\Manager();
	$resource	= new \League\Fractal\Resource\Collection($items, $transformer);

	$resource->setPaginator($paginator);
	if(is_array($includes)){
		foreach($includes as $key => $value){
			if(trim($value) == '') unset($includes[$key]);
		}
	}

	if ($includes) {
		$manager->parseIncludes($includes);
	}

	if ($meta) {
		$resource->setMeta($meta);
	}

	$vars	= $manager->createData($resource)->toArray();

	return $vars;
}

function translateData($lang, $strVi, $strEn){
    $strReturn = $strVi;

    if($lang == 'en'){
        $strReturn = $strEn;
    }

    return $strReturn;
}
