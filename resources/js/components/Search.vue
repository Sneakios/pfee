<template>
    <div class="container h-100">
      <div class="d-flex justify-content-center h-100">
        <div class="searchbar">
          <input class="search_input" type="text" placeholder="Search..." v-model="k" @keyup="getSearchResult()">
          <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
           
            <ul class="dropdown-menu"  v-if="users.length > 0">
         
            <li v-for="user in users" :key="user.id" class="dropdown-item">{{user.name}}</li>
        </ul>
        </div>
         
      </div>
    </div>


</template>

<script>
    export default {
     data(){
         return{
             k:null,
             users:{
                 id:"",
                 name:'',
                 avatar:"",

             }
         }

      
     },

    

    methods:{
        getSearchResult(){
            if(this.k.length >= 3){
            axios.get("/searchUser",{k:this.k}).then(response=>{
                this.users=response.data.data;
            })

        }}
    } ,
    


    }
</script>

<style>
.searchbar{
    margin-bottom: auto;
    margin-top: auto;
    height: 60px;
    background-color: #353b48;
    border-radius: 30px;
    padding: 10px;
    }

    .search_input{
    color: white;
    border: 0;
    outline: 0;
    background: none;
    width: 0;
    caret-color:transparent;
    line-height: 40px;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_input{
    padding: 0 10px;
    width: 250px;
    caret-color:red;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_icon{
    background: rgb(255, 255, 255);
    color: #6f3ce7;
    }

    .search_icon{
    height: 40px;
    width: 40px;
    float: right;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    color:rgb(122, 107, 107);
    text-decoration:none;
    }
</style>