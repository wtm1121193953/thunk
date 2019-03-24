/**
 * Created by user on 2019/3/10.
 */

var vm = new Vue({
        el: '#app',
        data:{
            productList:[]
        },
        created:function () {
            this.index()
        },
        methods: {
            index: function () {
                let that = this;
                axios.post('index/index/getList')
                    .then(function (response) {
                         let data = response.data.list;
                         that.productList=data;
                    })
                    .catch(function (error) {
                      //  console.log(error);
                    });
            },

            click_add:function (item) {
                let id = item.id;
             //    console.log(JSON.stringify(item))
                layer.open({
                    type: 2,
                    title: item.id?'编辑页面':'添加页面',
                    shadeClose: true,
                    shade: 0.8,
                    area: ['380px', '90%'],
                    content: 'index/index/add_index?id='+id //iframe的url
                });
            }




        }
    })
