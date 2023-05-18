const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: 'server.php',
      // array contenente tutte le task
      tasks: [],
      inputNewTask: ''
    }
  },

  methods: {
    // funzione per ottenere i dati da server.php (che a sua volta gli ottiene da todo-list.json)
    getApi() {
      axios.get(this.apiUrl)
        .then(result => {
          console.log(result.data);
          //! NON SI UTILIZZA PUSH MA IL SIMBOLO =
          // this.tasks.push(result.data);
          this.tasks = result.data;
        })
    },

    addNewTask() {
      //* SENZA FormData(); invio task nuovo da aggiungere al server 
      // // oggetto da inviare al server
      // const objectNewTask = {
      //   text: this.inputNewTask,
      //   done: false
      // }

      // const data = {
      //   newTask: objectNewTask
      // }

      // // chiamata post con axios
      // axios.post(this.apiUrl, data, {
      // // php riceve i dati solo tramite form quindi bisogna aggiungere questa proprietà
      //   headers:{'Content-Type': 'multipart/form-data'}
      // }).then(result => {
      //   this.inputNewTask = '';
      //   this.tasks = result.data;
      //   console.log(this.inputNewTask, 'inserito in', this.tasks);
      // })

      //* CON FormData(); invio task nuovo da aggiungere al server 
      const data = new FormData();
      // aggiungo la mia variabile all'oggetto tramite append
      data.append('newTask', this.inputNewTask);

      axios.post(this.apiUrl, data)
        .then(result => {
          // this.inputNewTask ='';
          this.tasks = result.data;
          console.log(result.data, 'inserito in', this.tasks);
          console.log(this.inputNewTask, 'inserito in', this.tasks);
        })
    }

  },
  mounted() {
    this.getApi();
  }



}).mount('#app')





































