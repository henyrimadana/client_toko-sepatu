<?php
error_reporting(1);
class clientDetail
{
    private $urlDetail;

    public function __construct($urlDetail)
    {
        $this->url = $urlDetail;
        unset($urlDetail);
    }
    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        // unset($data);
    }
    public function tampil_semua_detail_produk()
    {
        $client = curl_init($this->url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        // mengembalikan data
        return $data;
        // menghapus variabel dari memory
        // unset($data, $client, $response);
    }

    public function tampil_detail_produk($id_detail)
    {
        $id_detail = $this->filter($id_detail);
        $client = curl_init($this->url . "?aksi=tampil&id_detail=" . $id_detail);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        // unset($id_detail, $client, $response, $data);
    }

    public function tambah_detail_produk($data)
    {
        $data = '{
            "id_detail":"' . $data['id_detail'] . '",
            "ukuran":"' . $data['ukuran'] . '",
            "bahan":"' . $data['bahan'] . '",
            "warna":"' . $data['warna'] . '",
            "merk":"' . $data['merk'] . '",
            "aksi":"' . $data['aksi'] . '"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        // unset($data, $c, $response);
    }

    public function ubah_detail_produk($data)
    {
        $data = '{
            "id_detail":"' . $data['id_detail'] . '",
            "ukuran":"' . $data['ukuran'] . '",
            "bahan":"' . $data['bahan'] . '",
            "warna":"' . $data['warna'] . '",
            "merk":"' . $data['merk'] . '",
            "aksi":"' . $data['aksi'] . '"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        // unset($data, $c, $response);
    }



    public function hapus_detail_produk($data)
    {
        $id_detail = $this->filter($data['id_detail']);
        $data = '{"id_detail":"' . $id_detail . '",
                "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_detail, $data, $c, $response);
    }
    public function __destruct()
    {
        unset($this->options, $this->api);
    }

}

//url menyesuaikan, nanti buat server_spesifikasi_laptop
$urlDetail = 'http://192.168.1.26/tokosepatu/server/server_detail_produk.php';
$clientDetail = new clientDetail($urlDetail);
