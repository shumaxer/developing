<?php
echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign in &middot; Twitter Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="js/jquery/jqueryLast.js"></script>
    <script src="js/jquery/jquery_7_2_min.js"></script>
    <script src="js/jquery/jqueryForm.js"></script>
    <script src="js/jquery/jqustom.js"></script>
    <script type="text/javascript" src="js/javascript/wz_jsgraphics.js"></script>
    <script src="js/javascript/base.js"></script>

    <!-- Le styles -->
    <link href="docs/assets/css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="docs/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="docs/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="docs/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="docs/assets/ico/apple-touch-icon-57-precomposed.png">
</head>

<body >

<div id="msgObj" ></div>

<div class="container" id="container">';

//$json_data = array ('table':"NewTable1",'Polia'=>array("NewFileds0"=>array("int","utf8_general_ci","","false","0","AUTO_INCREMENT"),"NewFileds1"=>array("string","utf8_general_ci","","false","0","")));
//echo '<br>';
if(!empty($_POST['jsonArray']))
{ $obj = json_decode($_POST['jsonArray']);
  $count = count($obj);
    for($i=0; $i<$count; $i++)
    {
        echo $obj[$i]->num.' - '.$length = count($obj[$i]->poleName).'<br/>';

        for($j=0; $j<$length; $j++ )
        {
           echo '  -'.$obj[$i]->poleName[$j]->poleNames.'(';
            for($p=0; $p<8;$p++)
            {
                echo $obj[$i]->poleName[$j]->properties[$p].',';
            }
           echo')<br/>';
        }
    }
}

//$json_data = array('table'=>array('tableName1'=>array('pole1','pole2'),'tablename2'=>array('pole1','pole2')));
//$obj=json_decode($json_string);
$datajason = 0;
//$json = $datajason == 0 ? '{"table":}': $datajason;
 //$namepace->includeClass($include);
echo '

  <input type="hidden" value="" name="selectedЕable" id="selectedЕable"  >
  <input type="hidden" value="" name="selectedPole" id="selectedPole" >
<form method="POST" action="index.php" id="arrayJsonObj">
   <input type="hidden" value="" name="jsonArray" id="jsonArray" >
   <input type="text"  value=""  name="jsonMove" id="jsonMove" style="width:1000px;"/>
  <div id="viewDb" style="width: 100%;  margin: 0 auto; margin-left: -130px;">

<div  class="div-signin"  id="clearThisId">
    <div id="title" ><b>
    </b>
    </div>
    <div id="building" >
    <div id="closeBuilding"></div>
            <div onclick="addNewTable(\'addT\',\'addP\')" class="dropTable"><img src="img/ico/database.png" /><p>Создать таблицу</p></div>
            <div onclick="addNewPole(\'addP\')" class="dropPolia"><img src="img/ico/database-add.png" /><p>Создать поле</p></div>
    </div>
    <div id="propertiesTable">
        <div id="listTable" style="width: 250px;" >
            <div class="titleTable">
                <b>Список таблиц</b>
            </div>
            <div id="panel2" class="addT">

            </div>
        </div>
        <div id="listTable" style="width: 250px;" >
        <div class="titleTable">
                <b>Список полей</b>
            </div>
            <div id="panel2" class="addP">

            </div>
        </div>
        <div id="listTable" style="width: 487px;">
        <div class="titleTable">
                <b>Свойства поля</b>
        </div>
        <div id="blok">
            <table width="95%" border="0" style="margin: 10px;">
            <tr>
                <td>Тип:</td>
                <td>
                    <select name="typeOption" id="typeOption0" param="0" onchange="onSelect(this)">
                       <option value="none_0">---</option>
                        <option value="INT">INT</option>
                        <option value="VARCHAR">VARCHAR</option>
                        <option value="TEXT">TEXT</option>
                        <option value="DATE">DATE</option>
                        <optgroup label="NUMERIC">
                        <option value="TINYINT">TINYINT</option>
                        <option value="SMALLINT">SMALLINT</option>
                        <option value="MEDIUMINT">MEDIUMINT</option>
                        <option value="INT">INT</option>
                        <option value="BIGINT">BIGINT</option>
                        <option value="-">-</option>
                        <option value="DECIMAL">DECIMAL</option>
                        <option value="FLOAT">FLOAT</option>
                        <option value="DOUBLE">DOUBLE</option>
                        <option value="REAL">REAL</option>
                        <option value="-">-</option>
                        <option value="BIT">BIT</option>
                        <option value="BOOLEAN">BOOLEAN</option>
                        <option value="SERIAL">SERIAL</option>
                        </optgroup>
                        <optgroup label="DATE and TIME">
                        <option value="DATE">DATE</option>
                        <option value="DATETIME">DATETIME</option>
                        <option value="TIMESTAMP">TIMESTAMP</option>
                        <option value="TIME">TIME</option>
                        <option value="YEAR">YEAR</option>
                        </optgroup>
                        <optgroup label="STRING">
                        <option value="CHAR">CHAR</option>
                        <option value="VARCHAR">VARCHAR</option>
                        <option value="-">-</option>
                        <option value="TINYTEXT">TINYTEXT</option>
                        <option value="TEXT">TEXT</option>
                        <option value="MEDIUMTEXT">MEDIUMTEXT</option>
                        <option value="LONGTEXT">LONGTEXT</option>
                        <option value="-">-</option>
                        <option value="BINARY">BINARY</option>
                        <option value="VARBINARY">VARBINARY</option>
                        <option value="-">-</option>
                        <option value="TINYBLOB">TINYBLOB</option>
                        <option value="MEDIUMBLOB">MEDIUMBLOB</option>
                        <option value="BLOB">BLOB</option>
                        <option value="LONGBLOB">LONGBLOB</option>
                        <option value="-">-</option>
                        <option value="ENUM">ENUM</option>
                        <option value="SET">SET</option>
                        </optgroup>
                        <optgroup label="SPATIAL">
                        <option value="GEOMETRY">GEOMETRY</option>
                        <option value="POINT">POINT</option>
                        <option value="LINESTRING">LINESTRING</option>
                        <option value="POLYGON">POLYGON</option>
                        <option value="MULTIPOINT">MULTIPOINT</option>
                        <option value="MULTILINESTRING">MULTILINESTRING</option>
                        <option value="MULTIPOLYGON">MULTIPOLYGON</option>
                        <option value="GEOMETRYCOLLECTION">GEOMETRYCOLLECTION</option>
                        </optgroup>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Длина/значения:</td>
                <td>
                    <input type="text" name="length" id="typeOption1" param="1"   onkeyup="onInput(this)"/>
                    <script>
                        document.getElementById("typeOption1").onkeypress= function(event){
                         event= event || window.event;
                         if (event.charCode && (event.charCode < 48 || event.charCode > 57))// проверка на event.charCode - чтобы пользователь мог нажать backspace, enter, стрелочку назад...
                          return false;
                        };
                    </script>
                </td>
            </tr>
            <tr>
                <td>Сравнение :</td>
                <td>
                 <select name="typeOption" id="typeOption2" param="2" onchange="onSelect(this)">
                  <option value="">---</option>
                        <optgroup title="ARMSCII-8 Armenian" label="armscii8">
                        <option title="Армянский, Двоичный" value="armscii8_bin">armscii8_bin</option>
                        <option title="Армянский, регистронезависимый" value="armscii8_general_ci">armscii8_general_ci</option>
                        </optgroup>
                        <optgroup title="US ASCII" label="ascii">
                        <option title="Западно-Европейский (многоязычный), Двоичный" value="ascii_bin">ascii_bin</option>
                        <option title="Западно-Европейский (многоязычный), регистронезависимый" value="ascii_general_ci">ascii_general_ci</option>
                        </optgroup>
                        <optgroup title="Big5 Traditional Chinese" label="big5">
                        <option title="Китайский традиционный, Двоичный" value="big5_bin">big5_bin</option>
                        <option title="Китайский традиционный, регистронезависимый" value="big5_chinese_ci">big5_chinese_ci</option>
                        </optgroup>
                        <optgroup title="Binary pseudo charset" label="binary">
                        <option title="Двоичный" value="binary">binary</option>
                        </optgroup>
                        <optgroup title="Windows Central European" label="cp1250">
                        <option title="Центрально-Европейский (многоязычный), Двоичный" value="cp1250_bin">cp1250_bin</option>
                        <option title="Хорватский, регистронезависимый" value="cp1250_croatian_ci">cp1250_croatian_ci</option>
                        <option title="Чешский, регистрозависымый" value="cp1250_czech_cs">cp1250_czech_cs</option>
                        <option title="Центрально-Европейский (многоязычный), регистронезависимый" value="cp1250_general_ci">cp1250_general_ci</option>
                        <option title="Польский, регистронезависимый" value="cp1250_polish_ci">cp1250_polish_ci</option>
                        </optgroup>
                        <optgroup title="Windows Cyrillic" label="cp1251">
                        <option title="Кириллический (многоязычный), Двоичный" value="cp1251_bin">cp1251_bin</option>
                        <option title="Болгарский, регистронезависимый" value="cp1251_bulgarian_ci">cp1251_bulgarian_ci</option>
                        <option title="Кириллический (многоязычный), регистронезависимый" value="cp1251_general_ci">cp1251_general_ci</option>
                        <option title="Кириллический (многоязычный), регистрозависымый" value="cp1251_general_cs">cp1251_general_cs</option>
                        <option title="Украинский, регистронезависимый" value="cp1251_ukrainian_ci">cp1251_ukrainian_ci</option>
                        </optgroup>
                        <optgroup title="Windows Arabic" label="cp1256">
                        <option title="Арабский, Двоичный" value="cp1256_bin">cp1256_bin</option>
                        <option title="Арабский, регистронезависимый" value="cp1256_general_ci">cp1256_general_ci</option>
                        </optgroup>
                        <optgroup title="Windows Baltic" label="cp1257">
                        <option title="Балтийский (многоязычный), Двоичный" value="cp1257_bin">cp1257_bin</option>
                        <option title="Балтийский (многоязычный), регистронезависимый" value="cp1257_general_ci">cp1257_general_ci</option>
                        <option title="Литовский, регистронезависимый" value="cp1257_lithuanian_ci">cp1257_lithuanian_ci</option>
                        </optgroup>
                        <optgroup title="DOS West European" label="cp850">
                        <option title="Западно-Европейский (многоязычный), Двоичный" value="cp850_bin">cp850_bin</option>
                        <option title="Западно-Европейский (многоязычный), регистронезависимый" value="cp850_general_ci">cp850_general_ci</option>
                        </optgroup>
                        <optgroup title="DOS Central European" label="cp852">
                        <option title="Центрально-Европейский (многоязычный), Двоичный" value="cp852_bin">cp852_bin</option>
                        <option title="Центрально-Европейский (многоязычный), регистронезависимый" value="cp852_general_ci">cp852_general_ci</option>
                        </optgroup>
                        <optgroup title="DOS Russian" label="cp866">
                        <option title="Русский, Двоичный" value="cp866_bin">cp866_bin</option>
                        <option title="Русский, регистронезависимый" value="cp866_general_ci">cp866_general_ci</option>
                        </optgroup>
                        <optgroup title="SJIS for Windows Japanese" label="cp932">
                        <option title="Японский, Двоичный" value="cp932_bin">cp932_bin</option>
                        <option title="Японский, регистронезависимый" value="cp932_japanese_ci">cp932_japanese_ci</option>
                        </optgroup>
                        <optgroup title="DEC West European" label="dec8">
                        <option title="Западно-Европейский (многоязычный), Двоичный" value="dec8_bin">dec8_bin</option>
                        <option title="Шведский, регистронезависимый" value="dec8_swedish_ci">dec8_swedish_ci</option>
                        </optgroup>
                        <optgroup title="UJIS for Windows Japanese" label="eucjpms">
                        <option title="Японский, Двоичный" value="eucjpms_bin">eucjpms_bin</option>
                        <option title="Японский, регистронезависимый" value="eucjpms_japanese_ci">eucjpms_japanese_ci</option>
                        </optgroup>
                        <optgroup title="EUC-KR Korean" label="euckr">
                        <option title="Корейский, Двоичный" value="euckr_bin">euckr_bin</option>
                        <option title="Корейский, регистронезависимый" value="euckr_korean_ci">euckr_korean_ci</option>
                        </optgroup>
                        <optgroup title="GB2312 Simplified Chinese" label="gb2312">
                        <option title="Китайский упрощенный, Двоичный" value="gb2312_bin">gb2312_bin</option>
                        <option title="Китайский упрощенный, регистронезависимый" value="gb2312_chinese_ci">gb2312_chinese_ci</option>
                        </optgroup>
                        <optgroup title="GBK Simplified Chinese" label="gbk">
                        <option title="Китайский упрощенный, Двоичный" value="gbk_bin">gbk_bin</option>
                        <option title="Китайский упрощенный, регистронезависимый" value="gbk_chinese_ci">gbk_chinese_ci</option>
                        </optgroup>
                        <optgroup title="GEOSTD8 Georgian" label="geostd8">
                        <option title="Грузинский, Двоичный" value="geostd8_bin">geostd8_bin</option>
                        <option title="Грузинский, регистронезависимый" value="geostd8_general_ci">geostd8_general_ci</option>
                        </optgroup>
                        <optgroup title="ISO 8859-7 Greek" label="greek">
                        <option title="Греческий, Двоичный" value="greek_bin">greek_bin</option>
                        <option title="Греческий, регистронезависимый" value="greek_general_ci">greek_general_ci</option>
                        </optgroup>
                        <optgroup title="ISO 8859-8 Hebrew" label="hebrew">
                        <option title="Иврит, Двоичный" value="hebrew_bin">hebrew_bin</option>
                        <option title="Иврит, регистронезависимый" value="hebrew_general_ci">hebrew_general_ci</option>
                        </optgroup>
                        <optgroup title="HP West European" label="hp8">
                        <option title="Западно-Европейский (многоязычный), Двоичный" value="hp8_bin">hp8_bin</option>
                        <option title="Английский, регистронезависимый" value="hp8_english_ci">hp8_english_ci</option>
                        </optgroup>
                        <optgroup title="DOS Kamenicky Czech-Slovak" label="keybcs2">
                        <option title="Чехословацкий, Двоичный" value="keybcs2_bin">keybcs2_bin</option>
                        <option title="Чехословацкий, регистронезависимый" value="keybcs2_general_ci">keybcs2_general_ci</option>
                        </optgroup>
                        <optgroup title="KOI8-R Relcom Russian" label="koi8r">
                        <option title="Русский, Двоичный" value="koi8r_bin">koi8r_bin</option>
                        <option title="Русский, регистронезависимый" value="koi8r_general_ci">koi8r_general_ci</option>
                        </optgroup>
                        <optgroup title="KOI8-U Ukrainian" label="koi8u">
                        <option title="Украинский, Двоичный" value="koi8u_bin">koi8u_bin</option>
                        <option title="Украинский, регистронезависимый" value="koi8u_general_ci">koi8u_general_ci</option>
                        </optgroup>
                        <optgroup title="cp1252 West European" label="latin1">
                        <option title="Западно-Европейский (многоязычный), Двоичный" value="latin1_bin">latin1_bin</option>
                        <option title="Датский, регистронезависимый" value="latin1_danish_ci">latin1_danish_ci</option>
                        <option title="Западно-Европейский (многоязычный), регистронезависимый" value="latin1_general_ci">latin1_general_ci</option>
                        <option title="Западно-Европейский (многоязычный), регистрозависымый" value="latin1_general_cs">latin1_general_cs</option>
                        <option title="Немецкий (словарь), регистронезависимый" value="latin1_german1_ci">latin1_german1_ci</option>
                        <option title="Немецкий (телефонная книга), регистронезависимый" value="latin1_german2_ci">latin1_german2_ci</option>
                        <option title="Испанский, регистронезависимый" value="latin1_spanish_ci">latin1_spanish_ci</option>
                        <option title="Шведский, регистронезависимый" value="latin1_swedish_ci">latin1_swedish_ci</option>
                        </optgroup>
                        <optgroup title="ISO 8859-2 Central European" label="latin2">
                        <option title="Центрально-Европейский (многоязычный), Двоичный" value="latin2_bin">latin2_bin</option>
                        <option title="Хорватский, регистронезависимый" value="latin2_croatian_ci">latin2_croatian_ci</option>
                        <option title="Чешский, регистрозависымый" value="latin2_czech_cs">latin2_czech_cs</option>
                        <option title="Центрально-Европейский (многоязычный), регистронезависимый" value="latin2_general_ci">latin2_general_ci</option>
                        <option title="Венгерский, регистронезависимый" value="latin2_hungarian_ci">latin2_hungarian_ci</option>
                        </optgroup>
                        <optgroup title="ISO 8859-9 Turkish" label="latin5">
                        <option title="Турецкий, Двоичный" value="latin5_bin">latin5_bin</option>
                        <option title="Турецкий, регистронезависимый" value="latin5_turkish_ci">latin5_turkish_ci</option>
                        </optgroup>
                        <optgroup title="ISO 8859-13 Baltic" label="latin7">
                        <option title="Балтийский (многоязычный), Двоичный" value="latin7_bin">latin7_bin</option>
                        <option title="Эстонский, регистрозависымый" value="latin7_estonian_cs">latin7_estonian_cs</option>
                        <option title="Балтийский (многоязычный), регистронезависимый" value="latin7_general_ci">latin7_general_ci</option>
                        <option title="Балтийский (многоязычный), регистрозависымый" value="latin7_general_cs">latin7_general_cs</option>
                        </optgroup>
                        <optgroup title="Mac Central European" label="macce">
                        <option title="Центрально-Европейский (многоязычный), Двоичный" value="macce_bin">macce_bin</option>
                        <option title="Центрально-Европейский (многоязычный), регистронезависимый" value="macce_general_ci">macce_general_ci</option>
                        </optgroup>
                        <optgroup title="Mac West European" label="macroman">
                        <option title="Западно-Европейский (многоязычный), Двоичный" value="macroman_bin">macroman_bin</option>
                        <option title="Западно-Европейский (многоязычный), регистронезависимый" value="macroman_general_ci">macroman_general_ci</option>
                        </optgroup>
                        <optgroup title="Shift-JIS Japanese" label="sjis">
                        <option title="Японский, Двоичный" value="sjis_bin">sjis_bin</option>
                        <option title="Японский, регистронезависимый" value="sjis_japanese_ci">sjis_japanese_ci</option>
                        </optgroup>
                        <optgroup title="7bit Swedish" label="swe7">
                        <option title="Шведский, Двоичный" value="swe7_bin">swe7_bin</option>
                        <option title="Шведский, регистронезависимый" value="swe7_swedish_ci">swe7_swedish_ci</option>
                        </optgroup>
                        <optgroup title="TIS620 Thai" label="tis620">
                        <option title="Таи, Двоичный" value="tis620_bin">tis620_bin</option>
                        <option title="Таи, регистронезависимый" value="tis620_thai_ci">tis620_thai_ci</option>
                        </optgroup>
                        <optgroup title="UCS-2 Unicode" label="ucs2">
                        <option title="Юникод (многоязычный), Двоичный" value="ucs2_bin">ucs2_bin</option>
                        <option title="Чешский, регистронезависимый" value="ucs2_czech_ci">ucs2_czech_ci</option>
                        <option title="Датский, регистронезависимый" value="ucs2_danish_ci">ucs2_danish_ci</option>
                        <option title="Эсперанто, регистронезависимый" value="ucs2_esperanto_ci">ucs2_esperanto_ci</option>
                        <option title="Эстонский, регистронезависимый" value="ucs2_estonian_ci">ucs2_estonian_ci</option>
                        <option title="Юникод (многоязычный), регистронезависимый" value="ucs2_general_ci">ucs2_general_ci</option>
                        <option title="Юникод (многоязычный)" value="ucs2_general_mysql500_ci">ucs2_general_mysql500_ci</option>
                        <option title="Венгерский, регистронезависимый" value="ucs2_hungarian_ci">ucs2_hungarian_ci</option>
                        <option title="Исландский, регистронезависимый" value="ucs2_icelandic_ci">ucs2_icelandic_ci</option>
                        <option title="Латвийский, регистронезависимый" value="ucs2_latvian_ci">ucs2_latvian_ci</option>
                        <option title="Литовский, регистронезависимый" value="ucs2_lithuanian_ci">ucs2_lithuanian_ci</option>
                        <option title="Персидский, регистронезависимый" value="ucs2_persian_ci">ucs2_persian_ci</option>
                        <option title="Польский, регистронезависимый" value="ucs2_polish_ci">ucs2_polish_ci</option>
                        <option title="Западно-Европейский, регистронезависимый" value="ucs2_roman_ci">ucs2_roman_ci</option>
                        <option title="Румынский, регистронезависимый" value="ucs2_romanian_ci">ucs2_romanian_ci</option>
                        <option title="неизвестно, регистронезависимый" value="ucs2_sinhala_ci">ucs2_sinhala_ci</option>
                        <option title="Словацкий, регистронезависимый" value="ucs2_slovak_ci">ucs2_slovak_ci</option>
                        <option title="Словенский, регистронезависимый" value="ucs2_slovenian_ci">ucs2_slovenian_ci</option>
                        <option title="Испанский традиционный, регистронезависимый" value="ucs2_spanish2_ci">ucs2_spanish2_ci</option>
                        <option title="Испанский, регистронезависимый" value="ucs2_spanish_ci">ucs2_spanish_ci</option>
                        <option title="Шведский, регистронезависимый" value="ucs2_swedish_ci">ucs2_swedish_ci</option>
                        <option title="Турецкий, регистронезависимый" value="ucs2_turkish_ci">ucs2_turkish_ci</option>
                        <option title="Юникод (многоязычный), регистронезависимый" value="ucs2_unicode_ci">ucs2_unicode_ci</option>
                        </optgroup>
                        <optgroup title="EUC-JP Japanese" label="ujis">
                        <option title="Японский, Двоичный" value="ujis_bin">ujis_bin</option>
                        <option title="Японский, регистронезависимый" value="ujis_japanese_ci">ujis_japanese_ci</option>
                        </optgroup>
                        <optgroup title="UTF-16 Unicode" label="utf16">
                        <option title="неизвестно, Двоичный" value="utf16_bin">utf16_bin</option>
                        <option title="Чешский, регистронезависимый" value="utf16_czech_ci">utf16_czech_ci</option>
                        <option title="Датский, регистронезависимый" value="utf16_danish_ci">utf16_danish_ci</option>
                        <option title="Эсперанто, регистронезависимый" value="utf16_esperanto_ci">utf16_esperanto_ci</option>
                        <option title="Эстонский, регистронезависимый" value="utf16_estonian_ci">utf16_estonian_ci</option>
                        <option title="неизвестно, регистронезависимый" value="utf16_general_ci">utf16_general_ci</option>
                        <option title="Венгерский, регистронезависимый" value="utf16_hungarian_ci">utf16_hungarian_ci</option>
                        <option title="Исландский, регистронезависимый" value="utf16_icelandic_ci">utf16_icelandic_ci</option>
                        <option title="Латвийский, регистронезависимый" value="utf16_latvian_ci">utf16_latvian_ci</option>
                        <option title="Литовский, регистронезависимый" value="utf16_lithuanian_ci">utf16_lithuanian_ci</option>
                        <option title="Персидский, регистронезависимый" value="utf16_persian_ci">utf16_persian_ci</option>
                        <option title="Польский, регистронезависимый" value="utf16_polish_ci">utf16_polish_ci</option>
                        <option title="Западно-Европейский, регистронезависимый" value="utf16_roman_ci">utf16_roman_ci</option>
                        <option title="Румынский, регистронезависимый" value="utf16_romanian_ci">utf16_romanian_ci</option>
                        <option title="неизвестно, регистронезависимый" value="utf16_sinhala_ci">utf16_sinhala_ci</option>
                        <option title="Словацкий, регистронезависимый" value="utf16_slovak_ci">utf16_slovak_ci</option>
                        <option title="Словенский, регистронезависимый" value="utf16_slovenian_ci">utf16_slovenian_ci</option>
                        <option title="Испанский традиционный, регистронезависимый" value="utf16_spanish2_ci">utf16_spanish2_ci</option>
                        <option title="Испанский, регистронезависимый" value="utf16_spanish_ci">utf16_spanish_ci</option>
                        <option title="Шведский, регистронезависимый" value="utf16_swedish_ci">utf16_swedish_ci</option>
                        <option title="Турецкий, регистронезависимый" value="utf16_turkish_ci">utf16_turkish_ci</option>
                        <option title="Юникод (многоязычный), регистронезависимый" value="utf16_unicode_ci">utf16_unicode_ci</option>
                        </optgroup>
                        <optgroup title="UTF-32 Unicode" label="utf32">
                        <option title="неизвестно, Двоичный" value="utf32_bin">utf32_bin</option>
                        <option title="Чешский, регистронезависимый" value="utf32_czech_ci">utf32_czech_ci</option>
                        <option title="Датский, регистронезависимый" value="utf32_danish_ci">utf32_danish_ci</option>
                        <option title="Эсперанто, регистронезависимый" value="utf32_esperanto_ci">utf32_esperanto_ci</option>
                        <option title="Эстонский, регистронезависимый" value="utf32_estonian_ci">utf32_estonian_ci</option>
                        <option title="неизвестно, регистронезависимый" value="utf32_general_ci">utf32_general_ci</option>
                        <option title="Венгерский, регистронезависимый" value="utf32_hungarian_ci">utf32_hungarian_ci</option>
                        <option title="Исландский, регистронезависимый" value="utf32_icelandic_ci">utf32_icelandic_ci</option>
                        <option title="Латвийский, регистронезависимый" value="utf32_latvian_ci">utf32_latvian_ci</option>
                        <option title="Литовский, регистронезависимый" value="utf32_lithuanian_ci">utf32_lithuanian_ci</option>
                        <option title="Персидский, регистронезависимый" value="utf32_persian_ci">utf32_persian_ci</option>
                        <option title="Польский, регистронезависимый" value="utf32_polish_ci">utf32_polish_ci</option>
                        <option title="Западно-Европейский, регистронезависимый" value="utf32_roman_ci">utf32_roman_ci</option>
                        <option title="Румынский, регистронезависимый" value="utf32_romanian_ci">utf32_romanian_ci</option>
                        <option title="неизвестно, регистронезависимый" value="utf32_sinhala_ci">utf32_sinhala_ci</option>
                        <option title="Словацкий, регистронезависимый" value="utf32_slovak_ci">utf32_slovak_ci</option>
                        <option title="Словенский, регистронезависимый" value="utf32_slovenian_ci">utf32_slovenian_ci</option>
                        <option title="Испанский традиционный, регистронезависимый" value="utf32_spanish2_ci">utf32_spanish2_ci</option>
                        <option title="Испанский, регистронезависимый" value="utf32_spanish_ci">utf32_spanish_ci</option>
                        <option title="Шведский, регистронезависимый" value="utf32_swedish_ci">utf32_swedish_ci</option>
                        <option title="Турецкий, регистронезависимый" value="utf32_turkish_ci">utf32_turkish_ci</option>
                        <option title="Юникод (многоязычный), регистронезависимый" value="utf32_unicode_ci">utf32_unicode_ci</option>
                        </optgroup>
                        <optgroup title="UTF-8 Unicode" label="utf8">
                        <option title="Юникод (многоязычный), Двоичный" value="utf8_bin">utf8_bin</option>
                        <option title="Чешский, регистронезависимый" value="utf8_czech_ci">utf8_czech_ci</option>
                        <option title="Датский, регистронезависимый" value="utf8_danish_ci">utf8_danish_ci</option>
                        <option title="Эсперанто, регистронезависимый" value="utf8_esperanto_ci">utf8_esperanto_ci</option>
                        <option title="Эстонский, регистронезависимый" value="utf8_estonian_ci">utf8_estonian_ci</option>
                        <option title="Юникод (многоязычный), регистронезависимый" value="utf8_general_ci">utf8_general_ci</option>
                        <option title="Юникод (многоязычный)" value="utf8_general_mysql500_ci">utf8_general_mysql500_ci</option>
                        <option title="Венгерский, регистронезависимый" value="utf8_hungarian_ci">utf8_hungarian_ci</option>
                        <option title="Исландский, регистронезависимый" value="utf8_icelandic_ci">utf8_icelandic_ci</option>
                        <option title="Латвийский, регистронезависимый" value="utf8_latvian_ci">utf8_latvian_ci</option>
                        <option title="Литовский, регистронезависимый" value="utf8_lithuanian_ci">utf8_lithuanian_ci</option>
                        <option title="Персидский, регистронезависимый" value="utf8_persian_ci">utf8_persian_ci</option>
                        <option title="Польский, регистронезависимый" value="utf8_polish_ci">utf8_polish_ci</option>
                        <option title="Западно-Европейский, регистронезависимый" value="utf8_roman_ci">utf8_roman_ci</option>
                        <option title="Румынский, регистронезависимый" value="utf8_romanian_ci">utf8_romanian_ci</option>
                        <option title="неизвестно, регистронезависимый" value="utf8_sinhala_ci">utf8_sinhala_ci</option>
                        <option title="Словацкий, регистронезависимый" value="utf8_slovak_ci">utf8_slovak_ci</option>
                        <option title="Словенский, регистронезависимый" value="utf8_slovenian_ci">utf8_slovenian_ci</option>
                        <option title="Испанский традиционный, регистронезависимый" value="utf8_spanish2_ci">utf8_spanish2_ci</option>
                        <option title="Испанский, регистронезависимый" value="utf8_spanish_ci">utf8_spanish_ci</option>
                        <option title="Шведский, регистронезависимый" value="utf8_swedish_ci">utf8_swedish_ci</option>
                        <option title="Турецкий, регистронезависимый" value="utf8_turkish_ci">utf8_turkish_ci</option>
                        <option title="Юникод (многоязычный), регистронезависимый" value="utf8_unicode_ci">utf8_unicode_ci</option>
                        </optgroup>
                        <optgroup title="UTF-8 Unicode" label="utf8mb4">
                        <option title="неизвестно, Двоичный" value="utf8mb4_bin">utf8mb4_bin</option>
                        <option title="Чешский, регистронезависимый" value="utf8mb4_czech_ci">utf8mb4_czech_ci</option>
                        <option title="Датский, регистронезависимый" value="utf8mb4_danish_ci">utf8mb4_danish_ci</option>
                        <option title="Эсперанто, регистронезависимый" value="utf8mb4_esperanto_ci">utf8mb4_esperanto_ci</option>
                        <option title="Эстонский, регистронезависимый" value="utf8mb4_estonian_ci">utf8mb4_estonian_ci</option>
                        <option title="неизвестно, регистронезависимый" value="utf8mb4_general_ci">utf8mb4_general_ci</option>
                        <option title="Венгерский, регистронезависимый" value="utf8mb4_hungarian_ci">utf8mb4_hungarian_ci</option>
                        <option title="Исландский, регистронезависимый" value="utf8mb4_icelandic_ci">utf8mb4_icelandic_ci</option>
                        <option title="Латвийский, регистронезависимый" value="utf8mb4_latvian_ci">utf8mb4_latvian_ci</option>
                        <option title="Литовский, регистронезависимый" value="utf8mb4_lithuanian_ci">utf8mb4_lithuanian_ci</option>
                        <option title="Персидский, регистронезависимый" value="utf8mb4_persian_ci">utf8mb4_persian_ci</option>
                        <option title="Польский, регистронезависимый" value="utf8mb4_polish_ci">utf8mb4_polish_ci</option>
                        <option title="Западно-Европейский, регистронезависимый" value="utf8mb4_roman_ci">utf8mb4_roman_ci</option>
                        <option title="Румынский, регистронезависимый" value="utf8mb4_romanian_ci">utf8mb4_romanian_ci</option>
                        <option title="неизвестно, регистронезависимый" value="utf8mb4_sinhala_ci">utf8mb4_sinhala_ci</option>
                        <option title="Словацкий, регистронезависимый" value="utf8mb4_slovak_ci">utf8mb4_slovak_ci</option>
                        <option title="Словенский, регистронезависимый" value="utf8mb4_slovenian_ci">utf8mb4_slovenian_ci</option>
                        <option title="Испанский традиционный, регистронезависимый" value="utf8mb4_spanish2_ci">utf8mb4_spanish2_ci</option>
                        <option title="Испанский, регистронезависимый" value="utf8mb4_spanish_ci">utf8mb4_spanish_ci</option>
                        <option title="Шведский, регистронезависимый" value="utf8mb4_swedish_ci">utf8mb4_swedish_ci</option>
                        <option title="Турецкий, регистронезависимый" value="utf8mb4_turkish_ci">utf8mb4_turkish_ci</option>
                        <option title="Юникод (многоязычный), регистронезависимый" value="utf8mb4_unicode_ci">utf8mb4_unicode_ci</option>
            </optgroup>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Атрибуты:</td>
                <td>
                    <select name="typeOption" id="typeOption3" param="3" onchange="onSelect(this)">
                        <option selected="selected" value=""></option>
                        <option value="BINARY">BINARY</option>
                        <option value="UNSIGNED">UNSIGNED</option>
                        <option value="UNSIGNED ZEROFILL">UNSIGNED ZEROFILL</option>
                        <option value="on update CURRENT_TIMESTAMP">on update CURRENT_TIMESTAMP</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Null :</td>
                <td>
                    <input type="checkbox" name="nullYesNo" id="typeOption4" param="4" onclick="onCheckBox(this)"/>
                </td>
            </tr>
            <tr>
                <td>Индекс :</td>
                <td>
                    <select name="typeOption" id="typeOption5" param="5" onchange="onSelect(this)">
                        <option value="none_0">---</option>
                        <option title="Первичный" value="primary_0">PRIMARY</option>
                        <option title="Уникальный" value="unique_0">UNIQUE</option>
                        <option title="Индекс" value="index_0">INDEX</option>
                        <option title="Полнотекстовый" value="fulltext_0">FULLTEXT</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>AUTO_INCREMENT :</td>
                <td>
                    <input type="checkbox" name="AUTO_INCREMENT" id="typeOption6" param="6" onclick="onCheckBox(this)"/>
                </td>
            </tr>
            <tr>
                <td>Комментарии:</td>
                <td>
                    <input type="text" name="coments" id="typeOption7" param="7" onkeyup="onInput(this)"/>
                </td>
            </tr>
        </table>
        </div>
        </div>
<input id="san" class="btn btn-large btn-primary" type="button" value="Создать" name="send" onclick="developing()"  style="margin: 15px -7px 10px 0; float: right;">
</form>
    </div>

</div >

</div> <!-- /container -->
</div>
</body>
</html>

';
?>