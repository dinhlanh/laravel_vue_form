<template>
</template>

<script>
import FormErrors from "./FormErrors";
export default {
    name: 'Form',
    mixins: [FormErrors],
    data(){
        return{
            success: false,
            error: false,
            // errorMessage: '',
            successMessage: '',
        }
    },
    methods:{
        post(url, data){
            this.success = false;
            this.error = false;
            axios.post(url,data)
                .then((res) => {
                    this.onSuccess(res.data.message);
                })
                .catch((error) => {
                    if (error.response.status == 422) {
                        this.setErrors(error.response.data.errors)
                    }
                    this.onFailure(error.response.data.message);
                })
        },

        get(url, data){
            this.success = false;
            this.error = false;
            axios.get(url,data)
                .then((res) => {
                    this.onSuccess(res.data.message);
                })
                .catch((error) => {
                    if (error.response.status == 422) {
                        this.setErrors(error.response.data.errors)
                    }
                    this.onFailure(error.response.data.message);
                })
        },
        onSuccess(message){
            this.success = true;
            this.successMessage = 'You create contact success';
        },

        onFailure(message){
            this.error = true;
            // this.errorMessage = message;
        },

        reset(){
            this.clearAllErorrs();

            for (let field in this.formData){
                this.formData[field] = null;
            }
        },

    }
}
</script>
