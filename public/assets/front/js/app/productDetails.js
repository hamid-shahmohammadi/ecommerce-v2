var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!',
        product:product,
        pa_colors:pa_colors,
        classColor:'swatch-element color available',
        pac_click:null
    },
    methods:{
        getImagePro(img){
            return base_url+'/assets/img/product/orginal/'+img;
        },
        checkColor(pac_id){
            this.pac_click=pac_id;
        }
    }
})