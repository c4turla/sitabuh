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
    </style>
</head>

<body>

    <table style="height: 70px; width:100%;">
        <tbody>
            <tr>
                <td style="width: 100px;">&nbsp;</td>
                <td style="width: 227px;">&nbsp;</td>
                <td style="width: 49px;"><strong><?php echo $rows['kd_tambat'] ?></strong></td>
            </tr>
            <tr>
                <td>Pelabuhan Perikanan<br /> Samudera Kendari</td>
                <td style="width: 327px; text-align: center;"><strong><span style="text-decoration: underline;">NOTA TAMBAT / LABUH NON PERIKANAN</span></strong></td>
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

    <br /><br />

    <table style="height: 29px; width: 100%;">
        <tbody>
            <tr>
                <td style="width: 85px;">Nama Kapal</td>
                <td>:</td>
                <td><?php echo $rows['nama_kapal'] ?></td>
                <td style="width: 20px;">GT</td>
                <td>:</td>
                <td><?php echo $rows['gt'] ?></td>
                <td style="width: 49px;">Panjang</td>
                <td>:</td>
                <td style="width: 50px;"><?php echo $rows['panjang'] ?></td>
            </tr>
        </tbody>
    </table>

    <br />
    <table style="height: 45px; width:100%;" id="table2" border="1" cellspacing="5" cellpadding="5">
        <tbody>
            <tr>
                <td style="width: 167px; text-align: center;">Tanggal Tiba</td>
                <td style="width: 198px; text-align: center;">Tanggal Berangkat/Keluar</td>
                <td style="width: 101px; text-align: center;">Etmal</td>
            </tr>
            <tr>
                <td style="text-align: center;"><?php echo date_indo($rows['tanggal_kedatangan']) ?></td>
                <td style="text-align: center;"><?php echo date_indo($rows['tanggal_keberangkatan']) ?></td>
                <td style="text-align: center;"><?php echo $rows['etmal'] ?></td>
            </tr>
        </tbody>
    </table>

    <br />
    <table style="height: 128px;" width="100%" id="table2" border="1" cellspacing="5" cellpadding="5">
        <tbody>
            <tr>
                <td style="width: 85px; text-align: center;"><strong>Jasa</strong></td>
                <td style="width: 85px; text-align: center;"><strong>GT/Panjang</strong></td>
                <td style="width: 86px; text-align: center;"><strong>Etmal</strong></td>
                <td style="width: 86px; text-align: center;"><strong>Tarif</strong></td>
                <td style="width: 86px; text-align: center;"><strong>Biaya</strong></td>
            </tr>
            <tr>
                <td style="width: 85px;">Tambat</td>
                <td style="width: 85px; text-align: center;"><?php echo $rows['gt'] ?> / <?php echo $rows['panjang'] ?></td>
                <td style="width: 86px; text-align: center;"><?php echo $rows['etmal'] ?></td>
                <td style="width: 86px; text-align: right;"><?php echo number_format($rows['tagihan']) ?></td>
                <td style="width: 86px; text-align: right;"><?php echo number_format($rows['total_tagihan']) ?></td>
            </tr>
            <tr>
                <td style="width: 85px;">Labuh</td>
                <td style="width: 85px;">&nbsp;</td>
                <td style="width: 86px;">&nbsp;</td>
                <td style="width: 86px;">&nbsp;</td>
                <td style="width: 86px;">&nbsp;</td>
            </tr>
            <tr>
                <td style="width: 85px; text-align: right;" colspan="4"><strong>Total</strong></td>
                <td style="width: 86px; text-align: right;"><?php echo number_format($rows['total_tagihan']) ?></td>
            </tr>
            <tr>
                <td style="width: 85px; text-align: left;" colspan="5"><strong>Terbilang : <?php echo ucwords(terbilang($rows['total_tagihan']))." Rupiah"; ?></strong>&nbsp;</td>
            </tr>
        </tbody>
    </table>

    <p style="text-indent:490px;">Kendari, <?php echo date_indo(date('Y-m-d')) ?></p>
    <p style="text-indent: 490px;">Petugas </p>
    <br /> 
    <p style="text-indent: 490px;"><?php echo $this->session->userdata('name') ?></p>

    <hr>
    <table style="height: 70px; width:100%;">
        <tbody>
            <tr>
                <td style="width: 100px;">&nbsp;</td>
                <td style="width: 227px;">&nbsp;</td>
                <td style="width: 49px;"><strong><?php echo $rows['kd_tambat'] ?></strong></td>
            </tr>
            <tr>
                <td>Pelabuhan Perikanan<br /> Samudera Kendari</td>
                <td style="width: 327px; text-align: center;"><strong><span style="text-decoration: underline;">NOTA JASA KEBERSIHAN PELABUHAN</span></strong></td>
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

    <br /><br />

    <table style="height: 29px; width: 100%;">
        <tbody>
            <tr>
                <td style="width: 85px;">Nama Kapal</td>
                <td>:</td>
                <td><?php echo $rows['nama_kapal'] ?></td>
                <td style="width: 20px;">GT</td>
                <td>:</td>
                <td><?php echo $rows['gt'] ?></td>
                <td style="width: 49px;">Panjang</td>
                <td>:</td>
                <td style="width: 50px;"><?php echo $rows['panjang'] ?></td>
            </tr>
        </tbody>
    </table>

    <br />
    <table style="height: 45px; width:100%;" id="table2" border="1" cellspacing="5" cellpadding="5">
        <tbody>
            <tr>
                <td style="width: 167px; text-align: center;">Tanggal Tiba</td>
                <td style="width: 198px; text-align: center;">Tanggal Berangkat/Keluar</td>
                <td style="width: 101px; text-align: center;">Etmal</td>
            </tr>
            <tr>
                <td style="text-align: center;"><?php echo date_indo($rows['tanggal_kedatangan']) ?></td>
                <td style="text-align: center;"><?php echo date_indo($rows['tanggal_keberangkatan']) ?></td>
                <td style="text-align: center;"><?php echo $rows['etmal'] ?></td>
            </tr>
        </tbody>
    </table>

    <br />
    <table style="height: 128px;" width="100%" id="table2" border="1" cellspacing="5" cellpadding="5">
        <tbody>
            <tr>
                <td style="width: 85px; text-align: center;"><strong>Jasa</strong></td>
                <td style="width: 85px; text-align: center;"><strong>GT/Panjang</strong></td>
                <td style="width: 86px; text-align: center;"><strong>Etmal</strong></td>
                <td style="width: 86px; text-align: center;"><strong>Tarif</strong></td>
                <td style="width: 86px; text-align: center;"><strong>Biaya</strong></td>
            </tr>
            <tr>
                <td style="width: 85px;">Tambat</td>
                <td style="width: 85px; text-align: center;"><?php echo $rows['gt'] ?> / <?php echo $rows['panjang'] ?></td>
                <td style="width: 86px; text-align: center;"><?php echo $rows['etmal'] ?></td>
                <td style="width: 86px; text-align: right;">500</td>
                <td style="width: 86px; text-align: right;"><?php echo number_format($rows['jasa_kebersihan']) ?></td>
            </tr>
            <tr>
                <td style="width: 85px;">Labuh</td>
                <td style="width: 85px;">&nbsp;</td>
                <td style="width: 86px;">&nbsp;</td>
                <td style="width: 86px;">&nbsp;</td>
                <td style="width: 86px;">&nbsp;</td>
            </tr>
            <tr>
                <td style="width: 85px; text-align: right;" colspan="4"><strong>Total</strong></td>
                <td style="width: 86px; text-align: right;"><?php echo number_format($rows['jasa_kebersihan']) ?></td>
            </tr>
            <tr>
                <td style="width: 85px; text-align: left;" colspan="5"><strong>Terbilang : <?php echo ucwords(terbilang($rows['jasa_kebersihan']))." Rupiah"; ?></strong>&nbsp;</td>
            </tr>
        </tbody>
    </table>

    <p style="text-indent:490px;">Kendari, <?php echo date_indo(date('Y-m-d')) ?></p>
    <p style="text-indent: 490px;">Petugas </p>
    <br /> 
    <p style="text-indent: 490px;"><?php echo $this->session->userdata('name') ?></p>

</body>

</html>