# Bakimdayiz

# Türkçe 
Genel kullanım amacı H* Retrolar için olsada yazılım değiştirilip, özgürce kullanılabilir.

## Gereksinimler
```
* PHP 5.6 [7.0 Önerilir]
* MySQL 5.0+ [5.5 Önerilir]
* Web Sunucusu [IIS Önerilir]
```

## Kurulum

1. Projeyi indirin, tavsiyem **Github** üzerinden indirmenizdir.
2. Dosya arşivlenmişse, arşivden çıkarıp Web Sunucusunun dosya dizinine atın (IIS için wwwroot, XAMPP için htdocs klasörleri olur genellikle)
3. **bakimdayiz.sql** dosyasının veritabanınıza yükleyin.
4. **Bakimdayiz.php** dosyasını açıp, aşağıdaki kısımları bulup, kendinizce düzenleyin.
```php
private $Config = array(
        'Host' => 'MYSQL_SUNUCUSU_ADRESİ', // Default: 127.0.0.1
        'Port' => 'MYSQL_SUNUCUSU_PORTU', // Default: 3306
        'User' => 'MYSQL_KULLANICI_ADI', // Default: root
        'Pass' => 'MYSQL_KULLANICI_ŞİFRESİ', // Sizin belirlediğiniz şifre
        'DB' => 'MYSQL_VERİTABANI' // Default: bakimdayiz
    ); // Veritabanı Ayarları
```
5. Kurulum tamamlandı, şimdi test etme zamanı.

## Çalıştırma
* Kendi bilgisayarınızda test ediyorsanız; localhost/127.0.0.1 girmeniz yeterli.
* Bir Sunucunuz var ve Alan Adınız bağlı ise, bağlı olan Alan adına gitmeniz yeterli.

## Hedefler
Şuanlık yok.

## Öneri, İstek, Şikayet
- [x] Öneri, İstek ve Şikayetlerinizi buradan veya başka herhangi bir platformandan üzerinden iletebilirsiniz.
- [x] Öneri hakkındaki tercihim, denedikten ve elde edilir bir sonuç elde ettikten sonra detayları ve test amaçlı kullandığınız kodları göndermeniz.
- [x] İstekler ise erken veya geç bir şekilde cevaplanabilir, kabul edilebilir veya reddedilebilir.

## Lisanslama
Bu proje açık kaynak kodludur ve MIT Lisansı altında dağıtılmaktadır, istediğiniz şekilde özgürce kullanabilirsiniz.

# English
Coming soon, maybe.
