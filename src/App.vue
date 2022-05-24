
<template>
  <div id="app">
    <header>
        <img src="@/assets/spotify-logo.png" alt="spotify logo">
    </header>
    <main>

    <div class="container d-flex ">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5">
                  <div class="album" v-for="album in album_list" :key="album.id">
                    <div class="col mb-4">
                        <div class="card my-4 ">
                               <img class="img-fluid p-3" :src="album.poster" :alt="album.title">
                            <div class="card-body text-white text-center ">
                                 <h5>{{album.title}}</h5>
                                 <p class="text-secondary fw-bold">{{album.author}}</p>
                                 <p class="text-secondary ">{{album.year}}</p>
                            </div>
                        </div> 
                    </div>  
                  </div> 
            </div>
        </div>
    </main>
    
  </div>
</template>

<script>
import axios from 'axios';


export default {
  name: 'App',
  components: {
    
    },
  data() {
    return {
      album_list: null
    }
  },
  mounted() {
    axios
    .get('http://localhost/PHP/php-ajax-dischi/src/db/databaseVue.php') 
    .then(response => {
      console.log(response.data);
      this.album_list = response.data;
    })
    .catch(err => {
      console.error(err);
    })
  }
}
</script>

<style lang="scss">
@import "@/assets/scss/style.scss";

</style>