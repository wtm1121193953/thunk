/**
 * Created by user on 2019/3/10.
 */

function GetQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r != null)return decodeURI(r[2]);
    return null;
}
var id = GetQueryString("id");
console.log(id);
//index/index/result_edit


// 缓存
var setSelectCache = {}

// 渲染选择结果
function setResultAppendFn(obj){
    console.log(obj)
    var obj = obj?obj:{};
    var $this = obj.$this?obj.$this:null;
    var arr = obj.arr?obj.arr:[];
    var dataSelect = obj.dataSelect?obj.dataSelect:'';
    var elStr = '';
    var $result = $this.closest(".setSelect-container").find(".setSelect-result");
    for(var i=0;i<arr.length;i++){
        var item = arr[i];
        if($result.find('[data-select="'+item["dataSelect"]+'"][data-key="'+item["dataKey"]+'"][data-value="'+item["dataValue"]+'"]').length)continue;
        elStr += '\
                <li class="setSelect-result-item">\
                    <span class="setSelect-result-del" data-select="'+item["dataSelect"]+'" data-key="'+item["dataKey"]+'" data-value="'+item["dataValue"]+'">x</span>\
                    '+item["dataValue"]+'\
                </li>\
            ';
    }
    $result.append(elStr);
}

// 设置事件
function setEventsFn(){
    $(".setSelect").on("change",function(){
        var $this = $(this);
        var $container = $this.closest(".setSelect-container");
        var $name = $container.find(".setSelect-hidden");
        var dataSelect = $this.attr("name");
        var dataKey = $this.find("option:selected").attr("data-key");
        var dataValue = $this.find("option:selected").val();
        var arr = [];
        setSelectCache[dataSelect] = setSelectCache[dataSelect]?setSelectCache[dataSelect]:{};
        if(dataKey == 0){
            var $opt = $(this).find("option");
            $opt.each(function(){
                var $this = $(this);
                var dataKey = $this.attr("data-key");
                var dataValue = $this.val();
                if(dataKey != 0){
                    arr.push({
                        dataSelect:dataSelect,
                        dataKey:dataKey,
                        dataValue:dataValue,
                    })
                    setSelectCache[dataSelect][dataKey] = dataValue;
                };
            })
        }else{
            arr.push({
                dataSelect:dataSelect,
                dataKey:dataKey,
                dataValue:dataValue,
            })
            setSelectCache[dataSelect][dataKey] = dataValue;
        }
        setResultAppendFn({
            $this:$this,
            arr:arr,
            dataSelect:dataSelect,
        })

        $name.val(JSON.stringify(setSelectCache[dataSelect]));
        // 打印缓存
        console.log("setSelectCache : ",setSelectCache);
    })

    $(".setSelect-container").on("click",".setSelect-result-del",function(){
        var $this = $(this);
        var $container = $this.closest(".setSelect-container");
        var $name = $container.find(".setSelect-hidden");
        var $li = $this.closest(".setSelect-result-item");
        var dataSelect = $this.attr("data-select");
        var dataKey = $this.attr("data-key");
        var dataValue = $this.attr("data-value");
        var $setSelect = $this.closest(".setSelect-container").find(".setSelect");
        $setSelect.find("option").eq(0).prop("selected","selected");
        delete setSelectCache[dataSelect][dataKey];
        $li.remove();
        $name.val(JSON.stringify(setSelectCache[dataSelect]));
        // 打印缓存
        console.log("setSelectCache : ",setSelectCache);
    })
}

// 创建已选择的机型
function setCreatMobileFn(obj) {
    var obj = obj?obj:{};
    var name = obj.name?obj.name:'';
    var data = obj.data?obj.data:[];
    var arr = [];
    var $this = $('[name='+name+'_select]');
    var $container = $this.closest(".setSelect-container");
    var $name = $container.find(".setSelect-hidden");
    var dataSelect = $('#'+name).attr("name");
    setSelectCache = {};
    setSelectCache[dataSelect] = setSelectCache[dataSelect]?setSelectCache[name]:{};
    for(var i=0;i<data.length;i++){
        var item = data[i].value;
        var $item = $('#'+name+' .setSelect-opt[value='+item+']');
        var dataKey = $item.length?$item.attr("data-key"):'';
        if(dataKey){
            var dataKey = dataKey;
            var dataValue = item;
            arr.push({
                dataSelect:dataSelect,
                dataKey:dataKey,
                dataValue:dataValue,
            })
            setSelectCache[dataSelect][dataKey] = item;
        }
    }
    setResultAppendFn({
        $this:$this,
        arr:arr,
        dataSelect:dataSelect,
    })
    $name.val(JSON.stringify(setSelectCache[dataSelect]));
    console.log(setSelectCache)
}

console.log("id : ",id);
console.log("id : ",Boolean(id));

if(id && (id !='undefined')){
    var data={
        id:id,
    };

    $.ajax({
        url: '/index/index/result_edit',
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function (res) {
            console.log(res)
            if(res.code == 0){
                var list = res.list;
                $("#id").attr("data-value",list.id);
                $("#name").val(list.name);
                setCreatMobileFn({
                    name:'mobile_one',
                    data:list.mobile_one,
                });
                setCreatMobileFn({
                    name:'mobile_two',
                    data:list.mobile_two,
                });
                // $("#img_1").val(list.img_1);
                // $("#img_2").val(list.img_2);
                // $("#mobile_one").val(list.mobile_one);
                // $("#mobile_two").val(list.mobile_two);
                setEventsFn();
            }
        },
        error: function (err) {

        }
    });
}else{
    setTimeout(function () {
        setEventsFn();
    },20)
}




// var vm = new Vue({
//
//     data:{
//         id:''
//     },
//     created:function () {
//         var id =this.getId("id");
//     },
//     methods:{
//         getId:function (name){
//             var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
//             var r = window.location.search.substr(1).match(reg);
//             if (r != null)return decodeURI(r[2]);
//             return null;
//         },
//
//
//
//
//     }
//
// })