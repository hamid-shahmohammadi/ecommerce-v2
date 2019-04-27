var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!',
    },
    methods:{
        addCart(p){
            console.log(p)
            axios.post(base_url+'/addtocart', {
                qty: 1,
                product: p
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