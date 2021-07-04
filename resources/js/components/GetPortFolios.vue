<template>
  <section id="portfolio" class="portfolio">
    <div class="container">
      <div class="section-title">
        <span>Portfolio</span>
        <h2>Portfolio</h2>
        <p>
          Here are some of our recent projects from a variety of industries we
          serve.
        </p>
      </div>

      <div class="row portfolio-container">
        <div
          class="col-lg-4 col-md-6 portfolio-item filter-app"
          v-for="portfolio in portfolios"
          :key="portfolio.id"
          style="box-shadow: 10px 5px 5px grey;"
        >
          <div class="portfolio-wrap">
            <img
             :src="'http://127.0.0.1:8000/assets/avatars/' + portfolio.picture"
              class="img-fluid"
              style="height:200px;"
              alt=""
            />
            <div class="portfolio-info">
              <h4>{{portfolio.title}}</h4>
              
              <div class="portfolio-links">
                <a
                  :href="'http://127.0.0.1:8000/assets/avatars/' + portfolio.picture"
                  data-gallery="portfolioGallery"
                  class="portfolio-lightbox"
                  title="App 1"
                  ><i class="ri-add-fill"></i
                ></a>
              <router-link :to="'/home/PortfolioDetails/' + portfolio.id"><i class="ri-links-fill"></i
                ></router-link>               
              </div>
            </div>
          </div>
        </div>
      </div>
    

    
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
    portfolios:{
             id:"",
             title:"",
             picture:"",
           }

    };
  },

  methods: {
   
    
      getPortfolios() {
      axios.get("/Get-Portfolios/"+this.$route.params.id ).then(response => {
        this.portfolios = response.data.portfolios;
      });
    },

    
  },

   created() {
    this. getPortfolios()
  }

  
};
</script>

<style>




</style>