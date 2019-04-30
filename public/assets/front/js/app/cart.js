var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!',
        showTotal:true,
        carts:{},
        showAddress:false,
        newAddress:null
    },
    created(){
        this.getcart();
    },
    methods:{
        showNewAddress(){
            this.showAddress=this.newAddress;
        },
        showImage(img){
            return base_url+'/assets/img/product/small/'+img;
        },
        getcart(){
            self=this;
            axios.get(base_url+'/getcart')
                .then(function (response) {
                    // handle success
                    console.log(response.data);
                    self.carts=response.data
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
        },
        updateCart(id,qty){
            console.log(this.qty);
            axios.post(base_url+'/updatecart', {
                qty: qty,
                id: id
            })
                .then(function (response) {
                    console.log(response);
                    if(response.data){
                        location.reload();
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
})