<?php
Define('Bakimdayiz', True);
require_once('Bakimdayiz.php');

// Sayaç Aktif
$Bakimdayiz->checkFirstTime();
$Bakimdayiz->checkAllTime();
?>
<!DOCTYPE html>
<Html lang="tr-TR">
	<Head>
		<title>HabJet Hotel ~ Yeniden HabJet!</title>
    	<meta charset="UTF-8">
    	<meta name="author" content="Jeunx">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="description" content="Habbo Hotel - Freunde treffen, Spaß haben und berühmt werden.">
    	<meta name="keywords" content="Habbo Hotel, virtuell, Welt, social network, gratis, taler, retro, community, avatar, chat, online, teen, Rollenspiel, anmelden, sozial, Gruppen, Foren, sicher, spielen, games, online, Freunde, teens, rares, rare Möbel, sammeln, erstellen, sammeln, treffen, Möbel, furni, Haustiere, Raum erstellen, teilen, Ausdruck, Badges, Treffpunkt, Musik, Stars, Starchats, HCs, mmo, mmorpg, massiv multiplayer">
    	<meta name="title" content="HabJet Hotel">
    	<meta name="language" content="tr-TR">
    	<meta name="robots" content="index, follow">

    	<!--- Styles --->
        <Link rel="icon" href="Assets/Img/favicon.png" />
    	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:300,300i,400,400i,600,600i,700,800" />
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
		<link rel="stylesheet" href="Assets/CSS/animate.min.css" />
    	<link rel="stylesheet" href="Assets/CSS/Style.css?v=JE<?=time();?>" />
	</Head>
	<Body onload="loadingMain()">
		<Div id="loader">
    		<Div class="animated infinite flash l_main"></Div></Div>
		</Div>
		<Div id="starsbg" style="display: none;">
    		<Div id="stars"></Div>
    		<Div id="stars2"></Div>
    		<Div id="stars3"></Div>
		</Div>
		<Div class="main animate-bottom" id="main" style="display: none;">
        	<Div class="logo"></Div>
    		<Div class="logo_right">
        		<span class="title">HabJet Hotel</span>
        		<span class="small">Uzun bir aradan sonra geri döndük!<BR />2016'da kalan maceraya devam etmeye hazır mısın?</span>
        	</Div>
    		<Div class="play_container">
        		<Div class="users">HabJet Hotel Ziyaretçi İstatiklerini Görüntülemek İçin</Div>
        		<button id="Stats" class="play">Tıklayın</button>
    		</Div>
    		<Div id="Buttons">
				<a class="discord animated infinite wobble" href="#1" target="_blank" style="margin-left:5px;">
	        		<i style="margin: 18px 18px;" class="fab fa-discord"></i>
    			</a>
    			<a class="discord animated infinite wobble" href="#2" target="_blank" style="margin-left:5px;">
        			<i style="margin: 18px 18px;" class="fab fa-facebook"></i>
    			</a>
    			<a class="discord animated infinite wobble" href="#3" target="_blank">
        			<i style="margin: 18px 18px;" class="fab fa-instagram"></i>
    			</a>
    		</Div>
    		<Div class="sneakpeak_title">Fotoğraflar:</Div>
    		<Div class="sneakpeak_container">
        		<Div class="sp red">
        			<span class="verify_1">25</span>
            		<span class="verify_2">Asgari 25 kullanıcı ziyaretinde aktifleşecektir!</span>
                    <button onclick="getPhoto(1)">Göster</button>
        		</Div>
        		<Div class="sp green">
					<span class="verify_1">50</span>
            		<span class="verify_2">Asgari 50 kullanıcı ziyaretinde aktifleşecektir!</span>
                    <button onclick="getPhoto(2)">Göster</button>
				</Div>
        		<Div class="sp red">
            		<span class="verify_1">75</span>
            		<span class="verify_2">Asgari 75 kullanıcı ziyaretinde aktifleşecektir!</span>
                    <button onclick="getPhoto(3)">Göster</button>
        		</Div>
        		<Div class="sp green">
            		<span class="verify_1">100</span>
            		<span class="verify_2">Asgari 100 kullanıcı ziyaretinde aktifleşecektir!</span>
                    <button onclick="getPhoto(4)">Göster</button>
        		</Div>
        		<Div class="sp red">
            		<span class="verify_1">125</span>
            		<span class="verify_2">Asgari 125 kullanıcı ziyaretinde aktifleşecektir!</span>
                    <button onclick="getPhoto(5)">Göster</button>
        		</Div>
        		<Div class="sp green">
            		<span class="verify_1">150</span>
            		<span class="verify_2">Asgari 150 kullanıcı ziyaretinde aktifleşecektir!</span>
                    <button onclick="getPhoto(6)">Göster</button>
        		</Div>
        		<Div class="sp red">
            		<span class="verify_1">200</span>
            		<span class="verify_2">Asgari 200 kullanıcı ziyaretinde aktifleşecektir!</span>
                    <button onclick="getPhoto(7)">Göster</button>
        		</Div>
        		<Div class="sp green">
            		<span class="verify_1">250</span>
            		<span class="verify_2">Asgari 250 kullanıcı ziyaretinde aktifleşecektir!</span>
                    <button onclick="getPhoto(8)">Göster</button>
        		</Div>
    		</Div>
		</Div>
        <!--- Scripts --->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <Script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></Script>
        <script src="Assets/JS/Jeunx.js?v=JE<?=time();?>"></script> 
	</Body>
</Html>
