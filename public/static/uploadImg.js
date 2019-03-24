// 上传一张图片到服务器，然后返回一个图片地址
function uploadImg(option){
    var option = option?option:{};
    var uploadedFile = option.uploadedFile?option.uploadedFile:'.uploadImg-uploadedFile';
    var preLook = option.preLook?option.preLook:'.uploadImg-preLook';
    var group = option.group?option.group:'#uploadImg-container';
    var saveUrl = option.saveUrl?option.saveUrl:'#uploadImg-save-url';
    this.$group = $(group);
    this.$uploadedFile = $(group).find(uploadedFile);
    this.preLook = preLook;
    this.$preLook = $(group).find(preLook);
    this.$saveUrl = $(group).find(saveUrl);
    this.url = option.url?option.url:'';
    this.init();
}
// 初始化
uploadImg.prototype.init = function(){
    var self = this;
    self.events();
}
// 设置事件
uploadImg.prototype.events = function(){
    var self = this;
    self.change();
}
// 选择图片
uploadImg.prototype.change = function(){
    var self = this;
    self.$uploadedFile.on("change",function(){
        self.createPreImage(this);
    })
}
// 生成选择图片路径
uploadImg.prototype.getObjectURL = function(file){
    var self = this;
    var url = null ;
    if (window.createObjectURL!=undefined) { // basic
        url = window.createObjectURL(file) ;
    } else if (window.URL!=undefined) { // mozilla(firefox)
        url = window.URL.createObjectURL(file) ;
    } else if (window.webkitURL!=undefined) { // webkit or chrome
        url = window.webkitURL.createObjectURL(file) ;
    }
    return url ;
}
// 生成选择图片预览
uploadImg.prototype.createPreImage = function(_this){
    var self = this;
    var objUrl;
    self.$preLook = self.$group.find(self.preLook);
    if(navigator.userAgent.indexOf("MSIE")>0){
        objUrl = _this.value;
    }else{
        objUrl = self.getObjectURL(_this.files[0]);
    }
    var imgSrc = objUrl;
    var img = '<img src="'+imgSrc+'" alt="" class="itemBS-imgA">';
    self.$preLook.html(img);
    self.$saveUrl.val(imgSrc);
}

// 设置清除上传的图片
function setClearImgFn(_this){
    var $this = $(_this);
    var $parent = $(_this).closest(".uploadImgs-labelD");
    var uploadImg1Container =  $parent.attr("id");
    var $uploadImg1SaveUrl = $parent.find("input[type=hidden]");
    $uploadImg1SaveUrl.val('');
    var uploadImg1SaveUrl = $uploadImg1SaveUrl.attr("id");
    $parent.find(".uploadImg-preLook img").attr("src","");
    var thisName = $parent.find(".uploadImg-uploadedFile").attr("name");
    $parent.find(".uploadImg-uploadedFile").remove();
    $parent.find("label").append('<input class="display_none element-element-need2 uploadImg-uploadedFile" name="'+thisName+'" type="file">');
    new uploadImg({
        group:"#" + uploadImg1Container,
        saveUrl:"#" + uploadImg1SaveUrl,
    });
}

// // 实例
// // 上传图片 背景图
// function setUpdateBgFn(){
//     new uploadImg({
//         group:'#uploadImg-container',
//         saveUrl:'#uploadImg-save-url'
//     });
//     // 上传图片 PPT1 背景图
//     new uploadImg({
//         group:'#uploadImg1-container',
//         saveUrl:'#uploadImg1-save-url'
//     });
//     // 上传图片 PPT2 背景图
//     new uploadImg({
//         group:'#uploadImg2-container',
//         saveUrl:'#uploadImg2-save-url'
//     });
// }
// setUpdateBgFn();