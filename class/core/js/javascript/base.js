

var globalText = '',
    scroll = 0,
    alerts = [],
    coordArray = [],
    oldElement = null,
    oldElementPole = null;
var canvasObj =
                {
                    paint : [],
                    paintIsset : false,
                    clearLine : false,
                    startPosition : false,
                    popravkaX : 90,
                    starEditY :100,
                    starEditYsmal : 53,
                    scrollLast : 0,
                    initialCanvas : function()
                    {
                        return new jsGraphics("Canvas");
                    },
                    pushTable:function(numTable)
                    {
                        coordArray.push({numberTable : numTable, numbersPoles: [{numberPole : 0, type: '',coocrds : [0,0], connectTable : [], connectPole : []}]});
                        //jsonObj.viewJsonArrayInInput(JSON.stringify(coordArray ),'jsonMove');
                        coordArray[numTable].numbersPoles.splice(0,1);

                    },
                    pushPole : function(numTable,numPole,typePole,x,y)
                    {
                        coordArray[numTable].numbersPoles.push({numberPole:numPole, type:typePole,coocrds : [x, y], connectTable : [], connectPole : []});

                    },
                    addCoord : function(indexPole,indexTab)
                    {
                        if(this.startPosition == false && alerts[indexTab].poleName[indexPole].properties[5] == 'primary_0')
                        {
                            this.paint.push(coordArray[indexTab].numbersPoles[indexPole].coocrds[0],coordArray[indexTab].numbersPoles[indexPole].coocrds[1], indexTab, indexPole);
                            jsonObj.viewJsonArrayInInput(coordArray[indexTab].numbersPoles[indexPole].type,'selectedЕable');
                            this.startPosition = true;
                        }
                        else if(this.paint.length > 0){
                            coordArray[indexTab].numbersPoles[indexPole].connectTable.push(this.paint[2]);
                            coordArray[indexTab].numbersPoles[indexPole].connectPole.push(this.paint[3]);
                            coordArray[this.paint[2]].numbersPoles[this.paint[3]].connectTable.push(indexTab);
                            coordArray[this.paint[2]].numbersPoles[this.paint[3]].connectPole.push(indexPole);
                            this.startPosition = false;
                            this.theCanvase(this.paint[0],this.paint[1],coordArray[indexTab].numbersPoles[indexPole].coocrds[0],coordArray[indexTab].numbersPoles[indexPole].coocrds[1],'green',indexTab);
                            this.paint = [];
                            jsonObj.viewJsonArrayInInput(JSON.stringify(coordArray ),'jsonMove');
                        }
                    },

                    theCanvase : function(xl,yl,xr,yr,color,tIndex)
                    {
                        if(xl > xr)
                        {
                            xl = xl - this.starEditYsmal;
                            xr = xr + this.starEditY;
                        }
                        else
                        {
                            xl = xl + this.starEditY;
                            xr = xr - this.starEditYsmal;
                        }
//                        yl = this.checkheigth(this.paint[2],yl);
                        //yr = this.checkheigth(tIndex,yr);
                        //console.log(xl+' '+yl+' '+xr+' '+yr)
                        this.line(xl,yl,xr,yr,color);
                    },
                    forOn : function(numTable,i, color, boolParam)
                    {
                        var countConnect = coordArray[numTable].numbersPoles[i].connectTable.length;
                        if(countConnect > 0)
                        {
                            for(var j=0; j<countConnect; j++)
                            {
                                var table = coordArray[numTable].numbersPoles[i].connectTable[j],
                                    pole  = coordArray[numTable].numbersPoles[i].connectPole[j];
                                this.theCanvase(coordArray[table].numbersPoles[pole].coocrds[0],coordArray[table].numbersPoles[pole].coocrds[1],coordArray[numTable].numbersPoles[i].coocrds[0],coordArray[numTable].numbersPoles[i].coocrds[1],color,numTable);
                            }
                            this.clearLine = boolParam;
                        }
                    },
                    onStartMove : function(param)
                    {
                        if(this.clearLine == false)
                        {
                            var numTable = jsonObj.getIdnex(param),
                                count = coordArray[numTable].numbersPoles.length;
                            if(count > 0)
                            {
                                for(var i = 0; i<count; i++)
                                {
                                    this.forOn(numTable,i,'#ffffff',true);
                                }
                            }
                        }

                    },
                    positionScroll : function(classParam)
                    {
                        return $('.add'+classParam).scrollTop();
                    },
                    changeXY : function(numTable,x,y)
                    {
                        var count = coordArray[numTable].numbersPoles.length;
                        for(var i = 0; i< count; i ++)
                        {

                        }
                        coordArray[numTable].numbersPoles[i].coocrds[0] = x;
                        coordArray[numTable].numbersPoles[i].coocrds[1] = y;
                        this.forOn(numTable,i,'green',false);
                    },
                    onStopMove : function(param)
                    {
                           var numTable = jsonObj.getIdnex(param),
                               elem = $('.forHeigt'+numTable).offset(),
                               top = elem.top,
                               count = coordArray[numTable].numbersPoles.length,
                               scroll = this.positionScroll(numTable),
                               i = 0;
                               this.onStartMove(param);
//                        if($('.add'+numTable).height() < 200)
//                        {
                           for(var i = 0; i<count; i++)
                           {

                               top = top + 25;
                               //console.log($('add'+numTable).height());

                                   coordArray[numTable].numbersPoles[i].coocrds[0] = elem.left;
                                   coordArray[numTable].numbersPoles[i].coocrds[1] = top - this.popravkaX;
                                   this.forOn(numTable,i,'green',false);


                           }
                        if($('.add'+numTable).height() >= 200) this.onScroll(numTable);
//                        }
//                        else if($('.add'+numTable).height() >= 200)
//                               {
//                                   this.onStartMove(param);
//                                   if(this.scrollLast <= scroll)
//                                   {
//                                       for(i = 0; i<count; i++)
//                                       {
//                                           coordArray[numTable].numbersPoles[i].coocrds[1] = coordArray[numTable].numbersPoles[i].coocrds[1] - (scroll - this.scrollLast);
//                                           this.forOn(numTable,i,'green',false);
//                                       }
//                                       this.scrollLast = scroll;
//                                   }
//                                   if(this.scrollLast > scroll)
//                                   {
//                                       for(i = 0; i<count; i++)
//                                       {
//                                           coordArray[numTable].numbersPoles[i].coocrds[1] = coordArray[numTable].numbersPoles[i].coocrds[1] + (this.scrollLast - scroll);
//                                           this.forOn(numTable,i,'green',false);
//                                       }
//                                       this.scrollLast = scroll;
//
//                                   }
//
//                               }
//
//                        this.scrollLast = scroll;
                        jsonObj.viewJsonArrayInInput(JSON.stringify(coordArray ),'jsonMove');
                    },
                    onScroll : function(numTable)
                    {
//                        var index = param.getAttribute('param').substr(3.1);
//
                        //var numTable = numTables,
                        var count = coordArray[numTable].numbersPoles.length,
                            scroll = this.positionScroll(numTable),
                            i = 0,
                            param = 'forHeigt'+numTable;
                        this.onStartMove(param);
                        if(this.scrollLast <= scroll)
                        {
                            for(i = 0; i<count; i++)
                            {
                                coordArray[numTable].numbersPoles[i].coocrds[1] = coordArray[numTable].numbersPoles[i].coocrds[1] - (scroll - this.scrollLast);
                                this.forOn(numTable,i,'green',false);
                            }
                            this.scrollLast = scroll;
                        }
                        if(this.scrollLast > scroll)
                        {
                            for(i = 0; i<count; i++)
                            {
                                coordArray[numTable].numbersPoles[i].coocrds[1] = coordArray[numTable].numbersPoles[i].coocrds[1] + (this.scrollLast - scroll);
                                this.forOn(numTable,i,'green',false);
                            }
                            this.scrollLast = scroll;

                        }
                        jsonObj.viewJsonArrayInInput(JSON.stringify(coordArray ),'jsonMove');
                    },
                    clearArray : function()
                    {
                        //this.coordArray = [];
                    },
                    line : function(lx,ly,rx,ry,color)
                    {

                        var canvas = this.initialCanvas();
                        canvas.setColor(color);
                        canvas.drawLine(lx,ly,rx,ry);
                        canvas.paint();
                    }
                };
var APIObj =
            {
                minHeight : 200,

                oldSelectElement : function(data)
                {
                    return data;
                },
                APICanvas : function(IdElement, OldElement)
                {
                    var oldElement = OldElement,
                        idElement = IdElement;
                    if(oldElement == null || oldElement != idElement)
                        {
                            //alert(idElement);
                            $('#'+idElement).css('background','#DDDDDD');
                            $('#'+oldElement).css('background','none');
                        }

                },
                APIbackgroundTable : function()
                {
                    var idElement = jsonObj.getTableIndex();
                    this.APICanvas(idElement, oldElement);
                    oldElement = idElement;
                },
                APIbackgroundPole : function()
                {
                    var idElement = jsonObj.getPoleIndex();
                    //alert(oldElementPole);
                    oldElementPole = oldElementPole == idElement ? null : oldElementPole;
                    this.APICanvas(idElement, oldElementPole);
                    oldElementPole = idElement;
                },
                onHeight : function(addCalass)
                {
                  return    $(addCalass).height() >= this.minHeight ? true : false;
                },
                ShowHideTable : function(index)
                {
                    var addCalass = '.add'+index,
                        heigths   = '.forHeigt'+index,
                        img       = '#OpenClose'+index;
                    if($(img).attr('src') == 'img/ico/marquee-download.png')
                    {
                        $(addCalass).show();
                        if(this.onHeight(addCalass))
                        {
                            $(addCalass).height(this.minHeight);
                            $(heigths).height(this.minHeight+28);
                        }
                        if(!this.onHeight(addCalass))
                        {
                            $(addCalass).css('overflow-y','hidden');
                            $(heigths).height($(addCalass).height()+30);
                        }
                        $(img).attr('src','img/ico/marquee-upload.png');
                    }
                    else
                    {
                        $(addCalass).hide();
                        $(heigths).height(26);
                        $(img).attr('src','img/ico/marquee-download.png');
                    }
                },
                APIViewTable : function(index)
                {
                    this.ShowHideTable(index);
                }

            };
var msgObj =
            {
                className:'viewText',
                
//                
                viewMsg : function(textMsg)
                {
                    
                    $('#msgObj').show();
                    $('#msgObj').append($('<p class="viewText" style="opacity: 0.8;"><span>' +textMsg+ '</span></p></div>'));
                    //this.textColor(typeMsg);
                    this.time();
                },
                msgClose: function(i)
                {
                    $('#msgObj').empty();
                    $('#msgObj'+i).hide();
                },
                time : function()
                {
                  setTimeout((this.msgClose), 3000);  
                }
            };
var jsonObj =
            {
                defaultNamePole: "NewFaild0",
                defaultNameTable: "NewTable0",
                selectElement: function(idName){return $('#'+idName).val();},
                getTableIndex: function(){return this.selectElement('selectedЕable');},
                getPoleIndex : function(){return this.selectElement('selectedPole')},
                getIdnex     : function(data){return data.substr(8,(data.length-8))},
                getNameItem  : function(target)
                    {
                        var name;
                        switch (target)
                        {
                            case 'addT':  name = 'NewTable'; break;
                            case 'addP':  name = 'NewFaild'; break;
                            default : name = 'Произошла ошибка, невозможно создать новый элемент';
                            break;
                        }
                        //alert(name);
                        return name+this.getCountItem(target);
                    },
                getCountItem : function(target)
                    {
                        return $("."+target+" > div").length;
                    },
                viewJsonArrayInInput: function(data,id)
                {
                    $('#'+id).val(data);
                },
                addToJsonArray : function(tableName, poleName)
                {
                    alerts.push({num : tableName, poleName:[{poleNames:poleName, properties:['','','','',false,'',false,'']}]});
                    //var arr = JSON.parse( JSON.stringify( alerts ));
                    this.viewJsonArrayInInput(JSON.stringify( alerts ),'jsonArray');
                    return this.selectElement('jsonArray').length > 0 ? true : false;
                },
                viewJsonArray: function(selectElement)
                {
                    //alert(this.getTableIndex());
                    var countElement =  this.getIdnex(this.getTableIndex()),
                    i = 0;
                   // alert(countElement);
                    if(countElement != undefined)
                        {
                            switch (selectElement)
                            {
                                case 'addT':
                                {
                                    var count = alerts.length;
                                    //alert(count);
                                    $('.'+selectElement).empty();
                                    while(i < count)
                                    {
                                        $('.'+selectElement).append($('<div id="allItem"><div ondblclick="rename(this)" onclick="clickInTable(this)" class="addTable" id="' + this.getNameItem(selectElement)+ '" param="' +this.getNameItem(selectElement) +  '" ><img src="img/ico/database-litl.png"/><p>' +alerts[i].num+ '</p></div><div id="delIndex" param="' +i+  '" onclick="DelTable(this)" ></div></div>'));
                                        i++;
                                    }
                                    break;
                                }
                                case 'addP':
                                {
                                    var count = alerts[countElement].poleName.length
                                    $('.'+selectElement).empty();
                                    while(i < count)
                                    {
                                        $('.'+selectElement).append($('<div id="allItem"><div onclick="selectPole(this)" ondblclick="rename(this)"  class="addTable" id="' + this.getNameItem(selectElement)+'" param="' + this.getNameItem(selectElement)+ '" ><img src="img/ico/tag-3.png"/><p>' +alerts[countElement].poleName[i].poleNames+'</p></div><div id="delIndex" param="'+countElement+'/'+i+  '" onclick="DelPole(this)" ></div></div>'));
                                        i++;
                                    }
                                    break;
                                }
                            }
                        }
                    
                },
                viewAllTable : function()
                {
                    $('#clearThisId').empty();
                    $('#clearThisId').append('<div id="title" ><b> Дизайнер связей таблиц</b></div><div id="scrollPanel"  onclick="stopCanvas()"><div id="Canvas" style="position:relative;height:5px;width:5px;"></div></div></div> ');
                    var i = 0,
                        count = alerts.length;
                        while(i < count)
                        {
                            canvasObj.pushTable(i);
                            $('#scrollPanel').append('<div  id="listTable" style="width: 150px;" class="forHeigt'+i+'"><img onmousedown="testMuve(this)" onmouseup="saveCoord(this)" param="forHeigt'+i+'" src="img/ico/expand-3.png" style="float:left; margin: 5px; cursor: move;" /><div class="titleTable"><b>'+alerts[i].num+'</b> <img id="OpenClose'+i+'" src="img/ico/marquee-download.png" param="'+i+'"  onclick="openPole(this)"/></div><div id="panelForTable"  onscroll="returnScroll(this)"  class="add'+i+'" param="add'+i+'"> </div></div>');
                                var j = 0,
                                countPole = alerts[i].poleName.length,
                                elem = $('.forHeigt'+i).offset(),
                                top = elem.top;
                                while(j < countPole)
                                {
                                    if(alerts[i].poleName[j].properties[5] == 'primary_0')
                                    {
                                        $('.add'+i).append('<div id="allItem"><div class="addTable" onclick="goCanvas(this)" id="namePole'+j+'" param="'+j+'/'+i+'"><img src="img/ico/tag-3.png"/><p>' +alerts[i].poleName[j].poleNames+'</p><img id="primaryKeyImg" style="float: right;" src="img/ico/key.png"    param="'+alerts[i].poleName[j].properties[0]+'/'+j+'/'+i+'"/></div></div>');
                                        //$('.add'+i).append('<div class="addTable" style="border-bottom: 1px dotted #0088CC;"><p>' +alerts[i].poleName[j].poleNames+'</p><img id="primaryKeyImg" src="img/ico/key.png"   onclick="startCanvas(this)"  param="'+alerts[i].poleName[j].properties[0]+'"/></div>');
                                    }
                                    else
                                    {
                                        $('.add'+i).append('<div id="allItem"><div class="addTable" onclick="goCanvas(this)" id="namePole'+j+'" param="'+j+'/'+i+'"><img src="img/ico/tag-3.png"/><p>' +alerts[i].poleName[j].poleNames+'</p></div></div>');
                                        //$('.add'+i).append('<div class="addTable" onclick="goCanvas(this)" id="namePole'+j+'" param="'+alerts[i].poleName[j].properties[0]+'/'+j+'" style="border-bottom: 1px dotted #0088CC;"><p>' +alerts[i].poleName[j].poleNames+'</p></div>');
                                    }
                                    var left = elem.left;
                                        top = top + 25;
                                    canvasObj.pushPole(i,j,alerts[i].poleName[j].properties[0],left,top);
                                    canvasObj.onStopMove('forHeigt'+i);
                                    j++;
                                }
                            $('.forHeigt'+i).height(26);
                            i++;
                        }
                    this.viewJsonArrayInInput(JSON.stringify(coordArray ),'jsonMove');
                },
                clearBlock: function()
                {
                    document.getElementById('typeOption0').selectedIndex = 0;
                    document.getElementById('typeOption2').selectedIndex = 0;
                    document.getElementById('typeOption3').selectedIndex = 0;
                    document.getElementById('typeOption5').selectedIndex = 0;
                    $('#typeOption1').val('');
                    //$('#typeOption4').checked();
                    $('#typeOption6').val('');
                    //$('#typeOption7').checked();;
                    $('#typeOption4').prop('checked', false);
                    $('#typeOption6').prop('checked', false);
                },
                openBlock: function(data)
                {
                    if($('#'+data).hide()) $('#'+data).show();
                },
                checkIsset : function(data)
                {
                    var count = alerts.length,
                        result = false;
                    for(var i=0; i< count; i++)
                    {
                        if(alerts[i].num == data) result = true;
                    }
                    return result;
                },
                addTable : function(idIventTable, idIventPole)
                {
                    var nameTable;
                    var msgText;
                    if(this.checkIsset(this.getNameItem(idIventTable)) == false)
                        {
                            nameTable = this.getNameItem(idIventTable);
                        }
                        else
                            {
                                nameTable = this.getNameItem(idIventTable)+'Copy';
                                msgText = 'Такая таблица уже существует, поэтому она была переименована в -'+nameTable+' !';
                            }
                    //var nameTable = this.checkIsset(this.getNameItem(idIventTable)) == false ? this.getNameItem(idIventTable) : this.getNameItem(idIventTable)+'Copy',
                    var  namePole = this.defaultNamePole;
                    if(nameTable.length != 0 && namePole.length != 0)
                    {
                       if(this.addToJsonArray(nameTable,namePole) == true)
                       {
                           this.viewJsonArrayInInput(this.getNameItem(idIventTable),'selectedЕable');
                           this.viewJsonArrayInInput(namePole,'selectedPole');
                           this.viewJsonArray(idIventTable);
                           $(".addP").empty();
                           this.viewJsonArray(idIventPole);
                           this.openBlock('blok');
                           this.clearBlock();
                           msgText = msgText != undefined ? msgText + 'Таблица -'+nameTable+'- успешно додана' : 'Таблица -'+nameTable+'- успешно додана';

                           //msgObj.viewMsg('Таблица -'+nameTable+'- успешно додана', 1);
                       }
                       else
                           {
                               msgText = 'Произошла ошибка -'+nameTable+'- небыла додана';
                           }
                    }
                    $('.dropPolia').show();
                    msgObj.viewMsg(msgText);
                    APIObj.APIbackgroundTable();
                    APIObj.APIbackgroundPole();
                },
                onSelectTable : function(renameId)
                {
                    this.clearBlock();
                    var index = renameId.getAttribute('param');
                    this.viewJsonArrayInInput(index,'selectedЕable');
                    this.viewJsonArrayInInput(this.defaultNamePole,'selectedPole');
                    this.viewJsonArray('addP');
                    this.viewsOptions();
                    APIObj.APIbackgroundPole();

                },
                onSelectPole : function(renameId)
                {
                    this.clearBlock();
                    var index = renameId.getAttribute('param');
                    if($('#inputStyle').val() == undefined) this.viewJsonArrayInInput(index,'selectedPole');
                    this.viewsOptions();
                },
                viewsOptions : function()
                {
                    var indexTable = this.getIdnex(this.getTableIndex()),
                        indexPole = this.getIdnex(this.getPoleIndex());

                    document.getElementById('typeOption0').options[0].value = alerts[indexTable].poleName[indexPole].properties[0];
                    document.getElementById('typeOption0').options[0].text = alerts[indexTable].poleName[indexPole].properties[0];

                    document.getElementById('typeOption2').options[0].value = alerts[indexTable].poleName[indexPole].properties[2];
                    document.getElementById('typeOption2').options[0].text = alerts[indexTable].poleName[indexPole].properties[2];

                    document.getElementById('typeOption3').options[0].value = alerts[indexTable].poleName[indexPole].properties[3];
                    document.getElementById('typeOption3').options[0].text = alerts[indexTable].poleName[indexPole].properties[3];

                    document.getElementById('typeOption5').options[0].value = alerts[indexTable].poleName[indexPole].properties[5];
                    document.getElementById('typeOption5').options[0].text = alerts[indexTable].poleName[indexPole].properties[5];

                    $('#typeOption1').val(alerts[indexTable].poleName[indexPole].properties[1]);
                    //    $('#typeOption4').val(alerts[indexTable].poleName[position].properties[4]);
                    $('#typeOption7').val(alerts[indexTable].poleName[indexPole].properties[7]);
                    //    $('#typeOption4').val(alerts[indexTable].poleName[position].properties[4]);
                    //alert(alerts[indexTable].poleName[indexPole].properties[4]);
                    $('#typeOption4').prop('checked', alerts[indexTable].poleName[indexPole].properties[4]);
                    $('#typeOption6').prop('checked', alerts[indexTable].poleName[indexPole].properties[6]);
                },
                addPole : function(idIvent)
                {
                    this.clearBlock();
                    var msgText;
                    var namePole = this.getNameItem(idIvent),
                        indexTable = this.getIdnex(this.getTableIndex());
                        //alert(indexTable);
                    if(indexTable != '')
                        {
                             if(this.checkIssetPole(namePole) == false)
                             {
                                 msgText = 'Поле -'+namePole+'- успешно додано к таблице '+ $('#'+jsonObj.selectElement('selectedЕable')).text();
                             }
                             else
                             {
                                 namePole = namePole+'Copy';
                                 msgText = 'Поле уже существует поэтому оно переименовано в -'+namePole;
                             }
                             namePole = this.checkIssetPole(namePole) == false ? namePole : namePole+'Copy';
                             alerts[indexTable].poleName.push({poleNames:namePole, properties:['','','','',false,'',false,'']});
                             this.viewJsonArrayInInput(JSON.stringify( alerts ),'jsonArray');
                             this.viewJsonArrayInInput(this.getNameItem(idIvent),'selectedPole');
                             this.viewJsonArray(idIvent);
                            $("#blok").show();
                             msgObj.viewMsg(msgText);
                             APIObj.APIbackgroundPole();
                            this.viewsOptions();
                        }
                    
                },
                checkIssetPole : function(data)
                {
                    var indexTable = this.getIdnex(this.getTableIndex()),
                        test = false,
                        count = alerts[indexTable].poleName.length;
                    for(var i = 0;i < count;i++)
                    {
                        if(alerts[indexTable].poleName[i].poleNames == data) test = true;
                    }
                    return test;
                },
                rename : function(renameId)
                {
                    var index = renameId.getAttribute('param');
                        globalText = $('#'+index).text();
                    $('#closeBuilding').show();
                    $('#'+index).empty();
                    $('#'+index).append($('<input type="text"  param="'+index+'" onblur="renameFinish(this,globalText)" name="renameInput"  id="inputStyle" style="outline: none;"/>'));
                    $('#inputStyle').val(globalText);
                },
                renameTable : function()
                {
                    var renameText = $("#inputStyle").val();
                    var msgText;
                    if(this.checkIsset(renameText) == false)
                    {
                        var numberItem = this.getIdnex(this.getTableIndex());
                        alerts[numberItem].num = renameText.length != 0  ? renameText :  alerts[numberItem].num;
                        msgText = renameText.length != 0 ? 'Таблица -'+alerts[numberItem].num+'- успешно переименована в -'+renameText : ' Имя таблици небыло задано!';
                    }
                    else
                        {
                            msgText = 'Такое имя уже существует!';
                        }
                    msgObj.viewMsg(msgText);    
                },
                renamePole : function()
                {
                    var renameText = $("#inputStyle").val(),
                        result = this.getIdnex(this.getTableIndex()),
                        msgText;
                        //count = alerts[result].poleName.length;
                    if(this.checkIssetPole(renameText) == false)
                    {
                        var position = this.getIdnex(this.getPoleIndex());
                        alerts[result].poleName[position].poleNames =  renameText.length != 0  ? renameText : alerts[result].poleName[position].poleNames;
                        msgText = renameText.length != 0  ? 'Поле -'+alerts[result].poleName[position].poleNames+'- успешно переименовано в -'+renameText : 'Имя поля не задано!';
                    }
                    else
                        {
                            msgText = 'Такое поле уже существует!';
                        }
                   msgObj.viewMsg(msgText);     
                },
                returnParam : function(data)
                {
                    return chack = data.substr(0,8) == 'NewTable' ? 'num' : 'poleName';
                },
                renameFinish : function(renameId)
                {
                    var index = renameId.getAttribute('param');
                    switch (this.returnParam(index))
                    {
                        case 'num':
                        {
                            this.renameTable();
                            this.viewJsonArray('addT');
                            break;
                        }
                        case 'poleName':
                        {
                            this.renamePole();
                            this.viewJsonArray('addP');
                            break;
                        }

                    }
                    this.viewJsonArrayInInput(JSON.stringify( alerts ),'jsonArray');
                    $('#closeBuilding').hide();
                },
                onSelect : function(idInput)
                {
                    var index = idInput.getAttribute('param');
                    var select = document.getElementById("typeOption"+index);
                    var value = select.options[select.selectedIndex].value;
                    this.editPoles(value,index);
                },

                onInput : function(idInput)
                {
                    var index = idInput.getAttribute('param');
                    //alert(index);

                    var text = $('#typeOption'+index).val();
                    this.editPoles(text,index);

                },
                onCheckBox : function(idInput)
                {
                    var index = idInput.getAttribute('param');
                    var test = $('#typeOption'+index).prop("checked");
                    this.editPoles(test,index);
                },
                editPoles : function(value,index)
                {
                    var indexTable = this.getIdnex(this.getTableIndex());
                    var position =  this.getIdnex(this.getPoleIndex());
                    alerts[indexTable].poleName[position].properties[index] = value;
                    this.viewJsonArrayInInput(JSON.stringify( alerts ),'jsonArray');
                },
                deletTable : function(index)
                {
                    alerts.splice(index,1);
                    if(alerts.length != 0)
                        {
                            this.viewJsonArrayInInput(this.defaultNameTable,'selectedЕable');
                            this.viewJsonArrayInInput(this.defaultNamePole,'selectedPole');
                            this.viewJsonArrayInInput(JSON.stringify( alerts ),'jsonArray');
                            this.viewJsonArray('addT');
                            this.viewJsonArray('addP');
                        }
                    else
                    {
                            this.viewJsonArrayInInput(JSON.stringify( alerts ),'jsonArray');
                            this.viewJsonArrayInInput('','selectedЕable');
                            this.viewJsonArrayInInput('','selectedPole');
                            $('.addT').empty();
                            $('.addP').empty();
                            $('#blok').css('display', 'none');
                            $('.dropPolia').hide();
                    }
                    if($('#closeBuilding').show()) $('#closeBuilding').hide();


                },
                deletePole : function(tableIndex, poleIndex)
               {
                   alerts[tableIndex].poleName.splice(poleIndex,1);
                   this.viewJsonArrayInInput(JSON.stringify( alerts ),'jsonArray');
                   this.viewJsonArray('addP');
                   if(alerts[tableIndex].poleName == 0)$('#blok').css('display','none');
                   if($('#closeBuilding').show()) $('#closeBuilding').hide();
               }
            };

function testCanvas()
{
    //canvasObj.line();
}
// добавление новой таблици с настройками по умолчанию
function addNewTable(idIventTanle, idIventPole)
{
    jsonObj.addTable(idIventTanle,idIventPole);
}
// создает имя таблици или поля


// додает и выводит список свойств к конкретной таблице
function clickInTable(renameId)
{
   jsonObj.onSelectTable(renameId);
   APIObj.APIbackgroundTable();

}

// отправка формы с последующиее ее очисткой
function sendFormCreat(nameForm, clearDiv)
{
       // alert(nameForm+' '+clearDiv);
         $('#'+nameForm).ajaxForm( {
             target: '#container',
             success: function() {
                 $('#'+clearDiv).slideUp('fast');
                 //alert(JSON.stringify( alerts ));
             }
         });

}



// очистка и отрисовка ифы после удачной отправки
function onAjaxSuccess(data)
{
    $("#content").empty();
    $("#content").append(data);
    // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
    //alert(data);
}

function muveDiv(target)
{
    muve(target);
}

function selectPole(renameId)
{
    jsonObj.onSelectPole(renameId);
    APIObj.APIbackgroundPole();

}




// добавление нового поля
function addNewPole(idIvent)
{

    jsonObj.addPole(idIvent);
}



function rename(renameId)
{

    jsonObj.rename(renameId);
}


function renameFinish(renameId)
{


jsonObj.renameFinish(renameId);
}
function addInputTable(inputClass,param)
{
   var text = $('.'+inputClass).val() == '' ? param : ','+param;
   $('.'+inputClass).val(text);
}

function onSelect(idInput)
{

    jsonObj.onSelect(idInput);
}

function onInput(idInput)
{
    jsonObj.onInput(idInput);
}
function onCheckBox(idInput)
{
    jsonObj.onCheckBox(idInput);
}
function DelTable(renameId)
{
    var index = renameId.getAttribute('param');
   jsonObj.deletTable(index);
}
function DelPole(renameId)
{
    var index = renameId.getAttribute('param'),
        split = index.split('/');
        jsonObj.deletePole(split[0], split[1]);
}
function alertCoord(elemId)
{
    var index = elemId.getAttribute('param'),
        elem = $('#'+index).offset();
        canvasObj.addCoord(elem.left,elem.top);

}
function developing()
{
    jsonObj.viewAllTable();

}
//$(document).ready(function() {
//    $('.forHeigth0').draggable({
//
//    });
//});

function saveCoord(classMuve)
{
    var index = classMuve.getAttribute('param');
    canvasObj.onStopMove(index);
}
function testMuve(classMuve)
{
    var index = classMuve.getAttribute('param');
    $('.'+index).draggable(
        {
            start : canvasObj.onStartMove(index)
            //drop : canvasObj.onStopMove(index)
        }
    );
}
function openPole(classOpen)
{
    var index = classOpen.getAttribute('param');
    APIObj.APIViewTable(index);
}
function startCanvas(typeParam)
{
    var index = typeParam.getAttribute('param'),
        split = index.split('/'),
        elem = $('#primaryKeyImg').offset();
    canvasObj.addCoord(split[2],split[1],split[0],(elem.left)-50,(elem.top)-130);
    //alert(canvasObj.coordArray[0]+' '+canvasObj.coordArray[1]);
}
function goCanvas(typeParam)
{
    var index = typeParam.getAttribute('param'),
        split = index.split('/');
        //elem = $('#namePole'+split[1]).offset();
    canvasObj.addCoord(split[0],split[1]);
}
function stopCanvas()
{
    canvasObj.clearArray();
}
function testtscroll()
{
    //alert($('.add0').get(0).);
}
function returnScroll(param)
{
    var  index = param.getAttribute('param').substr(3.1);
    //alert(index);
    //console.log($('.'+index).scrollTop());
   //
//    canvasObj.onStopMove(index);
    canvasObj.onScroll(index);
}