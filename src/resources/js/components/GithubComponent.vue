<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <img :src="user_data.avatar_url" width="100" height="100">
                    <span>Repositories</span>
                    <ul id="repos">
                    <li v-for="item in repo_data" :key="item.updated_at">
                        <a v-if="item.private == false" :href="item.url">
                        {{ item.name }} - {{ item.description }}
                        </a>
                        <strike v-else>{{ item.name }}</strike>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    const axios = require("axios");
    export default {
        data() {
            return {
                repo_data : '',
                user_data: ''
            }
        },
        mounted() {
            let github = axios.create({
                baseURL: '/github',    
            });
            github.get("/repos")
            .then(response => {
                console.log(response);
                this.repo_data = response.data;
            })
            .catch(function (response){
                console.log(response);
            });
            github.get("/user")
            .then(response => {
                console.log(response);
                this.user_data = response.data;
            })
            .catch(function (response){
                console.log(response);
            });
               
        }

    }
</script>
