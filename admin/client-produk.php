<?php
error_reporting(1);
class clientProduk
{
    private $urlProduk;

    public function __construct($urlProduk)
    {
        $this->url = $urlProduk;
        unset($urlProduk);
    }
    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        // unset($data);
    }
    public function tampil_semua_produk()
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

    public function tampil_produk($id_produk)
    {
        $id_produk = $this->filter($id_produk);
        $client = curl_init($this->url . "?aksi=tampil&id_produk=" . $id_produk);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        // unset($id_detail, $client, $response, $data);
    }

    public function tambah_produk($data)
    {
        $data = '{
            "id_produk":"' . $data['id_produk'] . '",
            "image":"' . $data['image'] . '",
            "nama_produk":"' . $data['nama_produk'] . '",
            "harga":"' . $data['harga'] . '",
            "stok":"' . $data['stok'] . '",
            "id_detail":"' . $data['id_detail'] . '",
            "id_kategori":"' . $data['id_kategori'] . '",
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

    public function ubah_produk($data)
    {
        $data = '{
            "id_produk":"' . $data['id_produk'] . '",
            "image":"' . $data['image'] . '",
            "nama_produk":"' . $data['nama_produk'] . '",
            "harga":"' . $data['harga'] . '",
            "stok":"' . $data['stok'] . '",
            "id_detail":"' . $data['id_detail'] . '",
            "id_kategori":"' . $data['id_kategori'] . '",
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



    public function hapus_produk($data)
    {
        $id_produk = $this->filter($data['id_produk']);
        $data = '{"id_produk":"' . $id_produk . '",
                "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_produk, $data, $c, $response);
    }
    public function __destruct()
    {
        unset($this->options, $this->api);
    }
}

//url menyesuaikan, nanti buat server_spesifikasi_laptop
$urlProduk = 'http://172.20.10.3/tokosepatu/server_toko-sepatu/server_produk.php';
$clientProduk = new clientProduk($urlProduk);
