<template>
    <h1 class="font-bold text-3xl text-center">Bienvenue sur la plateforme de vote de l’AP-PNUDM</h1>

    <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow  flex  flex-1 self-center w-full shadow-xl">
      <div class="max-w-xl m-2 bg-white p-8  rounded-lg">
        <h1 class="">Sélectionnez votre candidat puis, cliquez sur suivant.</h1>
        <form @submit.prevent="submitVote">
      <div>
        <input type="radio" id="Djeneba" name="vote" value="Djeneba_Diawara" v-model="selectedCandidate" />
        <label for="Djeneba">Djeneba Diawara</label>
      </div>
      <div>
        <input type="radio" id="Faran" name="vote" value="Faran_Sidibe" v-model="selectedCandidate" />
        <label for="Faran">Faran Sidibe</label>
      </div>
      <div>
        <input type="radio" id="Moussa" name="vote" value="Moussa_Diomande" v-model="selectedCandidate" />
        <label for="Moussa">Moussa Diomande</label>
      </div>
      <div>
        <input type="radio" id="Blanc" name="vote" value="Vote_Blanc" v-model="selectedCandidate" />
        <label for="Blanc">Vote Blanc</label>
      </div>
      <button type="submit">Suivant</button>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        selectedCandidate: '',
      };
    },
    methods: {
      async submitVote() {
        try {
          const response = await this.$axios.post('http://localhost:3000/vote-president/vote', {
            candidate: this.selectedCandidate,
          });
          alert('Vote enregistré');
        } catch (error) {
          alert(error.response.data.message);
        }
      },
    },
  };
  </script>
<style>
.circle{
    width:70px;
    height:70px;
    border-radius: 50%;
    background-color:green;
    border:1px solid silver;
}
</style>
  