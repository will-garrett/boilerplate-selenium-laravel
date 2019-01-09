<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example vue component.
                    </div>
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
                data : '',
                env: null
            }
        },
        mounted() {
            console.log('Component mounted.');
            let github = axios.create({
                baseURL: '/github',
                
            });
            github.get("/repos")
            .then(response => {
                console.log(response);
                this.data = response;
            })
            .catch(function (response){
                console.log(response);
            });
               
        }

    }
</script>
