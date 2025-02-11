<template>
  <h1 class="font-bold text-3xl text-center">Bienvenue sur la plateforme de vote de l’AP-PNUDM</h1>
  <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow  flex justify-center flex-1 self-center w-full shadow-xl">
      <div class="flex-1 bg-blue-500 text-center hidden lg:flex">
          <div class=" w-full imgcss bg-center bg-no-repeat"
              style="background-image: url('./img01.png');">
          </div>
      </div>
      <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
          <div>
              <img src="https://drive.google.com/uc?export=view&id=1MFiKAExRFF0-2YNpAZzIu1Sh52J8r16v"
                  class="w-mx-auto" />
          </div>
          <form @submit.prevent="login">
              <div class="mt-12 flex flex-col items-center">
                  <div class="w-full flex-1 mt-8">
                      <div class="mx-auto max-w-xs">
                          <!-- Email input with @ icon -->
                          <div class="relative">
                              <input v-model="email"
                                  class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                  type="email" placeholder="Email" />
                              <!-- @ Icon -->
                              <svg xmlns="http://www.w3.org/2000/svg"
                                  class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"
                                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round">
                                  <path d="M6 12a6 6 0 1 1 12 0a6 6 0 1 1 -12 0" />
                                  <path d="M12 15l4 4m0 -4l-4 4" />
                              </svg>
                          </div>

                          <!-- Password input with lock icon -->
                          <div class="relative mt-5">
                              <input v-model="password"
                                  class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                  type="password" placeholder="Password" />
                              <!-- Lock Icon -->
                              <svg xmlns="http://www.w3.org/2000/svg"
                                  class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"
                                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round">
                                  <path
                                      d="M12 17c2.21 0 4-1.79 4-4V9c0-2.21-1.79-4-4-4s-4 1.79-4 4v4c0 2.21 1.79 4 4 4z" />
                                  <path d="M12 9V7a4 4 0 1 0-8 0v2" />
                                  <path d="M8 14v-4" />
                              </svg>
                          </div>

                          <button @click.prevent="submitForm"
                              class="mt-5 tracking-wide font-semibold bg-blue-500 text-white w-full py-4 rounded-lg hover:bg-blue-500 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                              <span class="ml-1">
                                  Login
                              </span>
                          </button>

                          <p class="mt-6 text-xs text-gray-600 text-center">
                              I agree to abide by Cartesian Kinetics
                              <a href="#" class="border-b border-gray-500 border-dotted">
                                  Terms of Service
                              </a>
                              and its
                              <a href="#" class="border-b border-gray-500 border-dotted">
                                  Privacy Policy
                              </a>
                          </p>
                      </div>
                  </div>
              </div>
          </form>
      </div>
  </div>
</template>

<script>
export default {
data() {
return {
email: '',
password: '',
};
},
methods: {
async login() {
try {
  await this.$axios.post('/login', {
    login_email: this.email,
    mot_passe: this.password,
  });
  this.$router.push('/vote');
} catch (error) {
  alert(error.response.data.message);
}
},
},
};
</script>
<style>
.imgcss{
object-fit: cover;
background-size: cover;
}
</style>