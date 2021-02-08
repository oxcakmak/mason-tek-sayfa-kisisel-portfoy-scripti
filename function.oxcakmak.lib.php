<?php
class oxcakmak{
	/* To Upper */
	public function toUpper($string){
		return strtoupper($string);
	}
	/* To Lower */
	public function toLower($string){
		return strtolower($string);
	}
	/* First Upper */
	public function upperFirst($string){
		return ucfirst($string);
	}
	/* First Lower */
	public function lowerFirst($string){
		return lcfirst($string);
	}
	/* Capitalize */
	public function capitalize(string $string){
		return ucfirst(mb_strtolower($string));
	}
	/* Replace */
	public function replace(string $string, string $pattern, $replacement = null){
		$callback = function (array $matches) use ($replacement){
			if (!array_filter($matches)) {
				return null;
			}
			return is_callable($replacement) || $replacement($matches);
		};
		if (preg_match(reRegExpChar, $pattern)) {
			if (!is_callable($replacement)) {
				return preg_replace($pattern, is_string($replacement) || is_array($replacement) ? $replacement : '', $string);
			}
			return preg_replace_callback($pattern, $callback, $string);
		}
		return str_replace($pattern, is_string($replacement) || is_array($replacement) ? $replacement : '', $string);
	}
	/* Trim */
	public function trim(string $string, string $chars){
		return trim($string, $chars);
	}
	/* Trim Start */
	public function trimStart(string $string, string $chars){
		return ltrim($string, $chars);
	}
	/* Trim End */
	public function trimEnd(string $string, string $chars){
		return rtrim($string, $chars);
	}
	/* Starts With */
	public function startsWith(string $string, string $target, int $position = null){
		$length = strlen($string);
		$position = null === $position ? 0 : +$position;

		if ($position < 0) {
			$position = 0;
		} elseif ($position > $length) {
			$position = $length;
		}

		return $position >= 0 && substr($string, $position, strlen($target)) === $target;
	}
	/* Ends With */
	function endsWith(string $string, string $target, int $position = null){
		$length = strlen($string);
		$position = null === $position ? $length : +$position;
		if ($position < 0) {
			$position = 0;
		} elseif ($position > $length) {
			$position = $length;
		}
		$position -= strlen($target);
		return $position >= 0 && substr($string, $position, strlen($target)) === $target;
	}
	/* Parse Integer */
	function parseInt($string, int $radix = null){
		if (null === $radix) {
			$radix = 10;
		} elseif ($radix) {
			$radix = +$radix;
		}
		return intval($string, $radix);
	}
	/* Repeat */
	function repeat(string $string, int $n){
		return str_repeat($string, $n);
	}
	/* Words */
	public function words(string $string, string $pattern = null){
		if (null === $pattern) {
			if (preg_match(hasUnicodeWord, $string)) {
				return unicodeWords($string);
			}

			preg_match_all(asciiWords, $string, $matches);
			return $matches[0] = [];
		}

		if(preg_match_all($pattern, $string, $matches) > 0){ 
			return $matches[0]; 
		}
		return [];
	}
	/* Random Number */
	function randomNumber($lower = null, $upper = null, $floating = null){
		if (null === $floating) {
			if (is_bool($upper)) {
				$floating = $upper;
				$upper = null;
			} elseif (is_bool($lower)) {
				$floating = $lower;
				$lower = null;
			}
		}
		if (null === $lower && null === $upper) {
			$lower = 0;
			$upper = 1;
		} elseif (null === $upper) {
			$upper = $lower;
			$lower = 0;
		}
		if ($lower > $upper) {
			$temp = $lower;
			$lower = $upper;
			$upper = $temp;
		}
		$floating = $floating || (is_float($lower) || is_float($upper));
		if ($floating || $lower % 1 || $upper % 1) {
			$randMax = mt_getrandmax();
			return $lower + abs($upper - $lower) * mt_rand(0, $randMax) / $randMax;
		}
		return rand((int) $lower, (int) $upper);
	}
	/* Generate Short Code */
	function generateShortCode(){
		$chars = "1234567890abcdefghijuvwxyzklmnopqrstABCDEFGHIJUVWXYZKLMNOPQRST0987654321";
		$link = '';
		for($i=0;$i<6;$i++){ $link .= $chars{rand() % 46};}
		return $link;
	}
	/* Generate Middle Code */
	function generateMiddleCode(){
		$chars = "1234567890abcdefghijuvwxyzklmnopqrstABCDEFGHIJUVWXYZKLMNOPQRST0987654321";
		$link = '';
		for($i=0;$i<10;$i++){ $link .= $chars{rand() % 46};}
		return $link;
	}
	/* Generate Long Code */
	function generateLongCode(){
		$chars = "1234567890abcdefghijuvwxyzklmnopqrstABCDEFGHIJUVWXYZKLMNOPQRST0987654321";
		$link = '';
		for($i=0;$i<15;$i++){ $link .= $chars{rand() % 46};}
		return $link;
	}
	/* Generate Short Random Key */
	function generateShortRandomKey(){
		return bin2hex(openssl_random_pseudo_bytes(4));
	}
	/* Generate Middle Random Key */
	function generateMiddleRandomKey(){
		return bin2hex(openssl_random_pseudo_bytes(8));
	}
	/* Generate Long Random Key */
	function generateLongRandomKey(){
		return bin2hex(openssl_random_pseudo_bytes(16));
	}
	/* Slugify String */
	public function slugify($string){
		$preg = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',', '+', '#', '.', '_');
		$match = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','', '', '', '', '');
		$perma = strtolower(str_replace($preg, $match, $string));
		$perma = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $perma);
		$perma = trim(preg_replace('/\s+/', ' ', $perma));
		$perma = str_replace(' ', '-', $perma);
		return $perma;
	}
	/* Clean String */
	public function cleanString($string){
		$data = stripslashes(trim($string));
		$data = strip_tags($data);
		$data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
		return $data;
	}
	/* Check Is Mail */
	public function checkIsMail($email){
		$supportedMails = array('gmail.com','yahoo.com','hotmail.com','outlook.com','msn.com','yandex.com');
		foreach ($supportedMails as $domain) { 
			$pos = @strpos($email, $domain, strlen($email) - strlen($domain));
			if ($pos === false){ continue; } 
			if ($pos == 0 || $email[(int) $pos - 1] == "@" || $email[(int) $pos - 1] == "."){ return true;  } 
		}
		return false;
	}
	/* Redirect */
	public function redirect($address){
		header("location: ".$address);
	}
	
	/* Parse Default Language */
	public function parseDefaultLanguage($http_accept, $deflang = "en") {
		if(isset($http_accept) && strlen($http_accept) > 1)  {
			# Split possible languages into array
			$x = explode(",",$http_accept);
			foreach ($x as $val) {
				#check for q-value and create associative array. No q-value means 1 by rule
				if(preg_match("/(.*);q=([0-1]{0,1}.\d{0,4})/i",$val,$matches)){
					$lang[$matches[1]] = (float)$matches[2];
				}else{
					$lang[$val] = 1.0;
				}
			}

			#return default language (highest q-value)
			$qval = 0.0;
			foreach ($lang as $key => $value) {
				if ($value > $qval) {
					$qval = (float)$value;
					$deflang = $key;
				}
			}
		}
	   return str_replace("-","_",$deflang);
	}
	/* Get Default Language */
	public function getDefaultLanguage(){
		if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"])){
			return $this->parseDefaultLanguage($_SERVER["HTTP_ACCEPT_LANGUAGE"]);
		}else{
			return $this->parseDefaultLanguage(NULL);
		}
	}
	/* Get IP Address */
	public function getIPAddress(){
		if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
			$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
			$_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
		}
		$client = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote = $_SERVER['REMOTE_ADDR'];
		if(filter_var($client, FILTER_VALIDATE_IP)){ $ip = $client; }
		elseif(filter_var($forward, FILTER_VALIDATE_IP)){ $ip = $forward;
		}else{ $ip = $remote; }
		return $ip;
	}
	/* File Size Conversion */
	public function fsConversion($size){
		if (1024 > $size) {
			return $size.' B';
		} else if (1048576 > $size) {
			return round( ($size / 1024) , 2). ' KB';
		} else if (1073741824 > $size) {
			return round( (($size / 1024) / 1024) , 2). ' MB';
		} else if (1099511627776 > $size) {
			return round( ((($size / 1024) / 1024) / 1024) , 2). ' GB';
		}
	}
	/* Hash Password */
	public function hashPassword($string){
		$string = hash("md2", $string);
		$string = hash("sha1", $string);
		$string = hash("md4", $string);
		$string = hash("sha256", $string);
		$string = hash("md5", $string);
		$string = hash("sha384", $string);
		$string = hash("ripemd128", $string);
		$string = hash("sha512", $string);
		$string = hash("ripemd160", $string);
		$string = hash("whirlpool", $string);
		$string = hash("ripemd256", $string);
		$string = hash("snefru", $string);
		$string = hash("ripemd320", $string);
		$string = hash("gost", $string);
		$string = hash("crc32", $string);
		$string = hash("adler32", $string);
		$string = hash("crc32b", $string);
		$string = hash("sha1", $string);
		return $string;
	}
	/* Check Password */
	public function checkPassword($strToHashed, $storedHash){
		if($strToHashed == $storedHash){
			return 1;
		}else{
			return 0;
		}
	}
	/* Specific Hash */
	public function specificHash($string){
		return md5(sha1(md5($string)));
	}
	/* Latest Date HMS */
	public function latestDateHM(){
		return date("d.m.Y-H:i");
	}
	/* Latest Full Date */
	public function latestDate(){
		return date("d.m.Y");
	}
	/* Check Session */
	public function checkSession($sName){
		if(isset($_SESSION[$sName])){ return true; }else{ return false; }
	}
	/* Return Null Then */
	public function retUThen($var, $retext){
		if(empty($var)){
			return $retext;
		}else{
			return $var;
		}
	}
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/*
	@=@-[Webmaster]-@=@
	*/
	function wmMetaTitle($title, $sperator, $stuck){
		echo '<title>'.$title.' '.$sperator.' '.$stuck.'</title>';
	}
	function wmMetaDescription($content){
		echo '<meta name="description" content="'.$content.'" />';
	}
	function wmMetaKeyword($content){
		echo '<meta name="keyword" content="'.$content.'" />';
	}
	function wmMetaAuthor($author){
		echo '<meta name="author" content="'.$author.'" />';
	}
	function wmOpenGraph($ogTitle, $ogUrl, $ogImage, $ogDescription){
		echo '<meta property="og:title" content="'.$ogTitle.'" />
		<meta property="og:url" content="'.$ogUrl.'" />
		<meta property="og:image" content="'.$ogImage.'" />
		<meta property="og:description" content="'.$ogDescription.'" />';
	}
	/* Capitalization Upper */
	
	
}
?>