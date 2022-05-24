
<template>
  <div id="app">
    <div v-if=" album_list == null " class="loader">

    </div>
    <div v-else class="site">
    <header>
        <img src="@/assets/spotify-logo.png" alt="spotify logo">
        <select v-model="select" name="Genre" id="" @change="changes()">
             <option  value="">All</option>
          <option  v-for="(element, index ) in optionArray" :key="index" :value="element">{{element}}</option>
        </select>
        
    </header>
    <main>

    <div class="container d-flex ">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5">
                  <div class="album" v-for="album in filteredAlbum" :key="album.id" >
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
      album_list: null,
      select:"",
      optionArray:[]
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
  },

  methods:{

   changes(){
     this.select 

     }, 

    created(){
        this.album_list.filter((album) => {
            let genre = album.genre;  
            if (!this.optionArray.includes(genre)){
                this.optionArray.push(genre)
            } 
        });
    }
     
  },

    computed:{
      filteredAlbum(){
        return this.album_list.filter(album =>{
          this.changes()
              this.created()
          return album.genre.toLowerCase().includes(this.select.toLowerCase())
        }) 

      }
        
    }
};
</script>

<style lang="scss">
@import "@/assets/scss/style.scss";

</style>