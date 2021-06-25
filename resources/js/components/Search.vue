<template>
    <div>
        <input type="text" v-model="keyword">
        <ul v-if="Users.length > 0">
            <li v-for="user in Users" :key="user.id" >{{user.name}}</li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            keyword: null,
            Users: []
        };
    },
    watch: {
        keyword(after, before) {
            this.getResults();
        }
    },
    methods: {
        getResults() {
            axios.get('/searchUser',{keyword: this.keyword })
                .then(response =>{this.Users=response.data.data})
                ;
        }
    }
}
</script>