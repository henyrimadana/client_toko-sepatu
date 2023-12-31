<?php
error_reporting(1);
class clientTransaksi
{
    private $urlTransaksi;

    public function __construct($urlTransaksi)
    {
        $this->url = $urlTransaksi;
        unset($urlTransaksi);
    }
    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        // unset($data);
    }

    public function tampil_semua_transaksi()
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

    public function tampil_transaksi($id_transaksi)
    {
        $id_transaksi = $this->filter($id_transaksi);
        $client = curl_init($this->url . "?aksi=tampil&id_transaksi=" . $id_transaksi);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        // unset($id_transaksi, $client, $response, $data);
    }

    public function tampil_transaksi_by_pelanggan($id_pelanggan)
    {
        $id_pelanggan = $this->filter($id_pelanggan);
        $client = curl_init($this->url . "?aksi=tampil_by_pelanggan&id_pelanggan=" . $id_pelanggan);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        // unset($id_pelanggan, $client, $response, $data);
    }

    public function tambah_transaksi($data)
    {
        $data = '{
            "id_transaksi":"' . $data['id_transaksi'] . '",
            "id_produk":"' . $data['id_produk'] . '",
            "id_pelanggan":"' . $data['id_pelanggan'] . '",
            "tanggal":"' . $data['tanggal'] . '",
            "jumlah":"' . $data['jumlah'] . '",
            
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

    public function ubah_transaksi($data)
    {
        $data = '{
            "id_transaksi":"' . $data['id_transaksi'] . '",
            "id_produk":"' . $data['id_produk'] . '",
            "id_pelanggan":"' . $data['id_pelanggan'] . '",
            "tanggal":"' . $data['tanggal'] . '",
            "jumlah":"' . $data['jumlah'] . '",
            
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

    public function hapus_transaksi($data)
    {
        $id_transaksi = $this->filter($data['id_transaksi']);
        $data = '{"id_transaksi":"' . $id_transaksi . '",
                "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_transaksi, $data, $c, $response);
    }
    public function __destruct()
    {
        unset($this->options, $this->api);
    }
}

$urlTransaksi = 'http://172.20.10.3/tokosepatu/server_toko-sepatu/server_transaksi.php';
$clientTransaksi = new clientTransaksi($urlTransaksi);
