<template>
    <div>
        <heading class="mb-6">Blogify dashboard.</heading>

        <card class="flex flex-col items-center justify-center bg-90 text-20">
            <h1 class="text-4xl font-light mt-6 mb-2">Blogify</h1>
            <div v-if="!installed" class="mb-8">
                <p>Status: <span class="ml-4 px-6 py-2 inline-block btn btn-danger rounded">Not installed</span></p>
                <p class="mt-6 text-center"><button class="btn btn-primary px-6 py-2 rounded" @click="processInstallation">Install now</button></p> 
            </div>
            <p v-else class="mb-8">
                Status: <span class="ml-4 px-6 py-2 inline-block btn btn-primary rounded">Installed</span>
            </p>
        </card>
    </div>
</template>

<script>
export default {
  mounted() {
    this.checkInstallation();
  },

  data() {
    return {
      installed: false
    };
  },

  methods: {
    checkInstallation() {
      Nova.request()
        .get("/nova-blogify/check-installation")
        .then(response => (this.installed = response.data.installation_status))
        .catch(() => (this.installed = false));
    },

    processInstallation() {
      Nova.request()
        .post("/nova-blogify/install")
        .then(response =>
          this.$toasted.show(response.data.message, { type: "success" })
        )
        .then(() => this.checkInstallation())
        .catch(error =>
          this.$toasted.show(error.response.data.message, { type: "error" })
        );
    }
  }
};
</script>
