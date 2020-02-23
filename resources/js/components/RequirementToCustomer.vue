<template>
    <div v-if="show" class="requirement-list">
        <form :action="host+'/admin/process'" method="POST" id="create-process">
            <input type="hidden" name="_token" v-model="token">
            <input type="hidden" v-model="customer_id" name="customer_id"/>  
            <input type="hidden" id="requirement_id" name="requirement_id"/> 
            <input type="hidden" value="{}" name="json"/>
        </form>
        <label for="a">Requirements:</label>
        <ul class="list-group"> 
       
            <li v-for="d in data" class="list-group-item d-flex justify-content-between" >
                <i class='fas fa-sitemap'></i>
                <span>#R{{ d.id }} - {{ d.name }}</span>
                <a class="green":href="host+'/admin/process/'"
                v-on:click.prevent="set(d.id)">
                <i class="fas fa-toggle-off"></i></a>
            </li>
            <li v-if="data.length==0" class="list-group-item">No Requirement found.</li>
        </ul>
    </div>
</template>

<script>
import { bus } from '../app';
    let timer = null;
    export default {
        data () {
            return {
                show: false,
                data: [],
                host: window.location.protocol+'//'+window.location.hostname, 
                token: document.querySelector('[name="csrf-token"]').getAttribute('content'),
                customer_id:document.querySelector('#customer_id').value,
                requirement_id:''

            }
        },
        methods: {
            set: function(requirement_id){
                
                document.querySelector('#requirement_id').value = requirement_id
                // console.log('asdasdasda')
                // console.log(document.querySelector('#create-process').getAttribute('action'))
                document.querySelector('#create-process').submit()
            }
        },
        mounted() {
            
        },
        created(){
        // we can listening that event with instance.$on() function
            bus.$on('poblateRequirement', (data) => {
                if(!this.show){
                    let search = document.querySelector('#requirement-list');
                    if(search) search.parentNode.removeChild(search);   
                }
                this.show = true;
                this.data = data
            });
        }
    }
</script>
