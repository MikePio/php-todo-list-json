const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: 'server.php',
      // array contenente tutte le task
      tasks: [],
      inputNewTask: '',
      errorMessage: ''
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
      if (this.inputNewTask.length < 1) {
        // console.log('Il campo di input è vuoto');
        this.errorMessage = 'Il campo di input è vuoto'
        setTimeout(() => {
          this.errorMessage = ''
        }, 5000);
      }
      else {


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
            this.inputNewTask ='';
            this.tasks = result.data;
            console.log(result.data, 'inserito in', this.tasks);
            console.log(this.inputNewTask, 'inserito in', this.tasks);
          })
      }
    },

    //funzione per cambiare il valore done da da false a true o viceversa
    statusTask(index){
      console.log(index);
      const data = new FormData();
      data.append('changeStatus', index);
      axios.post(this.apiUrl, data)
        .then(result => {
          this.tasks = result.data;
          console.log('changeStatus');
        })
    },

    // funzione per eliminare un task
    deleteTask(index) {
      // console.log(index);
      if (confirm('Sei sicuro di eliminare questo task?')) {
        const data = new FormData();
        data.append('taskToDelete', index);
        axios.post(this.apiUrl, data)
          .then(result => {
            this.tasks = result.data;
            console.log('deleteTask');
          })
      }
    }

  },
  mounted() {
    this.getApi();
  }



}).mount('#app')





































