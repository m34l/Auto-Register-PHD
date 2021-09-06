<?php
date_default_timezone_set('Asia/Jakarta');
class PHD
{
    public function Register($email,$phone,$hbd,$client,$device){
        $number = substr($phone,2);
        $data = '{"birthday":"'.$hbd.'","email":"'.$email.'","first_name":"Ismail Ajah","gender":1,"keep_otp":1,"last_name":"Dah","password":"Otpku123!","phone":"'.$number.'"}';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.pizzahut.co.id/customer/v1/customer/register');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

        $headers = array();
        $headers[] = 'Host: api.pizzahut.co.id';
        $headers[] = 'Content-Com.Ph.Id.Consumer.Model.Type: application/json';
        $headers[] = 'X-Client-Id: b39773b0-435b-4f41-80e9-163eef20e0ab';
        $headers[] = 'X-Platform: ANDROID';
        $headers[] = 'X-Device-Type: phone';
        $headers[] = 'X-Lang: en';
        $headers[] = 'X-Channel: 2';
        $headers[] = 'User-Agent: Pizza Hut Indonesia/3.0.2 Dalvik/2.1.0 (Linux; U; Android 5.1.1; G011A Build/LMY48Z)';
        $headers[] = 'X-Customer-Token: ';
        $headers[] = 'X-Device-Id: b3faca0ba85bcf01';
        $headers[] = 'Content-Type: application/json; charset=UTF-8';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        
        return $result;

    }

    public function SendOTP($key,$client,$device){
        $data = '{"key":"'.$key.'","type":0}';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.pizzahut.co.id/customer/v1/customer/send-otp');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

        $headers = array();
        $headers[] = 'Host: api.pizzahut.co.id';
        $headers[] = 'Content-Com.Ph.Id.Consumer.Model.Type: application/json';
        $headers[] = 'X-Client-Id: b39773b0-435b-4f41-80e9-163eef20e0ab';
        $headers[] = 'X-Platform: ANDROID';
        $headers[] = 'X-Device-Type: phone';
        $headers[] = 'X-Lang: en';
        $headers[] = 'X-Channel: 2';
        $headers[] = 'User-Agent: Pizza Hut Indonesia/3.0.2 Dalvik/2.1.0 (Linux; U; Android 5.1.1; G011A Build/LMY48Z)';
        $headers[] = 'X-Customer-Token: ';
        $headers[] = 'X-Device-Id: b3faca0ba85bcf01';
        $headers[] = 'Content-Type: application/json; charset=UTF-8';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }
    public function VerifyOTP($key,$otp,$client,$device){
        $data = '{"keep_otp":1,"key":"'.$key.'","otp":"'.$otp.'"}';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.pizzahut.co.id/customer/v1/customer/register/verify-by-otp');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

        $headers = array();
        $headers[] = 'Host: api.pizzahut.co.id';
        $headers[] = 'Content-Com.Ph.Id.Consumer.Model.Type: application/json';
        $headers[] = 'X-Client-Id: b39773b0-435b-4f41-80e9-163eef20e0ab';
        $headers[] = 'X-Platform: ANDROID';
        $headers[] = 'X-Device-Type: phone';
        $headers[] = 'X-Lang: en';
        $headers[] = 'X-Channel: 2';
        $headers[] = 'User-Agent: Pizza Hut Indonesia/3.0.2 Dalvik/2.1.0 (Linux; U; Android 5.1.1; G011A Build/LMY48Z)';
        $headers[] = 'X-Customer-Token: ';
        $headers[] = 'X-Device-Id: b3faca0ba85bcf01';
        $headers[] = 'Content-Type: application/json; charset=UTF-8';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }
    public function generateRandomString($length = true)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function getStr($string,$start,$end){
        $str = explode($start,$string);
        $str = explode($end,$str[1]);
        return $str[0];
    }
    public function connect($end_point, $post) {
        $_post = array();
        if (is_array($post)) {
            foreach ($post as $name => $value) {
                $_post[] = $name.'='.urlencode($value);
            }
        }
        $ch = curl_init($end_point);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if (is_array($post)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, join('&', $_post));
        }
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        $result = curl_exec($ch);
        if (curl_errno($ch) != 0 && empty($result)) {
            $result = false;
        }
        curl_close($ch);
        return $result;
    } 
} 
echo "\033[1;32mAuto Creator PHD & CLAIM VOUCHER\033[0m".PHP_EOL;
print "\n[!] Script Created By: OTPKU & M34L".PHP_EOL;
$try = new PHD;
ulang:
$client = 'b39773b0-435b-4f41-80e9-'.$try->generateRandomString(12);
$device = 'b3faca0ba85'.$try->generateRandomString(5);

echo "Email : ";
$email = trim(fgets(STDIN));
$date = date('Y-m-d');
$hbd = date('Y-m-d', strtotime('+1 days', strtotime($date)));
echo "Mau nomor Sendiri Atau Nomor OTP? 1. OTPKU / 2. Sendiri : ";
$choose = trim(fgets(STDIN));
if ($choose == '1') {
    echo "Masukan ApiKey [?] ";
    $apikey = trim(fgets(STDIN));
    echo "Getting Number [!] ".PHP_EOL;
    $api_url = 'https://otpku.com/api/json.php'; // api url
    $post_data = array(
        'api_key' => $apikey, // api key Anda
        'action' => 'order',
        'service' => '26', // id layanan
        'operator' => 'indosat' //telkomsel,axis,indosat,any(random)
    );
    $api = $try->connect($api_url, $post_data);
    if (json_decode($api)->status == true) {
        $result = json_decode($api)->data->number;
    } else{
        die('Gagal get nomor, cek api/saldo anda');
    }
} else {
    echo "Input Nomor cth (628XXXXXXX): ";
    $result = trim(fgets(STDIN));
}


if (is_numeric($result)) {
    $number = $result;

    echo "Getting Number Done : ".$number.PHP_EOL;
    echo "Req OTP....".PHP_EOL;
    $reqotp = $try->Register($email,$number,$hbd,$client,$device);
    if (json_decode($reqotp)->message == 'Successful') {
        $key = json_decode($reqotp)->data->key;
        $sendOTP = $try->SendOTP($key,$client,$device);
        if (json_decode($sendOTP)->message == 'Successful') {
            echo "Req Otp Done...".PHP_EOL;
            echo "Input OTP : ";$otp = trim(fgets(STDIN));

            $VerifyOTP = $try->VerifyOTP($key,$otp,$client,$device);

            if (json_decode($VerifyOTP)->message == 'Successful') {
                $token = json_decode($VerifyOTP,true)['data']['x-token'];
                file_put_contents('akun.txt',PHP_EOL.$email."|Otpku123!| Token : ".$token,FILE_APPEND);
                echo "\033[1;32mBerhasil Mendaftar Akun save to akun.txt!\033[0m".PHP_EOL;
                goto ulang;
            } else {
                echo "\033[0;31mGagal, coba ulang pake data yang sama!\033[0m".PHP_EOL;
                goto ulang;
            }

        } else {
            echo json_decode($sendOTP)->message;
            goto ulang;
        }

    } else {
        print_r($reqotp);
        goto ulang;
    }

} else{
    echo "cek apikey/nomor/saldo ente sob";
}
?>
