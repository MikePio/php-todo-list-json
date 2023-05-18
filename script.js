const {createApp} = Vue;

createApp({
   data(){
      return{
         apiUrl: 'server.php',
         tasks: []
      }
   },

   methods:{
      getApi(){
         axios.get(this.apiUrl)
         .then(result => {
            console.log(result.data);
            //! NON SI UTILIZZA PUSH MA IL SIMBOLO =
            // this.tasks.push(result.data);
            this.tasks = result.data;
         })
      },

   },

   mounted(){
      this.getApi();
   }



}).mount('#app')





































