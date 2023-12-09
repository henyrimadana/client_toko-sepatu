<?php
error_reporting(1);
class clientPelanggan
{
    private $urlPelanggan;

    public function __construct($urlPelanggan)
    {
        $this->url = $urlPelanggan;
        unset($urlPelanggan);
    }
    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        // unset($data);
    }

    public function tampil_semua_pelanggan()
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

    public function tampil_pelanggan($id_pelanggan)
    {
        $id_pelanggan = $this->filter($id_pelanggan);
        $client = curl_init($this->url . "?aksi=tampil&id_pelanggan=" . $id_pelanggan);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        // unset($id_pelanggan, $client, $response, $data);
    }

    public function tampil_username($username)
    {
        $id_pelanggan = $this->filter($username);
        $client = curl_init($this->url . "?aksi=tampil_username&username=" . $username);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        // unset($id_pelanggan, $client, $response, $data);
    }

    public function tambah_pelanggan($data)
    {
        $data = '{
            "id_pelanggan":"' . $data['id_pelanggan'] . '",
            "nama":"' . $data['nama'] . '",
            "alamat":"' . $data['alamat'] . '",
            "no_hp":"' . $data['no_hp'] . '",
            "email":"' . $data['email'] . '",
            "username":"' . $data['username'] . '",
            "password":"' . $data['password'] . '",
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

    public function ubah_pelanggan($data)
    {
        $data = '{
            "id_pelanggan":"' . $data['id_pelanggan'] . '",
            "nama":"' . $data['nama'] . '",
            "alamat":"' . $data['alamat'] . '",
            "no_hp":"' . $data['no_hp'] . '",
            "email":"' . $data['email'] . '",
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

    public function hapus_pelanggan($data)
    {
        $id_pelanggan = $this->filter($data['id_pelanggan']);
        $data = '{"id_pelanggan":"' . $id_pelanggan . '",
                "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_pelanggan, $data, $c, $response);
    }
    public function __destruct()
    {
        unset($this->options, $this->api);
    }

}

$urlPelanggan = 'http://192.168.1.26/tokosepatu/server/server_pelanggan.php';
$clientPelanggan = new clientPelanggan($urlPelanggan);
