<template>
       <h1 class="text-3xl text-center">Vote du <span class="font-bold">Président de l’AP-PNUDM</span></h1>
    
    <div class="flex justify-end hjy self-center w-full">
      <button
      type="submit"
      class="py-2 px-4 bg-blue-500 buu text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
    >
      Suivant
    </button>
    </div>
<div class="max-w-screen-xl m-0 sm:m-6 bg-white shadow try flex  flex-1 self-center w-full shadow-xl">
<div class="max-w-xl  bg-white p-8  rounded-lg">
  <h1 class="yui">Sélectionnez votre candidat puis, cliquez sur suivant.</h1>
  <form @submit.prevent="submitVote">
    <div class="space-y-4">
      <div class="flex items-center">
          <span class="circle" style="background-image: url(img3.jpg);background-position: center;object-fit: cover;background-size: cover;"></span>
        <label for="candidate1" class="ml-2 text-lg lab">Djeneba Diawara</label>
        <input
          v-model="selectedCandidate"
          type="radio"
          id="candidate1"
          value="candidate1"
          name="president"
          class="h-5 w-5 text-red-900 ip"
        />
        
      </div>
    </div>
    <div class="space-y-4">
      <div class="flex items-center">
          <span class="circle" style="background-image: url(img2.jpg);background-position: center;object-fit: cover;background-size: cover;"></span>
        <label for="candidate1" class="ml-2 text-lg lab">Faran Sidibe</label>
        <input
          v-model="selectedCandidate"
          type="radio"
          id="candidate1"
          value="candidate1"
          name="president"
          class="h-5 w-5 text-red-900 ip"
        />
        
      </div>
    </div>
    <div class="space-y-4">
      <div class="flex items-center">
          <span class="circle" style="background-image: url(img1.jpg);background-position: center;object-fit: cover;background-size: cover;"></span>
        <label for="candidate1" class="ml-2 text-lg lab">Moussa Diomande</label>
        <input
          v-model="selectedCandidate"
          type="radio"
          id="candidate1"
          value="candidate1"
          name="president"
          class="h-5 w-5 text-red-900 ip"
        />
        
      </div>
    </div>
    <div class="space-y-4">
      <div class="flex items-center">
          <span class="circle" style="background-color: white;background-position: center;object-fit: cover;background-size: cover;"></span>
        <label for="candidate1" class="ml-2 text-lg lab">Vote Blanc</label>
        <input
          v-model="selectedCandidate"
          type="radio"
          id="candidate1"
          value="candidate1"
          name="president"
          class="h-5 w-5 text-red-900 ip"
        />
        
      </div>
    </div>

  </form>
</div>
</div>
<div class="flex justify-between hjy self-center w-full">
  <span class="text-white pr-8">Votant : janvier.akowo@undp.org </span>
      <button
      type="submit"
      class="py-2 px-4 bg-blue-500 buu text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
    >
      Suivant
    </button>
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
  