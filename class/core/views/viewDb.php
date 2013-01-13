<?php
    echo '
    <div id="viewDb" style="width: 100%;  margin: 0 auto; margin-left: -130px;">
<div    " class="div-signin" >
    <div id="title" ><b>
    '.$_POST['nameDb'].'</b>
    </div>
    <div id="building" >
            <div style="width: 30px;  height: 30px; border: 1px solid #000000;" class="drop"></div>
    </div>
    <div id="propertiesTable">
        <div id="listTable" style="width: 250px;">
            <div class="titleTable">
                <b>Список таблиц</b>
            </div>

        </div>
        <div id="listTable" style="width: 250px;">
        <div class="titleTable">
                <b>Список полей</b>
            </div>
        </div>
        <div id="listTable" style="width: 487px;">
        <div class="titleTable">
                <b>Свойства поля</b>
            </div>
        </div>
    </div>
</div >
    ';
?>