<template>
    <div v-if="show" class="customer-list">
        <label for="exampleInputEmail1">Suggested:</label>
        <ul class="list-group"> 
            <li v-for="d in data" class="list-group-item" >
                <a :href="'./customer/'+d.id+'/edit'">#R{{ d.id }} - {{ d.name }}</a>
            </li>
            <li v-if="data.length==0" class="list-group-item">No Customer found.</li>
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
                data: []
            }
        },
        mounted() {
            
        },
        created(){
        // we can listening that event with instance.$on() function
            bus.$on('poblateCustomer', (data) => {
                if(!this.show){
                    let search = document.querySelector('#customer-list');
                    search.parentNode.removeChild(search);   
                }
                this.show = true;
                this.data = data
            });
        }
    }
</script>
