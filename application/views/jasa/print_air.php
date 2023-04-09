<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Nota Tambat Labuh</title>
    <style>
        div.a {
            text-align: center;
        }

        div.b {
            text-align: left;
        }

        div.c {
            text-align: right;
        }

        div.d {
            text-align: justify;
        }

        body {
            font-size: 12px;
        }

        img.mt-0 {
            margin-top: 0px;
        }

        #table2 {
            border: 1px solid black;
            border-collapse: collapse;
        }

        #text {
            position: absolute;
            top: 310;
            left: 480px;
            z-index: 0;
        }
        #text1 {
            position: absolute;
            top: 380;
            left: 480px;
            z-index: 0;
        }

        #png {
            position: absolute;
            top: 320;
            margin-left: 380px;
            z-index: 1;
            width: 150px;
        }
    </style>
</head>

<body>

    <table style="height: 70px; width:100%;">
        <tbody>
            <tr>
                <td style="width: 100px;">&nbsp;</td>
                <td style="width: 227px;">&nbsp;</td>
                <td style="width: 49px;"></td>
            </tr>
            <tr>
                <td>Pelabuhan Perikanan<br /> Samudera Kendari</td>
                <td style="width: 327px; text-align: center;"><strong><span style="text-decoration: underline;">NOTA PENJUALAN AIR</span></strong></td>
                <td style="width: 49px;">&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;
                    <table id="table2" width="80">
                        <tbody>
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="width: 200px; text-align: center;">
                    <table style="height: 16px; width: 150px;" id="table2">
                        <tbody>
                            <tr>
                                <td style="text-align: center;">LANDASAN HUKUM<br /> PP. No.75 Tahun 2015</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="width: 49px;">&nbsp;</td>
            </tr>
        </tbody>
    </table>

    <br />
    Telah Menerima Air Bersih
    <br />

    <table style="height: 29px; width: 100%;">
        <tbody>
            <tr>
                <td style="width: 85px;">Nama</td>
                <td>:</td>
                <td><?php echo $rows['nama_kapal'] ?></td>

                <td style="width: 49px;">Nomor</td>
                <td>:</td>
                <td><?php echo $rows['kode_air'] ?></td>
            </tr>
            <tr>
                <td style="width: 85px;">Alamat</td>
                <td>:</td>
                <td>Kawasan PPS Kendari</td>

                <td style="width: 49px;">Tanggal</td>
                <td>:</td>
                <td><?php echo date_indo(date($rows['tgl_isi'])) ?></td>
            </tr>
        </tbody>
    </table>

    <br />

    <table style="border-collapse: collapse; width: 100%; height: 72px;" border="1">
        <tbody>
            <tr style="height: 18px;">
                <td style="width: 5.36066%; height: 36px; text-align: center;" rowspan="2">No.</td>
                <td style="width: 41.1307%; text-align: center; height: 18px;" colspan="2">Catatan Meter</td>
                <td style="width: 20.1755%; text-align: center; height: 18px;">Pemakaian</td>
                <td style="width: 16.6667%; text-align: center; height: 18px;">Harga</td>
                <td style="width: 16.6667%; text-align: center; height: 18px;">Jumlah</td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 22.3198%; text-align: center; height: 18px;">Awal</td>
                <td style="width: 18.8109%; text-align: center; height: 18px;">Akhir</td>
                <td style="width: 20.1755%; text-align: center; height: 18px;">M<sup>3</sup></td>
                <td style="width: 16.6667%; text-align: center; height: 18px;">M<sup>3</sup></td>
                <td style="width: 16.6667%; text-align: center; height: 18px;">Rp.</td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 5.36066%; height: 18px; text-align: center;">1</td>
                <td style="width: 22.3198%; height: 18px; text-align: center;"><?php echo $rows['awal'] ?></td>
                <td style="width: 18.8109%; height: 18px; text-align: center;"><?php echo $rows['akhir'] ?></td>
                <td style="width: 20.1755%; height: 18px; text-align: center;"><?php echo $rows['volume'] ?></td>
                <td style="width: 16.6667%; text-align: right; height: 18px;">15.500</td>
                <td style="width: 16.6667%; height: 18px; text-align: right;"><?php echo number_format($rows['total_tagihan']) ?></td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 46.4914%; height: 18px; text-align: center;" colspan="3"><b>Jumlah :</b></td>
                <td style="width: 20.1755%; height: 18px; text-align: center;"><?php echo $rows['volume'] ?></td>
                <td style="width: 16.6667%; text-align: right; height: 18px;">15.500</td>
                <td style="width: 16.6667%; height: 18px; text-align: right;"><?php echo number_format($rows['total_tagihan']) ?></td>
            </tr>
        </tbody>
    </table>
        <p id="text">
            Kendari, <?php echo date_indo(date('Y-m-d')) ?><br />
            Petugas<br /> </p><br /><br />
            <img id="png" src="<?php echo base_url() ?>/assets/images/ttd/<?php echo $rows['ttd'] ?>">
            <br>
            <p id="text1">
            <?php echo $rows['user_input'] ?>
    </p>
</body>

</html>