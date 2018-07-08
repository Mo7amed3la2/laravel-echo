<template>
    <div>
        <ul class="list-group" id="list">
            <li v-for="order in orders" v-text="order" class="list-group-item" > </li>
            
        </ul> 
        <input type="test" @keyup.enter="send" v-model="newTask" class="form-control" />
    </div>
</template>

<script>
    export default {
        props : ['orders','id'],
        data(){
            return {
                newTask : ''
            }
        },
        created(){
            window.Echo.channel('order.' + this.id).listen('OrderStatusChange', e =>{
                $('#list').append(`<li class="list-group-item">${e.order}</li>`);
            })
        }
        ,
        methods :{
            send(){
                this.orders.push(this.newTask);
                axios.post("/test/" + this.id,{data : this.newTask}).then( (e) =>{
                });
                this.newTask = '';
            }
        }
    }

    
</script>
