<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            font-size: 11.5px;
            margin-left: 40px;
            /* ระยะห่างจากขอบซ้าย */
            margin-right: 40px;
            /* ระยะห่างจากขอบขวา */
            font-size: 13px;
        }

        h3 {
            text-align: center;
            margin-top: 0;
        }

        .right {
            text-align: right;
        }

        .underline {
            text-decoration: underline;
            display: inline-block;
            width: auto;
        }

        .content-section {
            margin-bottom: 20px;
        }

        .content-section p {
            line-height: 2;
            margin: 0;
        }

        .signature-section {
            margin-top: 30px;
        }

        .signature-line {
            display: inline-block;
            width: 300px;
            border-bottom: 1px solid #000;
            margin-top: 20px;
        }

        .note {
            margin-top: 50px;
        }

        .note p {
            margin: 5px 0;
        }

        .officer-note {
            border: 1px solid #000;
            padding: 10px;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .officer-note-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 12px;
        }

        .dotted-line {
            border-bottom: 1px dotted #000;
            width: 100%;
            height: 20px;
            margin-bottom: 5px;
        }

        /* .flex-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        } */

        .flex-container {
            display: flex;
            justify-content: space-between;
            /* แยกคอลัมน์ซ้ายและขวาให้เว้นระยะเท่ากัน */
            align-items: flex-start;
            /* เริ่มที่ด้านบน */
            margin-top: 20px;
        }

        .column {
            width: 48%;
            /* ขนาดคอลัมน์ประมาณครึ่งหนึ่งของ container */
        }

        .column p {
            margin: 10px 0;
        }

        span.fullname {
            border-bottom: 1px dashed;
            padding-left: 5px;
            padding-right: 10px;
            color: blue;
        }

        span.age {
            border-bottom: 1px dashed;
            padding-left: 20px;
            padding-right: 20px;
            color: blue;
        }

        span.occupation {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 100px;
            color: blue;
        }

        span.house_no {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 100px;
            color: blue;
        }

        span.village_no {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 100px;
            color: blue;
        }

        span.alley {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 40px;
            color: blue;
        }

        span.road {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 50px;
            color: blue;
        }

        span.sub_district {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 50px;
            color: blue;
        }

        span.district {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 50px;
            color: blue;
        }

        span.province {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 80px;
            color: blue;
        }

        span.phone {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 150px;
            color: blue;
        }

        span.phone_2 {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 1px;
            color: blue;
        }

        span.submission {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 150px;
            color: blue;
        }

        span.document_count {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 10px;
            color: blue;
        }

        span.location {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 20px;
            color: blue;
        }

        span.day {
            border-bottom: 1px dashed;
            padding-left: 5px;
            padding-right: 5px;
            color: blue;
        }

        span.month {
            border-bottom: 1px dashed;
            padding-left: 5px;
            padding-right: 5px;
            color: blue;
        }

        span.year {
            border-bottom: 1px dashed;
            padding-left: 5px;
            padding-right: 5px;
            color: blue;
        }

        span.submission_name {
            border-bottom: 1px dashed;
            padding-left: 5px;
            padding-right: 5px;
            color: blue;
        }

    </style>
    <title>PDF Report</title>
</head>
<body>

    @php
    $thaiMonths = [
    1 => 'มกราคม',
    2 => 'กุมภาพันธ์',
    3 => 'มีนาคม',
    4 => 'เมษายน',
    5 => 'พฤษภาคม',
    6 => 'มิถุนายน',
    7 => 'กรกฎาคม',
    8 => 'สิงหาคม',
    9 => 'กันยายน',
    10 => 'ตุลาคม',
    11 => 'พฤศจิกายน',
    12 => 'ธันวาคม'
    ];

    // แปลงเป็นปีพุทธศักราช
    $thaiYear = $form->year + 543;

    // แปลงเดือนเป็นชื่อภาษาไทย
    $thaiMonth = $thaiMonths[$form->month];
    @endphp


    <div class="container">
        <h3>แบบฟอร์มขอโคมไฟฟ้าสาธารณะ</h3><br>

        <p class="right">เขียนที่ <span class="location">{{ $form->location }}</span></p>
        <p class="right">วันที่<span class="day">{{ $form->day }}</span>เดือน<span class="month">{{ $thaiMonth  }}</span>ปี<span class="year">{{ $thaiYear  }}</span></p>

        {{-- <p><b>เรื่อง</b><span class="submission_name">{{ $form->submission_name }}</span></p> --}}
        <p><b>เรื่อง</b>ขอโคมไฟฟ้าสาธารณะ</p>
        <p><b>เรียน</b> นายกเทศมนตรีเมืองต้นแบบ ๔.๐ </p><br>

        <p style="margin-left: 55px;">ข้าพเจ้า <span class="fullname">{{ $form->salutation }}{{ $form->fullname }}</span> อายุ <span class="age">{{ $form->age }}</span>ปี อาชีพ<span class="occupation">{{ $form->occupation }}</span></p>
        <p>อยู่บ้านเลขที่<span class="house_no">{{ $form->house_no }}</span>หมู่ที่<span class="village_no">{{ $form->village_no }}</span>ตรอก/ซอย<span class="alley">{{ $form->alley }}</span></p>
        <p>ถนน<span class="road">{{ $form->road }}</span>แขวง/ตำบล<span class="sub_district">{{ $form->sub_district }}</span>เขต/อำเภอ<span class="district">{{ $form->district }}</span></p>
        <p>จังหวัด<span class="province">{{ $form->province }}</span>หมายเลขโทรศัพท์<span class="phone">{{ $form->phone }}</span> </p>

        <p style="margin-left: 55px;">ได้รับความเดือดร้อน เนื่องจากในเวลากลางคืนไม่มีไฟฟ้าแสงสว่างทําให้การสัญจรไป -มา ของราษฎรเป็น</p>
        <p>ไปด้วยความยากลําบาก อีกทั้งยังมีอุบัติเหตุเกิดขึ้นบ่อยครั้ง</p>

        <p>เพื่อให้การสัญจรไปมาเป็นไปด้วยความสะดวกและสามารถลดการเกิดอุบัติเหตุลงได้ จึงขอความ
            อนุเคราะห์มายัง เทศบาลเมืองต้นแบบ ๔.๐ เพื่อขอโคมไฟฟ้าพร้อมอุปกรณ์ดําเนินการติดตั้งไฟฟ้าแสงสว่าง
            บริเวณดังกล่าว โดยเชื่อมต่อไฟฟ้ากับบ้าน<span class="fullname">{{ $form->salutation }}{{ $form->fullname }}</span>อยู่บ้านเลขที่<span class="house_no">{{ $form->house_no }}</span>หมู่ที่<span class="village_no">{{ $form->village_no }}</span>
            ตรอก/ซอย<span class="alley">{{ $form->alley }}</span>ถนน<span class="road">{{ $form->road }}</span>แขวง/ตำบล<span class="sub_district">{{ $form->sub_district }}</span>เขต/อำเภอ<span class="district">{{ $form->district }}
            จังหวัด<span class="province">{{ $form->province }}</span>
            </span>
        </p>

        <p style="margin-left: 55px; margin-top:20px;" >จึงเรียนมาเพื่อโปรดพิจารณาอนุเคราะห์</p>

        <table style="width: 100%; margin-top: 10px;">
            <tr>
                <!-- คอลัมน์ซ้าย -->
                <td style="width: 50%; vertical-align: top;">
                </td>

                <!-- คอลัมน์ขวา -->
                <td style="width: 50%; vertical-align: top; text-align: center;">
                    <p style="margin-top: 20px; margin-bottom:20px;">ขอแสดงความนับถือ</p>

                    <p>ลงชื่อ<span class="fullname">{{ $form->fullname }}</span>ผู้แจ้ง</p>
                    <p>(<span class="fullname">{{ $form->salutation }}{{ $form->fullname }}</span>)</p>
                    <p>หมายเลขโทรศัพท์<span class="phone_2">{{ $form->phone }}</span> </p>
                </td>
            </tr>
        </table>


    </div>

</body>


</html>
