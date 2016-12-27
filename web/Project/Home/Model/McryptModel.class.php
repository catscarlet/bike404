<?php

namespace Home\Model;

class McryptModel
{
    public function __construct()
    {
        $this->iv = '[mcrypt_iv_for_RIJNDAEL_256_CFB]';
        $this->privateKey = 'bike404_mycrypt_key';
    }

    public function encrypt($data)
    {
        $iv = $this->iv;
        $privateKey = $this->privateKey;

        $encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $privateKey, $data, MCRYPT_MODE_CFB, $iv);
        $based_encrypted = base64_encode($encrypted);

        return $based_encrypted;
    }

    public function decrypt($based_encrypted)
    {
        $iv = $this->iv;
        $privateKey = $this->privateKey;

        $encryptedData = base64_decode($based_encrypted);
        $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $privateKey, $encryptedData, MCRYPT_MODE_CFB, $iv), "\0");

        return $decrypted;
    }

    private function get_cipher_list()
    {
        $cipher_list = mcrypt_list_algorithms();//mcrypt支持的加密算法列表
        return $cipher_list;
    }

    private function get_mode_list()
    {
        $mode_list = mcrypt_list_modes(); //mcrypt支持的加密模式列表
        return $mode_list;
    }

    private function get_iv_size()
    {
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CFB);

        return $iv_size;
    }
}
