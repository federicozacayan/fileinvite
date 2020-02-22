<template>
    <input 
        v-on:keyup="getCustomer()"
        v-model="customer"
        type="text" 
        class="form-control" 
        id="search-customer" 
        placeholder="#C084 Jhon Doe2">
</template>

<script>
import { bus } from '../app';
    let timer = null;
    export default {
        mounted() {
            let search = document.querySelector('#search-customer');
            search.parentNode.removeChild(search);
            let focus = document.querySelector('#search-customer');
            focus.focus()
        },
        data () {
            return {
                customer: ''
            }
        },
        methods: {
            getCustomer: function(){
                clearTimeout(timer)
                console.log('Request')
                if(this.customer.length == 0){
                    return;
                } else {
                    timer = setTimeout(()=>{
                        let host = window.location.protocol+'//'+window.location.hostname
                        fetch(host+'/admin/customer/search/'+this.customer, {
                            method: 'GET',
                            headers: {
                                'Accept': 'application/json',
                                "Content-type": "application/json; charset=UTF-8"
                            }
                        })
                        .then(response =>{
                             if(response.status==200){
                                 return response.json();
                             } else {
                                 return []
                             } 
                        })
                        .then(json => {
                            console.log('Response')
                            bus.$emit('poblateCustomer', json);
                        })
                        .catch(json => {
                            console.log(json)
                            
                        })
                    },1000)
                }
            }
        }
    }
</script>
