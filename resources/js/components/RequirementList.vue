<template>
    <div v-if="show" class="requirement-list">
        <label for="a">Suggested:</label>
        <ul class="list-group"> 
            <li v-for="d in data" class="list-group-item" >
                <a :href="host+'/admin/requirement/'+d.id+'/edit'">
                #R{{ d.id }} - {{ d.name }}</a>
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
                host: window.location.protocol+'//'+window.location.hostname
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
