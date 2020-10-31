<?php
Define('Bakimdayiz', True);require_once('Bakimdayiz.php');

$Islem = @$_GET['p']; // İşlem / Process
$Istek = @$_GET['r']; // İstek / Request

Switch($Islem){
    case "sayac":
        if($Istek == "tekil"){
            $Bakimdayiz->Finish($Bakimdayiz->getFirstTime());
        }elseif($Istek == "toplam"){
            $Bakimdayiz->Finish($Bakimdayiz->getAllTime());
        }else{
            $Bakimdayiz->Finish();
        }
    break;
    case "foto":
        $FotoVeri = $Bakimdayiz->checkPhoto(@$Istek);
        if($FotoVeri['ID'] == $Istek){
            if($Bakimdayiz->getFirstTime() >= $FotoVeri['Min_Quantity']){
                $Sonuc = Array(
                    'durum' => 'basarili', 'icerik' => $FotoVeri['PhotoURL']
                ); // Başarılı
            }else{
                $Sonuc = Array(
                    'durum' => 'basarisiz',
                    'icerik' => 'Fotoğrafı görüntülemek için yeterli ziyaretçi sayısına ulaşılamadı!<BR />Lütfen Arkadaşlarını Davet et!'
                ); // Başarısız
            }
        }else{
            $Sonuc = Array(
                'durum' => 'basarisiz',
                'icerik' => '"'.$Istek.'" geçerli bir ID değil veya bu ID\'ye sahip fotoğraf yok!'
            ); // Başarısız
        }
        Header('Content-Type: application/json');
        $Bakimdayiz->Finish(json_encode($Sonuc));
    break;
    default:
        $Bakimdayiz->Finish();
    break;
}