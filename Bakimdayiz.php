<?php
if(!Defined('Bakimdayiz')){
    Die('Bakimdayiz, Coded by Jeunx');
}

Class Bakimdayiz{
	
	private $Config = array(
        'Host' => 'MYSQL_SUNUCUSU_ADRESİ', // Default: 127.0.0.1
        'Port' => 'MYSQL_SUNUCUSU_PORTU', // Default: 3306
        'User' => 'MYSQL_KULLANICI_ADI', // Default: root
        'Pass' => 'MYSQL_KULLANICI_ŞİFRESİ', // Sizin belirlediğiniz şifre
        'DB' => 'MYSQL_VERİTABANI' // Default: bakimdayiz
    ); // Veritabanı Ayarları
	
	private $DB; // Veritabanı değişkeni
	private $User; // Aynı fonksiyonların defalarca çağrılmasını önlemek için.
	private $TimeFormat; // Zaman Formatı
	
    private function Connect(){
		Try{
			$Connection = new PDO('mysql:host='. $this->Config['Host'].';port='.$this->Config['Port'].';dbname='. $this->Config['DB'].';charset=utf8',  $this->Config['User'],  $this->Config['Pass']);
			$Connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}Catch(PDOException $e){
			Die("Bağlantı Hatası!<br/>\nHata: " . $e->getMessage());
		}
		return $Connection;
    }

    function __construct(){
    	$this->DB = $this->Connect();
		$this->Config = null;
		$this->User = json_decode(json_encode(
			Array(
				'IP' => $this->getUserIP(),
				'Agent' => $_SERVER['HTTP_USER_AGENT'],
				'AccessDate' => $this->DateNow()
			),
			False
		));
		$this->TimeFormat = "Y-m-d H:i:s"; // Veritabanına uygun olan Zaman formatı.
    }

	// IP Adresi bulma, Cloudflare, Proxy vs. bypass edip gerçek ip adresini alır
	public function getUserIP(){	
    	if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    	}
    	$client  = @$_SERVER['HTTP_CLIENT_IP'];
    	$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    	$remote  = $_SERVER['REMOTE_ADDR'];
    	if(filter_var($client, FILTER_VALIDATE_IP)){$ip = $client;}
    	elseif(filter_var($forward, FILTER_VALIDATE_IP)){$ip = $forward;}
    	else{$ip = $remote;}
    	return $ip;
		/* Credits: https://stackoverflow.com/a/41382472 */
	}
	
	/* Tekil Sayaç */
	public function addFirstTime(){
    	$this->DB->prepare("INSERT INTO bakimdayiz_access_firsttime (IP, User_Agent, DTime) VALUES (?, ?, ?)")->execute(Array($this->User->IP, $this->User->Agent, $this->User->AccessDate));
    	return;
	}
	
	public function getFirstTime(){
    	$FirstTime = $this->DB->query("SELECT count(*) FROM bakimdayiz_access_firsttime")->fetchColumn();
    	return $FirstTime;
	}
	
	public function checkFirstTime(){
    	$Sorgu = $this->DB->query("SELECT * FROM bakimdayiz_access_firsttime WHERE IP = '{$this->User->IP}'")->fetch(PDO::FETCH_ASSOC);
    	if(!$Sorgu){
			// Kayıt yoksa
			$this->addFirstTime();
    	}
    	return;
	}
	
	/* Toplam Sayaç */
	public function addAllTime(){
    	$this->DB->prepare("INSERT INTO bakimdayiz_access_alltime (IP, User_Agent, Last_Time) VALUES (?, ?, ?)")->execute(Array($this->User->IP, $this->User->Agent, $this->User->AccessDate));
    	return;
	}
	
	public function getAllTime(){
    	$FirstTime = $this->DB->query("SELECT count(*) FROM bakimdayiz_access_alltime")->fetchColumn();
    	return $FirstTime;
	}
	
	public function checkAllTime(){
    	$Sorgu = $this->DB->prepare('SELECT * FROM bakimdayiz_access_alltime WHERE IP = ?');
    	$Sorgu->execute(Array($this->User->IP));
    	
		if($Dizi = $Sorgu->fetchAll(PDO::FETCH_ASSOC)){
    		$Sure = (5 * 60); // 5 Dakika, Saniye Cinsinden
            $SonGiris = $this->Date2Time(end($Dizi)['Last_Time']);
            $SimdiGiris = $this->Date2Time($this->User->AccessDate);
            $Durum = floor(($SimdiGiris - $SonGiris) / $Sure);

            if($Durum > 0){
                $this->addAllTime();
            }
    	}else{
            $this->addAllTime();
    	}
		
    	return;
	}
	
	/* Diğer Fonksiyonlar */
	public function checkPhoto($ID){
		if(ctype_digit(strval($ID)) && $ID != ""){
			$Sorgu = $this->DB->query("SELECT * FROM bakimdayiz_photos WHERE ID = '{$ID}'")->fetch(PDO::FETCH_ASSOC);
			if($Sorgu){
				return $Sorgu;
			}
		}
    	return;
	}

	// Şuanki zamanı "Gün-Ay-Yıl Saat-Dakika-Saniye" formatında verir.
	public function DateNow(){
		return date($this->TimeFormat);
	}
	
	// Girilen değeri ($Inp) "Gün-Ay-Yıl Saat-Dakika-Saniye" formatından Unix(sayısal)'e çevirir.
	public function Date2Time($Inp){
		return (DateTime::createFromFormat($this->TimeFormat, $Inp) !== FALSE ? strtotime($Inp) : 0);
	}
	
	// Girilen değeri ($Inp) Unix(sayısal)'den formatından "Gün-Ay-Yıl Saat-Dakika-Saniye" çevirir.
	public function Time2Date($Inp){
		return (ctype_digit(strval($Inp)) ? date($this->TimeFormat, $Inp) : 0);
	}
	
	// Hızlı bir şekilde programı sonlandırmak için.
	public function Finish($Text = 'die'){
        if($Text == 'die'){
			unset($this->Config, $this->DB, $this->User, $this->TimeFormat); // RAM'da biraz yer açma dileği ile.
			Die('Bakimdayiz, Coded by Jeunx');
        }else{
            echo($Text);
        }
	}

}

$Bakimdayiz = new Bakimdayiz();