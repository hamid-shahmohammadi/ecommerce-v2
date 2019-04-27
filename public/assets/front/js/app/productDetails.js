var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!',
        product:product,
        pa_colors:pa_colors,
        classColor:'swatch-element color available',
        pac_click:null,
        qty:1
    },
    methods:{
        addCart(){
            axios.post(base_url+'/addtocart', {
                qty: this.qty,
                product: product
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
        },
        minsQty(){
            if(this.qty >0){
                this.qty--
            }
        },
        plusQty(){
            this.qty++
        },
        getImagePro(img){
            return base_url+'/assets/img/product/orginal/'+img;
        },
        checkColor(pac_id){
            this.pac_click=pac_id;
            self=this;
            axios.get(base_url+'/product-attribute/'+pac_id)
                .then(function (response) {
                    // handle success
                    console.log(response.data.price);
                    self.product.pro_price=response.data.price;
                    self.product.image=response.data.image;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
        }
    }
})