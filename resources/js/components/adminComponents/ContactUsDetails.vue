<template>
<main class="message">
      
      <div class="details">
        <div class="header">
          <div class="from">
            <span>Lukasz Holeczek</span><br>
            lukasz@bootstrapmaster.com
          </div>
          <div class="date">Today, <b>3:47 PM</b></div>
        </div>
        <div class="content">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
          <blockquote>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </blockquote>
        </div>
        <div class="attachments">
         
      
      
        </div>
     
      </div>
    </main>
</template>

<script>
    export default {
       data(){
        return{
          
         

        }
       },

       methods:{
           
       },



       created(){
           
       }
    }
</script>

<style>

.email-app {
    display: flex;
    flex-direction: row;
    background: #fff;
    border: 1px solid #e1e6ef;
}







main {
    min-width: 0;
    flex: 1;
    padding: 1rem;
}



 .messages {
    padding: 0;
    list-style: none;
}

.message {
    position: relative;
    padding: 1rem 1rem 1rem 2rem;
    cursor: pointer;
    border-bottom: 1px solid #e1e6ef;
}

</style>
