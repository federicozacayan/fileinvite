<template>
    <input 
        v-on:keyup="getRequirement()"
        v-model="requirement"
        type="text" 
        class="form-control" 
        id="search-requirement" 
        placeholder="#R400 - Request Benefit">
</template>

<script>
import { bus } from '../app';
    let timer = null;
    export default {
        mounted() {
            let search = document.querySelector('#search-requirement');
            search.parentNode.removeChild(search);
            let focus = document.querySelector('#search-requirement');
            if(focus) focus.focus()
        },
        data () {
            return {
                requirement: ''
            }
        } ,
        methods: {
            getRequirement: function(){
                clearTimeout(timer)
                console.log('Request')
                if(this.requirement.length == 0){
                    return;
                } else {
                    timer = setTimeout(()=>{
                        let host = window.location.protocol+'//'+window.location.hostname
                        fetch(host+'/admin/requirement/search/'+this.requirement, {
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
                            bus.$emit('poblateRequirement', json);
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
